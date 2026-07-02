<?php

namespace App\Services\CMS;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;

class MediaService
{
    private const VARIANTS = [
        'large'  => 1440,
        'medium' => 800,
        'small'  => 480,
        'thumb'  => 200,
    ];

    private const CACHE_TTL = 300;

    public function store(UploadedFile $file, string $folder, ?int $uploadedBy = null): Media
    {
        $uuid      = (string) Str::uuid();
        $ext       = strtolower($file->getClientOriginalExtension());
        $filename  = $uuid . '.' . $ext;
        $directory = "cms/{$folder}";
        $path      = $file->storeAs($directory, $filename, 'public');

        [$width, $height] = $this->imageDimensions($file);

        $variants = [];
        if ($this->canProcessImage($file)) {
            $variants = $this->generateVariants($file->getRealPath(), $uuid, $directory);
        }

        $media = Media::create([
            'uuid'              => $uuid,
            'title'             => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
            'original_filename' => $file->getClientOriginalName(),
            'filename'          => $filename,
            'directory'         => $directory,
            'extension'         => $ext,
            'path'              => $path,
            'disk'              => 'public',
            'mime_type'         => $file->getMimeType(),
            'category'          => $folder,
            'file_size'         => $file->getSize(),
            'width'             => $width,
            'height'            => $height,
            'checksum'          => md5_file($file->getRealPath()),
            'variants'          => $variants ?: null,
            'uploaded_by'       => $uploadedBy,
            'is_public'         => true,
        ]);

        $this->flush();

        return $media;
    }

    public function replace(Media $media, UploadedFile $file, ?int $updatedBy = null): Media
    {
        // Delete old file and variants from storage
        $this->deleteFiles($media);

        $uuid      = $media->uuid ?? (string) Str::uuid();
        $ext       = strtolower($file->getClientOriginalExtension());
        $filename  = $uuid . '.' . $ext;
        $directory = $media->directory ?? 'cms/uploads';
        $path      = $file->storeAs($directory, $filename, 'public');

        [$width, $height] = $this->imageDimensions($file);

        $variants = [];
        if ($this->canProcessImage($file)) {
            $variants = $this->generateVariants($file->getRealPath(), $uuid, $directory);
        }

        $media->update([
            'original_filename' => $file->getClientOriginalName(),
            'filename'          => $filename,
            'extension'         => $ext,
            'path'              => $path,
            'mime_type'         => $file->getMimeType(),
            'file_size'         => $file->getSize(),
            'width'             => $width,
            'height'            => $height,
            'checksum'          => md5_file($file->getRealPath()),
            'variants'          => $variants ?: null,
            'updated_by'        => $updatedBy,
        ]);

        $this->flush();

        return $media->fresh();
    }

    public function update(Media $media, array $data, ?int $updatedBy = null): Media
    {
        $media->update(array_merge($data, ['updated_by' => $updatedBy]));
        $this->flush();

        return $media->fresh();
    }

    public function delete(Media $media): void
    {
        if ($media->delete() === false) {
            return;
        }

        $this->deleteFiles($media);
    }

    public function usageCount(Media $media): int
    {
        return $this->usages($media)->sum('count');
    }

    public function usages(Media $media): \Illuminate\Support\Collection
    {
        $usages = collect();
        $id     = $media->id;

        $checks = [
            ['table' => 'site_settings', 'columns' => ['logo_media_id', 'logo_inverse_media_id', 'logo_dark_media_id', 'logo_footer_media_id', 'logo_email_media_id', 'logo_login_media_id', 'favicon_media_id', 'apple_touch_media_id', 'default_og_media_id', 'twitter_card_media_id'], 'label' => 'Site Settings'],
            ['table' => 'pages',         'columns' => ['hero_media_id', 'og_media_id'],     'label' => 'Pages'],
            ['table' => 'insights',      'columns' => ['featured_media_id'],                'label' => 'Insights'],
            ['table' => 'case_studies',  'columns' => ['featured_media_id'],                'label' => 'Case Studies'],
            ['table' => 'team_members',  'columns' => ['photo_media_id'],                   'label' => 'Team Members'],
            ['table' => 'partners',      'columns' => ['logo_media_id'],                    'label' => 'Partners'],
            ['table' => 'downloads',     'columns' => ['media_id'],                         'label' => 'Downloads'],
        ];

        foreach ($checks as $check) {
            $count = 0;
            foreach ($check['columns'] as $col) {
                if (Schema::hasColumn($check['table'], $col)) {
                    $count += DB::table($check['table'])->where($col, $id)->count();
                }
            }
            if ($count > 0) {
                $usages->push(['label' => $check['label'], 'count' => $count]);
            }
        }

        return $usages;
    }

    public function paginated(array $filters = [], int $perPage = 40): LengthAwarePaginator
    {
        $query = Media::query()->latest();

        if (! empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(fn ($q) => $q->where('title', 'like', "%{$search}%")
                ->orWhere('original_filename', 'like', "%{$search}%")
                ->orWhere('alt_text', 'like', "%{$search}%")
            );
        }

        if (! empty($filters['type'])) {
            match ($filters['type']) {
                'images'    => $query->where('mime_type', 'like', 'image/%'),
                'documents' => $query->whereIn('extension', ['pdf', 'doc', 'docx']),
                'pdf'       => $query->where('extension', 'pdf'),
                'svg'       => $query->where('extension', 'svg'),
                default     => null,
            };
        }

        if (! empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        return $query->paginate($perPage)->withQueryString();
    }

    public function all()
    {
        return Media::latest()->get();
    }

    public function flush(): void
    {
        Cache::forget('cms.site_settings');
    }

    private function generateVariants(string $sourcePath, string $uuid, string $directory): array
    {
        try {
            $manager  = new ImageManager(new GdDriver());
            $variants = [];

            foreach (self::VARIANTS as $size => $width) {
                $variantFilename = "{$uuid}-{$size}.webp";
                $variantPath     = "{$directory}/variants/{$variantFilename}";

                $image = $manager->read($sourcePath);
                $image->scaleDown(width: $width);
                $encoded = $image->toWebp(quality: 82);

                Storage::disk('public')->put($variantPath, (string) $encoded);
                $variants[$size] = $variantPath;
            }

            return $variants;
        } catch (\Throwable) {
            return [];
        }
    }

    private function canProcessImage(UploadedFile $file): bool
    {
        $mime = $file->getMimeType();

        return str_starts_with($mime, 'image/')
            && ! in_array($mime, ['image/svg+xml', 'image/svg']);
    }

    private function deleteFiles(Media $media): void
    {
        $disk = $media->disk ?? 'public';

        if ($media->path && Storage::disk($disk)->exists($media->path)) {
            Storage::disk($disk)->delete($media->path);
        }

        if (! empty($media->variants)) {
            foreach ($media->variants as $variantPath) {
                if (Storage::disk($disk)->exists($variantPath)) {
                    Storage::disk($disk)->delete($variantPath);
                }
            }
        }
    }

    private function imageDimensions(UploadedFile $file): array
    {
        if (str_starts_with($file->getMimeType(), 'image/')) {
            $size = @getimagesize($file->getRealPath());
            if ($size) {
                return [$size[0], $size[1]];
            }
        }

        return [null, null];
    }
}

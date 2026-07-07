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

    public function delete(Media $media): bool
    {
        if ($media->delete() === false) {
            return false;
        }

        $this->deleteFiles($media);

        return true;
    }

    /**
     * Deletes every unused item in $ids, skipping used ones. Reuses delete() unmodified per item,
     * so MediaObserver's usage guard still fires as a safety net even though we pre-filter first.
     *
     * @return array{deleted: int, skipped_in_use: int, not_found: int}
     */
    public function bulkDelete(array $ids): array
    {
        $items = Media::whereIn('id', $ids)->get();
        $notFound = count($ids) - $items->count();

        $used = $this->usedMediaIds($items->pluck('id')->all());

        $deleted = 0;
        $skipped = 0;

        DB::transaction(function () use ($items, $used, &$deleted, &$skipped) {
            foreach ($items as $item) {
                if (in_array($item->id, $used, true)) {
                    $skipped++;
                    continue;
                }

                if ($this->delete($item)) {
                    $deleted++;
                } else {
                    $skipped++;
                }
            }
        });

        return ['deleted' => $deleted, 'skipped_in_use' => $skipped, 'not_found' => $notFound];
    }

    /**
     * @return array{updated: int, not_found: int}
     */
    public function bulkUpdateCategory(array $ids, string $category, ?int $updatedBy = null): array
    {
        return $this->bulkUpdate($ids, ['category' => $category], $updatedBy);
    }

    /**
     * @return array{updated: int, not_found: int}
     */
    public function bulkUpdateVisibility(array $ids, bool $isPublic, ?int $updatedBy = null): array
    {
        return $this->bulkUpdate($ids, ['is_public' => $isPublic], $updatedBy);
    }

    /**
     * Loops per-item through update() rather than a single whereIn()->update() so model events
     * (and therefore MediaObserver's cache flush) still fire — deliberate trade-off, see 7B.5 design.
     *
     * @return array{updated: int, not_found: int}
     */
    private function bulkUpdate(array $ids, array $data, ?int $updatedBy): array
    {
        $items = Media::whereIn('id', $ids)->get();
        $notFound = count($ids) - $items->count();

        $updated = 0;

        DB::transaction(function () use ($items, $data, $updatedBy, &$updated) {
            foreach ($items as $item) {
                $this->update($item, $data, $updatedBy);
                $updated++;
            }
        });

        return ['updated' => $updated, 'not_found' => $notFound];
    }

    /**
     * Single source of truth for every table/column that can reference a Media row.
     * Shared by usages() (per-item detail), the "unused" bulk filter, and grid usage badges
     * so all three can never drift out of sync with each other.
     */
    private const USAGE_CHECKS = [
        ['table' => 'site_settings', 'columns' => ['logo_media_id', 'logo_inverse_media_id', 'logo_dark_media_id', 'logo_footer_media_id', 'logo_email_media_id', 'logo_login_media_id', 'favicon_media_id', 'apple_touch_media_id', 'default_og_media_id', 'twitter_card_media_id'], 'label' => 'Site Settings'],
        ['table' => 'pages',         'columns' => ['hero_media_id', 'og_media_id'],     'label' => 'Pages'],
        ['table' => 'hero_cards',    'columns' => ['image_media_id'],                  'label' => 'Hero Cards'],
        ['table' => 'insights',      'columns' => ['featured_media_id'],                'label' => 'Insights'],
        ['table' => 'case_studies',  'columns' => ['featured_media_id'],                'label' => 'Case Studies'],
        ['table' => 'team_members',  'columns' => ['photo_media_id'],                   'label' => 'Team Members'],
        ['table' => 'partners',      'columns' => ['logo_media_id'],                    'label' => 'Partners'],
        ['table' => 'downloads',     'columns' => ['media_id'],                         'label' => 'Downloads'],
    ];

    private static array $columnExistsCache = [];

    private function columnExists(string $table, string $column): bool
    {
        return self::$columnExistsCache["{$table}.{$column}"] ??= Schema::hasColumn($table, $column);
    }

    /**
     * Every existing caller only checks truthiness (>0 / ===0), never the exact number,
     * so this is a cheap exists()-based check (~1 query per table, short-circuits on first
     * match) rather than delegating to usages(), which does one query per *column* for its
     * precise per-table breakdown (needed for display, not needed here).
     */
    public function usageCount(Media $media): int
    {
        foreach (self::USAGE_CHECKS as $check) {
            $columns = array_values(array_filter($check['columns'], fn ($col) => $this->columnExists($check['table'], $col)));

            if (empty($columns)) {
                continue;
            }

            $exists = DB::table($check['table'])
                ->where(function ($query) use ($columns, $media) {
                    foreach ($columns as $col) {
                        $query->orWhere($col, $media->id);
                    }
                })
                ->exists();

            if ($exists) {
                return 1;
            }
        }

        return 0;
    }

    public function usages(Media $media): \Illuminate\Support\Collection
    {
        $usages = collect();
        $id     = $media->id;

        foreach (self::USAGE_CHECKS as $check) {
            $count = 0;
            foreach ($check['columns'] as $col) {
                if ($this->columnExists($check['table'], $col)) {
                    $count += DB::table($check['table'])->where($col, $id)->count();
                }
            }
            if ($count > 0) {
                $usages->push(['label' => $check['label'], 'count' => $count]);
            }
        }

        return $usages;
    }

    /**
     * Given a set of media IDs (typically one page of results), returns the subset
     * that is referenced somewhere. Bounded by the number of usage tables (7 queries),
     * not the number of media items — avoids N+1 when rendering usage badges on a grid.
     */
    public function usedMediaIds(array $mediaIds): array
    {
        if (empty($mediaIds)) {
            return [];
        }

        $used = [];

        foreach (self::USAGE_CHECKS as $check) {
            foreach ($check['columns'] as $col) {
                if ($this->columnExists($check['table'], $col)) {
                    $used = array_merge(
                        $used,
                        DB::table($check['table'])->whereIn($col, $mediaIds)->pluck($col)->all()
                    );
                }
            }
        }

        return array_values(array_unique($used));
    }

    private function applyUnusedConstraint(\Illuminate\Database\Eloquent\Builder $query): void
    {
        foreach (self::USAGE_CHECKS as $check) {
            foreach ($check['columns'] as $col) {
                if ($this->columnExists($check['table'], $col)) {
                    $query->whereNotExists(function ($sub) use ($check, $col) {
                        $sub->selectRaw('1')
                            ->from($check['table'])
                            ->whereColumn("{$check['table']}.{$col}", 'media.id');
                    });
                }
            }
        }
    }

    private const SORTS = [
        'newest'    => ['created_at', 'desc'],
        'oldest'    => ['created_at', 'asc'],
        'title_asc' => ['title', 'asc'],
        'title_desc' => ['title', 'desc'],
        'size_desc' => ['file_size', 'desc'],
        'size_asc'  => ['file_size', 'asc'],
    ];

    public function paginated(array $filters = [], int $perPage = 40): LengthAwarePaginator
    {
        $query = Media::query();

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

        if (($filters['quick'] ?? null) === 'unused') {
            $this->applyUnusedConstraint($query);
        } elseif (($filters['quick'] ?? null) === 'recent') {
            $query->where('created_at', '>=', now()->subDays(7));
        }

        [$sortColumn, $sortDirection] = self::SORTS[$filters['sort'] ?? ''] ?? self::SORTS['newest'];
        $query->orderBy($sortColumn, $sortDirection);

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

<?php

namespace App\Services\CMS;

use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    public function store(UploadedFile $file, string $folder, ?int $uploadedBy = null): Media
    {
        $path = $file->store("cms/{$folder}", 'public');

        [$width, $height] = $this->imageDimensions($file);

        return Media::create([
            'title'       => pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME),
            'path'        => $path,
            'disk'        => 'public',
            'mime_type'   => $file->getMimeType(),
            'file_size'   => $file->getSize(),
            'width'       => $width,
            'height'      => $height,
            'checksum'    => md5_file($file->getRealPath()),
            'uploaded_by' => $uploadedBy,
        ]);
    }

    public function delete(Media $media): void
    {
        Storage::disk($media->disk)->delete($media->path);
        $media->delete();
    }

    public function all()
    {
        return Media::latest()->get();
    }

    private function imageDimensions(UploadedFile $file): array
    {
        if (str_starts_with($file->getMimeType(), 'image/')) {
            $size = getimagesize($file->getRealPath());
            if ($size) {
                return [$size[0], $size[1]];
            }
        }

        return [null, null];
    }
}

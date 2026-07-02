<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Media extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'uuid',
        'title',
        'original_filename',
        'filename',
        'directory',
        'extension',
        'alt_text',
        'caption',
        'description',
        'credit',
        'copyright',
        'path',
        'disk',
        'mime_type',
        'category',
        'file_size',
        'width',
        'height',
        'focal_point_x',
        'focal_point_y',
        'variants',
        'checksum',
        'dominant_colour',
        'is_public',
        'uploaded_by',
        'updated_by',
    ];

    protected $casts = [
        'variants'  => 'array',
        'is_public' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (Media $media) {
            $media->uuid ??= (string) Str::uuid();
        });
    }

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function url(): string
    {
        return Storage::disk($this->disk)->url($this->path);
    }

    public function variantUrl(string $size): string
    {
        if (isset($this->variants[$size])) {
            return Storage::disk($this->disk)->url($this->variants[$size]);
        }

        return $this->url();
    }

    public function isImage(): bool
    {
        return str_starts_with($this->mime_type ?? '', 'image/');
    }

    public function humanFileSize(): string
    {
        $bytes = $this->file_size ?? 0;

        if ($bytes >= 1048576) {
            return round($bytes / 1048576, 1) . ' MB';
        }

        return round($bytes / 1024) . ' KB';
    }

    public function srcset(): string
    {
        if (empty($this->variants)) {
            return $this->url() . ' 1x';
        }

        $parts = [];

        $widthMap = ['large' => 1440, 'medium' => 800, 'small' => 480, 'thumb' => 200];

        foreach ($widthMap as $size => $w) {
            if (isset($this->variants[$size])) {
                $parts[] = Storage::disk($this->disk)->url($this->variants[$size]) . " {$w}w";
            }
        }

        if (empty($parts)) {
            return $this->url();
        }

        return implode(', ', $parts);
    }
}

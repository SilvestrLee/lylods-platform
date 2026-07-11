<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PageCommunityEngagementCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'order',
        'icon',
        'title',
        'description',
        'image_media_id',
        'image_alt',
        'visibility',
    ];

    protected $casts = [
        'visibility' => 'boolean',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_media_id');
    }
}

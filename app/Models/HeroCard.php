<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HeroCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'order',
        'badge',
        'title',
        'description',
        'image_media_id',
        'image_alt',
        'cta_label',
        'cta_url',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_media_id');
    }

    public function icons(): HasMany
    {
        return $this->hasMany(HeroCardIcon::class)->orderBy('order');
    }
}

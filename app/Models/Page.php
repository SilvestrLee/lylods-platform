<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'hero_title',
        'hero_subtitle',
        'hero_description',
        'hero_media_id',
        'primary_cta_label',
        'primary_cta_url',
        'secondary_cta_label',
        'secondary_cta_url',
        'section_visibility',
        'meta_title',
        'meta_description',
        'og_media_id',
        'canonical_url',
        'robots',
        'structured_data',
        'sitemap_include',
        'is_published',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'section_visibility' => 'array',
        'structured_data' => 'array',
        'sitemap_include' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function heroMedia(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'hero_media_id');
    }

    public function ogMedia(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'og_media_id');
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}

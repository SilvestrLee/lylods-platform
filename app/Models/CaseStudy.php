<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseStudy extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'industry', 'challenge', 'our_role', 'outcome', 'summary',
        'featured_media_id', 'gallery', 'featured', 'status', 'published_at',
        'seo_title', 'seo_description', 'canonical_url', 'robots', 'sitemap_include',
        'created_by', 'updated_by',
    ];

    protected $casts = [
        'gallery'         => 'array',
        'featured'        => 'boolean',
        'sitemap_include' => 'boolean',
        'published_at'    => 'datetime',
    ];

    public function featuredMedia(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'featured_media_id');
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

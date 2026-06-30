<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'tagline',
        'logo_media_id',
        'logo_inverse_media_id',
        'favicon_media_id',
        'primary_email',
        'phone',
        'address',
        'office_hours',
        'google_maps_embed',
        'google_analytics_id',
        'linkedin',
        'facebook',
        'instagram',
        'youtube',
        'footer_text',
        'copyright',
        'default_meta_title',
        'default_meta_description',
        'default_og_media_id',
    ];

    public function logo(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'logo_media_id');
    }

    public function logoInverse(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'logo_inverse_media_id');
    }

    public function favicon(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'favicon_media_id');
    }

    public function defaultOgImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'default_og_media_id');
    }
}

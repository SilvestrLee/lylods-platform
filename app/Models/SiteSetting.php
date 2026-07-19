<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'short_name',
        'tagline',
        'logo_media_id',
        'logo_inverse_media_id',
        'logo_dark_media_id',
        'logo_footer_media_id',
        'logo_email_media_id',
        'logo_login_media_id',
        'favicon_media_id',
        'apple_touch_media_id',
        'primary_email',
        'support_email',
        'enquiries_email',
        'phone',
        'alternative_phone',
        'whatsapp',
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
        'twitter_card_media_id',
    ];

    public function logo(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'logo_media_id');
    }

    public function logoInverse(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'logo_inverse_media_id');
    }

    public function logoDark(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'logo_dark_media_id');
    }

    public function logoFooter(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'logo_footer_media_id');
    }

    public function logoEmail(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'logo_email_media_id');
    }

    public function logoLogin(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'logo_login_media_id');
    }

    public function favicon(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'favicon_media_id');
    }

    public function appleTouch(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'apple_touch_media_id');
    }

    public function defaultOgImage(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'default_og_media_id');
    }

    public function twitterCard(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'twitter_card_media_id');
    }
}

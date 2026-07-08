<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Page extends Model
{
    use HasFactory;

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
        'discipline_eyebrow',
        'discipline_items',
        'services_eyebrow',
        'services_heading',
        'services_heading_break',
        'services_cta_label',
        'services_cta_url',
        'industries_eyebrow',
        'industries_heading',
        'industries_cta_label',
        'industries_cta_url',
        'why_choose_us_eyebrow',
        'why_choose_us_heading',
        'why_choose_us_description',
        'why_choose_us_cta_label',
        'why_choose_us_cta_url',
        'engagement_eyebrow',
        'engagement_heading',
        'engagement_description',
        'about_eyebrow',
        'about_heading',
        'about_description',
        'about_media_id',
        'about_media_alt',
        'about_cta_label',
        'about_cta_url',
        'wwu_eyebrow',
        'wwu_heading',
        'wwu_description',
        'wwu_primary_cta_label',
        'wwu_primary_cta_url',
        'wwu_secondary_cta_label',
        'wwu_secondary_cta_url',
        'wwu_investor_note',
        'wwu_investor_cta_label',
        'wwu_investor_cta_url',
        'about_page_intro_heading',
        'about_page_intro_body',
        'about_page_intro_media_id',
        'about_page_intro_cta_label',
        'about_page_intro_cta_url',
        'about_page_cta_heading',
        'about_page_cta_description',
        'about_page_cta_primary_label',
        'about_page_cta_primary_url',
        'about_page_cta_secondary_label',
        'about_page_cta_secondary_url',
        'services_page_intro_heading',
        'services_page_intro_body',
        'services_page_cta_heading',
        'services_page_cta_description',
        'services_page_cta_primary_label',
        'services_page_cta_primary_url',
        'services_page_cta_secondary_label',
        'services_page_cta_secondary_url',
    ];

    protected $casts = [
        'section_visibility' => 'array',
        'structured_data' => 'array',
        'discipline_items' => 'array',
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

    public function aboutMedia(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'about_media_id');
    }

    public function aboutPageIntroMedia(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'about_page_intro_media_id');
    }

    public function heroCards(): HasMany
    {
        return $this->hasMany(HeroCard::class)->orderBy('order');
    }

    public function statistics(): HasMany
    {
        return $this->hasMany(PageStatistic::class)->orderBy('order');
    }

    public function serviceCards(): HasMany
    {
        return $this->hasMany(PageServiceCard::class)->orderBy('order');
    }

    public function industries(): HasMany
    {
        return $this->hasMany(PageIndustry::class)->orderBy('order');
    }

    public function whyChooseUsCards(): HasMany
    {
        return $this->hasMany(PageWhyChooseUsCard::class)->orderBy('order');
    }

    public function engagementSteps(): HasMany
    {
        return $this->hasMany(PageEngagementStep::class)->orderBy('order');
    }

    public function aboutValues(): HasMany
    {
        return $this->hasMany(PageAboutValue::class)->orderBy('order');
    }

    public function aboutHowWeWorkSteps(): HasMany
    {
        return $this->hasMany(PageAboutHowWeWorkStep::class)->orderBy('order');
    }

    public function aboutFocusAreas(): HasMany
    {
        return $this->hasMany(PageAboutFocusArea::class)->orderBy('order');
    }

    public function aboutPrinciples(): HasMany
    {
        return $this->hasMany(PageAboutPrinciple::class)->orderBy('order');
    }

    public function aboutAudienceTags(): HasMany
    {
        return $this->hasMany(PageAboutAudienceTag::class)->orderBy('order');
    }

    public function aboutDifferentiators(): HasMany
    {
        return $this->hasMany(PageAboutDifferentiator::class)->orderBy('order');
    }

    public function servicesWhyUsCards(): HasMany
    {
        return $this->hasMany(PageServicesWhyUsCard::class)->orderBy('order');
    }

    public function servicesHowWorkSteps(): HasMany
    {
        return $this->hasMany(PageServicesHowWorkStep::class)->orderBy('order');
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

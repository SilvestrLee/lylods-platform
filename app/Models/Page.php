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
        'industries_page_intro_heading',
        'industries_page_intro_body',
        'industries_page_cta_heading',
        'industries_page_cta_description',
        'industries_page_cta_primary_label',
        'industries_page_cta_primary_url',
        'industries_page_cta_secondary_label',
        'industries_page_cta_secondary_url',
        'property_support_eyebrow',
        'property_support_heading',
        'property_support_body',
        'property_context_media_id',
        'property_context_eyebrow',
        'property_context_heading',
        'property_audience_eyebrow',
        'property_audience_heading',
        'property_audience_body',
        'property_why_us_eyebrow',
        'property_why_us_heading',
        'property_why_us_body',
        'property_role_eyebrow',
        'property_role_heading',
        'property_role_body',
        'property_network_eyebrow',
        'property_network_heading',
        'property_network_body',
        'property_network_footnote',
        'property_disclaimer_heading',
        'property_disclaimer_body',
        'property_page_cta_heading',
        'property_page_cta_description',
        'property_page_cta_primary_label',
        'property_page_cta_primary_url',
        'property_page_cta_secondary_label',
        'property_page_cta_secondary_url',
        'community_support_eyebrow',
        'community_support_heading',
        'community_support_body',
        'community_audience_media_id',
        'community_audience_eyebrow',
        'community_audience_heading',
        'community_audience_body',
        'community_audience_cta_label',
        'community_audience_cta_url',
        'community_role_media_id',
        'community_role_eyebrow',
        'community_role_heading',
        'community_role_body',
        'community_how_work_eyebrow',
        'community_how_work_heading',
        'community_how_work_body',
        'community_engagement_eyebrow',
        'community_engagement_heading',
        'community_engagement_body',
        'community_page_cta_heading',
        'community_page_cta_description',
        'community_page_cta_primary_label',
        'community_page_cta_primary_url',
        'community_page_cta_secondary_label',
        'community_page_cta_secondary_url',
        'investment_approach_media_id',
        'investment_approach_eyebrow',
        'investment_approach_heading',
        'investment_approach_body',
        'investment_why_eyebrow',
        'investment_why_heading',
        'investment_process_eyebrow',
        'investment_process_heading',
        'investment_cta_eyebrow',
        'investment_cta_heading',
        'investment_cta_body',
        'investment_cta_primary_label',
        'investment_cta_secondary_label',
        'investment_cta_secondary_url',
        'contact_info_eyebrow',
        'contact_info_heading',
        'contact_info_body',
        'contact_general_label',
        'contact_general_description',
        'contact_office_label',
        'contact_office_description',
        'contact_hours_label',
        'contact_info_media_id',
        'contact_info_media_alt',
        'contact_investor_eyebrow',
        'contact_investor_heading',
        'contact_investor_body',
        'contact_investor_cta_label',
        'contact_enquiry_eyebrow',
        'contact_enquiry_heading',
        'careers_opportunity_eyebrow',
        'careers_opportunity_heading',
        'careers_opportunity_body',
        'careers_message_eyebrow',
        'careers_message_heading',
        'careers_message_body',
        'careers_notice_body',
        'careers_how_eyebrow',
        'careers_how_heading',
        'careers_page_cta_eyebrow',
        'careers_page_cta_heading',
        'careers_page_cta_body',
        'careers_page_cta_label',
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

    public function propertyContextMedia(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'property_context_media_id');
    }

    public function communityAudienceMedia(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'community_audience_media_id');
    }

    public function communityRoleMedia(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'community_role_media_id');
    }

    public function investmentApproachMedia(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'investment_approach_media_id');
    }

    public function contactInfoMedia(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'contact_info_media_id');
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

    public function industryCards(): HasMany
    {
        return $this->hasMany(PageIndustryCard::class)->orderBy('order');
    }

    public function propertySupportCards(): HasMany
    {
        return $this->hasMany(PagePropertySupportCard::class)->orderBy('order');
    }

    public function propertyAudienceCards(): HasMany
    {
        return $this->hasMany(PagePropertyAudienceCard::class)->orderBy('order');
    }

    public function propertyWhyUsCards(): HasMany
    {
        return $this->hasMany(PagePropertyWhyUsCard::class)->orderBy('order');
    }

    public function propertyRoleSteps(): HasMany
    {
        return $this->hasMany(PagePropertyRoleStep::class)->orderBy('order');
    }

    public function propertyNetworkTags(): HasMany
    {
        return $this->hasMany(PagePropertyNetworkTag::class)->orderBy('order');
    }

    public function communitySupportCards(): HasMany
    {
        return $this->hasMany(PageCommunitySupportCard::class)->orderBy('order');
    }

    public function communityAudienceTags(): HasMany
    {
        return $this->hasMany(PageCommunityAudienceTag::class)->orderBy('order');
    }

    public function communityRoleSteps(): HasMany
    {
        return $this->hasMany(PageCommunityRoleStep::class)->orderBy('order');
    }

    public function communityHowWorkSteps(): HasMany
    {
        return $this->hasMany(PageCommunityHowWorkStep::class)->orderBy('order');
    }

    public function communityEngagementCards(): HasMany
    {
        return $this->hasMany(PageCommunityEngagementCard::class)->orderBy('order');
    }

    public function investmentCredibilityCards(): HasMany
    {
        return $this->hasMany(PageInvestmentCredibilityCard::class)->orderBy('order');
    }

    public function investmentApproachCards(): HasMany
    {
        return $this->hasMany(PageInvestmentApproachCard::class)->orderBy('order');
    }

    public function investmentWhyCards(): HasMany
    {
        return $this->hasMany(PageInvestmentWhyCard::class)->orderBy('order');
    }

    public function investmentProcessSteps(): HasMany
    {
        return $this->hasMany(PageInvestmentProcessStep::class)->orderBy('order');
    }

    public function contactEnquiryCards(): HasMany
    {
        return $this->hasMany(PageContactEnquiryCard::class)->orderBy('order');
    }

    public function careersOpportunityCards(): HasMany
    {
        return $this->hasMany(PageCareersOpportunityCard::class)->orderBy('order');
    }

    public function careersHowItWorksSteps(): HasMany
    {
        return $this->hasMany(PageCareersHowItWorksStep::class)->orderBy('order');
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

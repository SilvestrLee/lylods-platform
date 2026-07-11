<x-layouts.public
    :title="$page->meta_title ?? 'Property Packaging, Facilitation, Management and Development — The Lylods Group'"
    :description="$page->meta_description"
    :canonical="$page?->canonical_url"
    :robots="$page?->robots"
    :og-image="$page?->ogMedia?->url()">

    <x-sections.property.hero
        :eyebrow="$page->hero_subtitle"
        :heading="$page->hero_title"
        :description="$page->hero_description"
        :primary-cta-label="$page->primary_cta_label"
        :primary-cta-url="$page->primary_cta_url"
        :secondary-cta-label="$page->secondary_cta_label"
        :secondary-cta-url="$page->secondary_cta_url"
        :background-image="$page->heroMedia?->url()"
        :background-image-alt="$page->heroMedia?->alt_text"
    />

    @php
        $supportCards = $page->propertySupportCards
            ->where('visibility', true)
            ->values()
            ->map(fn ($card) => [
                'icon' => \App\Support\HeroIconRegistry::path($card->icon),
                'title' => $card->title,
                'description' => $card->description,
            ])
            ->all();
    @endphp
    <x-sections.property.support
        :eyebrow="$page->property_support_eyebrow"
        :heading="$page->property_support_heading"
        :body="$page->property_support_body"
        :cards="$supportCards"
    />

    <x-sections.property.context-banner
        :image="$page->propertyContextMedia?->url()"
        :image-alt="$page->propertyContextMedia?->alt_text"
        :eyebrow="$page->property_context_eyebrow"
        :heading="$page->property_context_heading"
    />

    @php
        $audienceCards = $page->propertyAudienceCards
            ->where('visibility', true)
            ->values()
            ->map(fn ($card) => [
                'icon' => \App\Support\HeroIconRegistry::path($card->icon),
                'title' => $card->title,
                'description' => $card->description,
                'dark' => $card->is_dark,
            ])
            ->all();
    @endphp
    <x-sections.property.audience
        :eyebrow="$page->property_audience_eyebrow"
        :heading="$page->property_audience_heading"
        :body="$page->property_audience_body"
        :cards="$audienceCards"
    />

    @php
        $whyUsCards = $page->propertyWhyUsCards
            ->where('visibility', true)
            ->values()
            ->map(fn ($card) => [
                'icon' => \App\Support\HeroIconRegistry::path($card->icon),
                'title' => $card->title,
                'description' => $card->description,
                'dark' => $card->is_dark,
            ])
            ->all();
    @endphp
    <x-sections.property.why-us
        :eyebrow="$page->property_why_us_eyebrow"
        :heading="$page->property_why_us_heading"
        :body="$page->property_why_us_body"
        :cards="$whyUsCards"
    />

    @php
        $roleSteps = $page->propertyRoleSteps
            ->where('visibility', true)
            ->values()
            ->map(fn ($step) => [
                'title' => $step->title,
                'description' => $step->description,
            ])
            ->all();

        $networkTags = $page->propertyNetworkTags
            ->where('visibility', true)
            ->values()
            ->map(fn ($tag) => ['label' => $tag->label])
            ->all();
    @endphp
    <x-sections.property.our-role
        :eyebrow="$page->property_role_eyebrow"
        :heading="$page->property_role_heading"
        :body="$page->property_role_body"
        :steps="$roleSteps"
        :network-eyebrow="$page->property_network_eyebrow"
        :network-heading="$page->property_network_heading"
        :network-body="$page->property_network_body"
        :network-footnote="$page->property_network_footnote"
        :tags="$networkTags"
    />

    <x-sections.property.disclaimer
        :heading="$page->property_disclaimer_heading"
        :body="$page->property_disclaimer_body"
    />

    <x-sections.property.cta
        :heading="$page->property_page_cta_heading"
        :description="$page->property_page_cta_description"
        :primary-cta-label="$page->property_page_cta_primary_label"
        :primary-cta-url="$page->property_page_cta_primary_url"
        :secondary-cta-label="$page->property_page_cta_secondary_label"
        :secondary-cta-url="$page->property_page_cta_secondary_url"
    />

</x-layouts.public>

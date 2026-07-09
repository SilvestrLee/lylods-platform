<x-layouts.public
    :title="$page->meta_title ?? 'Industries We Serve — The Lylods Group'"
    :description="$page->meta_description"
    :canonical="$page?->canonical_url"
    :robots="$page?->robots"
    :og-image="$page?->ogMedia?->url()">

    <x-sections.industries.hero
        :eyebrow="$page->hero_subtitle"
        :heading="$page->hero_title"
        :description="$page->hero_description"
        :primary-cta-label="$page->primary_cta_label"
        :primary-cta-url="$page->primary_cta_url"
        :secondary-cta-label="$page->secondary_cta_label"
        :secondary-cta-url="$page->secondary_cta_url"
    />

    <x-sections.industries.intro
        :heading="$page->industries_page_intro_heading"
        :body="$page->industries_page_intro_body"
    />

    @php
        $industryCards = $page->industryCards
            ->where('visibility', true)
            ->values()
            ->map(fn ($card) => [
                'icon' => \App\Support\HeroIconRegistry::path($card->icon),
                'title' => $card->title,
                'description' => $card->description,
            ])
            ->all();
    @endphp
    <x-sections.industries.industry-grid :cards="$industryCards" />

    <x-sections.industries.services-crosslink />

    <x-sections.industries.related-content
        :case-studies="$caseStudies"
        :insights="$insights"
    />

    <x-sections.industries.cta
        :heading="$page->industries_page_cta_heading"
        :description="$page->industries_page_cta_description"
        :primary-cta-label="$page->industries_page_cta_primary_label"
        :primary-cta-url="$page->industries_page_cta_primary_url"
        :secondary-cta-label="$page->industries_page_cta_secondary_label"
        :secondary-cta-url="$page->industries_page_cta_secondary_url"
    />

</x-layouts.public>

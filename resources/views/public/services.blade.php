<x-layouts.public
    :title="$page->meta_title ?? 'Our Services — The Lylods Group'"
    :description="$page->meta_description"
    :canonical="$page?->canonical_url"
    :robots="$page?->robots"
    :og-image="$page?->ogMedia?->url()">

    <x-sections.services.hero
        :eyebrow="$page->hero_subtitle"
        :heading="$page->hero_title"
        :description="$page->hero_description"
        :primary-cta-label="$page->primary_cta_label"
        :primary-cta-url="$page->primary_cta_url"
        :secondary-cta-label="$page->secondary_cta_label"
        :secondary-cta-url="$page->secondary_cta_url"
    />

    <x-sections.services.sticky-nav :service-groups="$serviceGroups" />

    <x-sections.services.catalogue
        :intro-heading="$page->services_page_intro_heading"
        :intro-body="$page->services_page_intro_body"
        :service-groups="$serviceGroups"
    />

    @php
        $servicesWhyUs = $page->servicesWhyUsCards
            ->where('visibility', true)
            ->values();
        $whyUsItems = $servicesWhyUs
            ->map(fn ($item, $index) => [
                'icon' => \App\Support\HeroIconRegistry::path($item->icon),
                'title' => $item->title,
                'description' => $item->description,
                'dark' => $index === $servicesWhyUs->count() - 1,
            ])
            ->all();
    @endphp
    <x-sections.services.why-us :items="$whyUsItems" />

    @php
        $servicesHowWorkSteps = $page->servicesHowWorkSteps
            ->where('visibility', true)
            ->map(fn ($step) => ['title' => $step->title, 'description' => $step->description])
            ->values()
            ->all();
    @endphp
    <x-sections.services.how-we-work :steps="$servicesHowWorkSteps" />

    <x-sections.services.cta
        :heading="$page->services_page_cta_heading"
        :description="$page->services_page_cta_description"
        :primary-cta-label="$page->services_page_cta_primary_label"
        :primary-cta-url="$page->services_page_cta_primary_url"
        :secondary-cta-label="$page->services_page_cta_secondary_label"
        :secondary-cta-url="$page->services_page_cta_secondary_url"
    />

</x-layouts.public>

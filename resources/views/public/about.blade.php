<x-layouts.public
    :title="$page->meta_title ?? 'About Us — The Lylods Group'"
    :description="$page->meta_description"
    :canonical="$page?->canonical_url"
    :robots="$page?->robots"
    :og-image="$page?->ogMedia?->url()">

    <x-sections.about.hero
        :eyebrow="$page->hero_subtitle"
        :heading="$page->hero_title"
        :description="$page->hero_description"
        :primary-cta-label="$page->primary_cta_label"
        :primary-cta-url="$page->primary_cta_url"
        :secondary-cta-label="$page->secondary_cta_label"
        :secondary-cta-url="$page->secondary_cta_url"
    />

    @php
        $introBody = $page->about_page_intro_body ?? implode("\n\n", [
            'The Lylods Group brings together practical experience, strategic thinking and coordinated delivery to help clients move confidently from ideas to implementation.',
            'We work with businesses, entrepreneurs, charities, investors, community organisations and public-sector partners to support growth, development and long-term impact.',
        ]);
    @endphp
    <x-sections.about.intro
        :heading="$page->about_page_intro_heading ?? 'Practical experience. Structured delivery. Lasting results.'"
        :body="$introBody"
        :image="$page->aboutPageIntroMedia?->url()"
        :image-alt="$page->aboutPageIntroMedia?->alt_text"
        :cta-label="$page->about_page_intro_cta_label ?? 'Discuss Your Requirements'"
        :cta-url="$page->about_page_intro_cta_url ?? route('contact')"
    />

    @php
        $howWeWorkSteps = $page->aboutHowWeWorkSteps
            ->where('visibility', true)
            ->map(fn ($step) => ['title' => $step->title, 'description' => $step->description])
            ->values()
            ->all();
    @endphp
    <x-sections.about.how-we-work :steps="$howWeWorkSteps" />

    @php
        $focusAreas = $page->aboutFocusAreas
            ->where('visibility', true)
            ->map(fn ($item) => [
                'icon' => \App\Support\HeroIconRegistry::path($item->icon),
                'title' => $item->title,
                'description' => $item->description,
                'href' => route('services'),
            ])
            ->values()
            ->all();
    @endphp
    <x-sections.about.focus-areas :items="$focusAreas" />

    @php
        $principles = $page->aboutPrinciples
            ->where('visibility', true)
            ->map(fn ($item) => [
                'icon' => \App\Support\HeroIconRegistry::path($item->icon),
                'title' => $item->title,
                'description' => $item->description,
            ])
            ->values()
            ->all();
    @endphp
    <x-sections.about.principles :items="$principles" />

    @php
        $audienceTags = $page->aboutAudienceTags
            ->where('visibility', true)
            ->map(fn ($item) => ['label' => $item->label])
            ->values()
            ->all();
    @endphp
    <x-sections.about.audience-tags :items="$audienceTags" />

    @php
        $visibleDifferentiators = $page->aboutDifferentiators->where('visibility', true)->values();
        $differentiators = $visibleDifferentiators
            ->map(fn ($item, $index) => [
                'icon' => \App\Support\HeroIconRegistry::path($item->icon),
                'title' => $item->title,
                'description' => $item->description,
                'dark' => $index === $visibleDifferentiators->count() - 1,
            ])
            ->all();
    @endphp
    <x-sections.about.differentiators :items="$differentiators" />

    <x-sections.about.team :members="$teamMembers" />

    <x-sections.about.accreditations :accreditations="$accreditations" />

    <x-sections.about.cta
        :heading="$page->about_page_cta_heading"
        :description="$page->about_page_cta_description"
        :primary-cta-label="$page->about_page_cta_primary_label"
        :primary-cta-url="$page->about_page_cta_primary_url"
        :secondary-cta-label="$page->about_page_cta_secondary_label"
        :secondary-cta-url="$page->about_page_cta_secondary_url"
    />

</x-layouts.public>

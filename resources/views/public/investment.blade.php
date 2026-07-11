<x-layouts.public
    :title="$page->meta_title ?? 'Investment Information — The Lylods Group'"
    :description="$page->meta_description"
    :canonical="$page?->canonical_url"
    :robots="$page?->robots"
    :og-image="$page?->ogMedia?->url()">

    <x-sections.investment.hero
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
        $stats = $page->statistics
            ->values()
            ->map(fn ($stat) => [
                'label' => $stat->label,
                'value' => $stat->value,
                'caption' => $stat->caption,
            ])
            ->all();
    @endphp
    <x-sections.investment.stats-band :stats="$stats" />

    @php
        $credibilityCards = $page->investmentCredibilityCards
            ->where('visibility', true)
            ->values()
            ->map(fn ($card) => [
                'icon' => \App\Support\HeroIconRegistry::path($card->icon),
                'title' => $card->title,
                'description' => $card->description,
            ])
            ->all();
    @endphp
    <x-sections.investment.credibility :cards="$credibilityCards" />

    @php
        $approachCards = $page->investmentApproachCards
            ->where('visibility', true)
            ->values()
            ->map(fn ($card) => [
                'icon' => \App\Support\HeroIconRegistry::path($card->icon),
                'title' => $card->title,
                'description' => $card->description,
            ])
            ->all();
    @endphp
    <x-sections.investment.approach
        :eyebrow="$page->investment_approach_eyebrow"
        :heading="$page->investment_approach_heading"
        :body="$page->investment_approach_body"
        :image="$page->investmentApproachMedia?->url()"
        :image-alt="$page->investmentApproachMedia?->alt_text"
        :cards="$approachCards"
    />

    @php
        $whyCards = $page->investmentWhyCards
            ->where('visibility', true)
            ->values()
            ->map(fn ($card) => [
                'icon' => \App\Support\HeroIconRegistry::path($card->icon),
                'title' => $card->title,
                'description' => $card->description,
            ])
            ->all();
    @endphp
    <x-sections.investment.why
        :eyebrow="$page->investment_why_eyebrow"
        :heading="$page->investment_why_heading"
        :cards="$whyCards"
    />

    @php
        $processSteps = $page->investmentProcessSteps
            ->where('visibility', true)
            ->values()
            ->map(fn ($step) => [
                'icon' => \App\Support\HeroIconRegistry::path($step->icon),
                'title' => $step->title,
                'description' => $step->description,
            ])
            ->all();
    @endphp
    <x-sections.investment.process
        :eyebrow="$page->investment_process_eyebrow"
        :heading="$page->investment_process_heading"
        :steps="$processSteps"
    />

    <x-sections.investment.cta
        :eyebrow="$page->investment_cta_eyebrow"
        :heading="$page->investment_cta_heading"
        :body="$page->investment_cta_body"
        :primary-label="$page->investment_cta_primary_label"
        :secondary-label="$page->investment_cta_secondary_label"
        :secondary-url="$page->investment_cta_secondary_url"
    />

</x-layouts.public>

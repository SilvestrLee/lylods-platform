<x-layouts.public
    :title="$page->meta_title ?? 'Careers and Placements — The Lylods Group'"
    :description="$page->meta_description"
    :canonical="$page?->canonical_url"
    :robots="$page?->robots"
    :og-image="$page?->ogMedia?->url()">

    <x-sections.careers.hero
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
        $opportunityCards = $page->careersOpportunityCards
            ->where('visibility', true)
            ->values()
            ->map(fn ($card) => [
                'icon' => \App\Support\HeroIconRegistry::path($card->icon),
                'title' => $card->title,
                'description' => $card->description,
            ])
            ->all();
    @endphp
    <x-sections.careers.opportunities
        :eyebrow="$page->careers_opportunity_eyebrow"
        :heading="$page->careers_opportunity_heading"
        :body="$page->careers_opportunity_body"
        :cards="$opportunityCards"
    />

    @php
        $howItWorksSteps = $page->careersHowItWorksSteps
            ->where('visibility', true)
            ->values()
            ->map(fn ($step) => [
                'title' => $step->title,
                'description' => $step->description,
            ])
            ->all();
    @endphp
    <x-sections.careers.message-and-process
        :message-eyebrow="$page->careers_message_eyebrow"
        :message-heading="$page->careers_message_heading"
        :message-body="$page->careers_message_body"
        :notice-body="$page->careers_notice_body"
        :how-eyebrow="$page->careers_how_eyebrow"
        :how-heading="$page->careers_how_heading"
        :steps="$howItWorksSteps"
    />

    <x-sections.careers.cta
        :eyebrow="$page->careers_page_cta_eyebrow"
        :heading="$page->careers_page_cta_heading"
        :body="$page->careers_page_cta_body"
        :cta-label="$page->careers_page_cta_label"
    />

</x-layouts.public>

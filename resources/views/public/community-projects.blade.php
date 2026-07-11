<x-layouts.public
    :title="$page->meta_title ?? 'Community and Project Development — The Lylods Group'"
    :description="$page->meta_description"
    :canonical="$page?->canonical_url"
    :robots="$page?->robots"
    :og-image="$page?->ogMedia?->url()">

    <x-sections.community-projects.hero
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
        $supportCards = $page->communitySupportCards
            ->where('visibility', true)
            ->values()
            ->map(fn ($card) => [
                'icon' => \App\Support\HeroIconRegistry::path($card->icon),
                'title' => $card->title,
                'description' => $card->description,
            ])
            ->all();
    @endphp
    <x-sections.community-projects.support
        :eyebrow="$page->community_support_eyebrow"
        :heading="$page->community_support_heading"
        :body="$page->community_support_body"
        :cards="$supportCards"
    />

    @php
        $audienceTags = $page->communityAudienceTags
            ->where('visibility', true)
            ->values()
            ->map(fn ($tag) => [
                'icon' => \App\Support\HeroIconRegistry::path($tag->icon),
                'label' => $tag->label,
            ])
            ->all();
    @endphp
    <x-sections.community-projects.audience
        :eyebrow="$page->community_audience_eyebrow"
        :heading="$page->community_audience_heading"
        :body="$page->community_audience_body"
        :cta-label="$page->community_audience_cta_label"
        :cta-url="$page->community_audience_cta_url"
        :image="$page->communityAudienceMedia?->url()"
        :image-alt="$page->communityAudienceMedia?->alt_text"
        :tags="$audienceTags"
    />

    @php
        $roleSteps = $page->communityRoleSteps
            ->where('visibility', true)
            ->values()
            ->map(fn ($step) => ['description' => $step->description])
            ->all();
    @endphp
    <x-sections.community-projects.role
        :eyebrow="$page->community_role_eyebrow"
        :heading="$page->community_role_heading"
        :body="$page->community_role_body"
        :image="$page->communityRoleMedia?->url()"
        :image-alt="$page->communityRoleMedia?->alt_text"
        :steps="$roleSteps"
    />

    @php
        $howWorkSteps = $page->communityHowWorkSteps
            ->where('visibility', true)
            ->values()
            ->map(fn ($step) => [
                'title' => $step->title,
                'description' => $step->description,
            ])
            ->all();
    @endphp
    <x-sections.community-projects.how-we-work
        :eyebrow="$page->community_how_work_eyebrow"
        :heading="$page->community_how_work_heading"
        :body="$page->community_how_work_body"
        :steps="$howWorkSteps"
    />

    @php
        $engagementCards = $page->communityEngagementCards
            ->where('visibility', true)
            ->values()
            ->map(fn ($card) => [
                'icon' => \App\Support\HeroIconRegistry::path($card->icon),
                'title' => $card->title,
                'description' => $card->description,
                'image' => $card->image?->url(),
                'imageAlt' => $card->image_alt,
            ])
            ->all();
    @endphp
    <x-sections.community-projects.engagement
        :eyebrow="$page->community_engagement_eyebrow"
        :heading="$page->community_engagement_heading"
        :body="$page->community_engagement_body"
        :cards="$engagementCards"
    />

    <x-sections.community-projects.cta
        :heading="$page->community_page_cta_heading"
        :description="$page->community_page_cta_description"
        :primary-cta-label="$page->community_page_cta_primary_label"
        :primary-cta-url="$page->community_page_cta_primary_url"
        :secondary-cta-label="$page->community_page_cta_secondary_label"
        :secondary-cta-url="$page->community_page_cta_secondary_url"
    />

</x-layouts.public>

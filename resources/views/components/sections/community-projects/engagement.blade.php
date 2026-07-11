{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Community Projects

Future Enterprise Section Candidate:
Feature Grid

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'eyebrow' => null,
    'heading' => null,
    'body' => null,
    'cards' => [],
])

@php
    $eyebrow = $eyebrow ?? 'Example Engagement Areas';
    $heading = $heading ?? 'Types of projects we can support.';
    $body = $body ?? 'The following are examples of the kinds of community-focused programmes and initiatives we work with. These are engagement areas — not completed projects.';

    $cards = count($cards) ? $cards : [
        ['icon' => \App\Support\HeroIconRegistry::path('academic-cap'), 'title' => 'Community training programme', 'description' => 'Designing and coordinating structured training programmes for community groups, charities or public-sector partners.', 'imageAlt' => 'Community training session'],
        ['icon' => \App\Support\HeroIconRegistry::path('archive-box'), 'title' => 'Employability support initiative', 'description' => 'Supporting programme design and delivery for employability and skills-based initiatives targeting local communities.', 'imageAlt' => 'Employability support discussion'],
        ['icon' => \App\Support\HeroIconRegistry::path('user'), 'title' => 'Youth development project', 'description' => 'Coordinating structured youth engagement projects that connect young people with opportunities, mentors and structured support.', 'imageAlt' => 'Youth development group activity'],
        ['icon' => \App\Support\HeroIconRegistry::path('building-storefront'), 'title' => 'Local business support programme', 'description' => 'Planning and coordinating programmes that connect local businesses with community networks, training or partnership opportunities.', 'imageAlt' => 'Local business and community meeting'],
        ['icon' => \App\Support\HeroIconRegistry::path('chat-bubble'), 'title' => 'Partnership coordination', 'description' => 'Supporting multi-organisation partnerships by managing communication, shared planning and joint accountability across all partners.', 'imageAlt' => 'Multi-organisation partnership meeting'],
        ['icon' => \App\Support\HeroIconRegistry::path('squares-2x2'), 'title' => 'Capacity building workshop', 'description' => 'Designing and delivering structured workshops that help organisations build internal skills, confidence and processes.', 'imageAlt' => 'Capacity building workshop in progress'],
    ];
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <div class="tlg-reveal max-w-3xl">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $eyebrow }}</p>
            @endif
            @if ($heading)
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">{{ $heading }}</h2>
            @endif
            @if ($body)
                <p class="mt-5 text-lg leading-8 text-[#667085]">{{ $body }}</p>
            @endif
        </div>
        <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($cards as $index => $card)
                <x-sections.community-projects.engagement-card
                    :icon="$card['icon'] ?? null"
                    :title="$card['title'] ?? null"
                    :description="$card['description'] ?? null"
                    :image="$card['image'] ?? null"
                    :image-alt="$card['imageAlt'] ?? null"
                    :stagger="($index % 3) + 1"
                />
            @endforeach
        </div>
    </div>
</section>

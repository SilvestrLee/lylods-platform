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
    $eyebrow = $eyebrow ?? 'What We Support';
    $heading = $heading ?? 'Practical support across every stage of a community programme.';
    $body = $body ?? 'From initial planning through to delivery and reporting, we help organisations structure and run community-focused work effectively.';

    $cards = count($cards) ? $cards : [
        ['icon' => \App\Support\HeroIconRegistry::path('user-group'), 'title' => 'Community Programmes', 'description' => 'Supporting the planning, coordination and delivery of community-facing programmes and activities.'],
        ['icon' => \App\Support\HeroIconRegistry::path('squares-2x2'), 'title' => 'Project Coordination', 'description' => 'Keeping workstreams organised, timelines on track and communication clear across all project participants.'],
        ['icon' => \App\Support\HeroIconRegistry::path('chat-bubble'), 'title' => 'Stakeholder Engagement', 'description' => 'Facilitating communication and alignment between partners, funders, community groups and delivery teams.'],
        ['icon' => \App\Support\HeroIconRegistry::path('building-office'), 'title' => 'Development Initiatives', 'description' => 'Supporting organisations in designing and structuring community development activities with clear goals and outcomes.'],
        ['icon' => \App\Support\HeroIconRegistry::path('building-storefront'), 'title' => 'Partnership Support', 'description' => 'Helping organisations build effective working relationships with partner agencies, funders and community stakeholders.'],
        ['icon' => \App\Support\HeroIconRegistry::path('calendar'), 'title' => 'Delivery Planning', 'description' => 'Translating programme goals into structured, actionable plans with clear milestones, responsibilities and timelines.'],
        ['icon' => \App\Support\HeroIconRegistry::path('chart-bar'), 'title' => 'Monitoring and Reporting', 'description' => 'Tracking progress against objectives and producing documentation that evidences impact and informs next steps.'],
        ['icon' => \App\Support\HeroIconRegistry::path('academic-cap'), 'title' => 'Capacity Building', 'description' => 'Helping organisations strengthen internal skills, processes and confidence to deliver community work more effectively.'],
    ];

    // Hand-authored decorative rotation (4 navy, 3 blue, 1 gold) — matches
    // support.blade.php's Property precedent: fixed sequence, not a formula.
    $colorSequence = ['navy', 'navy', 'navy', 'navy', 'blue', 'blue', 'blue', 'gold'];
@endphp

<section class="bg-[#f7f3ea]">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <div class="tlg-reveal max-w-3xl">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">{{ $eyebrow }}</p>
            @endif
            @if ($heading)
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">{{ $heading }}</h2>
            @endif
            @if ($body)
                <p class="mt-5 text-lg leading-8 text-[#667085]">{{ $body }}</p>
            @endif
        </div>
        <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($cards as $index => $card)
                <x-sections.community-projects.support-card
                    :icon="$card['icon'] ?? null"
                    :title="$card['title'] ?? null"
                    :description="$card['description'] ?? null"
                    :color="$colorSequence[$index % count($colorSequence)]"
                    :stagger="($index % 4) + 1"
                />
            @endforeach
        </div>
    </div>
</section>

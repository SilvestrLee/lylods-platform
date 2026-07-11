{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Property

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
    $heading = $heading ?? 'Practical property support across the full opportunity lifecycle.';
    $body = $body ?? 'We work with clients from initial opportunity identification through to delivery — coordinating the people, processes and practical requirements at each stage.';

    $cards = count($cards) ? $cards : [
        ['icon' => \App\Support\HeroIconRegistry::path('magnifying-glass'), 'title' => 'Property Sourcing and Packaging', 'description' => 'Identifying and presenting opportunities aligned to your objectives, then packaging them with the coordination and documentation needed to move forward.'],
        ['icon' => \App\Support\HeroIconRegistry::path('building-office'), 'title' => 'Residential, Commercial and Land', 'description' => 'Support across a range of property types — from residential units and buy-to-let opportunities through to commercial premises, land acquisition and mixed-use development.'],
        ['icon' => \App\Support\HeroIconRegistry::path('clipboard-document-check'), 'title' => 'Feasibility Support', 'description' => 'Helping clients assess the practical viability of property opportunities — coordinating the information, initial appraisals, and professional inputs needed to evaluate options clearly.'],
        ['icon' => \App\Support\HeroIconRegistry::path('wrench-screwdriver'), 'title' => 'Refurbishment and Development Coordination', 'description' => 'Coordinating refurbishment and development programmes — managing timelines, workstreams, contractors and professional inputs to keep projects structured and on track.'],
        ['icon' => \App\Support\HeroIconRegistry::path('key'), 'title' => 'Landlord and Tenant Support', 'description' => 'Supporting landlords and tenants with coordination, communication, and practical management — from tenancy setup and property readiness through to ongoing operational support.'],
        ['icon' => \App\Support\HeroIconRegistry::path('presentation-chart-bar'), 'title' => 'Property Management Coordination', 'description' => 'Providing structured oversight and coordination support for property portfolios — reporting, scheduling, contractor management, and keeping assets operating smoothly.'],
        ['icon' => \App\Support\HeroIconRegistry::path('eye'), 'title' => 'Development Monitoring', 'description' => 'Tracking development progress against agreed milestones — providing clients with clear, structured reporting and visibility at each stage of their development programme.'],
        ['icon' => \App\Support\HeroIconRegistry::path('squares-2x2'), 'title' => 'Stakeholder Coordination', 'description' => 'Managing communication and coordination between the parties involved in a property project — developers, investors, agents, professional advisers, and community representatives.'],
        ['icon' => \App\Support\HeroIconRegistry::path('presentation-chart-line'), 'title' => 'Investor Presentations', 'description' => 'Preparing and structuring clear, professional presentations of property opportunities for investors — covering the opportunity overview, structure, and relevant supporting information.'],
    ];

    // Hand-authored decorative rotation (navy/navy/navy, blue/blue/blue, gold/gold, navy) —
    // not a clean modulo-3 pattern, so the sequence is fixed rather than computed.
    $colorSequence = ['navy', 'navy', 'navy', 'blue', 'blue', 'blue', 'gold', 'gold', 'navy'];
@endphp

<section class="bg-white">
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
        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($cards as $index => $card)
                <x-sections.property.support-card
                    :icon="$card['icon'] ?? null"
                    :title="$card['title'] ?? null"
                    :description="$card['description'] ?? null"
                    :color="$colorSequence[$index % count($colorSequence)]"
                    :stagger="($index % 3) + 1"
                />
            @endforeach
        </div>
    </div>
</section>

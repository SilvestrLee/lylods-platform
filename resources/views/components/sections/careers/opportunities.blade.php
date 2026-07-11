{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Careers

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
    $eyebrow = $eyebrow ?? 'Opportunity Areas';
    $heading = $heading ?? 'Ways to work with us.';
    $body = $body ?? 'We engage with professionals, candidates and contributors across a range of pathways — from formal placements to skilled network participation.';

    $cards = count($cards) ? $cards : [
        ['icon' => \App\Support\HeroIconRegistry::path('archive-box'), 'title' => 'Professional Placements', 'description' => 'Structured placement opportunities for professionals seeking experience across our service disciplines, working alongside our team on real client engagements.'],
        ['icon' => \App\Support\HeroIconRegistry::path('user-group'), 'title' => 'Recruitment Support', 'description' => 'For organisations and individuals seeking support with finding the right role or the right candidate. We help structure the process and identify suitable pathways.'],
        ['icon' => \App\Support\HeroIconRegistry::path('academic-cap'), 'title' => 'Training and Employability', 'description' => 'Programmes and pathways to support skills development, employability and professional readiness — particularly for those entering or re-entering the job market.'],
        ['icon' => \App\Support\HeroIconRegistry::path('check-circle'), 'title' => 'Project-Based Roles', 'description' => 'Time-limited engagements supporting specific client projects across our business, technology, compliance, property and community disciplines.'],
        ['icon' => \App\Support\HeroIconRegistry::path('heart'), 'title' => 'Community Programme Support', 'description' => 'Opportunities for individuals who want to contribute to community-focused initiatives — through coordination, delivery support, or programme participation.'],
        ['icon' => \App\Support\HeroIconRegistry::path('sparkles'), 'title' => 'Skilled Professional Network', 'description' => 'For experienced professionals who wish to be part of our wider network — available for introductions, collaborations or specialist engagements as suitable opportunities arise.', 'dark' => true],
    ];

    // Hand-authored decorative gradients — fixed per card, not content, matches
    // the Property/Community precedent of a developer-owned decorative rotation.
    $decor = [
        ['gradient' => 'from-[#07172f] via-[#123f8c] to-[#07172f]', 'radial' => '65% 35%'],
        ['gradient' => 'from-[#07172f] via-[#0d2d5e] to-[#123f8c]', 'radial' => '30% 65%'],
        ['gradient' => 'from-[#07172f] via-[#102a50] to-[#07172f]', 'radial' => '60% 40%'],
        ['gradient' => 'from-[#051220] via-[#07172f] to-[#0a1f42]', 'radial' => '35% 65%'],
        ['gradient' => 'from-[#07172f] via-[#0e243d] to-[#1a3a5c]', 'radial' => '70% 30%'],
        ['gradient' => 'from-[#07172f] via-[#123f8c] to-[#0a1f42]', 'radial' => '40% 60%'],
    ];
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <div class="tlg-reveal max-w-2xl">
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
        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($cards as $index => $card)
                @php $d = $decor[$index % count($decor)]; @endphp
                <x-sections.careers.opportunity-card
                    :icon="$card['icon'] ?? null"
                    :title="$card['title'] ?? null"
                    :description="$card['description'] ?? null"
                    :gradient="$d['gradient']"
                    :radial-position="$d['radial']"
                    :dark="$card['dark'] ?? false"
                    :stagger="($index % 3) + 1"
                />
            @endforeach
        </div>
    </div>
</section>

{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Property

Future Enterprise Section Candidate:
Feature Cards

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
    $eyebrow = $eyebrow ?? 'Why Clients Work With Us';
    $heading = $heading ?? 'What makes the difference.';
    $body = $body ?? 'Our clients return because of how we work — not just what we deliver.';

    $cards = count($cards) ? $cards : [
        ['icon' => \App\Support\HeroIconRegistry::path('check-circle'), 'title' => 'Practical Delivery', 'description' => 'From planning to execution — we stay engaged across the full lifecycle, not just the advisory phase.'],
        ['icon' => \App\Support\HeroIconRegistry::path('squares-2x2'), 'title' => 'Multi-Sector Experience', 'description' => 'Experience across business, public sector, technology, property and community contexts informs how we approach every engagement.'],
        ['icon' => \App\Support\HeroIconRegistry::path('chat-bubble'), 'title' => 'Clear Communication', 'description' => 'Structured coordination and honest reporting — clients are never left guessing about progress, priorities, or next steps.'],
        ['icon' => \App\Support\HeroIconRegistry::path('user'), 'title' => 'Tailored Support', 'description' => 'We shape our approach to fit your situation — no generic frameworks pushed onto problems they were not built to solve.'],
        ['icon' => \App\Support\HeroIconRegistry::path('user-group'), 'title' => 'Strong Professional Network', 'description' => 'Where specialist or regulated input is needed, we introduce clients to appropriate, qualified independent professionals.'],
        ['icon' => \App\Support\HeroIconRegistry::path('chart-bar'), 'title' => 'Measurable Outcomes', 'description' => 'We focus on what can be measured, tracked, and evidenced — so you know the value of every engagement.', 'dark' => true],
    ];
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-[1440px] px-6 py-24">
        <div class="tlg-reveal max-w-2xl">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $eyebrow }}</p>
            @endif
            @if ($heading)
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl lg:text-[2.4rem]">{{ $heading }}</h2>
            @endif
            @if ($body)
                <p class="mt-5 text-lg leading-8 text-[#667085]">{{ $body }}</p>
            @endif
        </div>
        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($cards as $index => $card)
                <x-cards.feature-card
                    :icon="$card['icon'] ?? null"
                    :title="$card['title'] ?? null"
                    :description="$card['description'] ?? null"
                    :dark="$card['dark'] ?? false"
                    :stagger="($index % 3) + 1"
                />
            @endforeach
        </div>
    </div>
</section>

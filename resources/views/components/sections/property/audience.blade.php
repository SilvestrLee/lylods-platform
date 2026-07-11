{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Property

Future Enterprise Section Candidate:
Audience Grid

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
    $eyebrow = $eyebrow ?? 'Who We Help';
    $heading = $heading ?? 'Supporting a wide range of property clients.';
    $body = $body ?? 'Our property support is structured around the practical needs of each client type — whether you are buying for the first time or managing a development portfolio.';

    $cards = count($cards) ? $cards : [
        ['icon' => \App\Support\HeroIconRegistry::path('home'), 'title' => 'Property Owners', 'description' => 'Owners looking to manage, develop, refurbish or realise value from their property assets.'],
        ['icon' => \App\Support\HeroIconRegistry::path('shopping-cart'), 'title' => 'Buyers', 'description' => 'Individuals and organisations seeking to identify and acquire suitable residential or commercial property.'],
        ['icon' => \App\Support\HeroIconRegistry::path('key'), 'title' => 'Landlords', 'description' => 'Landlords needing practical coordination support for property management, tenancy, and maintenance.'],
        ['icon' => \App\Support\HeroIconRegistry::path('arrow-trending-up'), 'title' => 'Investors', 'description' => 'Investors seeking structured, packaged property opportunities with coordinated professional support.'],
        ['icon' => \App\Support\HeroIconRegistry::path('building-office'), 'title' => 'Developers', 'description' => 'Developers requiring coordination, programme oversight, and stakeholder management across development projects.'],
        ['icon' => \App\Support\HeroIconRegistry::path('sparkles'), 'title' => 'First-Time Buyers', 'description' => 'First-time buyers navigating the property process for the first time, needing clear coordination and guidance on next steps.'],
        ['icon' => \App\Support\HeroIconRegistry::path('user-group'), 'title' => 'Community Organisations', 'description' => 'Community bodies, housing associations and social enterprises pursuing property-led community projects or developments.'],
        ['icon' => \App\Support\HeroIconRegistry::path('archive-box'), 'title' => 'Corporate Clients', 'description' => 'Businesses and organisations seeking property solutions for premises, portfolio management, or development-related requirements.', 'dark' => true],
    ];

    // Hand-authored decorative rotation for non-dark cards — see support.blade.php note.
    $colorSequence = ['navy', 'navy', 'navy', 'blue', 'blue', 'gold', 'gold', 'navy'];
@endphp

<section class="bg-[#f7f3ea]">
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
        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($cards as $index => $card)
                <x-sections.property.audience-card
                    :icon="$card['icon'] ?? null"
                    :title="$card['title'] ?? null"
                    :description="$card['description'] ?? null"
                    :dark="$card['dark'] ?? false"
                    :color="$colorSequence[$index % count($colorSequence)]"
                    :stagger="($index % 4) + 1"
                />
            @endforeach
        </div>
    </div>
</section>

{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Investment

Future Enterprise Section Candidate:
Feature Grid

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'eyebrow' => null,
    'heading' => null,
    'cards' => [],
])

@php
    $eyebrow = $eyebrow ?? 'Why The Lylods Group';
    $heading = $heading ?? 'Investment governed by professional standards.';

    $cards = count($cards) ? $cards : [
        ['icon' => \App\Support\HeroIconRegistry::path('presentation-chart-line'), 'title' => 'Structured Visibility', 'description' => 'Registered investors access a dedicated portal displaying investment records, status, and historical account information in a clear, organised format.'],
        ['icon' => \App\Support\HeroIconRegistry::path('bell'), 'title' => 'Official Communications', 'description' => 'Investors receive updates, notices, and communications through the official notices system — ensuring timely, documented, and auditable investor communication.'],
        ['icon' => \App\Support\HeroIconRegistry::path('shield-check'), 'title' => 'Governance-First', 'description' => 'All investor relationships are managed within a structured, accountable administrative framework consistent with the professional standards The Lylods Group applies across all its activities.'],
    ];

    $colorSequence = ['navy', 'blue', 'gold'];
    $iconWrapClasses = fn ($color) => match ($color) {
        'blue' => 'bg-[#123f8c]',
        'gold' => 'bg-[#c9a24d]',
        default => 'bg-[#07172f]',
    };
    $iconClasses = fn ($color) => $color === 'gold' ? 'text-[#07172f]' : 'text-white';
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-7xl px-6 py-24">
        <div class="tlg-reveal max-w-3xl">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $eyebrow }}</p>
            @endif
            @if ($heading)
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">{{ $heading }}</h2>
            @endif
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-3">
            @foreach ($cards as $index => $card)
                @php $color = $colorSequence[$index % count($colorSequence)]; @endphp
                <div class="tlg-reveal tlg-d{{ $index + 1 }} rounded-3xl border border-[#e6e8ee] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl {{ $iconWrapClasses($color) }}">
                        @if ($card['icon'] ?? null)
                            <svg class="h-6 w-6 {{ $iconClasses($color) }}" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $card['icon'] }}"/></svg>
                        @endif
                    </div>
                    @if ($card['title'] ?? null)
                        <h3 class="mt-6 text-xl font-bold text-[#07172f]">{{ $card['title'] }}</h3>
                    @endif
                    @if ($card['description'] ?? null)
                        <p class="mt-4 leading-7 text-[#667085]">{{ $card['description'] }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

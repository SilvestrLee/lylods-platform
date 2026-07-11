{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Investment

Future Enterprise Section Candidate:
Split Image/Content Layout

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'eyebrow' => null,
    'heading' => null,
    'body' => null,
    'image' => null,
    'imageAlt' => null,
    'cards' => [],
])

@php
    $eyebrow = $eyebrow ?? 'Our Approach';
    $heading = $heading ?? 'Investor relationships managed with structure and clarity.';
    $body = $body ?? "We believe investor relationships should be built on transparent processes, documented records, and clear communication. Our investor portal provides a structured environment for portfolio visibility, official notices, and account management — accessible securely by registered investors.\n\nInvestment arrangements with The Lylods Group are managed administratively, with all records maintained on the investor platform and communications delivered through the official notices system.";
    $paragraphs = preg_split('/\r?\n\r?\n/', trim($body));
    $image = $image ?? asset('images/placeholders/community-placeholder.svg');
    $imageAlt = $imageAlt ?: 'Professional governance and investor relations';

    $cards = count($cards) ? $cards : [
        ['icon' => \App\Support\HeroIconRegistry::path('lock-closed'), 'title' => 'Secure Portal Access', 'description' => 'Dedicated login with encrypted dashboard'],
        ['icon' => \App\Support\HeroIconRegistry::path('presentation-chart-line'), 'title' => 'Investment Records', 'description' => 'Portfolio visibility and record tracking'],
        ['icon' => \App\Support\HeroIconRegistry::path('bell'), 'title' => 'Official Notices', 'description' => 'Investor updates and communications'],
        ['icon' => \App\Support\HeroIconRegistry::path('clipboard-document-check'), 'title' => 'Account Management', 'description' => 'Administrator-managed account setup'],
    ];

    // Hand-authored decorative rotation (navy, blue, gold, navy) — fixed
    // sequence, matches the Property/Community precedent for this shape.
    $colorSequence = ['navy', 'blue', 'gold', 'navy'];
    $iconWrapClasses = fn ($color) => match ($color) {
        'blue' => 'bg-[#123f8c]',
        'gold' => 'bg-[#c9a24d]',
        default => 'bg-[#07172f]',
    };
    $iconClasses = fn ($color) => match ($color) {
        'gold' => 'text-[#07172f]',
        default => 'text-white',
    };
@endphp

<section class="bg-[#f7f3ea]">
    <div class="mx-auto grid max-w-7xl gap-14 px-6 py-24 lg:grid-cols-[1fr_1fr] lg:items-center">
        <div class="tlg-reveal">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">{{ $eyebrow }}</p>
            @endif
            @if ($heading)
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">{{ $heading }}</h2>
            @endif
            @foreach ($paragraphs as $paragraph)
                <p class="mt-6 text-lg leading-8 text-[#667085]">{{ $paragraph }}</p>
            @endforeach

            <div class="mt-8 grid gap-4 sm:grid-cols-2">
                @foreach ($cards as $index => $card)
                    @php $color = $colorSequence[$index % count($colorSequence)]; @endphp
                    <div class="tlg-reveal tlg-d{{ $index + 1 }} flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-5 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                        <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-xl {{ $iconWrapClasses($color) }}">
                            @if ($card['icon'] ?? null)
                                <svg class="h-4 w-4 {{ $iconClasses($color) }}" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $card['icon'] }}"/></svg>
                            @endif
                        </div>
                        <div>
                            @if ($card['title'] ?? null)
                                <p class="font-bold text-[#07172f] text-sm">{{ $card['title'] }}</p>
                            @endif
                            @if ($card['description'] ?? null)
                                <p class="mt-1 text-xs text-[#667085]">{{ $card['description'] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="tlg-reveal tlg-d1 relative overflow-hidden rounded-[2rem] shadow-2xl">
            <img src="{{ $image }}" alt="{{ $imageAlt }}" class="h-full w-full object-cover" style="min-height:460px;">
            <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/30 to-transparent"></div>
        </div>
    </div>
</section>

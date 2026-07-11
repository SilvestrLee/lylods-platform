{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Contact

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
    $eyebrow = $eyebrow ?? 'How We Can Help';
    $heading = $heading ?? 'What is your enquiry about?';

    $cards = count($cards) ? $cards : [
        ['icon' => \App\Support\HeroIconRegistry::path('archive-box'), 'title' => 'Business & Services', 'description' => 'For enquiries about our professional services, specific disciplines, project-based engagements, or partnership opportunities with The Lylods Group.'],
        ['icon' => \App\Support\HeroIconRegistry::path('presentation-chart-line'), 'title' => 'Investment Enquiries', 'description' => 'For enquiries related to investment, investor access, dashboard support, or investor account assistance. Existing investors can also log in directly via the investor portal.'],
        ['icon' => \App\Support\HeroIconRegistry::path('question-mark-circle'), 'title' => 'General Information', 'description' => 'For general questions about The Lylods Group, our organisation, our approach, or any other matter not covered above. We welcome all professional enquiries.'],
    ];

    $colorSequence = ['navy', 'blue', 'gold'];
    $accentClasses = fn ($color) => match ($color) {
        'blue' => 'border-t-[#123f8c]',
        'gold' => 'border-t-[#c9a24d]',
        default => 'border-t-[#07172f]',
    };
    $iconWrapClasses = fn ($color) => match ($color) {
        'blue' => 'bg-[#123f8c]',
        'gold' => 'bg-[#c9a24d]',
        default => 'bg-[#07172f]',
    };
    $iconClasses = fn ($color) => $color === 'gold' ? 'text-[#07172f]' : 'text-white';
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
        </div>

        <div class="mt-10 grid gap-6 md:grid-cols-3">
            @foreach ($cards as $index => $card)
                @php $color = $colorSequence[$index % count($colorSequence)]; @endphp
                <div class="tlg-reveal tlg-d{{ $index + 1 }} rounded-3xl border border-[#e6e8ee] {{ $accentClasses($color) }} border-t-4 p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
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

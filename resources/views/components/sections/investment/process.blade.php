{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Investment

Future Enterprise Section Candidate:
Process Steps

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'eyebrow' => null,
    'heading' => null,
    'steps' => [],
])

@php
    $eyebrow = $eyebrow ?? 'The Process';
    $heading = $heading ?? 'How investor relationships are established.';

    $steps = count($steps) ? $steps : [
        ['icon' => \App\Support\HeroIconRegistry::path('envelope'), 'title' => 'Enquiry', 'description' => 'Contact The Lylods Group to express an interest in investment or to discuss investor access requirements.'],
        ['icon' => \App\Support\HeroIconRegistry::path('chat-bubble-left-right'), 'title' => 'Engagement', 'description' => 'Our team engages with you directly to discuss investment arrangements, answer questions, and agree on terms.'],
        ['icon' => \App\Support\HeroIconRegistry::path('user'), 'title' => 'Onboarding', 'description' => 'Your investor account is created and configured by the platform administrator, with records set up under your portfolio.'],
        ['icon' => \App\Support\HeroIconRegistry::path('computer-desktop'), 'title' => 'Portal Access', 'description' => 'Log in to the investor dashboard to view your investment records, read official notices, and manage your account.'],
    ];
@endphp

<section class="bg-[#f7f3ea]">
    <div class="mx-auto max-w-7xl px-6 py-24">
        <div class="tlg-reveal max-w-3xl">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">{{ $eyebrow }}</p>
            @endif
            @if ($heading)
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">{{ $heading }}</h2>
            @endif
        </div>

        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($steps as $index => $step)
                @php $isLast = $index === count($steps) - 1; @endphp
                <div class="tlg-reveal tlg-d{{ $index + 1 }} rounded-3xl p-8 transition-all duration-300 {{ $isLast ? 'border border-[#07172f] bg-[#07172f] text-white hover:shadow-md' : 'border border-[#e6e8ee] bg-white hover:border-[#c9a24d] hover:shadow-md' }}">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl {{ $isLast ? 'bg-[#c9a24d]' : 'bg-[#07172f]' }}">
                        @if ($step['icon'] ?? null)
                            <svg class="h-5 w-5 {{ $isLast ? 'text-[#07172f]' : 'text-white' }}" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $step['icon'] }}"/></svg>
                        @endif
                    </div>
                    <span class="mt-5 inline-block rounded-full px-3 py-1 text-xs font-bold {{ $isLast ? 'bg-white/10 text-[#c9a24d]' : 'bg-[#f7f3ea] text-[#07172f]' }}">{{ sprintf('Step %02d', $index + 1) }}</span>
                    @if ($step['title'] ?? null)
                        <h3 class="mt-3 text-lg font-bold {{ $isLast ? 'text-white' : 'text-[#07172f]' }}">{{ $step['title'] }}</h3>
                    @endif
                    @if ($step['description'] ?? null)
                        <p class="mt-3 text-sm leading-7 {{ $isLast ? 'text-slate-300' : 'text-[#667085]' }}">{{ $step['description'] }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

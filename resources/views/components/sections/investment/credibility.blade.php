{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Investment

Future Enterprise Section Candidate:
Feature List

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'cards' => [],
])

@php
    $cards = count($cards) ? $cards : [
        ['icon' => \App\Support\HeroIconRegistry::path('presentation-chart-line'), 'title' => 'Structured Platform', 'description' => 'Investment records, notices, and portfolio visibility in a structured, organised investor dashboard.'],
        ['icon' => \App\Support\HeroIconRegistry::path('lock-closed'), 'title' => 'Secure Access', 'description' => 'Dedicated investor login with encrypted, role-restricted access to your personal portfolio data.'],
        ['icon' => \App\Support\HeroIconRegistry::path('bell'), 'title' => 'Official Notices', 'description' => "Investor communications issued formally through the platform's official notices system."],
    ];
@endphp

<section class="border-b border-[#e6e8ee] bg-white">
    <div class="mx-auto max-w-7xl px-6 py-10">
        <div class="grid gap-8 sm:grid-cols-3">
            @foreach ($cards as $index => $card)
                <div class="tlg-reveal tlg-d{{ $index + 1 }} flex items-start gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#f7f3ea]">
                        @if ($card['icon'] ?? null)
                            <svg class="h-5 w-5 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $card['icon'] }}"/></svg>
                        @endif
                    </div>
                    <div>
                        @if ($card['title'] ?? null)
                            <p class="font-bold text-[#07172f]">{{ $card['title'] }}</p>
                        @endif
                        @if ($card['description'] ?? null)
                            <p class="mt-1 text-sm text-[#667085]">{{ $card['description'] }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

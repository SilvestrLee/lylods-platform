{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Community Projects

Future Enterprise Section Candidate:
Process Steps

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'eyebrow' => null,
    'heading' => null,
    'body' => null,
    'steps' => [],
])

@php
    $eyebrow = $eyebrow ?? 'How We Work';
    $heading = $heading ?? 'A consistent four-stage approach.';
    $body = $body ?? 'Each stage builds on the last — from understanding your programme through to supporting live delivery and review.';

    $steps = count($steps) ? $steps : [
        ['title' => 'Understand the purpose', 'description' => 'We begin by listening — understanding the programme objectives, the people involved, the context and the outcomes you are working toward.'],
        ['title' => 'Structure the programme', 'description' => 'We help translate your goals into a practical plan — breaking down the work into clear phases, responsibilities and milestones.'],
        ['title' => 'Coordinate people and resources', 'description' => 'We bring together the right people, partners and resources — managing communication and coordination so nothing falls between the gaps.'],
        ['title' => 'Support delivery and review', 'description' => 'We stay engaged through live delivery — tracking progress, supporting reporting and helping you reflect on what worked and what to adjust.'],
    ];
@endphp

<section class="bg-[#f7f3ea]">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <div class="tlg-reveal max-w-2xl">
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
            @foreach ($steps as $index => $step)
                @php $isLast = $index === count($steps) - 1; @endphp
                <div class="tlg-reveal tlg-d{{ $index + 1 }} rounded-[1.75rem] p-8 transition-all duration-300 {{ $isLast ? 'bg-[#c9a24d] hover:brightness-105' : 'border border-[#e6e8ee] bg-white shadow-sm hover:border-[#c9a24d] hover:shadow-md' }}">
                    <span class="inline-block rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-widest {{ $isLast ? 'bg-[#07172f]/10 text-[#07172f]' : 'bg-[#07172f] text-[#c9a24d]' }}">{{ sprintf('%02d', $index + 1) }}</span>
                    @if ($step['title'] ?? null)
                        <h3 class="mt-5 text-lg font-bold text-[#07172f]">{{ $step['title'] }}</h3>
                    @endif
                    @if ($step['description'] ?? null)
                        <p class="mt-3 text-sm leading-6 {{ $isLast ? 'text-[#07172f]/80' : 'text-[#667085]' }}">{{ $step['description'] }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>

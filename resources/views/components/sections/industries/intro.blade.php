@props([
    'eyebrow' => 'Where We Work',
    'heading' => null,
    'body' => null,
])

@php
    $heading = $heading ?? 'Practical experience across sectors.';
    $body = $body ?? 'Every sector brings its own priorities, constraints and pace. We bring the same disciplined, practical approach everywhere we work — adapted to the realities of each sector we serve.';
@endphp

<section class="bg-[#f7f3ea]">
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
    </div>
</section>

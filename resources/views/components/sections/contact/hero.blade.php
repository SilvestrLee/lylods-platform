{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Contact

Future Enterprise Section Candidate:
Hero

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'eyebrow' => null,
    'heading' => null,
    'description' => null,
    'backgroundImage' => null,
    'backgroundImageAlt' => null,
])

@php
    $backgroundImage = $backgroundImage ?? asset('images/placeholders/community-placeholder.svg');
@endphp

<section class="relative overflow-hidden bg-[#07172f] text-white">
    <div class="absolute inset-0">
        <img src="{{ $backgroundImage }}" alt="{{ $backgroundImageAlt ?? '' }}" class="h-full w-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-r from-[#07172f] via-[#07172f]/90 to-[#07172f]/60"></div>
    </div>
    <div class="relative mx-auto max-w-[1440px] px-6 py-28">
        <div class="tlg-reveal max-w-4xl">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">{{ $eyebrow }}</p>
            @endif
            @if ($heading)
                <h1 class="mt-6 font-serif text-4xl font-bold leading-tight tracking-tight md:text-5xl lg:text-[3.2rem]">{{ $heading }}</h1>
            @endif
            @if ($description)
                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-200">{{ $description }}</p>
            @endif
        </div>
    </div>
</section>

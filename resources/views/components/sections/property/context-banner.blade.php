{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Property

Future Enterprise Section Candidate:
Media Banner

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'image' => null,
    'imageAlt' => null,
    'eyebrow' => null,
    'heading' => null,
])

@php
    $eyebrow = $eyebrow ?? 'Our Reach';
    $heading = $heading ?? 'Supporting a wide range of clients across residential, commercial, land and development contexts.';
@endphp

@if ($image)
<div class="bg-white">
    <div class="mx-auto max-w-[1440px] px-6 py-6">
        <div class="relative overflow-hidden rounded-[2rem] shadow-xl">
            <img src="{{ $image }}"
                 alt="{{ $imageAlt ?? 'Property coordination and professional facilitation' }}"
                 loading="lazy" decoding="async"
                 class="h-72 w-full object-cover object-center lg:h-[420px]">
            <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/55 to-transparent"></div>
            <div class="absolute bottom-8 left-8 right-8">
                @if ($eyebrow)
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $eyebrow }}</p>
                @endif
                @if ($heading)
                    <p class="mt-2 max-w-xl font-serif text-xl font-bold text-white lg:text-2xl">{{ $heading }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endif

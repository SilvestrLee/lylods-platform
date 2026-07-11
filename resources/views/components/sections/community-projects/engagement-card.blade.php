{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Community Projects

Future Enterprise Section Candidate:
Feature Grid

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'icon' => null,
    'title' => null,
    'description' => null,
    'image' => null,
    'imageAlt' => null,
    'stagger' => null,
])

@php
    $image = $image ?? asset('images/placeholders/community-placeholder.svg');
@endphp

<div class="tlg-reveal{{ $stagger ? ' tlg-d'.$stagger : '' }} group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] transition-all duration-300 hover:border-[#c9a24d] hover:bg-white hover:shadow-md">
    <div class="relative h-48 overflow-hidden">
        <img src="{{ $image }}" alt="{{ $imageAlt ?: $title }}" loading="lazy" decoding="async" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/40 to-transparent"></div>
    </div>
    <div class="p-8">
        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f] transition-all duration-300 group-hover:bg-[#123f8c]">
            @if ($icon)
                <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
            @endif
        </div>
        @if ($title)
            <h3 class="mt-6 font-bold text-[#07172f]">{{ $title }}</h3>
        @endif
        @if ($description)
            <p class="mt-3 text-sm leading-6 text-[#667085]">{{ $description }}</p>
        @endif
    </div>
</div>

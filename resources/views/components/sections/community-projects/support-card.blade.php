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
    'color' => 'navy',
    'stagger' => null,
])
@php
    $iconWrapClasses = match ($color) {
        'blue' => 'bg-[#123f8c]',
        'gold' => 'bg-[#c9a24d]',
        default => 'bg-[#07172f]',
    };
    $iconClasses = match ($color) {
        'blue' => 'text-white',
        'gold' => 'text-[#07172f]',
        default => 'text-[#c9a24d]',
    };
@endphp

<div class="tlg-reveal{{ $stagger ? ' tlg-d'.$stagger : '' }} rounded-3xl border border-[#e6e8ee] bg-white p-8 shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
    <div class="flex h-11 w-11 items-center justify-center rounded-2xl {{ $iconWrapClasses }}">
        @if ($icon)
            <svg class="h-5 w-5 {{ $iconClasses }}" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
        @endif
    </div>
    @if ($title)
        <h3 class="mt-5 font-bold text-[#07172f]">{{ $title }}</h3>
    @endif
    @if ($description)
        <p class="mt-3 text-sm leading-6 text-[#667085]">{{ $description }}</p>
    @endif
</div>

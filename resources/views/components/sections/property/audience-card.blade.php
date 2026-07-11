{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Property

Future Enterprise Section Candidate:
Audience Grid

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'icon' => null,
    'title' => null,
    'description' => null,
    'dark' => false,
    'color' => 'navy',
    'stagger' => null,
])
@php
    $wrapperClasses = $dark
        ? 'rounded-[2rem] bg-[#07172f] p-7 shadow-sm text-white'
        : 'rounded-[2rem] bg-white p-7 shadow-sm ring-1 ring-[#e6e8ee]';
    $iconWrapClasses = $dark ? 'bg-white/10' : match ($color) {
        'blue' => 'bg-[#123f8c]',
        'gold' => 'bg-[#c9a24d]',
        default => 'bg-[#07172f]',
    };
    $iconClasses = $dark ? 'text-[#c9a24d]' : match ($color) {
        'blue' => 'text-white',
        'gold' => 'text-[#07172f]',
        default => 'text-[#c9a24d]',
    };
    $titleClasses = $dark ? 'text-white' : 'text-[#07172f]';
    $descriptionClasses = $dark ? 'text-slate-300' : 'text-[#667085]';
@endphp

<div class="tlg-reveal{{ $stagger ? ' tlg-d'.$stagger : '' }} {{ $wrapperClasses }}">
    <div class="flex h-12 w-12 items-center justify-center rounded-2xl {{ $iconWrapClasses }}">
        @if ($icon)
            <svg class="h-6 w-6 {{ $iconClasses }}" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
        @endif
    </div>
    @if ($title)
        <h3 class="mt-5 text-base font-bold {{ $titleClasses }}">{{ $title }}</h3>
    @endif
    @if ($description)
        <p class="mt-2 text-sm leading-6 {{ $descriptionClasses }}">{{ $description }}</p>
    @endif
</div>

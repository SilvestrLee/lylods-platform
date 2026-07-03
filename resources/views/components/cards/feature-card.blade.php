@props([
    'icon' => null,
    'title' => null,
    'description' => null,
    'dark' => false,
    'stagger' => null,
])
@php
    $wrapperClasses = $dark
        ? 'rounded-3xl bg-[#07172f] p-8'
        : 'rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8';
    $iconWrapClasses = $dark ? 'bg-white/10' : 'bg-[#07172f]';
    $titleClasses = $dark ? 'text-white' : 'text-[#07172f]';
    $descriptionClasses = $dark ? 'text-slate-300' : 'text-[#667085]';
@endphp

<div class="tlg-reveal{{ $stagger ? ' tlg-d'.$stagger : '' }} flex items-start gap-5 {{ $wrapperClasses }}">
    @if ($icon)
        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl {{ $iconWrapClasses }}">
            <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
        </div>
    @endif
    <div>
        @if ($title)
            <h3 class="font-bold {{ $titleClasses }}">{{ $title }}</h3>
        @endif
        @if ($description)
            <p class="mt-2 text-sm leading-7 {{ $descriptionClasses }}">{{ $description }}</p>
        @endif
    </div>
</div>

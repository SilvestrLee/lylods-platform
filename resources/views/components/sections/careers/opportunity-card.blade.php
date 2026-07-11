{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Careers

Future Enterprise Section Candidate:
Feature Grid

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'icon' => null,
    'title' => null,
    'description' => null,
    'gradient' => 'from-[#07172f] via-[#123f8c] to-[#07172f]',
    'radialPosition' => '65% 35%',
    'dark' => false,
    'stagger' => null,
])

<div class="tlg-reveal{{ $stagger ? ' tlg-d'.$stagger : '' }} flex flex-col overflow-hidden rounded-3xl border {{ $dark ? 'bg-[#07172f]' : 'border-[#e6e8ee] bg-[#f7f3ea]' }}">
    <div class="relative flex h-40 items-center justify-center overflow-hidden bg-gradient-to-br {{ $gradient }}">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at {{ $radialPosition }}, #c9a24d 0%, transparent 55%)"></div>
        @if ($icon)
            <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
        @endif
    </div>
    <div class="flex flex-1 flex-col p-7">
        @if ($title)
            <h3 class="font-bold {{ $dark ? 'text-white' : 'text-[#07172f]' }}">{{ $title }}</h3>
        @endif
        @if ($description)
            <p class="mt-2 flex-1 text-sm leading-7 {{ $dark ? 'text-slate-300' : 'text-[#667085]' }}">{{ $description }}</p>
        @endif
    </div>
</div>

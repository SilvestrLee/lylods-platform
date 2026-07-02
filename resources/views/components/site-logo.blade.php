@inject('cmsSettingSvc', 'App\Services\CMS\SiteSettingService')
@props([
    'fallback' => "The Lylods Group",
    'inverse'  => false,
])
@php
    try {
        $cmsSite = $cmsSettingSvc->current();
    } catch (\Throwable $e) {
        $cmsSite = null;
    }
    $siteName   = $cmsSite?->site_name ?? $fallback;
    $logoMedia  = $inverse ? ($cmsSite?->logoInverse ?? $cmsSite?->logo) : $cmsSite?->logo;
    $textColour = $inverse ? 'text-white' : 'text-[#07172f]';
@endphp
@if ($logoMedia)
    <img src="{{ $logoMedia->url() }}" alt="{{ $siteName }}" {{ $attributes->merge(['class' => 'object-contain']) }}>
@else
    <span {{ $attributes->merge(['class' => "inline-flex items-center font-serif font-bold {$textColour}"]) }}>{{ $siteName }}</span>
@endif

@props([
    'eyebrow' => 'Service Catalogue',
    'heading' => null,
    'body' => null,
])

@php
    $heading = $heading ?? 'Five service areas. One practical partner.';
    $body = $body ?? 'Our service areas complement each other. Clients working across multiple areas benefit from coordinated support and clear communication throughout.';
@endphp

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

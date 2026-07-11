{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Community Projects

Future Enterprise Section Candidate:
Audience Grid

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'eyebrow' => null,
    'heading' => null,
    'body' => null,
    'ctaLabel' => null,
    'ctaUrl' => null,
    'image' => null,
    'imageAlt' => null,
    'tags' => [],
])

@php
    $eyebrow = $eyebrow ?? 'Who We Support';
    $heading = $heading ?? 'We work with a wide range of organisations.';
    $body = $body ?? 'Our community and project development support is available to any organisation working toward a community-focused outcome — regardless of size, sector or structure.';
    $ctaLabel = $ctaLabel ?? 'Talk to Us About Your Project';
    $ctaUrl = $ctaUrl ?? route('contact');
    $image = $image ?? asset('images/placeholders/community-placeholder.svg');
    $imageAlt = $imageAlt ?: 'Community stakeholder meeting';

    $tags = count($tags) ? $tags : [
        ['icon' => \App\Support\HeroIconRegistry::path('user-group'), 'label' => 'Community organisations'],
        ['icon' => \App\Support\HeroIconRegistry::path('heart'), 'label' => 'Charities'],
        ['icon' => \App\Support\HeroIconRegistry::path('map-pin'), 'label' => 'Local groups'],
        ['icon' => \App\Support\HeroIconRegistry::path('building-library'), 'label' => 'Public-sector partners'],
        ['icon' => \App\Support\HeroIconRegistry::path('building-office'), 'label' => 'Faith-based organisations'],
        ['icon' => \App\Support\HeroIconRegistry::path('academic-cap'), 'label' => 'Training providers'],
        ['icon' => \App\Support\HeroIconRegistry::path('check-circle'), 'label' => 'Social impact initiatives'],
        ['icon' => \App\Support\HeroIconRegistry::path('building-office-2'), 'label' => 'Businesses supporting community programmes'],
    ];
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <div class="tlg-reveal grid gap-14 lg:grid-cols-[1fr_1fr] lg:items-start">
            <div>
                @if ($eyebrow)
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $eyebrow }}</p>
                @endif
                @if ($heading)
                    <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">{{ $heading }}</h2>
                @endif
                @if ($body)
                    <p class="mt-5 text-lg leading-8 text-[#667085]">{{ $body }}</p>
                @endif
                @if ($ctaLabel && $ctaUrl)
                    <a href="{{ $ctaUrl }}" class="mt-8 inline-flex items-center gap-2 rounded-full bg-[#07172f] px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-[#123f8c]">
                        {{ $ctaLabel }}
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                @endif
                <div class="mt-10 overflow-hidden rounded-2xl shadow-md">
                    <img src="{{ $image }}" alt="{{ $imageAlt }}" class="h-64 w-full object-cover object-center">
                </div>
            </div>
            <div class="grid gap-3 sm:grid-cols-2">
                @foreach ($tags as $tag)
                    <div class="flex items-center gap-4 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-5 py-4 transition-all duration-200 hover:border-[#c9a24d]">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#07172f]">
                            @if ($tag['icon'] ?? null)
                                <svg class="h-4 w-4 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $tag['icon'] }}"/></svg>
                            @endif
                        </div>
                        <span class="text-sm font-semibold text-[#07172f]">{{ $tag['label'] ?? '' }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

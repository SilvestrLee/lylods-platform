{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Property

Future Enterprise Section Candidate:
CTA

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'eyebrow' => null,
    'heading' => null,
    'description' => null,
    'primaryCtaLabel' => null,
    'primaryCtaUrl' => null,
    'secondaryCtaLabel' => null,
    'secondaryCtaUrl' => null,
])

@php
    $eyebrow = $eyebrow ?? 'Discuss a Property Opportunity';
    $heading = $heading ?? 'Ready to discuss a property opportunity?';
    $description = $description ?? 'Talk to us about your property sourcing, packaging, management, coordination or development support needs.';
    $primaryCtaLabel = $primaryCtaLabel ?? 'Start an Enquiry';
    $primaryCtaUrl = $primaryCtaUrl ?? route('contact');
    $secondaryCtaLabel = $secondaryCtaLabel ?? 'View All Services';
    $secondaryCtaUrl = $secondaryCtaUrl ?? route('services');
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <div class="relative overflow-hidden rounded-[2rem] bg-[#07172f] px-8 py-14 text-white md:px-14">
            <div class="relative tlg-reveal">
                @if ($eyebrow)
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $eyebrow }}</p>
                @endif
                @if ($heading)
                    <h2 class="mt-4 font-serif text-4xl font-bold lg:text-[2.4rem]">{{ $heading }}</h2>
                @endif
                @if ($description)
                    <p class="mt-5 max-w-2xl leading-7 text-slate-300">{{ $description }}</p>
                @endif
                @if ($primaryCtaLabel || $secondaryCtaLabel)
                <div class="mt-8 flex flex-wrap gap-4">
                    @if ($primaryCtaLabel && $primaryCtaUrl)
                    <a href="{{ $primaryCtaUrl }}" class="inline-flex items-center gap-2 rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">
                        {{ $primaryCtaLabel }}
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                    @endif
                    @if ($secondaryCtaLabel && $secondaryCtaUrl)
                    <a href="{{ $secondaryCtaUrl }}" class="inline-flex rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">
                        {{ $secondaryCtaLabel }}
                    </a>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Community Projects

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
    $eyebrow = $eyebrow ?? 'Get Started';
    $heading = $heading ?? 'Planning a community-focused project?';
    $description = $description ?? 'Talk to us about your programme, partnership, training or community development idea and we can help you structure the next steps.';
    $primaryCtaLabel = $primaryCtaLabel ?? 'Discuss Your Project';
    $primaryCtaUrl = $primaryCtaUrl ?? route('contact');
    $secondaryCtaLabel = $secondaryCtaLabel ?? 'Contact Us';
    $secondaryCtaUrl = $secondaryCtaUrl ?? route('contact');
@endphp

<section class="bg-[#f7f3ea]">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <div class="tlg-reveal overflow-hidden rounded-[2rem] bg-[#07172f] px-8 py-16 text-white md:px-14">
            <div class="grid gap-10 lg:grid-cols-[1fr_auto] lg:items-center">
                <div>
                    @if ($eyebrow)
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $eyebrow }}</p>
                    @endif
                    @if ($heading)
                        <h2 class="mt-4 font-serif text-3xl font-bold leading-tight lg:text-4xl">{{ $heading }}</h2>
                    @endif
                    @if ($description)
                        <p class="mt-5 max-w-2xl leading-8 text-slate-300">{{ $description }}</p>
                    @endif
                </div>
                <div class="flex shrink-0 flex-wrap gap-3">
                    @if ($primaryCtaLabel && $primaryCtaUrl)
                        <a href="{{ $primaryCtaUrl }}" class="inline-flex justify-center rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">{{ $primaryCtaLabel }}</a>
                    @endif
                    @if ($secondaryCtaLabel && $secondaryCtaUrl)
                        <a href="{{ $secondaryCtaUrl }}" class="inline-flex justify-center rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">{{ $secondaryCtaLabel }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

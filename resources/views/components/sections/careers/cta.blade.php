{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Careers

Future Enterprise Section Candidate:
CTA

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'eyebrow' => null,
    'heading' => null,
    'body' => null,
    'ctaLabel' => null,
])

@php
    $eyebrow = $eyebrow ?? 'Get In Touch';
    $heading = $heading ?? 'Interested in working with us or joining our network?';
    $body = $body ?? 'Send us your details and tell us how your skills, experience or interests align with our work.';
    $ctaLabel = $ctaLabel ?? 'Submit Your Interest';
@endphp

<section class="bg-white">
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
                    @if ($body)
                        <p class="mt-5 max-w-2xl leading-8 text-slate-300">{{ $body }}</p>
                    @endif
                </div>
                <div class="shrink-0">
                    <a href="{{ route('contact') }}" class="inline-flex justify-center rounded-full bg-[#c9a24d] px-8 py-4 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">{{ $ctaLabel }}</a>
                </div>
            </div>
        </div>
    </div>
</section>

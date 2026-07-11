{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Investment

Future Enterprise Section Candidate:
CTA

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'eyebrow' => null,
    'heading' => null,
    'body' => null,
    'primaryLabel' => null,
    'secondaryLabel' => null,
    'secondaryUrl' => null,
])

@php
    $eyebrow = $eyebrow ?? 'Investor Access';
    $heading = $heading ?? 'Already have investor access?';
    $body = $body ?? 'Use the secure investor login to access your dashboard, view investment records, and read official notices. If you require access or assistance, contact the platform administrator.';
    $primaryLabel = $primaryLabel ?? 'Go to Login';
    $secondaryLabel = $secondaryLabel ?? 'Contact Us';
    $secondaryUrl = $secondaryUrl ?? route('contact');
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-7xl px-6 py-20">
        <div class="rounded-[2rem] bg-[#07172f] px-8 py-12 text-white md:px-12">
            <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                <div>
                    @if ($eyebrow)
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $eyebrow }}</p>
                    @endif
                    @if ($heading)
                        <h2 class="mt-4 font-serif text-4xl font-bold">{{ $heading }}</h2>
                    @endif
                    @if ($body)
                        <p class="mt-4 max-w-2xl leading-7 text-slate-300">{{ $body }}</p>
                    @endif
                </div>
                <div class="flex flex-wrap gap-3 lg:flex-col">
                    <a href="{{ route('login') }}" class="inline-flex justify-center rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] hover:bg-[#d8b765]">{{ $primaryLabel }}</a>
                    @if ($secondaryLabel && $secondaryUrl)
                        <a href="{{ $secondaryUrl }}" class="inline-flex justify-center rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white hover:bg-white/10">{{ $secondaryLabel }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

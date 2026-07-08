@props([
    'eyebrow' => 'Work With Us',
    'heading' => null,
    'description' => null,
    'primaryCtaLabel' => null,
    'primaryCtaUrl' => null,
    'secondaryCtaLabel' => null,
    'secondaryCtaUrl' => null,
])

@php
    $heading = $heading ?? "Let's Build Something Meaningful Together";
    $description = $description ?? "Whether you're planning a business initiative, a training programme, a compliance project, a property opportunity or community development work — we're ready to help.";
    $primaryCtaLabel = $primaryCtaLabel ?? 'Discuss Your Project';
    $primaryCtaUrl = $primaryCtaUrl ?? route('contact');
    $secondaryCtaLabel = $secondaryCtaLabel ?? 'View Our Services';
    $secondaryCtaUrl = $secondaryCtaUrl ?? route('services');
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
                        <h2 class="mt-4 font-serif text-4xl font-bold leading-tight">{{ $heading }}</h2>
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

@props([
    'eyebrow' => null,
    'heading' => null,
    'description' => null,
    'primaryCtaLabel' => null,
    'primaryCtaUrl' => null,
    'secondaryCtaLabel' => null,
    'secondaryCtaUrl' => null,
])

<section class="relative overflow-hidden bg-[#07172f] text-white">
    <div class="relative mx-auto max-w-[1440px] px-6 py-28">
        <div class="tlg-reveal max-w-4xl">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">{{ $eyebrow }}</p>
            @endif
            @if ($heading)
                <h1 class="mt-6 font-serif text-4xl font-bold leading-tight tracking-tight md:text-5xl lg:text-[3.2rem]">{{ $heading }}</h1>
            @endif
            @if ($description)
                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-200">{{ $description }}</p>
            @endif
            @if ($primaryCtaLabel || $secondaryCtaLabel)
            <div class="mt-10 flex flex-wrap gap-4">
                @if ($primaryCtaLabel && $primaryCtaUrl)
                <a href="{{ $primaryCtaUrl }}" class="rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">{{ $primaryCtaLabel }}</a>
                @endif
                @if ($secondaryCtaLabel && $secondaryCtaUrl)
                <a href="{{ $secondaryCtaUrl }}" class="rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">{{ $secondaryCtaLabel }}</a>
                @endif
            </div>
            @endif
        </div>
    </div>
    <div class="absolute inset-0 -z-10 opacity-10" style="background-image: radial-gradient(circle at 80% 20%, #c9a24d 0%, transparent 50%), radial-gradient(circle at 20% 80%, #123f8c 0%, transparent 50%)" aria-hidden="true"></div>
</section>

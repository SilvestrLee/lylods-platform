@props([
    'number' => null,
    'icon' => null,
    'title' => null,
    'description' => null,
    'image' => null,
    'imageAlt' => null,
])

<div class="tlg-reveal rounded-3xl border border-[#e6e8ee] bg-white p-8 shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
    @if ($image)
        <div class="mb-5 aspect-[4/3] w-full overflow-hidden rounded-2xl">
            <img src="{{ $image }}" alt="{{ $imageAlt ?: $title }}" loading="lazy" decoding="async" class="h-full w-full object-cover">
        </div>
    @endif
    <div class="flex items-center gap-3">
        @if (! $image)
            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                @if ($icon)
                    <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
                @endif
            </div>
        @endif
        @if ($number)
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">{{ $number }}</p>
        @endif
    </div>
    @if ($title)
        <h3 class="mt-4 font-serif text-xl font-bold text-[#07172f]">{{ $title }}</h3>
    @endif
    @if ($description)
        <p class="mt-3 text-sm leading-7 text-[#667085]">{{ $description }}</p>
    @endif
</div>

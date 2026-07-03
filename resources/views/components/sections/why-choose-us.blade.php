@props([
    'eyebrow' => null,
    'heading' => null,
    'description' => null,
    'items' => [],
    'ctaLabel' => null,
    'ctaUrl' => null,
])

<section class="bg-white">
    <div class="mx-auto max-w-[1440px] px-6 py-24">
        @if ($eyebrow || $heading || $description)
            <div class="tlg-reveal max-w-2xl">
                @if ($eyebrow)
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $eyebrow }}</p>
                @endif
                @if ($heading)
                    <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl lg:text-[2.4rem]">{{ $heading }}</h2>
                @endif
                @if ($description)
                    <p class="mt-5 text-lg leading-8 text-[#667085]">{{ $description }}</p>
                @endif
            </div>
        @endif

        @if (count($items))
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($items as $index => $item)
                    <x-cards.feature-card
                        :icon="$item['icon'] ?? null"
                        :title="$item['title'] ?? null"
                        :description="$item['description'] ?? null"
                        :dark="$item['dark'] ?? false"
                        :stagger="($index % 3) + 1"
                    />
                @endforeach
            </div>
        @endif

        @if ($ctaLabel && $ctaUrl)
            <div class="tlg-reveal mt-10 text-center">
                <a href="{{ $ctaUrl }}" class="inline-flex items-center gap-2 rounded-full bg-[#07172f] px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-[#123f8c]">
                    {{ $ctaLabel }}
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>
        @endif
    </div>
</section>

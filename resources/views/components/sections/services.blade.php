@props([
    'eyebrow' => null,
    'heading' => null,
    'headingBreak' => null,
    'ctaLabel' => null,
    'ctaUrl' => null,
    'services' => [],
])

<section class="bg-white">
    <div class="mx-auto max-w-[1440px] px-6 py-24">
        <div class="tlg-reveal grid gap-4 lg:grid-cols-[1fr_auto] lg:items-end">
            <div>
                @if ($eyebrow)
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">{{ $eyebrow }}</p>
                @endif
                @if ($heading)
                    <h2 class="mt-3 font-serif text-4xl font-bold text-[#07172f] md:text-5xl lg:text-[2.4rem]">
                        {{ $heading }}@if ($headingBreak)<br class="hidden lg:block"> {{ $headingBreak }}@endif
                    </h2>
                @endif
            </div>
            @if ($ctaLabel && $ctaUrl)
                <a href="{{ $ctaUrl }}" class="inline-flex items-center gap-2 rounded-full border border-[#07172f] px-6 py-3 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                    {{ $ctaLabel }}
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            @endif
        </div>

        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($services as $service)
                <x-services.card
                    :href="$service['href'] ?? '#'"
                    :image="$service['image'] ?? null"
                    :alt="$service['alt'] ?? ''"
                    :icon="$service['icon'] ?? null"
                    :title="$service['title'] ?? null"
                    :description="$service['description'] ?? null"
                />
            @endforeach
        </div>
    </div>
</section>

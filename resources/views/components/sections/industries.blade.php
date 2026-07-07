@props([
    'eyebrow' => null,
    'heading' => null,
    'ctaLabel' => null,
    'ctaUrl' => null,
    'items' => [],
])

<section class="border-b border-[#e6e8ee] bg-white">
    <div class="mx-auto max-w-[1440px] px-6 py-14">
        <div class="tlg-reveal flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
            <div>
                @if ($eyebrow)
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#667085]">{{ $eyebrow }}</p>
                @endif
                @if ($heading)
                    <h2 class="mt-2 font-serif text-2xl font-bold text-[#07172f]">{{ $heading }}</h2>
                @endif
            </div>
            @if ($ctaLabel && $ctaUrl)
                <a href="{{ $ctaUrl }}" class="shrink-0 text-sm font-semibold text-[#123f8c] hover:underline">{{ $ctaLabel }}</a>
            @endif
        </div>

        @if (count($items))
            <div class="mt-8 grid grid-cols-2 gap-3 sm:grid-cols-4 lg:grid-cols-8">
                @foreach ($items as $index => $item)
                    <x-industries.item
                        :number="$item['number'] ?? null"
                        :title="$item['title'] ?? null"
                        :stagger="intdiv($index, 2) + 1"
                    />
                @endforeach
            </div>
        @endif
    </div>
</section>

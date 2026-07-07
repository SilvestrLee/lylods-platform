@props([
    'eyebrow' => null,
    'heading' => null,
    'description' => null,
    'steps' => [],
])

<section class="bg-[#f7f3ea]">
    <div class="mx-auto max-w-[1440px] px-6 py-24">
        @if ($eyebrow || $heading || $description)
            <div class="tlg-reveal max-w-2xl">
                @if ($eyebrow)
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">{{ $eyebrow }}</p>
                @endif
                @if ($heading)
                    <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl lg:text-[2.4rem]">{{ $heading }}</h2>
                @endif
                @if ($description)
                    <p class="mt-5 text-lg leading-8 text-[#667085]">{{ $description }}</p>
                @endif
            </div>
        @endif

        @if (count($steps))
            <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($steps as $index => $step)
                    <x-how-we-engage.card
                        :number="$step['number'] ?? null"
                        :title="$step['title'] ?? null"
                        :description="$step['description'] ?? null"
                        :dark="$step['dark'] ?? false"
                        :stagger="$index + 1"
                    />
                @endforeach
            </div>
        @endif
    </div>
</section>

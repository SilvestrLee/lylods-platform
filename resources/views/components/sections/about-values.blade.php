@props([
    'eyebrow' => null,
    'heading' => null,
    'description' => null,
    'image' => null,
    'imageAlt' => null,
    'values' => [],
    'ctaLabel' => null,
    'ctaUrl' => null,
])

@php
    $image = $image ?? asset('images/placeholders/community-placeholder.svg');
@endphp

<section class="bg-[#f7f3ea]">
    <div class="mx-auto max-w-[1440px] px-6 py-24">
        <div class="grid gap-16 lg:grid-cols-2 lg:items-center">
            {{-- Image --}}
            <div class="tlg-reveal relative overflow-hidden rounded-[2rem] shadow-2xl">
                <img src="{{ $image }}"
                     alt="{{ $imageAlt }}"
                     loading="lazy" decoding="async"
                     class="h-full w-full object-cover" style="min-height: 480px;">
                <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/30 to-transparent"></div>
            </div>

            {{-- Content --}}
            <div class="tlg-reveal tlg-d1">
                @if ($eyebrow)
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">{{ $eyebrow }}</p>
                @endif
                @if ($heading)
                    <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl lg:text-[2.4rem]">
                        {{ $heading }}
                    </h2>
                @endif
                @if ($description)
                    <p class="mt-6 text-lg leading-8 text-[#667085]">
                        {{ $description }}
                    </p>
                @endif

                @if (count($values))
                    <div class="mt-8 grid grid-cols-2 gap-4">
                        @foreach ($values as $value)
                            <x-about.value-card
                                :icon="$value['icon'] ?? null"
                                :title="$value['title'] ?? null"
                                :description="$value['description'] ?? null"
                            />
                        @endforeach
                    </div>
                @endif

                @if ($ctaLabel && $ctaUrl)
                    <a href="{{ $ctaUrl }}" class="mt-8 inline-flex items-center gap-2 rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white transition-all duration-300 hover:bg-[#123f8c]">
                        {{ $ctaLabel }}
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>

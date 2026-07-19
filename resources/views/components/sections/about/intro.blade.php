@props([
    'eyebrow' => 'Who We Are',
    'heading' => null,
    'body' => null,
    'image' => null,
    'imageAlt' => null,
    'ctaLabel' => null,
    'ctaUrl' => null,
])

@php
    $paragraphs = $body ? preg_split('/\r?\n\r?\n/', trim($body)) : [];
@endphp

<section class="bg-[#f7f3ea]">
    <div class="mx-auto grid max-w-[1440px] gap-16 px-6 py-24 lg:grid-cols-2 lg:items-center">
        <div class="tlg-reveal">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">{{ $eyebrow }}</p>
            @endif
            @if ($heading)
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">{{ $heading }}</h2>
            @endif
            @if (count($paragraphs))
                <div class="mt-6 space-y-5 text-lg leading-8 text-[#667085]">
                    @foreach ($paragraphs as $paragraph)
                        <p>{{ $paragraph }}</p>
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

        @if ($image)
            <div class="tlg-reveal tlg-d1 relative overflow-hidden rounded-[2rem] shadow-2xl">
                <img src="{{ $image }}" alt="{{ $imageAlt }}" loading="lazy" decoding="async" class="h-full w-full object-cover" style="min-height: 480px;">
                <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/30 to-transparent" aria-hidden="true"></div>
            </div>
        @else
            <div class="tlg-reveal tlg-d1 relative flex min-h-[420px] items-center justify-center overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#07172f] via-[#123f8c] to-[#07172f] shadow-2xl">
                <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 70% 30%, #c9a24d 0%, transparent 55%)" aria-hidden="true"></div>
                <svg class="h-28 w-28 text-white/15" fill="none" stroke="currentColor" stroke-width="0.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                <div class="absolute bottom-6 left-7">
                    <p class="text-xs font-bold uppercase tracking-widest text-[#c9a24d]">Professional consultation imagery</p>
                    <p class="mt-1 text-[11px] text-white/40">Future CMS-managed image</p>
                </div>
            </div>
        @endif
    </div>
</section>

@props([
    'eyebrow' => null,
    'heading' => null,
    'description' => null,
    'backgroundImage' => null,
    'primaryCtaLabel' => null,
    'primaryCtaUrl' => null,
    'secondaryCtaLabel' => null,
    'secondaryCtaUrl' => null,
    'cardOneImage' => null,
    'cardOneAlt' => null,
    'cardOneLabel' => null,
    'cardOneRows' => [],
    'cardOneCtaLabel' => null,
    'cardOneCtaUrl' => null,
    'cardTwoImage' => null,
    'cardTwoAlt' => null,
    'cardTwoLabel' => null,
    'cardTwoTitle' => null,
    'cardTwoDescription' => null,
    'cardTwoCtaLabel' => null,
    'cardTwoCtaUrl' => null,
])

<section class="relative min-h-[88vh] overflow-hidden bg-[#07172f] text-white">
    @if ($backgroundImage)
        <div class="absolute inset-0">
            <img src="{{ $backgroundImage }}" alt="" class="h-full w-full object-cover opacity-25">
            <div class="absolute inset-0 bg-gradient-to-r from-[#07172f] via-[#07172f]/85 to-[#07172f]/50"></div>
        </div>
    @endif

    <div class="relative mx-auto grid max-w-[1440px] gap-14 px-6 py-28 lg:grid-cols-[0.82fr_1fr] lg:items-center lg:py-36">
        <div class="tlg-reveal">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">
                    {{ $eyebrow }}
                </p>
            @endif

            @if ($heading)
                <h1 class="mt-6 max-w-3xl font-serif text-4xl font-bold leading-tight tracking-tight md:text-5xl lg:text-[3.2rem]">
                    {{ $heading }}
                </h1>
            @endif

            @if ($description)
                <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-200">
                    {{ $description }}
                </p>
            @endif

            @if ($primaryCtaLabel || $secondaryCtaLabel)
                <div class="mt-10 flex flex-wrap gap-4">
                    @if ($primaryCtaLabel && $primaryCtaUrl)
                        <a href="{{ $primaryCtaUrl }}" class="rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] shadow-lg transition-all duration-300 hover:bg-[#d8b765]">
                            {{ $primaryCtaLabel }}
                        </a>
                    @endif
                    @if ($secondaryCtaLabel && $secondaryCtaUrl)
                        <a href="{{ $secondaryCtaUrl }}" class="rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">
                            {{ $secondaryCtaLabel }}
                        </a>
                    @endif
                </div>
            @endif
        </div>

        @if ($cardOneImage || $cardTwoImage)
            {{-- Hero right column — two staggered portrait cards with floating UI panels --}}
            <div class="tlg-reveal tlg-d1 hidden lg:flex items-start gap-3 py-4">

                @if ($cardOneImage)
                    {{-- Card One — left, higher --}}
                    <div class="relative flex-1">
                        <div class="relative overflow-hidden rounded-[28px] border border-white/10 shadow-[0_30px_60px_rgba(0,0,0,.18)]" style="height:440px;">
                            <img src="{{ $cardOneImage }}" alt="{{ $cardOneAlt }}" class="h-full w-full object-cover object-center">
                            <div class="absolute inset-0 bg-gradient-to-b from-[#07172f]/55 via-transparent to-[#07172f]/40"></div>
                            {{-- Glass overlay — top, full card width --}}
                            <div class="absolute inset-x-4 top-4 rounded-[22px] border border-white/20 bg-white/12 p-5 text-white shadow-[0_20px_45px_rgba(0,0,0,.22)] backdrop-blur-xl">
                                @if ($cardOneLabel)
                                    <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-[#c9a24d]">{{ $cardOneLabel }}</p>
                                @endif
                                @if (count($cardOneRows))
                                    <div class="mt-3 space-y-2.5">
                                        @foreach ($cardOneRows as $row)
                                            <div class="flex items-center justify-between gap-2">
                                                <div class="flex items-center gap-2">
                                                    <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg bg-white/20">
                                                        <svg class="h-3.5 w-3.5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $row['icon'] ?? '' }}"/></svg>
                                                    </div>
                                                    <span class="text-[11px] font-semibold text-white">{{ $row['label'] ?? '' }}</span>
                                                </div>
                                                <span class="shrink-0 text-[10px] font-semibold text-[#c9a24d]">{{ $row['tag'] ?? '' }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                @if ($cardOneCtaLabel && $cardOneCtaUrl)
                                    <div class="mt-3 border-t border-white/20 pt-3">
                                        <a href="{{ $cardOneCtaUrl }}" class="inline-flex items-center gap-1 text-[11px] font-bold text-white transition-colors hover:text-[#c9a24d]">
                                            {{ $cardOneCtaLabel }}
                                            <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                @if ($cardTwoImage)
                    {{-- Card Two — right, lower (staggered ~80px down) --}}
                    <div class="relative mt-20 flex-1">
                        <div class="relative overflow-hidden rounded-[28px] border border-white/10 shadow-[0_30px_60px_rgba(0,0,0,.18)]" style="height:440px;">
                            <img src="{{ $cardTwoImage }}" alt="{{ $cardTwoAlt }}" class="h-full w-full object-cover object-center">
                            <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/65 via-[#07172f]/20 to-transparent"></div>
                            {{-- Glass overlay — bottom, full card width --}}
                            <div class="absolute inset-x-4 bottom-4 rounded-[22px] border border-white/20 bg-white/12 p-5 text-white shadow-[0_20px_45px_rgba(0,0,0,.22)] backdrop-blur-xl">
                                @if ($cardTwoLabel)
                                    <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-[#c9a24d]">{{ $cardTwoLabel }}</p>
                                @endif
                                @if ($cardTwoTitle)
                                    <p class="mt-2 text-sm font-bold leading-snug text-white">{{ $cardTwoTitle }}</p>
                                @endif
                                @if ($cardTwoDescription)
                                    <p class="mt-1.5 text-[11px] leading-5 text-white/70">{{ $cardTwoDescription }}</p>
                                @endif
                                @if ($cardTwoCtaLabel && $cardTwoCtaUrl)
                                    <div class="mt-3 border-t border-white/20 pt-3">
                                        <a href="{{ $cardTwoCtaUrl }}" class="inline-flex items-center gap-1 text-[11px] font-bold text-white transition-colors hover:text-[#c9a24d]">
                                            {{ $cardTwoCtaLabel }}
                                            <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
</section>

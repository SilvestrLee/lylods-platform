@props([
    'eyebrow' => null,
    'heading' => null,
    'subheading' => null,
    'description' => null,
    'backgroundMedia' => null,
    'primaryCtaLabel' => null,
    'primaryCtaUrl' => null,
    'secondaryCtaLabel' => null,
    'secondaryCtaUrl' => null,
    'alignment' => 'left',
    'height' => 'large',
    'overlay' => false,
    'theme' => 'light',
])
@php
    $theme = in_array($theme, ['dark', 'brand'], true) ? $theme : 'light';

    $themeClasses = match ($theme) {
        'dark'  => 'bg-[#07172f] text-white',
        'brand' => 'bg-[#f7f3ea] text-[#07172f]',
        default => 'bg-white text-[#07172f]',
    };

    $heightClasses = match ($height) {
        'medium' => 'py-16',
        default  => 'py-24 lg:py-32',
    };

    $alignClasses = $alignment === 'center' ? 'text-center items-center mx-auto' : 'text-left items-start';
@endphp

<section class="relative overflow-hidden {{ $themeClasses }}">
    @if ($backgroundMedia)
        <div class="absolute inset-0">
            <img src="{{ $backgroundMedia->url() }}" alt="" class="h-full w-full object-cover">
            @if ($overlay)
                <div class="absolute inset-0 bg-[#07172f]/60"></div>
            @endif
        </div>
    @endif

    <div class="relative mx-auto max-w-[1440px] px-6 {{ $heightClasses }}">
        <div class="flex max-w-2xl flex-col {{ $alignClasses }}">
            @if ($eyebrow)
                <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#c9a24d]">{{ $eyebrow }}</p>
            @endif

            @if ($heading)
                <h1 class="mt-3 font-serif text-4xl font-bold leading-tight lg:text-5xl {{ $backgroundMedia ? 'text-white' : '' }}">
                    {{ $heading }}
                </h1>
            @endif

            @if ($subheading)
                <p class="mt-4 text-lg font-semibold {{ $backgroundMedia ? 'text-slate-100' : 'text-[#123f8c]' }}">{{ $subheading }}</p>
            @endif

            @if ($description)
                <p class="mt-4 text-base leading-7 {{ $backgroundMedia ? 'text-slate-200' : 'text-[#667085]' }}">{{ $description }}</p>
            @endif

            @if ($primaryCtaLabel || $secondaryCtaLabel)
                <div class="mt-8 flex flex-wrap gap-3">
                    @if ($primaryCtaLabel && $primaryCtaUrl)
                        <a href="{{ $primaryCtaUrl }}"
                           class="inline-flex items-center rounded-full bg-[#c9a24d] px-6 py-3 text-sm font-bold text-[#07172f] transition hover:bg-[#d8b765]">
                            {{ $primaryCtaLabel }}
                        </a>
                    @endif
                    @if ($secondaryCtaLabel && $secondaryCtaUrl)
                        <a href="{{ $secondaryCtaUrl }}"
                           class="inline-flex items-center rounded-full border border-current px-6 py-3 text-sm font-bold transition hover:opacity-80">
                            {{ $secondaryCtaLabel }}
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>

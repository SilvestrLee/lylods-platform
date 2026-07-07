@props([
    'quote' => null,
    'name' => null,
    'meta' => null,
    'dark' => false,
    'ctaLabel' => null,
    'ctaUrl' => null,
    'stagger' => null,
])

<div class="tlg-reveal {{ $stagger ? 'tlg-d' . $stagger . ' ' : '' }}flex flex-col justify-between rounded-[2rem] {{ $dark ? 'bg-[#07172f]' : 'border border-[#e6e8ee] bg-white' }} p-8 shadow-sm">
    <div>
        <div class="flex gap-1">
            @for ($i = 0; $i < 5; $i++)
                <svg class="h-4 w-4 text-[#c9a24d]" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 0 0 .95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 0 0-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 0 0-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 0 0-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 0 0 .951-.69l1.07-3.292Z"/></svg>
            @endfor
        </div>
        @if ($quote)
            <p class="mt-5 leading-7 {{ $dark ? 'text-slate-300' : 'text-[#667085]' }}">"{{ $quote }}"</p>
        @endif
    </div>
    <div class="mt-6 border-t {{ $dark ? 'border-white/10' : 'border-[#e6e8ee]' }} pt-5">
        @if ($name)
            <p class="font-semibold {{ $dark ? 'text-white' : 'text-[#07172f]' }}">{{ $name }}</p>
        @endif
        @if ($meta)
            <p class="mt-0.5 text-sm {{ $dark ? 'text-slate-400' : 'text-[#667085]' }}">{{ $meta }}</p>
        @endif
        @if ($ctaLabel && $ctaUrl)
            <a href="{{ $ctaUrl }}" class="inline-flex items-center gap-2 rounded-full border border-white/30 px-5 py-2.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">
                {{ $ctaLabel }}
            </a>
        @endif
    </div>
</div>

@props([
    'number' => null,
    'title' => null,
    'description' => null,
    'dark' => false,
    'stagger' => 1,
])

@if ($dark)
    <div class="tlg-reveal tlg-d{{ $stagger }} rounded-[2rem] bg-[#07172f] p-8 shadow-sm text-white">
        @if ($number)
            <span class="inline-block rounded-full bg-white/10 px-3 py-1 text-xs font-bold text-[#c9a24d]">{{ $number }}</span>
        @endif
        @if ($title)
            <h3 class="mt-5 text-lg font-bold text-white">{{ $title }}</h3>
        @endif
        @if ($description)
            <p class="mt-3 text-sm leading-7 text-slate-300">{{ $description }}</p>
        @endif
    </div>
@else
    <div class="tlg-reveal tlg-d{{ $stagger }} rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
        @if ($number)
            <span class="inline-block rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-bold text-[#07172f]">{{ $number }}</span>
        @endif
        @if ($title)
            <h3 class="mt-5 text-lg font-bold text-[#07172f]">{{ $title }}</h3>
        @endif
        @if ($description)
            <p class="mt-3 text-sm leading-7 text-[#667085]">{{ $description }}</p>
        @endif
    </div>
@endif

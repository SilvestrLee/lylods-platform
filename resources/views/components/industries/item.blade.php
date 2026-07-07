@props([
    'number' => null,
    'title' => null,
    'stagger' => 1,
])

<div class="tlg-reveal tlg-d{{ $stagger }} flex items-start gap-2 border-l-2 border-[#c9a24d] py-1 pl-3">
    <div>
        @if ($number)
            <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-[#c9a24d]">{{ $number }}</p>
        @endif
        @if ($title)
            <p class="mt-1 text-xs font-semibold leading-snug text-[#07172f]">{{ $title }}</p>
        @endif
    </div>
</div>

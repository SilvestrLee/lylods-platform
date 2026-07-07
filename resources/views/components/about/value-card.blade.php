@props([
    'icon' => null,
    'title' => null,
    'description' => null,
])

<div class="flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-5">
    @if ($icon)
        <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
    @endif
    <div>
        @if ($title)
            <p class="font-bold text-[#07172f]">{{ $title }}</p>
        @endif
        @if ($description)
            <p class="mt-1 text-xs text-[#667085]">{{ $description }}</p>
        @endif
    </div>
</div>

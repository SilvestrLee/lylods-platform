@props([
    'eyebrow' => null,
    'items' => [],
])

<div class="bg-[#07172f] py-5">
    <div class="mx-auto max-w-[1440px] px-6">
        <div class="flex flex-wrap items-center justify-center gap-x-2 gap-y-2 text-center">
            @if ($eyebrow)
                <span class="shrink-0 text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">{{ $eyebrow }}</span>
            @endif
            @foreach ($items as $item)
                <x-discipline-strip.item :label="$item" />
            @endforeach
        </div>
    </div>
</div>

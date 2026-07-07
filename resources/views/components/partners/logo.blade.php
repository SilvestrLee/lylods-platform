@props([
    'logo' => null,
    'name' => null,
])

@if ($logo)
    <div class="flex h-14 w-36 items-center justify-center rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-3">
        <img src="{{ $logo->url() }}" alt="{{ $name }}" class="max-h-9 max-w-full object-contain">
    </div>
@elseif ($name)
    <div class="flex h-14 w-36 items-center justify-center rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-2 text-center">
        <span class="text-xs font-semibold text-[#07172f]">{{ $name }}</span>
    </div>
@else
    <div class="flex h-14 w-36 items-center justify-center rounded-2xl border border-dashed border-[#d0d5dd] bg-[#f7f3ea]"><span class="text-xs font-semibold text-[#b0b7c3]">Logo / Badge</span></div>
@endif

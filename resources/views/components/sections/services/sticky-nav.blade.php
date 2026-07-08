@props([
    'serviceGroups' => [],
])

<div class="sticky top-[65px] z-40 border-b border-[#e6e8ee] bg-white/95 backdrop-blur-xl">
    <div class="mx-auto max-w-[1440px] overflow-x-auto px-6">
        <div class="flex gap-1 py-3 text-sm font-semibold" style="white-space:nowrap;">
            @foreach ($serviceGroups as $navGroup)
            <a href="#{{ $navGroup->slug }}" class="rounded-full px-4 py-2 text-[#07172f] transition-all duration-200 hover:bg-[#f7f3ea]">{{ $navGroup->name }}</a>
            @endforeach
        </div>
    </div>
</div>

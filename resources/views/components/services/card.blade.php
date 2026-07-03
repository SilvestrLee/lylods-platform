@props([
    'href' => '#',
    'image' => null,
    'alt' => '',
    'icon' => null,
    'title' => null,
    'description' => null,
])

<a href="{{ $href }}" class="tlg-reveal group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-[#c9a24d] hover:shadow-lg">
    <div class="relative h-44 overflow-hidden">
        <img src="{{ $image }}" alt="{{ $alt }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/60 to-transparent"></div>
        @if ($icon)
            <div class="absolute bottom-3 left-4">
                <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/></svg>
            </div>
        @endif
    </div>
    <div class="p-6">
        @if ($title)
            <h3 class="font-bold text-[#07172f]">{{ $title }}</h3>
        @endif
        @if ($description)
            <p class="mt-2 text-sm leading-6 text-[#667085]">{{ $description }}</p>
        @endif
    </div>
</a>

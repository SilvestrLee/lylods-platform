@props(['title', 'subtitle' => null, 'open' => false])

<div x-data="{ open: {{ $open ? 'true' : 'false' }} }" class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
    <button type="button" @click="open = ! open"
            class="flex w-full items-center justify-between gap-4 p-6 text-left"
            :class="open ? 'border-b border-[#e6e8ee]' : ''">
        <div>
            @if ($subtitle)
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">{{ $subtitle }}</p>
            @endif
            <h2 class="{{ $subtitle ? 'mt-2' : '' }} text-xl font-bold text-[#07172f]">{{ $title }}</h2>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
             class="h-5 w-5 shrink-0 text-[#667085] transition-transform duration-200"
             :class="open ? 'rotate-180' : ''">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
        </svg>
    </button>

    <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
        <div class="space-y-6 p-6">
            {{ $slot }}
        </div>
    </div>
</div>

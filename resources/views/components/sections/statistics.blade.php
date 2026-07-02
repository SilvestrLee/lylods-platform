@props([
    'eyebrow' => null,
    'heading' => null,
    'description' => null,
    'items' => [],
])

<div class="border-t border-white/10 bg-[#07172f]">
    <div class="mx-auto max-w-[1440px] px-6 py-8">
        @if ($eyebrow || $heading || $description)
            <div class="mb-6 text-center">
                @if ($eyebrow)
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#c9a24d]">{{ $eyebrow }}</p>
                @endif
                @if ($heading)
                    <h2 class="mt-2 font-serif text-2xl font-bold text-white">{{ $heading }}</h2>
                @endif
                @if ($description)
                    <p class="mt-2 text-sm text-slate-300">{{ $description }}</p>
                @endif
            </div>
        @endif

        <dl class="grid grid-cols-2 gap-x-6 gap-y-8 sm:grid-cols-4 text-center">
            @foreach ($items as $index => $item)
                <div class="tlg-reveal tlg-d{{ min($index + 1, 4) }}">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">{{ $item['label'] ?? '' }}</dt>
                    <dd class="mt-2 font-serif {{ ! empty($item['caption']) ? 'text-xl' : 'text-4xl' }} font-bold {{ ! empty($item['caption']) ? 'leading-tight' : '' }} text-white">{{ $item['prefix'] ?? '' }}{{ $item['value'] ?? '' }}{{ $item['suffix'] ?? '' }}</dd>
                    @if (! empty($item['caption']))
                        <dd class="mt-1 text-xs text-slate-400">{{ $item['caption'] }}</dd>
                    @endif
                </div>
            @endforeach
        </dl>
    </div>
</div>

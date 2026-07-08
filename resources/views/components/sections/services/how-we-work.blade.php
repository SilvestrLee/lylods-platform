@props([
    'steps' => [],
])

@php
    $steps = count($steps) ? $steps : [
        ['title' => 'Understand your need', 'description' => 'We take time to understand your objectives, challenges and context before recommending any approach.'],
        ['title' => 'Structure the right support', 'description' => 'We organise the right combination of services, expertise and resources to match your specific situation.'],
        ['title' => 'Coordinate people and resources', 'description' => 'We bring together the right people, services and professionals — managing workstreams so you can focus on your priorities.'],
        ['title' => 'Support delivery and next steps', 'description' => 'We stay engaged through implementation — monitoring progress, communicating clearly and helping you plan what comes next.'],
    ];
@endphp

<section class="bg-[#07172f] text-white">
    <div class="mx-auto max-w-[1440px] px-6 py-24">
        <div class="tlg-reveal max-w-2xl">
            <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">How We Work</p>
            <h2 class="mt-4 font-serif text-4xl font-bold lg:text-[2.4rem]">From conversation to outcome.</h2>
            <p class="mt-5 leading-7 text-slate-300">A consistent, practical approach — tailored to fit your situation at every step.</p>
        </div>
        <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($steps as $index => $step)
            @php $isLast = $index === count($steps) - 1; @endphp
            <div class="tlg-reveal tlg-d{{ $index + 1 }} rounded-[1.75rem] p-8 transition-all duration-300 {{ $isLast ? 'bg-[#c9a24d] hover:brightness-105' : 'border border-white/10 bg-white/5 hover:bg-white/10' }}">
                <span class="inline-block rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-widest {{ $isLast ? 'bg-[#07172f]/10 text-[#07172f]' : 'bg-[#c9a24d]/15 text-[#c9a24d]' }}">{{ sprintf('%02d', $index + 1) }}</span>
                @if ($step['title'] ?? null)
                    <h3 class="mt-5 text-lg font-bold {{ $isLast ? 'text-[#07172f]' : 'text-white' }}">{{ $step['title'] }}</h3>
                @endif
                @if ($step['description'] ?? null)
                    <p class="mt-3 text-sm leading-6 {{ $isLast ? 'text-[#07172f]/80' : 'text-slate-400' }}">{{ $step['description'] }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

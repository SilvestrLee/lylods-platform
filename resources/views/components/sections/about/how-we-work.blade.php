@props([
    'eyebrow' => 'How We Work',
    'heading' => 'From intention to implementation.',
    'description' => 'Our approach is consistent, practical and client-led at every stage.',
    'steps' => [],
])

@php
    $steps = count($steps) ? $steps : [
        ['title' => 'Understand', 'description' => 'We take time to understand objectives, challenges and priorities before recommending any path forward.'],
        ['title' => 'Plan', 'description' => 'We help organise ideas into practical actions and achievable outcomes — with clear steps and realistic timelines.'],
        ['title' => 'Coordinate', 'description' => 'We bring together the right people, services and expertise where needed — managing relationships and workstreams so you don\'t have to.'],
        ['title' => 'Deliver', 'description' => 'We support implementation, communication and structured progress — staying engaged until the outcome is real and measurable.'],
    ];
@endphp

<section class="bg-[#07172f] text-white">
    <div class="mx-auto max-w-[1440px] px-6 py-24">
        <div class="tlg-reveal max-w-2xl">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $eyebrow }}</p>
            @endif
            @if ($heading)
                <h2 class="mt-4 font-serif text-4xl font-bold lg:text-[2.4rem]">{{ $heading }}</h2>
            @endif
            @if ($description)
                <p class="mt-5 leading-7 text-slate-300">{{ $description }}</p>
            @endif
        </div>
        <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($steps as $index => $step)
                @php $isLast = $index === count($steps) - 1; @endphp
                <div class="tlg-reveal tlg-d{{ $index + 1 }} rounded-[1.75rem] p-8 transition-all duration-300 {{ $isLast ? 'bg-[#c9a24d] hover:brightness-105' : 'border border-white/10 bg-white/5 hover:bg-white/10' }}">
                    <span class="inline-block rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-widest {{ $isLast ? 'bg-[#07172f]/10 text-[#07172f]' : 'bg-[#c9a24d]/15 text-[#c9a24d]' }}">{{ sprintf('%02d', $index + 1) }}</span>
                    <h3 class="mt-5 text-lg font-bold {{ $isLast ? 'text-[#07172f]' : 'text-white' }}">{{ $step['title'] ?? '' }}</h3>
                    <p class="mt-3 text-sm leading-6 {{ $isLast ? 'text-[#07172f]/80' : 'text-slate-400' }}">{{ $step['description'] ?? '' }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

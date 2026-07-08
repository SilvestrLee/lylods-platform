@props([
    'eyebrow' => 'Our Areas of Focus',
    'heading' => 'Where we do our best work.',
    'description' => 'Our capabilities span five core areas — each supported by practical experience, professional networks and a commitment to structured delivery.',
    'items' => [],
])

@php
    $gradients = [
        ['classes' => 'from-[#07172f] via-[#123f8c] to-[#07172f]', 'radial' => 'radial-gradient(circle at 65% 35%, #c9a24d 0%, transparent 55%)', 'opacity' => 'opacity-10'],
        ['classes' => 'from-[#07172f] via-[#0d2d5e] to-[#123f8c]', 'radial' => 'radial-gradient(circle at 30% 65%, #c9a24d 0%, transparent 55%)', 'opacity' => 'opacity-10'],
        ['classes' => 'from-[#051220] via-[#07172f] to-[#0a1f42]', 'radial' => 'radial-gradient(circle at 60% 40%, #c9a24d 0%, transparent 50%)', 'opacity' => 'opacity-10'],
        ['classes' => 'from-[#07172f] via-[#0e243d] to-[#1a3a5c]', 'radial' => 'radial-gradient(circle at 70% 30%, #c9a24d 0%, transparent 55%)', 'opacity' => 'opacity-10'],
        ['classes' => 'from-[#07172f] via-[#102a50] to-[#07172f]', 'radial' => 'radial-gradient(circle at 25% 60%, #c9a24d 0%, transparent 50%)', 'opacity' => 'opacity-12'],
    ];

    $items = count($items) ? $items : [
        ['icon' => \App\Support\HeroIconRegistry::path('chart-bar'), 'title' => 'Business & Technology', 'description' => 'Supporting businesses to improve operations, adopt practical technology and build more efficient, sustainable systems for growth.', 'href' => route('services')],
        ['icon' => \App\Support\HeroIconRegistry::path('academic-cap'), 'title' => 'Training & Capacity Building', 'description' => 'Designing and delivering structured learning programmes that build skills, confidence and practical capability across teams and individuals.', 'href' => route('services')],
        ['icon' => \App\Support\HeroIconRegistry::path('shield-check'), 'title' => 'Governance & Compliance', 'description' => 'Helping organisations understand their compliance obligations, improve documentation and build internal clarity around governance and data protection.', 'href' => route('services')],
        ['icon' => \App\Support\HeroIconRegistry::path('building-office'), 'title' => 'Property & Development', 'description' => 'Coordinating property opportunities from initial review through to structured next steps — connecting clients with the right professionals where specialist input is needed.', 'href' => route('property')],
        ['icon' => \App\Support\HeroIconRegistry::path('user-group'), 'title' => 'Community Projects', 'description' => 'Supporting community-focused initiatives with planning, structure, coordination and stakeholder communication — to make projects easier to move forward.', 'href' => route('contact')],
    ];
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-[1440px] px-6 py-24">
        <div class="tlg-reveal max-w-2xl">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $eyebrow }}</p>
            @endif
            @if ($heading)
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">{{ $heading }}</h2>
            @endif
            @if ($description)
                <p class="mt-5 text-lg leading-8 text-[#667085]">{{ $description }}</p>
            @endif
        </div>
        <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($items as $index => $item)
                @php
                    $gradient = $gradients[$index % count($gradients)];
                    $extraClass = ($index === count($items) - 1 && count($items) % 3 !== 0) ? ' sm:col-span-2 lg:col-span-1' : '';
                @endphp
                <div class="tlg-reveal tlg-d{{ ($index % 4) + 1 }} flex flex-col overflow-hidden rounded-[2rem] border border-[#e6e8ee] shadow-sm{{ $extraClass }}">
                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-gradient-to-br {{ $gradient['classes'] }}">
                        <div class="absolute inset-0 {{ $gradient['opacity'] }}" style="background-image: {{ $gradient['radial'] }}" aria-hidden="true"></div>
                        @if ($item['icon'] ?? null)
                            <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/></svg>
                        @endif
                    </div>
                    <div class="flex flex-1 flex-col bg-[#f7f3ea] p-7">
                        @if ($item['title'] ?? null)
                            <h3 class="font-serif text-lg font-bold text-[#07172f]">{{ $item['title'] }}</h3>
                        @endif
                        @if ($item['description'] ?? null)
                            <p class="mt-3 flex-1 text-sm leading-7 text-[#667085]">{{ $item['description'] }}</p>
                        @endif
                        <a href="{{ $item['href'] ?? route('services') }}" class="mt-5 inline-flex items-center gap-1.5 text-sm font-bold text-[#123f8c] hover:text-[#07172f]">
                            Learn More <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

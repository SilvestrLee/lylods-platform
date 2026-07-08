@props([
    'eyebrow' => 'Why Clients Choose Us',
    'heading' => 'What makes the difference.',
    'description' => 'Our clients come back because of how we work — not just what we deliver.',
    'items' => [],
])

@php
    $items = count($items) ? $items : [
        ['icon' => \App\Support\HeroIconRegistry::path('check-circle'), 'title' => 'Practical Support', 'description' => 'We focus on what is achievable and useful — advice that can actually be acted on, not frameworks that sit on a shelf.'],
        ['icon' => \App\Support\HeroIconRegistry::path('chat-bubble'), 'title' => 'Structured Coordination', 'description' => 'Clear communication and organised workstreams — clients always know where things stand and what comes next.'],
        ['icon' => \App\Support\HeroIconRegistry::path('squares-2x2'), 'title' => 'Multi-Sector Experience', 'description' => 'Exposure across business, technology, property, training and community contexts means we bring broader perspective to every challenge.'],
        ['icon' => \App\Support\HeroIconRegistry::path('user-group'), 'title' => 'Professional Network', 'description' => 'Where specialist or regulated input is needed, we connect clients with appropriate, qualified independent professionals.'],
        ['icon' => \App\Support\HeroIconRegistry::path('user'), 'title' => 'Tailored Engagement', 'description' => 'No generic templates. We shape our approach around your specific situation, capacity and goals.'],
        ['icon' => \App\Support\HeroIconRegistry::path('chart-bar'), 'title' => 'Focus on Outcomes', 'description' => 'We measure success by what actually changes — not by hours logged or reports produced.', 'dark' => true],
    ];
@endphp

<section class="bg-[#f7f3ea]">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
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
        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($items as $index => $item)
                <x-cards.feature-card
                    :icon="$item['icon'] ?? null"
                    :title="$item['title'] ?? null"
                    :description="$item['description'] ?? null"
                    :dark="$item['dark'] ?? false"
                    :stagger="($index % 3) + 1"
                />
            @endforeach
        </div>
    </div>
</section>

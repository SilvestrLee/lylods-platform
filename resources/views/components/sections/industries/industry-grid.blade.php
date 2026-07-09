@props([
    'cards' => [],
])

@php
    $cards = count($cards) ? $cards : [
        ['icon' => \App\Support\HeroIconRegistry::path('cog'), 'title' => 'Energy & Utilities', 'description' => 'Supporting energy and utility providers with technology modernisation, compliance frameworks and operational process improvement as the sector adapts to changing regulatory and infrastructure demands.'],
        ['icon' => \App\Support\HeroIconRegistry::path('building-office'), 'title' => 'Infrastructure & Civil', 'description' => 'Practical project coordination and governance support for infrastructure and civil engineering programmes, from planning through delivery.'],
        ['icon' => \App\Support\HeroIconRegistry::path('chart-bar'), 'title' => 'Financial Services', 'description' => 'Governance, compliance and digital transformation support for financial services organisations navigating regulatory change and evolving client expectations.'],
        ['icon' => \App\Support\HeroIconRegistry::path('shield-check'), 'title' => 'Government & Public Sector', 'description' => 'Compliance, governance and workforce development support for public sector bodies delivering services under increasing scrutiny and constrained resources.'],
        ['icon' => \App\Support\HeroIconRegistry::path('squares-2x2'), 'title' => 'Technology & Digital', 'description' => 'Systems development, digital transformation and process improvement for technology-led organisations scaling their capabilities.'],
        ['icon' => \App\Support\HeroIconRegistry::path('check-circle'), 'title' => 'Oil & Gas / Industrial', 'description' => 'Compliance, training and operational support for industrial and energy-adjacent organisations managing complex regulatory and safety requirements.'],
        ['icon' => \App\Support\HeroIconRegistry::path('user-duo'), 'title' => 'Professional Services', 'description' => 'Business consultancy, recruitment and governance support for professional services firms building capacity and refining how they operate.'],
        ['icon' => \App\Support\HeroIconRegistry::path('academic-cap'), 'title' => 'Education & Training', 'description' => 'Training design, capacity building and workforce development support for education providers and organisations investing in their people.'],
    ];
@endphp

<section class="bg-white">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($cards as $index => $card)
                <x-sections.industries.industry-card
                    :number="sprintf('%02d', $index + 1)"
                    :icon="$card['icon'] ?? null"
                    :title="$card['title'] ?? null"
                    :description="$card['description'] ?? null"
                />
            @endforeach
        </div>
    </div>
</section>

@props([
    'eyebrow' => 'Operating Principles',
    'heading' => 'How we approach every engagement.',
    'items' => [],
])

@php
    $items = count($items) ? $items : [
        ['icon' => \App\Support\HeroIconRegistry::path('check-circle'), 'title' => 'Practicality', 'description' => 'We focus on what works in the real world — not what looks good in a presentation.'],
        ['icon' => \App\Support\HeroIconRegistry::path('user-duo'), 'title' => 'Collaboration', 'description' => 'We work alongside clients and partners — not above them — to build shared understanding and shared progress.'],
        ['icon' => 'M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0 0 12 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 0 1-2.031.352 5.988 5.988 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971Zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 0 1-2.031.352 5.989 5.989 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971Z', 'title' => 'Integrity', 'description' => 'We are honest about what we can deliver, transparent in our communication, and consistent in our conduct.'],
        ['icon' => \App\Support\HeroIconRegistry::path('shield-check'), 'title' => 'Accountability', 'description' => 'We own our commitments. When things need to change, we communicate clearly and act responsibly.'],
        ['icon' => 'M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99', 'title' => 'Continuous Improvement', 'description' => 'We learn from every engagement and apply those lessons to do better work — for clients and for ourselves.'],
    ];

    $badgeStyles = [
        ['card' => 'bg-white', 'badge' => 'bg-[#07172f]', 'icon' => 'text-[#c9a24d]', 'title' => 'text-[#07172f]', 'description' => 'text-[#667085]'],
        ['card' => 'bg-white', 'badge' => 'bg-[#123f8c]', 'icon' => 'text-white', 'title' => 'text-[#07172f]', 'description' => 'text-[#667085]'],
        ['card' => 'bg-white', 'badge' => 'bg-[#c9a24d]', 'icon' => 'text-[#07172f]', 'title' => 'text-[#07172f]', 'description' => 'text-[#667085]'],
        ['card' => 'bg-white', 'badge' => 'bg-[#07172f]', 'icon' => 'text-[#c9a24d]', 'title' => 'text-[#07172f]', 'description' => 'text-[#667085]'],
    ];
@endphp

<section class="bg-[#f7f3ea]">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <div class="tlg-reveal max-w-2xl">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">{{ $eyebrow }}</p>
            @endif
            @if ($heading)
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">{{ $heading }}</h2>
            @endif
        </div>
        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-5">
            @foreach ($items as $index => $item)
                @php
                    $isLast = $index === count($items) - 1 && count($items) >= 5;
                    $style = $badgeStyles[$index % count($badgeStyles)];
                @endphp
                @if ($isLast)
                    <div class="tlg-reveal tlg-d4 rounded-3xl bg-[#07172f] p-7 text-center shadow-sm sm:col-span-2 lg:col-span-1">
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10">
                            @if ($item['icon'] ?? null)
                                <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/></svg>
                            @endif
                        </div>
                        <h3 class="mt-5 font-bold text-white">{{ $item['title'] ?? '' }}</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-300">{{ $item['description'] ?? '' }}</p>
                    </div>
                @else
                    <div class="tlg-reveal tlg-d{{ ($index % 4) + 1 }} rounded-3xl border border-[#e6e8ee] {{ $style['card'] }} p-7 text-center shadow-sm">
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl {{ $style['badge'] }}">
                            @if ($item['icon'] ?? null)
                                <svg class="h-6 w-6 {{ $style['icon'] }}" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}"/></svg>
                            @endif
                        </div>
                        <h3 class="mt-5 font-bold {{ $style['title'] }}">{{ $item['title'] ?? '' }}</h3>
                        <p class="mt-3 text-sm leading-6 {{ $style['description'] }}">{{ $item['description'] ?? '' }}</p>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>

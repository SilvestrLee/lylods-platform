{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Community Projects

Future Enterprise Section Candidate:
Process Steps

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'eyebrow' => null,
    'heading' => null,
    'body' => null,
    'image' => null,
    'imageAlt' => null,
    'steps' => [],
])

@php
    $eyebrow = $eyebrow ?? 'Our Role';
    $heading = $heading ?? 'We help you move from idea to action.';
    $body = $body ?? 'The Lylods Group acts as a practical delivery partner — helping community projects gain clarity, structure, coordination and momentum at every stage.';
    $image = $image ?? asset('images/placeholders/community-placeholder.svg');
    $imageAlt = $imageAlt ?: 'Project planning and coordination session';

    $steps = count($steps) ? $steps : [
        ['description' => 'Clarifying project goals so everyone involved understands the purpose and direction'],
        ['description' => 'Organising ideas into practical, sequenced actions with clear ownership'],
        ['description' => 'Coordinating stakeholders so communication is structured and progress is shared'],
        ['description' => 'Supporting planning and communication across all phases of delivery'],
        ['description' => 'Identifying delivery needs — people, resources, processes and timelines'],
        ['description' => 'Helping track progress and flag issues before they become blockers'],
        ['description' => 'Supporting documentation and reporting so outcomes are evidenced clearly'],
    ];
@endphp

<section class="bg-[#07172f] text-white">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <div class="tlg-reveal grid gap-14 lg:grid-cols-[1fr_1fr] lg:items-start">
            <div>
                @if ($eyebrow)
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $eyebrow }}</p>
                @endif
                @if ($heading)
                    <h2 class="mt-4 font-serif text-4xl font-bold lg:text-[2.4rem]">{{ $heading }}</h2>
                @endif
                @if ($body)
                    <p class="mt-5 leading-8 text-slate-300">{{ $body }}</p>
                @endif
                <div class="mt-8 overflow-hidden rounded-2xl border border-white/10">
                    <img src="{{ $image }}" alt="{{ $imageAlt }}" class="h-60 w-full object-cover object-center">
                </div>
            </div>
            <div class="space-y-4">
                @foreach ($steps as $index => $step)
                    <div class="tlg-reveal flex items-start gap-5 rounded-2xl border border-white/10 bg-white/5 px-6 py-5 transition-all duration-300 hover:bg-white/10">
                        <span class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-[#c9a24d]/15 text-[10px] font-bold text-[#c9a24d]">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <p class="text-sm leading-6 text-slate-300">{{ $step['description'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

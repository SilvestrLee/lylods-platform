{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Property

Future Enterprise Section Candidate:
Process Steps

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'eyebrow' => null,
    'heading' => null,
    'body' => null,
    'steps' => [],
    'networkEyebrow' => null,
    'networkHeading' => null,
    'networkBody' => null,
    'networkFootnote' => null,
    'tags' => [],
])

@php
    $checkIcon = \App\Support\HeroIconRegistry::path('check-circle');

    $eyebrow = $eyebrow ?? 'Our Role';
    $heading = $heading ?? 'How The Lylods Group works with you.';
    $body = $body ?? "We coordinate, structure, facilitate and manage property processes — acting as the practical point of organisation between you and the professionals, parties and workstreams involved in your property opportunity.\n\nWe are not a regulated property firm. We do not provide legal, financial, surveying, planning or architectural services. Where these are needed, we work with or introduce clients to the right independent professionals.";
    $paragraphs = preg_split('/\r?\n\r?\n/', trim($body));

    $steps = count($steps) ? $steps : [
        ['title' => 'We coordinate', 'description' => 'Managing workstreams, timelines, parties and communications so your property process stays organised and progresses.'],
        ['title' => 'We structure', 'description' => 'Packaging and presenting opportunities clearly — with documentation, information and context needed to support decision-making.'],
        ['title' => 'We facilitate', 'description' => 'Moving projects forward by coordinating decisions, introductions, and the practical steps between all parties involved.'],
        ['title' => 'We connect', 'description' => 'Introducing clients to appropriately qualified independent professionals where specialist or regulated advice is required.'],
    ];

    $networkEyebrow = $networkEyebrow ?? 'Our Professional Network';
    $networkHeading = $networkHeading ?? 'Independent professionals we work with.';
    $networkBody = $networkBody ?? 'Where specialist or regulated advice is required, we work alongside or introduce clients to relevant qualified professionals. These introductions are made to appropriately qualified independent practitioners.';
    $networkFootnote = $networkFootnote ?? 'All professional introductions are to independent, qualified practitioners. The Lylods Group does not provide regulated advice.';

    $tags = count($tags) ? $tags : [
        ['label' => 'Solicitors'],
        ['label' => 'Surveyors'],
        ['label' => 'Planners'],
        ['label' => 'Brokers'],
        ['label' => 'Architects'],
        ['label' => 'Contractors'],
        ['label' => 'Financial Advisers'],
    ];
@endphp

<section class="bg-[#07172f] text-white">
    <div class="mx-auto max-w-[1440px] px-6 py-24">
        <div class="grid gap-16 lg:grid-cols-2 lg:items-start">

            <div class="tlg-reveal">
                @if ($eyebrow)
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $eyebrow }}</p>
                @endif
                @if ($heading)
                    <h2 class="mt-4 font-serif text-4xl font-bold lg:text-[2.4rem]">{{ $heading }}</h2>
                @endif
                @foreach ($paragraphs as $index => $paragraph)
                    @if ($index === 0)
                        <p class="mt-6 text-lg leading-8 text-slate-300">{{ $paragraph }}</p>
                    @else
                        <p class="mt-5 leading-8 text-slate-400">{{ $paragraph }}</p>
                    @endif
                @endforeach

                <div class="mt-10 space-y-4">
                    @foreach ($steps as $step)
                        <div class="flex items-start gap-4 rounded-2xl border border-white/10 bg-white/5 p-5">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $checkIcon }}"/></svg>
                            <div>
                                @if ($step['title'] ?? null)
                                    <p class="font-semibold text-white">{{ $step['title'] }}</p>
                                @endif
                                @if ($step['description'] ?? null)
                                    <p class="mt-1 text-sm leading-6 text-slate-400">{{ $step['description'] }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="tlg-reveal tlg-d1">
                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-10">
                    @if ($networkEyebrow)
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $networkEyebrow }}</p>
                    @endif
                    @if ($networkHeading)
                        <h3 class="mt-4 text-xl font-bold text-white lg:text-[1.75rem]">{{ $networkHeading }}</h3>
                    @endif
                    @if ($networkBody)
                        <p class="mt-4 text-sm leading-7 text-slate-400">{{ $networkBody }}</p>
                    @endif

                    <div class="mt-8 grid gap-3 sm:grid-cols-2">
                        @foreach ($tags as $index => $tag)
                            <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 px-4 py-3 {{ $index === count($tags) - 1 && count($tags) % 2 !== 0 ? 'sm:col-span-2' : '' }}">
                                <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $checkIcon }}"/></svg>
                                <span class="text-sm font-semibold text-white">{{ $tag['label'] ?? '' }}</span>
                            </div>
                        @endforeach
                    </div>

                    @if ($networkFootnote)
                        <p class="mt-6 text-xs leading-6 text-slate-500">{{ $networkFootnote }}</p>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>

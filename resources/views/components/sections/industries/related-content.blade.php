@props([
    'caseStudies' => [],
    'insights' => [],
])

@php
    $hasCaseStudies = count($caseStudies) > 0;
    $hasInsights = count($insights) > 0;
@endphp

@if ($hasCaseStudies || $hasInsights)
<section class="bg-[#f7f3ea]">
    <div class="mx-auto max-w-[1440px] px-6 pb-20">
        <div class="tlg-reveal max-w-2xl">
            <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Read More</p>
            <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">Case studies and insights across our industries.</h2>
        </div>

        @if ($hasCaseStudies)
        <div class="mt-12">
            <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-[#123f8c]">Case Studies</h3>
            <div class="mt-5 grid gap-5 sm:grid-cols-3">
                @foreach ($caseStudies as $caseStudy)
                    <a href="{{ route('case-study', $caseStudy->slug) }}" class="tlg-reveal block rounded-2xl border border-[#e6e8ee] bg-white p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                        @if ($caseStudy->featuredMedia)
                            <div class="mb-4 aspect-[4/3] w-full overflow-hidden rounded-2xl">
                                <img src="{{ $caseStudy->featuredMedia->url() }}" alt="{{ $caseStudy->featuredMedia->alt_text ?: $caseStudy->title }}" loading="lazy" decoding="async" class="h-full w-full object-cover">
                            </div>
                        @endif
                        @if ($caseStudy->industry)
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#c9a24d]">{{ $caseStudy->industry }}</p>
                        @endif
                        <h4 class="mt-2 font-serif text-lg font-bold text-[#07172f]">{{ $caseStudy->title }}</h4>
                        @if ($caseStudy->summary)
                            <p class="mt-2 text-sm leading-6 text-[#667085]">{{ \Illuminate\Support\Str::limit($caseStudy->summary, 110) }}</p>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
        @endif

        @if ($hasInsights)
        <div class="mt-12">
            <h3 class="text-xs font-bold uppercase tracking-[0.2em] text-[#123f8c]">Insights</h3>
            <div class="mt-5 grid gap-5 sm:grid-cols-3">
                @foreach ($insights as $insight)
                    <a href="{{ route('insight', $insight->slug) }}" class="tlg-reveal block rounded-2xl border border-[#e6e8ee] bg-white p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                        @if ($insight->featuredMedia)
                            <div class="mb-4 aspect-[4/3] w-full overflow-hidden rounded-2xl">
                                <img src="{{ $insight->featuredMedia->url() }}" alt="{{ $insight->featuredMedia->alt_text ?: $insight->title }}" loading="lazy" decoding="async" class="h-full w-full object-cover">
                            </div>
                        @endif
                        @if ($insight->category)
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#c9a24d]">{{ $insight->category }}</p>
                        @endif
                        <h4 class="mt-2 font-serif text-lg font-bold text-[#07172f]">{{ $insight->title }}</h4>
                        @if ($insight->excerpt)
                            <p class="mt-2 text-sm leading-6 text-[#667085]">{{ \Illuminate\Support\Str::limit($insight->excerpt, 110) }}</p>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endif

<x-layouts.public
    :title="$caseStudy->seo_title ?? $caseStudy->title . ' — The Lylods Group'"
    :description="$caseStudy->seo_description ?? $caseStudy->summary"
    :canonical="$caseStudy->canonical_url"
    :robots="$caseStudy->robots"
    :og-image="$caseStudy->featuredMedia?->url()">

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        <div class="relative mx-auto max-w-[1440px] px-6 py-24">
            <div class="tlg-reveal max-w-4xl">
                <a href="{{ route('case-studies') }}"
                   class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d] hover:text-[#d8b765]">
                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                    </svg>
                    Case Studies
                </a>
                @if ($caseStudy->industry)
                    <span class="ml-4 rounded-full bg-[#c9a24d]/20 px-3.5 py-1.5 text-xs font-bold uppercase tracking-wider text-[#c9a24d]">{{ $caseStudy->industry }}</span>
                @endif
                <h1 class="mt-6 font-serif text-4xl font-bold leading-tight tracking-tight md:text-5xl">{{ $caseStudy->title }}</h1>
                @if ($caseStudy->summary)
                    <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-300">{{ $caseStudy->summary }}</p>
                @endif
                @if ($caseStudy->published_at)
                    <p class="mt-4 text-xs font-medium text-slate-400">Published {{ $caseStudy->published_at->format('d F Y') }}</p>
                @endif
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-16">
            <div class="mx-auto max-w-4xl">

                {{-- Note --}}
                <div class="tlg-reveal mb-8 inline-flex items-center gap-2 rounded-full border border-[#e6e8ee] bg-[#f7f3ea] px-4 py-2">
                    <svg class="h-3.5 w-3.5 text-[#c9a24d]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z" clip-rule="evenodd"/></svg>
                    <span class="text-xs font-semibold text-[#07172f]">Details have been anonymised. This is an illustrative engagement example.</span>
                </div>

                <div class="tlg-reveal space-y-0 divide-y divide-[#e6e8ee] overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">

                    @if ($caseStudy->challenge)
                        <div class="px-10 py-8">
                            <p class="text-xs font-bold uppercase tracking-wider text-[#c9a24d]">The Challenge</p>
                            <p class="mt-4 leading-8 text-[#667085]">{{ $caseStudy->challenge }}</p>
                        </div>
                    @endif

                    @if ($caseStudy->our_role)
                        <div class="px-10 py-8">
                            <p class="text-xs font-bold uppercase tracking-wider text-[#123f8c]">Our Role</p>
                            <p class="mt-4 leading-8 text-[#667085]">{{ $caseStudy->our_role }}</p>
                        </div>
                    @endif

                    @if ($caseStudy->outcome)
                        <div class="px-10 py-8">
                            <p class="text-xs font-bold uppercase tracking-wider text-[#07172f]">The Outcome</p>
                            <p class="mt-4 leading-8 text-[#667085]">{{ $caseStudy->outcome }}</p>
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal overflow-hidden rounded-[2rem] bg-[#07172f] px-8 py-16 text-white md:px-14">
                <div class="grid gap-10 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Work With Us</p>
                        <h2 class="mt-4 font-serif text-3xl font-bold leading-tight lg:text-4xl">Have a project we can help structure?</h2>
                        <p class="mt-5 max-w-2xl leading-8 text-slate-300">Talk to us about your business, technology, training, compliance, property or community development needs.</p>
                    </div>
                    <div class="flex shrink-0 flex-wrap gap-3">
                        <a href="{{ route('contact') }}" class="inline-flex justify-center rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">Discuss Your Project</a>
                        <a href="{{ route('case-studies') }}" class="inline-flex justify-center rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">More Case Studies</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>

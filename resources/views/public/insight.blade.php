<x-layouts.public
    :title="$insight->seo_title ?? $insight->title . ' — The Lylods Group'"
    :description="$insight->seo_description ?? $insight->excerpt"
    :canonical="$insight->canonical_url"
    :robots="$insight->robots"
    :og-image="$insight->featuredMedia?->url()">

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        <div class="relative mx-auto max-w-[1440px] px-6 py-24">
            <div class="tlg-reveal max-w-4xl">
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('insights') }}"
                       class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d] hover:text-[#d8b765]">
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                        </svg>
                        Insights
                    </a>
                    @if ($insight->category)
                        <span class="rounded-full bg-[#c9a24d]/20 px-3.5 py-1.5 text-xs font-bold uppercase tracking-wider text-[#c9a24d]">{{ $insight->category }}</span>
                    @endif
                </div>
                <h1 class="mt-6 font-serif text-4xl font-bold leading-tight tracking-tight md:text-5xl">{{ $insight->title }}</h1>
                @if ($insight->excerpt)
                    <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-300">{{ $insight->excerpt }}</p>
                @endif
                <div class="mt-5 flex flex-wrap items-center gap-4 text-xs text-slate-400">
                    @if ($insight->author)
                        <span>By {{ $insight->author }}</span>
                    @endif
                    @if ($insight->published_at)
                        <span>{{ $insight->published_at->format('d F Y') }}</span>
                    @endif
                    @if ($insight->reading_time)
                        <span>{{ $insight->reading_time }} min read</span>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Article body --}}
    @if ($insight->content)
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-16">
            <div class="tlg-reveal prose prose-slate prose-lg mx-auto max-w-3xl prose-headings:font-serif prose-headings:text-[#07172f] prose-a:text-[#123f8c] prose-a:no-underline hover:prose-a:underline">
                {!! nl2br(e($insight->content)) !!}
            </div>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal overflow-hidden rounded-[2rem] bg-[#07172f] px-8 py-16 text-white md:px-14">
                <div class="grid gap-10 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Work With Us</p>
                        <h2 class="mt-4 font-serif text-3xl font-bold leading-tight lg:text-4xl">Need practical guidance for your next step?</h2>
                        <p class="mt-5 max-w-2xl leading-8 text-slate-300">Talk to us about your business, technology, compliance, training, property or community development needs.</p>
                    </div>
                    <div class="flex shrink-0 flex-wrap gap-3">
                        <a href="{{ route('contact') }}" class="inline-flex justify-center rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">Discuss Your Project</a>
                        <a href="{{ route('insights') }}" class="inline-flex justify-center rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">More Insights</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>

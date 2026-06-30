<x-layouts.public
    :title="$page->meta_title ?? 'Insights and News — The Lylods Group'"
    :description="$page->meta_description"
    :canonical="$page?->canonical_url"
    :robots="$page?->robots"
    :og-image="$page?->ogMedia?->url()">

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        <div class="relative mx-auto max-w-[1440px] px-6 py-28">
            <div class="tlg-reveal max-w-4xl">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">{{ $page->hero_subtitle }}</p>
                <h1 class="mt-6 font-serif text-4xl font-bold leading-tight tracking-tight md:text-5xl lg:text-[3.2rem]">{{ $page->hero_title }}</h1>
                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-200">{{ $page->hero_description }}</p>
                @if($page->primary_cta_label || $page->secondary_cta_label)
                <div class="mt-10 flex flex-wrap gap-4">
                    @if($page->primary_cta_label && $page->primary_cta_url)
                    <a href="{{ $page->primary_cta_url }}" class="rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">{{ $page->primary_cta_label }}</a>
                    @endif
                    @if($page->secondary_cta_label && $page->secondary_cta_url)
                    <a href="{{ $page->secondary_cta_url }}" class="rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">{{ $page->secondary_cta_label }}</a>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Featured Insight --}}
    @php $featured = $insights->firstWhere('featured', true) ?? $insights->first(); @endphp
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 pt-20 pb-0">
            <div class="tlg-reveal mb-8">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Featured</p>
            </div>
            @if ($featured)
            <div class="tlg-reveal overflow-hidden rounded-[2rem] border border-[#e6e8ee] shadow-sm lg:grid lg:grid-cols-[1fr_1.1fr]">
                <div class="relative flex min-h-[280px] items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#123f8c] to-[#07172f] lg:min-h-full">
                    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 70% 30%, #c9a24d 0%, transparent 55%)"></div>
                    <svg class="h-28 w-28 text-white/15" fill="none" stroke="currentColor" stroke-width="0.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18"/></svg>
                    <div class="absolute bottom-5 left-6 flex items-center gap-2">
                        <div class="h-1.5 w-1.5 rounded-full bg-[#c9a24d]"></div>
                        <div class="h-1.5 w-16 rounded-full bg-[#c9a24d]/30"></div>
                        <div class="h-1.5 w-6 rounded-full bg-[#c9a24d]/15"></div>
                    </div>
                </div>
                <div class="flex flex-col justify-center bg-[#f7f3ea] px-10 py-12">
                    <div class="flex items-center gap-3">
                        @if ($featured->category)
                            <span class="rounded-full bg-[#07172f] px-3.5 py-1.5 text-[10px] font-bold uppercase tracking-wider text-[#c9a24d]">{{ $featured->category }}</span>
                        @endif
                        @if ($featured->published_at)
                            <span class="text-xs text-[#667085]">{{ $featured->published_at->format('F Y') }}</span>
                        @endif
                    </div>
                    <h2 class="mt-5 font-serif text-2xl font-bold leading-snug text-[#07172f] md:text-3xl">{{ $featured->title }}</h2>
                    @if ($featured->excerpt)
                        <p class="mt-4 leading-7 text-[#667085]">{{ $featured->excerpt }}</p>
                    @endif
                    <div class="mt-8">
                        <a href="{{ route('insight', $featured->slug) }}"
                           class="inline-flex items-center gap-2 text-sm font-bold text-[#123f8c] hover:text-[#07172f]">
                            Read article
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            @else
            <div class="tlg-reveal overflow-hidden rounded-[2rem] border border-[#e6e8ee] shadow-sm lg:grid lg:grid-cols-[1fr_1.1fr]">
                <div class="relative flex min-h-[280px] items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#123f8c] to-[#07172f] lg:min-h-full">
                    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 70% 30%, #c9a24d 0%, transparent 55%)"></div>
                    <svg class="h-28 w-28 text-white/15" fill="none" stroke="currentColor" stroke-width="0.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18"/></svg>
                    <div class="absolute bottom-5 left-6 flex items-center gap-2">
                        <div class="h-1.5 w-1.5 rounded-full bg-[#c9a24d]"></div>
                        <div class="h-1.5 w-16 rounded-full bg-[#c9a24d]/30"></div>
                        <div class="h-1.5 w-6 rounded-full bg-[#c9a24d]/15"></div>
                    </div>
                </div>
                <div class="flex flex-col justify-center bg-[#f7f3ea] px-10 py-12">
                    <div class="flex items-center gap-3">
                        <span class="rounded-full bg-[#07172f] px-3.5 py-1.5 text-[10px] font-bold uppercase tracking-wider text-[#c9a24d]">Business</span>
                        <span class="text-xs text-[#667085]">June 2026</span>
                    </div>
                    <h2 class="mt-5 font-serif text-2xl font-bold leading-snug text-[#07172f] md:text-3xl">How practical structure helps turn ideas into sustainable opportunities</h2>
                    <p class="mt-4 leading-7 text-[#667085]">Good ideas need more than ambition. They need planning, coordination, the right support and a clear route from intention to delivery.</p>
                    <div class="mt-8">
                        <span class="inline-flex items-center gap-2 text-sm font-bold text-[#123f8c]">
                            Article coming soon
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                        </span>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>

    {{-- Article Categories --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-12">
            <div class="tlg-reveal flex flex-wrap items-center gap-3">
                <span class="text-xs font-bold uppercase tracking-wider text-[#667085]">Browse by topic:</span>
                <span class="cursor-default rounded-full border border-[#07172f] bg-[#07172f] px-4 py-2 text-xs font-bold text-[#c9a24d]">All</span>
                <span class="cursor-default rounded-full border border-[#e6e8ee] bg-white px-4 py-2 text-xs font-semibold text-[#667085] transition-colors hover:border-[#07172f] hover:text-[#07172f]">Business</span>
                <span class="cursor-default rounded-full border border-[#e6e8ee] bg-white px-4 py-2 text-xs font-semibold text-[#667085] transition-colors hover:border-[#07172f] hover:text-[#07172f]">Technology</span>
                <span class="cursor-default rounded-full border border-[#e6e8ee] bg-white px-4 py-2 text-xs font-semibold text-[#667085] transition-colors hover:border-[#07172f] hover:text-[#07172f]">Training</span>
                <span class="cursor-default rounded-full border border-[#e6e8ee] bg-white px-4 py-2 text-xs font-semibold text-[#667085] transition-colors hover:border-[#07172f] hover:text-[#07172f]">Compliance</span>
                <span class="cursor-default rounded-full border border-[#e6e8ee] bg-white px-4 py-2 text-xs font-semibold text-[#667085] transition-colors hover:border-[#07172f] hover:text-[#07172f]">Property</span>
                <span class="cursor-default rounded-full border border-[#e6e8ee] bg-white px-4 py-2 text-xs font-semibold text-[#667085] transition-colors hover:border-[#07172f] hover:text-[#07172f]">Community</span>
            </div>
        </div>
    </section>

    {{-- Article Cards --}}
    {{-- Future CMS-managed insights --}}
    <section class="border-t border-[#e6e8ee] bg-white">
        <div class="mx-auto max-w-[1440px] px-6 pb-24">
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                {{-- Article 1: Business --}}
                <div class="tlg-reveal tlg-d1 flex flex-col overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">
                    {{-- Future CMS-managed image --}}
                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#123f8c] to-[#07172f]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 65% 35%, #c9a24d 0%, transparent 55%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col p-7">
                        <div class="flex items-center gap-3">
                            <span class="rounded-full bg-[#f7f3ea] px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-[#07172f]">Business</span>
                            <span class="text-[11px] text-[#667085]">June 2026</span>
                        </div>
                        <h3 class="mt-4 font-serif text-base font-bold leading-snug text-[#07172f]">Why small organisations need clear systems before they scale</h3>
                        <p class="mt-3 flex-1 text-sm leading-6 text-[#667085]">Growth without structure creates problems that are harder to fix later. The foundations matter more than the speed.</p>
                        <div class="mt-5 border-t border-[#e6e8ee] pt-4">
                            <span class="text-xs font-semibold uppercase tracking-wider text-[#667085]">Coming Soon</span>
                        </div>
                    </div>
                </div>

                {{-- Article 2: Technology --}}
                <div class="tlg-reveal tlg-d2 flex flex-col overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">
                    {{-- Future CMS-managed image --}}
                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#0d2d5e] to-[#123f8c]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 65%, #c9a24d 0%, transparent 55%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0H3"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col p-7">
                        <div class="flex items-center gap-3">
                            <span class="rounded-full bg-[#f7f3ea] px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-[#07172f]">Technology</span>
                            <span class="text-[11px] text-[#667085]">June 2026</span>
                        </div>
                        <h3 class="mt-4 font-serif text-base font-bold leading-snug text-[#07172f]">Making digital transformation practical for everyday operations</h3>
                        <p class="mt-3 flex-1 text-sm leading-6 text-[#667085]">The most effective digital changes are not always the most complex. Starting with clarity is more valuable than starting with technology.</p>
                        <div class="mt-5 border-t border-[#e6e8ee] pt-4">
                            <span class="text-xs font-semibold uppercase tracking-wider text-[#667085]">Coming Soon</span>
                        </div>
                    </div>
                </div>

                {{-- Article 3: Compliance --}}
                <div class="tlg-reveal tlg-d3 flex flex-col overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">
                    {{-- Future CMS-managed image --}}
                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-gradient-to-br from-[#051220] via-[#07172f] to-[#0a1f42]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 60% 40%, #c9a24d 0%, transparent 50%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col p-7">
                        <div class="flex items-center gap-3">
                            <span class="rounded-full bg-[#f7f3ea] px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-[#07172f]">Compliance</span>
                            <span class="text-[11px] text-[#667085]">June 2026</span>
                        </div>
                        <h3 class="mt-4 font-serif text-base font-bold leading-snug text-[#07172f]">What businesses should understand about data protection readiness</h3>
                        <p class="mt-3 flex-1 text-sm leading-6 text-[#667085]">Data protection obligations affect every organisation. Understanding where you stand is the first step toward managing it confidently.</p>
                        <div class="mt-5 border-t border-[#e6e8ee] pt-4">
                            <span class="text-xs font-semibold uppercase tracking-wider text-[#667085]">Coming Soon</span>
                        </div>
                    </div>
                </div>

                {{-- Article 4: Training --}}
                <div class="tlg-reveal tlg-d1 flex flex-col overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">
                    {{-- Future CMS-managed image --}}
                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#0d2d5e] to-[#07172f]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 35% 65%, #c9a24d 0%, transparent 55%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col p-7">
                        <div class="flex items-center gap-3">
                            <span class="rounded-full bg-[#f7f3ea] px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-[#07172f]">Training</span>
                            <span class="text-[11px] text-[#667085]">June 2026</span>
                        </div>
                        <h3 class="mt-4 font-serif text-base font-bold leading-snug text-[#07172f]">How training and capacity building support stronger teams</h3>
                        <p class="mt-3 flex-1 text-sm leading-6 text-[#667085]">Investing in people through structured learning creates compounding returns — in confidence, retention and organisational capability.</p>
                        <div class="mt-5 border-t border-[#e6e8ee] pt-4">
                            <span class="text-xs font-semibold uppercase tracking-wider text-[#667085]">Coming Soon</span>
                        </div>
                    </div>
                </div>

                {{-- Article 5: Property --}}
                <div class="tlg-reveal tlg-d2 flex flex-col overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">
                    {{-- Future CMS-managed image --}}
                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#0e243d] to-[#1a3a5c]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 70% 30%, #c9a24d 0%, transparent 55%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col p-7">
                        <div class="flex items-center gap-3">
                            <span class="rounded-full bg-[#f7f3ea] px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-[#07172f]">Property</span>
                            <span class="text-[11px] text-[#667085]">June 2026</span>
                        </div>
                        <h3 class="mt-4 font-serif text-base font-bold leading-snug text-[#07172f]">Understanding property coordination before development begins</h3>
                        <p class="mt-3 flex-1 text-sm leading-6 text-[#667085]">Coordination and structure before any commitment is made reduces risk, clarifies responsibility and sets projects on a more solid footing.</p>
                        <div class="mt-5 border-t border-[#e6e8ee] pt-4">
                            <span class="text-xs font-semibold uppercase tracking-wider text-[#667085]">Coming Soon</span>
                        </div>
                    </div>
                </div>

                {{-- Article 6: Community --}}
                <div class="tlg-reveal tlg-d3 flex flex-col overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">
                    {{-- Future CMS-managed image --}}
                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#102a50] to-[#07172f]">
                        <div class="absolute inset-0 opacity-12" style="background-image: radial-gradient(circle at 25% 60%, #c9a24d 0%, transparent 50%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col p-7">
                        <div class="flex items-center gap-3">
                            <span class="rounded-full bg-[#f7f3ea] px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-[#07172f]">Community</span>
                            <span class="text-[11px] text-[#667085]">June 2026</span>
                        </div>
                        <h3 class="mt-4 font-serif text-base font-bold leading-snug text-[#07172f]">Building community projects with structure and accountability</h3>
                        <p class="mt-3 flex-1 text-sm leading-6 text-[#667085]">Community initiatives succeed when there is clear ownership, structured delivery and a shared understanding of what the outcome should look like.</p>
                        <div class="mt-5 border-t border-[#e6e8ee] pt-4">
                            <span class="text-xs font-semibold uppercase tracking-wider text-[#667085]">Coming Soon</span>
                        </div>
                    </div>
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
                        <h2 class="mt-4 font-serif text-3xl font-bold leading-tight lg:text-4xl">Need practical guidance for your next step?</h2>
                        <p class="mt-5 max-w-2xl leading-8 text-slate-300">Talk to us about your business, technology, compliance, training, property or community development needs.</p>
                    </div>
                    <div class="flex shrink-0 flex-wrap gap-3">
                        <a href="{{ route('contact') }}" class="inline-flex justify-center rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">Discuss Your Project</a>
                        <a href="{{ route('contact') }}" class="inline-flex justify-center rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>

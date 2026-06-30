<x-layouts.public
    :title="$page->meta_title ?? 'About Us — The Lylods Group'"
    :description="$page->meta_description">

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
                    <a href="{{ $page->primary_cta_url }}" class="rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] shadow-lg transition-all duration-300 hover:bg-[#d8b765]">{{ $page->primary_cta_label }}</a>
                    @endif
                    @if($page->secondary_cta_label && $page->secondary_cta_url)
                    <a href="{{ $page->secondary_cta_url }}" class="rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">{{ $page->secondary_cta_label }}</a>
                    @endif
                </div>
                @endif
            </div>
        </div>
        <div class="absolute inset-0 -z-10 opacity-10" style="background-image: radial-gradient(circle at 80% 20%, #c9a24d 0%, transparent 50%), radial-gradient(circle at 20% 80%, #123f8c 0%, transparent 50%)"></div>
    </section>

    {{-- Section One: Who We Are --}}
    {{-- Future CMS-managed content --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto grid max-w-[1440px] gap-16 px-6 py-24 lg:grid-cols-2 lg:items-center">
            <div class="tlg-reveal">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">Who We Are</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">Practical experience. Structured delivery. Lasting results.</h2>
                <div class="mt-6 space-y-5 text-lg leading-8 text-[#667085]">
                    <p>The Lylods Group brings together practical experience, strategic thinking and coordinated delivery to help clients move confidently from ideas to implementation.</p>
                    <p>We work with businesses, entrepreneurs, charities, investors, community organisations and public-sector partners to support growth, development and long-term impact.</p>
                </div>
                <a href="{{ route('contact') }}" class="mt-8 inline-flex items-center gap-2 rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white transition-all duration-300 hover:bg-[#123f8c]">
                    Discuss Your Requirements
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>
            {{-- Future CMS-managed content --}}
            <div class="tlg-reveal tlg-d1 relative flex min-h-[420px] items-center justify-center overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#07172f] via-[#123f8c] to-[#07172f] shadow-2xl">
                <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 70% 30%, #c9a24d 0%, transparent 55%)"></div>
                <svg class="h-28 w-28 text-white/15" fill="none" stroke="currentColor" stroke-width="0.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                <div class="absolute bottom-6 left-7">
                    <p class="text-xs font-bold uppercase tracking-widest text-[#c9a24d]">Professional consultation imagery</p>
                    <p class="mt-1 text-[11px] text-white/40">Future CMS-managed image</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section Two: How We Work --}}
    <section class="bg-[#07172f] text-white">
        <div class="mx-auto max-w-[1440px] px-6 py-24">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">How We Work</p>
                <h2 class="mt-4 font-serif text-4xl font-bold lg:text-[2.4rem]">From intention to implementation.</h2>
                <p class="mt-5 leading-7 text-slate-300">Our approach is consistent, practical and client-led at every stage.</p>
            </div>
            <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <div class="tlg-reveal tlg-d1 rounded-[1.75rem] border border-white/10 bg-white/5 p-8 transition-all duration-300 hover:bg-white/10">
                    <span class="inline-block rounded-full bg-[#c9a24d]/15 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#c9a24d]">01</span>
                    <h3 class="mt-5 text-lg font-bold text-white">Understand</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-400">We take time to understand objectives, challenges and priorities before recommending any path forward.</p>
                </div>
                <div class="tlg-reveal tlg-d2 rounded-[1.75rem] border border-white/10 bg-white/5 p-8 transition-all duration-300 hover:bg-white/10">
                    <span class="inline-block rounded-full bg-[#c9a24d]/15 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#c9a24d]">02</span>
                    <h3 class="mt-5 text-lg font-bold text-white">Plan</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-400">We help organise ideas into practical actions and achievable outcomes — with clear steps and realistic timelines.</p>
                </div>
                <div class="tlg-reveal tlg-d3 rounded-[1.75rem] border border-white/10 bg-white/5 p-8 transition-all duration-300 hover:bg-white/10">
                    <span class="inline-block rounded-full bg-[#c9a24d]/15 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#c9a24d]">03</span>
                    <h3 class="mt-5 text-lg font-bold text-white">Coordinate</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-400">We bring together the right people, services and expertise where needed — managing relationships and workstreams so you don't have to.</p>
                </div>
                <div class="tlg-reveal tlg-d4 rounded-[1.75rem] bg-[#c9a24d] p-8 transition-all duration-300 hover:brightness-105">
                    <span class="inline-block rounded-full bg-[#07172f]/10 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#07172f]">04</span>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Deliver</h3>
                    <p class="mt-3 text-sm leading-6 text-[#07172f]/80">We support implementation, communication and structured progress — staying engaged until the outcome is real and measurable.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section Three: Our Areas of Focus --}}
    {{-- Future CMS-managed content --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-24">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Our Areas of Focus</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">Where we do our best work.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">Our capabilities span five core areas — each supported by practical experience, professional networks and a commitment to structured delivery.</p>
            </div>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                <div class="tlg-reveal tlg-d1 flex flex-col overflow-hidden rounded-[2rem] border border-[#e6e8ee] shadow-sm">
                    {{-- Future CMS-managed content --}}
                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#123f8c] to-[#07172f]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 65% 35%, #c9a24d 0%, transparent 55%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col bg-[#f7f3ea] p-7">
                        <h3 class="font-serif text-lg font-bold text-[#07172f]">Business &amp; Technology</h3>
                        <p class="mt-3 flex-1 text-sm leading-7 text-[#667085]">Supporting businesses to improve operations, adopt practical technology and build more efficient, sustainable systems for growth.</p>
                        <a href="{{ route('services') }}" class="mt-5 inline-flex items-center gap-1.5 text-sm font-bold text-[#123f8c] hover:text-[#07172f]">
                            Learn More <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                    </div>
                </div>

                <div class="tlg-reveal tlg-d2 flex flex-col overflow-hidden rounded-[2rem] border border-[#e6e8ee] shadow-sm">
                    {{-- Future CMS-managed content --}}
                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#0d2d5e] to-[#123f8c]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 65%, #c9a24d 0%, transparent 55%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col bg-[#f7f3ea] p-7">
                        <h3 class="font-serif text-lg font-bold text-[#07172f]">Training &amp; Capacity Building</h3>
                        <p class="mt-3 flex-1 text-sm leading-7 text-[#667085]">Designing and delivering structured learning programmes that build skills, confidence and practical capability across teams and individuals.</p>
                        <a href="{{ route('services') }}" class="mt-5 inline-flex items-center gap-1.5 text-sm font-bold text-[#123f8c] hover:text-[#07172f]">
                            Learn More <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                    </div>
                </div>

                <div class="tlg-reveal tlg-d3 flex flex-col overflow-hidden rounded-[2rem] border border-[#e6e8ee] shadow-sm">
                    {{-- Future CMS-managed content --}}
                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-gradient-to-br from-[#051220] via-[#07172f] to-[#0a1f42]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 60% 40%, #c9a24d 0%, transparent 50%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col bg-[#f7f3ea] p-7">
                        <h3 class="font-serif text-lg font-bold text-[#07172f]">Governance &amp; Compliance</h3>
                        <p class="mt-3 flex-1 text-sm leading-7 text-[#667085]">Helping organisations understand their compliance obligations, improve documentation and build internal clarity around governance and data protection.</p>
                        <a href="{{ route('services') }}" class="mt-5 inline-flex items-center gap-1.5 text-sm font-bold text-[#123f8c] hover:text-[#07172f]">
                            Learn More <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                    </div>
                </div>

                <div class="tlg-reveal tlg-d1 flex flex-col overflow-hidden rounded-[2rem] border border-[#e6e8ee] shadow-sm">
                    {{-- Future CMS-managed content --}}
                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#0e243d] to-[#1a3a5c]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 70% 30%, #c9a24d 0%, transparent 55%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col bg-[#f7f3ea] p-7">
                        <h3 class="font-serif text-lg font-bold text-[#07172f]">Property &amp; Development</h3>
                        <p class="mt-3 flex-1 text-sm leading-7 text-[#667085]">Coordinating property opportunities from initial review through to structured next steps — connecting clients with the right professionals where specialist input is needed.</p>
                        <a href="{{ route('property') }}" class="mt-5 inline-flex items-center gap-1.5 text-sm font-bold text-[#123f8c] hover:text-[#07172f]">
                            Learn More <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                    </div>
                </div>

                <div class="tlg-reveal tlg-d2 flex flex-col overflow-hidden rounded-[2rem] border border-[#e6e8ee] shadow-sm sm:col-span-2 lg:col-span-1">
                    {{-- Future CMS-managed content --}}
                    <div class="relative flex h-44 items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#102a50] to-[#07172f]">
                        <div class="absolute inset-0 opacity-12" style="background-image: radial-gradient(circle at 25% 60%, #c9a24d 0%, transparent 50%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col bg-[#f7f3ea] p-7">
                        <h3 class="font-serif text-lg font-bold text-[#07172f]">Community Projects</h3>
                        <p class="mt-3 flex-1 text-sm leading-7 text-[#667085]">Supporting community-focused initiatives with planning, structure, coordination and stakeholder communication — to make projects easier to move forward.</p>
                        <a href="{{ route('contact') }}" class="mt-5 inline-flex items-center gap-1.5 text-sm font-bold text-[#123f8c] hover:text-[#07172f]">
                            Learn More <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Section Four: Operating Principles --}}
    {{-- Future CMS-managed content --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">Operating Principles</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">How we approach every engagement.</h2>
            </div>
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-5">
                <div class="tlg-reveal tlg-d1 rounded-3xl border border-[#e6e8ee] bg-white p-7 text-center shadow-sm">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    </div>
                    <h3 class="mt-5 font-bold text-[#07172f]">Practicality</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">We focus on what works in the real world — not what looks good in a presentation.</p>
                </div>
                <div class="tlg-reveal tlg-d2 rounded-3xl border border-[#e6e8ee] bg-white p-7 text-center shadow-sm">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-[#123f8c]">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                    </div>
                    <h3 class="mt-5 font-bold text-[#07172f]">Collaboration</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">We work alongside clients and partners — not above them — to build shared understanding and shared progress.</p>
                </div>
                <div class="tlg-reveal tlg-d3 rounded-3xl border border-[#e6e8ee] bg-white p-7 text-center shadow-sm">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-[#c9a24d]">
                        <svg class="h-6 w-6 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0 0 12 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 0 1-2.031.352 5.988 5.988 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971Zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 0 1-2.031.352 5.989 5.989 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971Z"/></svg>
                    </div>
                    <h3 class="mt-5 font-bold text-[#07172f]">Integrity</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">We are honest about what we can deliver, transparent in our communication, and consistent in our conduct.</p>
                </div>
                <div class="tlg-reveal tlg-d4 rounded-3xl border border-[#e6e8ee] bg-white p-7 text-center shadow-sm">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                    </div>
                    <h3 class="mt-5 font-bold text-[#07172f]">Accountability</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">We own our commitments. When things need to change, we communicate clearly and act responsibly.</p>
                </div>
                <div class="tlg-reveal tlg-d4 rounded-3xl bg-[#07172f] p-7 text-center shadow-sm sm:col-span-2 lg:col-span-1">
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10">
                        <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99"/></svg>
                    </div>
                    <h3 class="mt-5 font-bold text-white">Continuous Improvement</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-300">We learn from every engagement and apply those lessons to do better work — for clients and for ourselves.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section Five: Who We Support --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Who We Support</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">We work with organisations and individuals at every stage.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">From early-stage entrepreneurs to established organisations and public-sector bodies — our work is shaped around what each client genuinely needs.</p>
            </div>
            <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="tlg-reveal tlg-d1 flex items-center gap-4 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-6 py-5">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#07172f]">
                        <svg class="h-4 w-4 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/></svg>
                    </div>
                    <p class="font-bold text-[#07172f]">Businesses</p>
                </div>
                <div class="tlg-reveal tlg-d2 flex items-center gap-4 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-6 py-5">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#07172f]">
                        <svg class="h-4 w-4 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18"/></svg>
                    </div>
                    <p class="font-bold text-[#07172f]">Entrepreneurs</p>
                </div>
                <div class="tlg-reveal tlg-d3 flex items-center gap-4 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-6 py-5">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#07172f]">
                        <svg class="h-4 w-4 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/></svg>
                    </div>
                    <p class="font-bold text-[#07172f]">Charities</p>
                </div>
                <div class="tlg-reveal tlg-d4 flex items-center gap-4 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-6 py-5">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#07172f]">
                        <svg class="h-4 w-4 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                    </div>
                    <p class="font-bold text-[#07172f]">Community Organisations</p>
                </div>
                <div class="tlg-reveal tlg-d1 flex items-center gap-4 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-6 py-5">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#07172f]">
                        <svg class="h-4 w-4 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819"/></svg>
                    </div>
                    <p class="font-bold text-[#07172f]">Property Owners</p>
                </div>
                <div class="tlg-reveal tlg-d2 flex items-center gap-4 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-6 py-5">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#07172f]">
                        <svg class="h-4 w-4 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21"/></svg>
                    </div>
                    <p class="font-bold text-[#07172f]">Developers</p>
                </div>
                <div class="tlg-reveal tlg-d3 flex items-center gap-4 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-6 py-5">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#07172f]">
                        <svg class="h-4 w-4 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
                    </div>
                    <p class="font-bold text-[#07172f]">Investors</p>
                </div>
                <div class="tlg-reveal tlg-d4 flex items-center gap-4 rounded-2xl border border-[#e6e8ee] bg-[#07172f] px-6 py-5">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white/10">
                        <svg class="h-4 w-4 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z"/></svg>
                    </div>
                    <p class="font-bold text-white">Public Sector Partners</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Section Six: Why Clients Choose Us --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Why Clients Choose Us</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">What makes the difference.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">Our clients come back because of how we work — not just what we deliver.</p>
            </div>
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <div class="tlg-reveal tlg-d1 flex items-start gap-5 rounded-3xl border border-[#e6e8ee] bg-white p-8">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#07172f]">Practical Support</h3>
                        <p class="mt-2 text-sm leading-7 text-[#667085]">We focus on what is achievable and useful — advice that can actually be acted on, not frameworks that sit on a shelf.</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d2 flex items-start gap-5 rounded-3xl border border-[#e6e8ee] bg-white p-8">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#07172f]">Structured Coordination</h3>
                        <p class="mt-2 text-sm leading-7 text-[#667085]">Clear communication and organised workstreams — clients always know where things stand and what comes next.</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d3 flex items-start gap-5 rounded-3xl border border-[#e6e8ee] bg-white p-8">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#07172f]">Multi-Sector Experience</h3>
                        <p class="mt-2 text-sm leading-7 text-[#667085]">Exposure across business, technology, property, training and community contexts means we bring broader perspective to every challenge.</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d1 flex items-start gap-5 rounded-3xl border border-[#e6e8ee] bg-white p-8">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#07172f]">Professional Network</h3>
                        <p class="mt-2 text-sm leading-7 text-[#667085]">Where specialist or regulated input is needed, we connect clients with appropriate, qualified independent professionals.</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d2 flex items-start gap-5 rounded-3xl border border-[#e6e8ee] bg-white p-8">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#07172f]">Tailored Engagement</h3>
                        <p class="mt-2 text-sm leading-7 text-[#667085]">No generic templates. We shape our approach around your specific situation, capacity and goals.</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d3 flex items-start gap-5 rounded-3xl bg-[#07172f] p-8">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-white/10">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-white">Focus on Outcomes</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-300">We measure success by what actually changes — not by hours logged or reports produced.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Team profiles --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">Our People</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">The team behind the work.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">Our people bring experience across business, technology, compliance, property and community development.</p>
            </div>
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @if ($teamMembers->isNotEmpty())
                    @foreach ($teamMembers as $member)
                        <div class="tlg-reveal rounded-[2rem] border border-[#e6e8ee] bg-[#f7f3ea] p-8 text-center">
                            <div class="mx-auto flex h-20 w-20 items-center justify-center overflow-hidden rounded-full bg-[#07172f]">
                                @if ($member->photo)
                                    <img src="{{ $member->photo->url() }}" alt="{{ $member->name }}" class="h-full w-full object-cover">
                                @else
                                    <svg class="h-10 w-10 text-white/40" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0"/></svg>
                                @endif
                            </div>
                            <p class="mt-5 font-bold text-[#07172f]">{{ $member->name }}</p>
                            @if ($member->role)
                                <p class="mt-1 text-xs font-semibold uppercase tracking-[0.15em] text-[#c9a24d]">{{ $member->role }}</p>
                            @endif
                            @if ($member->bio)
                                <p class="mt-3 text-sm leading-6 text-[#667085]">{{ $member->bio }}</p>
                            @endif
                            @if ($member->linkedin)
                                <a href="{{ $member->linkedin }}" target="_blank" rel="noopener" class="mt-4 inline-flex items-center gap-1.5 text-xs font-semibold text-[#123f8c] hover:text-[#07172f]">LinkedIn ↗</a>
                            @endif
                        </div>
                    @endforeach
                @else
                    <div class="tlg-reveal tlg-d1 rounded-[2rem] border border-[#e6e8ee] bg-[#f7f3ea] p-8 text-center">
                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#07172f]">
                            <svg class="h-10 w-10 text-white/40" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0"/></svg>
                        </div>
                        <p class="mt-5 font-bold text-[#07172f]">Team Member</p>
                        <p class="mt-1 text-xs font-semibold uppercase tracking-[0.15em] text-[#c9a24d]">Role / Discipline</p>
                        <p class="mt-3 text-sm leading-6 text-[#667085]">A brief professional profile will appear here, outlining experience, areas of expertise and sector background.</p>
                    </div>
                    <div class="tlg-reveal tlg-d2 rounded-[2rem] border border-[#e6e8ee] bg-[#f7f3ea] p-8 text-center">
                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#123f8c]">
                            <svg class="h-10 w-10 text-white/40" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0"/></svg>
                        </div>
                        <p class="mt-5 font-bold text-[#07172f]">Team Member</p>
                        <p class="mt-1 text-xs font-semibold uppercase tracking-[0.15em] text-[#c9a24d]">Role / Discipline</p>
                        <p class="mt-3 text-sm leading-6 text-[#667085]">A brief professional profile will appear here, outlining experience, areas of expertise and sector background.</p>
                    </div>
                    <div class="tlg-reveal tlg-d3 rounded-[2rem] border border-[#e6e8ee] bg-[#f7f3ea] p-8 text-center">
                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#c9a24d]">
                            <svg class="h-10 w-10 text-[#07172f]/40" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0"/></svg>
                        </div>
                        <p class="mt-5 font-bold text-[#07172f]">Team Member</p>
                        <p class="mt-1 text-xs font-semibold uppercase tracking-[0.15em] text-[#c9a24d]">Role / Discipline</p>
                        <p class="mt-3 text-sm leading-6 text-[#667085]">A brief professional profile will appear here, outlining experience, areas of expertise and sector background.</p>
                    </div>
                    <div class="tlg-reveal tlg-d4 flex flex-col items-center justify-center rounded-[2rem] bg-[#07172f] p-8 text-center">
                        <div class="flex h-14 w-14 items-center justify-center rounded-full bg-white/10">
                            <svg class="h-7 w-7 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                        </div>
                        <p class="mt-4 font-bold text-white">Full Team</p>
                        <p class="mt-2 text-sm leading-6 text-slate-400">Additional profiles will be added as they are prepared for publication.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Qualifications and accreditations --}}
    <section class="border-t border-[#e6e8ee] bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-12">
            <div class="tlg-reveal">
                <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#667085]">Professional Standards</p>
                        <h2 class="mt-2 font-serif text-3xl font-bold text-[#07172f]">Qualifications &amp; Accreditations</h2>
                        @if ($accreditations->isEmpty())
                            <p class="mt-2 text-sm leading-6 text-[#667085]">Professional qualifications and accreditations held by our team will be listed here once verified for publication.</p>
                        @endif
                    </div>
                </div>
                <div class="mt-6 flex flex-wrap items-center gap-4">
                    @if ($accreditations->isNotEmpty())
                        @foreach ($accreditations as $accreditation)
                            @if ($accreditation->logo)
                                <div class="flex h-16 w-40 items-center justify-center rounded-2xl border border-[#e6e8ee] bg-white shadow-sm px-4">
                                    <img src="{{ $accreditation->logo->url() }}" alt="{{ $accreditation->name }}" class="max-h-10 max-w-full object-contain">
                                </div>
                            @else
                                <div class="flex h-16 w-40 items-center justify-center rounded-2xl border border-[#e6e8ee] bg-white shadow-sm px-3 text-center">
                                    <span class="text-xs font-semibold text-[#07172f]">{{ $accreditation->name }}</span>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="flex h-16 w-40 items-center justify-center rounded-2xl border border-dashed border-[#d0d5dd] bg-white shadow-sm"><span class="text-xs font-semibold text-[#b0b7c3]">Qualification / Badge</span></div>
                        <div class="flex h-16 w-40 items-center justify-center rounded-2xl border border-dashed border-[#d0d5dd] bg-white shadow-sm"><span class="text-xs font-semibold text-[#b0b7c3]">Qualification / Badge</span></div>
                        <div class="flex h-16 w-40 items-center justify-center rounded-2xl border border-dashed border-[#d0d5dd] bg-white shadow-sm"><span class="text-xs font-semibold text-[#b0b7c3]">Qualification / Badge</span></div>
                        <div class="flex h-16 w-40 items-center justify-center rounded-2xl border border-dashed border-[#d0d5dd] bg-white shadow-sm"><span class="text-xs font-semibold text-[#b0b7c3]">Qualification / Badge</span></div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Closing CTA --}}
    {{-- Future CMS-managed content --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal overflow-hidden rounded-[2rem] bg-[#07172f] px-8 py-16 text-white md:px-14">
                <div class="grid gap-10 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Work With Us</p>
                        <h2 class="mt-4 font-serif text-4xl font-bold leading-tight">Let's Build Something Meaningful Together</h2>
                        <p class="mt-5 max-w-2xl leading-8 text-slate-300">Whether you're planning a business initiative, a training programme, a compliance project, a property opportunity or community development work — we're ready to help.</p>
                    </div>
                    <div class="flex shrink-0 flex-wrap gap-3">
                        <a href="{{ route('contact') }}" class="inline-flex justify-center rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">Discuss Your Project</a>
                        <a href="{{ route('services') }}" class="inline-flex justify-center rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">View Our Services</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>

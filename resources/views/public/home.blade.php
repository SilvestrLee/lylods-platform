<x-layouts.public
    :title="$page->meta_title ?? 'The Lylods Group — Multidisciplinary Professional Services'"
    :description="$page->meta_description"
    :canonical="$page?->canonical_url"
    :robots="$page?->robots"
    :og-image="$page?->ogMedia?->url()">

    {{-- Hero --}}
    <section class="relative min-h-[88vh] overflow-hidden bg-[#07172f] text-white">
        {{-- Background image --}}
        {{-- CMS: replace image src with dynamic hero image field --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1800&q=80"
                 alt=""
                 class="h-full w-full object-cover opacity-25">
            <div class="absolute inset-0 bg-gradient-to-r from-[#07172f] via-[#07172f]/85 to-[#07172f]/50"></div>
        </div>

        <div class="relative mx-auto grid max-w-[1440px] gap-14 px-6 py-28 lg:grid-cols-[0.82fr_1fr] lg:items-center lg:py-36">
            <div class="tlg-reveal">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">
                    {{ $page->hero_subtitle }}
                </p>
                <h1 class="mt-6 max-w-3xl font-serif text-4xl font-bold leading-tight tracking-tight md:text-5xl lg:text-[3.2rem]">
                    {{ $page->hero_title }}
                </h1>
                <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-200">
                    {{ $page->hero_description }}
                </p>
                @if($page->primary_cta_label || $page->secondary_cta_label)
                <div class="mt-10 flex flex-wrap gap-4">
                    @if($page->primary_cta_label && $page->primary_cta_url)
                    <a href="{{ $page->primary_cta_url }}" class="rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] shadow-lg transition-all duration-300 hover:bg-[#d8b765]">
                        {{ $page->primary_cta_label }}
                    </a>
                    @endif
                    @if($page->secondary_cta_label && $page->secondary_cta_url)
                    <a href="{{ $page->secondary_cta_url }}" class="rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">
                        {{ $page->secondary_cta_label }}
                    </a>
                    @endif
                </div>
                @endif
            </div>

            {{-- Hero right column — two staggered portrait cards with floating UI panels --}}
            {{-- CMS: hero->card_01_image, hero->card_02_image --}}
            <div class="tlg-reveal tlg-d1 hidden lg:flex items-start gap-3 py-4">

                {{-- Card One — left, higher --}}
                <div class="relative flex-1">
                    <div class="relative overflow-hidden rounded-[28px] border border-white/10 shadow-[0_30px_60px_rgba(0,0,0,.18)]" style="height:440px;">
                        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=600&q=80"
                             alt="Business advisory"
                             class="h-full w-full object-cover object-center">
                        <div class="absolute inset-0 bg-gradient-to-b from-[#07172f]/55 via-transparent to-[#07172f]/40"></div>
                        {{-- Glass overlay — top, full card width --}}
                        <div class="absolute inset-x-4 top-4 rounded-[22px] border border-white/20 bg-white/12 p-5 text-white shadow-[0_20px_45px_rgba(0,0,0,.22)] backdrop-blur-xl">
                            <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Business Advisory</p>
                            <div class="mt-3 space-y-2.5">
                                <div class="flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-2">
                                        <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg bg-white/20">
                                            <svg class="h-3.5 w-3.5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
                                        </div>
                                        <span class="text-[11px] font-semibold text-white">Business growth</span>
                                    </div>
                                    <span class="shrink-0 text-[10px] font-semibold text-[#c9a24d]">Strategy</span>
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-2">
                                        <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg bg-white/20">
                                            <svg class="h-3.5 w-3.5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z"/></svg>
                                        </div>
                                        <span class="text-[11px] font-semibold text-white">Digital solutions</span>
                                    </div>
                                    <span class="shrink-0 text-[10px] font-semibold text-[#c9a24d]">Tech</span>
                                </div>
                                <div class="flex items-center justify-between gap-2">
                                    <div class="flex items-center gap-2">
                                        <div class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg bg-white/20">
                                            <svg class="h-3.5 w-3.5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                        </div>
                                        <span class="text-[11px] font-semibold text-white">Operational support</span>
                                    </div>
                                    <span class="shrink-0 text-[10px] font-semibold text-[#c9a24d]">Advisory</span>
                                </div>
                            </div>
                            <div class="mt-3 border-t border-white/20 pt-3">
                                <a href="{{ route('services') }}#business-technology" class="inline-flex items-center gap-1 text-[11px] font-bold text-white transition-colors hover:text-[#c9a24d]">
                                    Learn More
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card Two — right, lower (staggered ~80px down) --}}
                <div class="relative mt-20 flex-1">
                    <div class="relative overflow-hidden rounded-[28px] border border-white/10 shadow-[0_30px_60px_rgba(0,0,0,.18)]" style="height:440px;">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=600&q=80"
                             alt="Training and community development"
                             class="h-full w-full object-cover object-center">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/65 via-[#07172f]/20 to-transparent"></div>
                        {{-- Glass overlay — bottom, full card width --}}
                        <div class="absolute inset-x-4 bottom-4 rounded-[22px] border border-white/20 bg-white/12 p-5 text-white shadow-[0_20px_45px_rgba(0,0,0,.22)] backdrop-blur-xl">
                            <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Community Projects</p>
                            <p class="mt-2 text-sm font-bold leading-snug text-white">Capacity Building</p>
                            <p class="mt-1.5 text-[11px] leading-5 text-white/70">Training programmes, project coordination and community initiatives delivered end to end.</p>
                            <div class="mt-3 border-t border-white/20 pt-3">
                                <a href="{{ route('services') }}#community-projects" class="inline-flex items-center gap-1 text-[11px] font-bold text-white transition-colors hover:text-[#c9a24d]">
                                    Explore
                                    <svg class="h-3 w-3" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Stats band --}}
    <div class="border-t border-white/10 bg-[#07172f]">
        <div class="mx-auto max-w-[1440px] px-6 py-8">
            <dl class="grid grid-cols-2 gap-x-6 gap-y-8 sm:grid-cols-4 text-center">
                <div class="tlg-reveal tlg-d1">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Service Areas</dt>
                    <dd class="mt-2 font-serif text-4xl font-bold text-white">5</dd>
                </div>
                <div class="tlg-reveal tlg-d2">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Industry Reach</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">Multi-Sector</dd>
                    <dd class="mt-1 text-xs text-slate-400">Energy · Infrastructure · Finance · Public</dd>
                </div>
                <div class="tlg-reveal tlg-d3">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Delivery Model</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">End-to-End</dd>
                    <dd class="mt-1 text-xs text-slate-400">Discovery through close-out</dd>
                </div>
                <div class="tlg-reveal tlg-d4">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Accountability</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">One Partner</dd>
                    <dd class="mt-1 text-xs text-slate-400">Across all disciplines</dd>
                </div>
            </dl>
        </div>
    </div>

    {{-- Discipline identity strip --}}
    <div class="bg-[#07172f] py-5">
        <div class="mx-auto max-w-[1440px] px-6">
            <div class="flex flex-wrap items-center justify-center gap-x-2 gap-y-2 text-center">
                <span class="shrink-0 text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Our Services</span>
                <span class="inline-flex items-center gap-1.5 rounded-full border border-white/15 px-3.5 py-1.5 text-xs font-semibold text-white"><span class="h-1.5 w-1.5 rounded-full bg-[#c9a24d]"></span>Business, Technology &amp; Digital</span>
                <span class="inline-flex items-center gap-1.5 rounded-full border border-white/15 px-3.5 py-1.5 text-xs font-semibold text-white"><span class="h-1.5 w-1.5 rounded-full bg-[#c9a24d]"></span>Training, Recruitment &amp; Capacity</span>
                <span class="inline-flex items-center gap-1.5 rounded-full border border-white/15 px-3.5 py-1.5 text-xs font-semibold text-white"><span class="h-1.5 w-1.5 rounded-full bg-[#c9a24d]"></span>Governance, Compliance &amp; Data Protection</span>
                <span class="inline-flex items-center gap-1.5 rounded-full border border-white/15 px-3.5 py-1.5 text-xs font-semibold text-white"><span class="h-1.5 w-1.5 rounded-full bg-[#c9a24d]"></span>Property &amp; Development</span>
                <span class="inline-flex items-center gap-1.5 rounded-full border border-white/15 px-3.5 py-1.5 text-xs font-semibold text-white"><span class="h-1.5 w-1.5 rounded-full bg-[#c9a24d]"></span>Community &amp; Project Development</span>
            </div>
        </div>
    </div>

    {{-- Service disciplines strip --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-24">
            <div class="tlg-reveal grid gap-4 lg:grid-cols-[1fr_auto] lg:items-end">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">Professional Services</p>
                    <h2 class="mt-3 font-serif text-4xl font-bold text-[#07172f] md:text-5xl lg:text-[2.4rem]">
                        A single partner across<br class="hidden lg:block"> multiple disciplines.
                    </h2>
                </div>
                <a href="{{ route('services') }}" class="inline-flex items-center gap-2 rounded-full border border-[#07172f] px-6 py-3 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                    View All Disciplines
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>

            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                {{-- CMS: each card image will be service->thumbnail --}}
                <a href="{{ route('services') }}#business-technology" class="tlg-reveal group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="relative h-44 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80" alt="Business Technology and Digital Solutions" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/60 to-transparent"></div>
                        <div class="absolute bottom-3 left-4">
                            <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z"/></svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-[#07172f]">Business, Technology and Digital Solutions</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Strategy, digital transformation, technology advisory, and business consulting.</p>
                    </div>
                </a>

                <a href="{{ route('services') }}#training-recruitment" class="tlg-reveal group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="relative h-44 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=600&q=80" alt="Training Recruitment and Capacity Building" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/60 to-transparent"></div>
                        <div class="absolute bottom-3 left-4">
                            <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.627 48.627 0 0 1 12 20.904a48.627 48.627 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.57 50.57 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-[#07172f]">Training, Recruitment and Capacity Building</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Professional development, workforce upskilling, and specialist placement.</p>
                    </div>
                </a>

                <a href="{{ route('services') }}#compliance-governance" class="tlg-reveal group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="relative h-44 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?auto=format&fit=crop&w=600&q=80" alt="Governance Compliance and Data Protection" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/60 to-transparent"></div>
                        <div class="absolute bottom-3 left-4">
                            <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-[#07172f]">Governance, Compliance and Data Protection</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Compliance frameworks, policy, audit readiness, and data governance.</p>
                    </div>
                </a>

                <a href="{{ route('services') }}#property-development" class="tlg-reveal group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="relative h-44 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=600&q=80" alt="Property Packaging Facilitation Management and Development" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/60 to-transparent"></div>
                        <div class="absolute bottom-3 left-4">
                            <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21"/></svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-[#07172f]">Property Packaging, Facilitation, Management and Development</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Property opportunity coordination, packaging, and development management.</p>
                    </div>
                </a>

                <a href="{{ route('services') }}#community-projects" class="tlg-reveal group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-[#c9a24d] hover:shadow-lg lg:col-span-1">
                    <div class="relative h-44 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=600&q=80" alt="Community and Project Development" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/60 to-transparent"></div>
                        <div class="absolute bottom-3 left-4">
                            <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-[#07172f]">Community and Project Development</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Social impact delivery, community project coordination and development support.</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    {{-- How We Engage --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-24">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">Our Approach</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl lg:text-[2.4rem]">How we engage with clients.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">Every engagement is structured from first conversation to final deliverable — ensuring clarity, accountability, and measurable progress at every stage.</p>
            </div>

            <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <div class="tlg-reveal tlg-d1 rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                    <span class="inline-block rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-bold text-[#07172f]">01</span>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Discovery</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">We invest time upfront understanding your context, objectives, and constraints — ensuring our engagement is grounded in what actually matters to you.</p>
                </div>
                <div class="tlg-reveal tlg-d2 rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                    <span class="inline-block rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-bold text-[#07172f]">02</span>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Scoping</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">We define a clear, structured scope of work with measurable milestones, agreed deliverables, and defined lines of accountability before any work begins.</p>
                </div>
                <div class="tlg-reveal tlg-d3 rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                    <span class="inline-block rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-bold text-[#07172f]">03</span>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Delivery</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">We execute with discipline, keeping clients informed at every stage. Our teams are empowered to make decisions without creating unnecessary escalation or delay.</p>
                </div>
                <div class="tlg-reveal tlg-d4 rounded-[2rem] bg-[#07172f] p-8 shadow-sm text-white">
                    <span class="inline-block rounded-full bg-white/10 px-3 py-1 text-xs font-bold text-[#c9a24d]">04</span>
                    <h3 class="mt-5 text-lg font-bold text-white">Review</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-300">We close every engagement with structured review, capturing outcomes against objectives — ensuring continuous improvement and a foundation for future work.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Industries served --}}
    <section class="border-b border-[#e6e8ee] bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-14">
            <div class="tlg-reveal flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#667085]">Sectors of Practice</p>
                    <h2 class="mt-2 font-serif text-2xl font-bold text-[#07172f]">Industries We Serve</h2>
                </div>
                <a href="{{ route('services') }}" class="shrink-0 text-sm font-semibold text-[#123f8c] hover:underline">Explore our disciplines →</a>
            </div>
            <div class="mt-8 grid grid-cols-2 gap-3 sm:grid-cols-4 lg:grid-cols-8">
                <div class="tlg-reveal tlg-d1 flex items-start gap-2 border-l-2 border-[#c9a24d] py-1 pl-3">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-[#c9a24d]">01</p>
                        <p class="mt-1 text-xs font-semibold leading-snug text-[#07172f]">Energy &amp; Utilities</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d1 flex items-start gap-2 border-l-2 border-[#c9a24d] py-1 pl-3">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-[#c9a24d]">02</p>
                        <p class="mt-1 text-xs font-semibold leading-snug text-[#07172f]">Infrastructure &amp; Civil</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d2 flex items-start gap-2 border-l-2 border-[#c9a24d] py-1 pl-3">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-[#c9a24d]">03</p>
                        <p class="mt-1 text-xs font-semibold leading-snug text-[#07172f]">Financial Services</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d2 flex items-start gap-2 border-l-2 border-[#c9a24d] py-1 pl-3">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-[#c9a24d]">04</p>
                        <p class="mt-1 text-xs font-semibold leading-snug text-[#07172f]">Government &amp; Public Sector</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d3 flex items-start gap-2 border-l-2 border-[#c9a24d] py-1 pl-3">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-[#c9a24d]">05</p>
                        <p class="mt-1 text-xs font-semibold leading-snug text-[#07172f]">Technology &amp; Digital</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d3 flex items-start gap-2 border-l-2 border-[#c9a24d] py-1 pl-3">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-[#c9a24d]">06</p>
                        <p class="mt-1 text-xs font-semibold leading-snug text-[#07172f]">Oil &amp; Gas / Industrial</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d4 flex items-start gap-2 border-l-2 border-[#c9a24d] py-1 pl-3">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-[#c9a24d]">07</p>
                        <p class="mt-1 text-xs font-semibold leading-snug text-[#07172f]">Professional Services</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d4 flex items-start gap-2 border-l-2 border-[#c9a24d] py-1 pl-3">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-[#c9a24d]">08</p>
                        <p class="mt-1 text-xs font-semibold leading-snug text-[#07172f]">Education &amp; Training</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About / values -- split with image --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-24">
            <div class="grid gap-16 lg:grid-cols-2 lg:items-center">
                {{-- Image --}}
                {{-- CMS: replace with about->image --}}
                <div class="tlg-reveal relative overflow-hidden rounded-[2rem] shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1560472355-536de3962603?auto=format&fit=crop&w=900&q=80"
                         alt="The Lylods Group — professionals collaborating"
                         class="h-full w-full object-cover" style="min-height: 480px;">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/30 to-transparent"></div>
                </div>

                {{-- Content --}}
                <div class="tlg-reveal tlg-d1">
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">About The Lylods Group</p>
                    <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl lg:text-[2.4rem]">
                        Professional services built on expertise and integrity.
                    </h2>
                    <p class="mt-6 text-lg leading-8 text-[#667085]">
                        The Lylods Group is a multidisciplinary professional services organisation working across business, technology, training, compliance, property and community development. We work with clients who need a capable, accountable partner across multiple disciplines.
                    </p>

                    <div class="mt-8 grid grid-cols-2 gap-4">
                        <div class="flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-5">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            <div><p class="font-bold text-[#07172f]">Integrity</p><p class="mt-1 text-xs text-[#667085]">Transparent, ethical conduct in every engagement.</p></div>
                        </div>
                        <div class="flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-5">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/></svg>
                            <div><p class="font-bold text-[#07172f]">Excellence</p><p class="mt-1 text-xs text-[#667085]">Rigorous professional standards on every deliverable.</p></div>
                        </div>
                        <div class="flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-5">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
                            <div><p class="font-bold text-[#07172f]">Delivery</p><p class="mt-1 text-xs text-[#667085]">Measurable results and sustainable client outcomes.</p></div>
                        </div>
                        <div class="flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-5">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                            <div><p class="font-bold text-[#07172f]">Partnership</p><p class="mt-1 text-xs text-[#667085]">Long-term relationships built on shared objectives.</p></div>
                        </div>
                    </div>

                    <a href="{{ route('about') }}" class="mt-8 inline-flex items-center gap-2 rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white transition-all duration-300 hover:bg-[#123f8c]">
                        About The Group
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Why Clients Work With Us --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-24">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Why Clients Work With Us</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl lg:text-[2.4rem]">What makes the difference.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">Our clients come back because of how we work — not just what we deliver.</p>
            </div>
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <div class="tlg-reveal tlg-d1 flex items-start gap-5 rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#07172f]">Practical Delivery</h3>
                        <p class="mt-2 text-sm leading-7 text-[#667085]">From planning to execution — we stay engaged across the full lifecycle, not just the advisory phase.</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d2 flex items-start gap-5 rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#07172f]">Multi-Sector Experience</h3>
                        <p class="mt-2 text-sm leading-7 text-[#667085]">Experience across business, public sector, technology, property and community contexts informs how we approach every engagement.</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d3 flex items-start gap-5 rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#07172f]">Clear Communication</h3>
                        <p class="mt-2 text-sm leading-7 text-[#667085]">Structured coordination and honest reporting — clients are never left guessing about progress, priorities, or next steps.</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d1 flex items-start gap-5 rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#07172f]">Tailored Support</h3>
                        <p class="mt-2 text-sm leading-7 text-[#667085]">We shape our approach to fit your situation — no generic frameworks pushed onto problems they were not built to solve.</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d2 flex items-start gap-5 rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#07172f]">Strong Professional Network</h3>
                        <p class="mt-2 text-sm leading-7 text-[#667085]">Where specialist or regulated input is needed, we introduce clients to appropriate, qualified independent professionals.</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d3 flex items-start gap-5 rounded-3xl bg-[#07172f] p-8">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-2xl bg-white/10">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-white">Measurable Outcomes</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-300">We focus on what can be measured, tracked, and evidenced — so you know the value of every engagement.</p>
                    </div>
                </div>
            </div>
            <div class="tlg-reveal mt-10 text-center">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-full bg-[#07172f] px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-[#123f8c]">
                    Discuss Your Project
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Client Testimonials</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">What our clients say.</h2>
                @if ($testimonials->isEmpty())
                    <p class="mt-5 text-lg leading-8 text-[#667085]">Client feedback will be added here as testimonials are collected and approved.</p>
                @endif
            </div>
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @if ($testimonials->isNotEmpty())
                    @foreach ($testimonials->take(3) as $testimonial)
                        <div class="tlg-reveal flex flex-col justify-between rounded-[2rem] {{ $loop->last && $loop->index % 3 === 2 ? 'bg-[#07172f]' : 'border border-[#e6e8ee] bg-white' }} p-8 shadow-sm">
                            <div>
                                <div class="flex gap-1">
                                    @for ($i = 0; $i < 5; $i++)
                                        <svg class="h-4 w-4 text-[#c9a24d]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 0 0 .95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 0 0-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 0 0-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 0 0-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 0 0 .951-.69l1.07-3.292Z"/></svg>
                                    @endfor
                                </div>
                                <p class="mt-5 leading-7 {{ $loop->last && $loop->index % 3 === 2 ? 'text-slate-300' : 'text-[#667085]' }}">"{{ $testimonial->quote }}"</p>
                            </div>
                            <div class="mt-6 border-t {{ $loop->last && $loop->index % 3 === 2 ? 'border-white/10' : 'border-[#e6e8ee]' }} pt-5">
                                <p class="font-semibold {{ $loop->last && $loop->index % 3 === 2 ? 'text-white' : 'text-[#07172f]' }}">{{ $testimonial->client_name }}</p>
                                @if ($testimonial->organisation || $testimonial->role)
                                    <p class="mt-0.5 text-sm {{ $loop->last && $loop->index % 3 === 2 ? 'text-slate-400' : 'text-[#667085]' }}">{{ collect([$testimonial->organisation, $testimonial->role])->filter()->implode(' · ') }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="tlg-reveal tlg-d1 flex flex-col justify-between rounded-[2rem] border border-[#e6e8ee] bg-white p-8 shadow-sm">
                        <div>
                            <div class="flex gap-1">
                                @for ($i = 0; $i < 5; $i++)<svg class="h-4 w-4 text-[#c9a24d]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 0 0 .95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 0 0-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 0 0-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 0 0-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 0 0 .951-.69l1.07-3.292Z"/></svg>@endfor
                            </div>
                            <p class="mt-5 leading-7 text-[#667085]">"Feedback from business consulting, technology, training, and compliance engagements will appear here once collected and approved."</p>
                        </div>
                        <div class="mt-6 border-t border-[#e6e8ee] pt-5">
                            <p class="font-semibold text-[#07172f]">Client Name</p>
                            <p class="mt-0.5 text-sm text-[#667085]">Organisation · Business &amp; Technology</p>
                        </div>
                    </div>
                    <div class="tlg-reveal tlg-d2 flex flex-col justify-between rounded-[2rem] border border-[#e6e8ee] bg-white p-8 shadow-sm">
                        <div>
                            <div class="flex gap-1">
                                @for ($i = 0; $i < 5; $i++)<svg class="h-4 w-4 text-[#c9a24d]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 0 0 .95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 0 0-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 0 0-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 0 0-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 0 0 .951-.69l1.07-3.292Z"/></svg>@endfor
                            </div>
                            <p class="mt-5 leading-7 text-[#667085]">"Testimonials from property, compliance, and community project engagements will be published here when available."</p>
                        </div>
                        <div class="mt-6 border-t border-[#e6e8ee] pt-5">
                            <p class="font-semibold text-[#07172f]">Client Name</p>
                            <p class="mt-0.5 text-sm text-[#667085]">Organisation · Property &amp; Development</p>
                        </div>
                    </div>
                    <div class="tlg-reveal tlg-d3 flex flex-col justify-between rounded-[2rem] bg-[#07172f] p-8 shadow-sm">
                        <div>
                            <div class="flex gap-1">
                                @for ($i = 0; $i < 5; $i++)<svg class="h-4 w-4 text-[#c9a24d]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 0 0 .95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 0 0-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 0 0-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 0 0-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 0 0 .951-.69l1.07-3.292Z"/></svg>@endfor
                            </div>
                            <p class="mt-5 leading-7 text-slate-300">"We welcome feedback from all clients. If you have worked with The Lylods Group and would like to share your experience, please contact us."</p>
                        </div>
                        <div class="mt-6 border-t border-white/10 pt-5">
                            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-full border border-white/30 px-5 py-2.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">
                                Share Your Feedback
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Partners and accreditations --}}
    <section class="border-t border-[#e6e8ee] bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-12">
            <div class="tlg-reveal text-center">
                <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#667085]">Partners, Clients &amp; Accreditations</p>
                <div class="mt-6 flex flex-wrap items-center justify-center gap-4">
                    @if ($organisations->isNotEmpty())
                        @foreach ($organisations as $org)
                            @if ($org->logo)
                                <div class="flex h-14 w-36 items-center justify-center rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-3">
                                    <img src="{{ $org->logo->url() }}" alt="{{ $org->name }}" class="max-h-9 max-w-full object-contain">
                                </div>
                            @else
                                <div class="flex h-14 w-36 items-center justify-center rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-2 text-center">
                                    <span class="text-xs font-semibold text-[#07172f]">{{ $org->name }}</span>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <div class="flex h-14 w-36 items-center justify-center rounded-2xl border border-dashed border-[#d0d5dd] bg-[#f7f3ea]"><span class="text-xs font-semibold text-[#b0b7c3]">Logo / Badge</span></div>
                        <div class="flex h-14 w-36 items-center justify-center rounded-2xl border border-dashed border-[#d0d5dd] bg-[#f7f3ea]"><span class="text-xs font-semibold text-[#b0b7c3]">Logo / Badge</span></div>
                        <div class="flex h-14 w-36 items-center justify-center rounded-2xl border border-dashed border-[#d0d5dd] bg-[#f7f3ea]"><span class="text-xs font-semibold text-[#b0b7c3]">Logo / Badge</span></div>
                        <div class="flex h-14 w-36 items-center justify-center rounded-2xl border border-dashed border-[#d0d5dd] bg-[#f7f3ea]"><span class="text-xs font-semibold text-[#b0b7c3]">Logo / Badge</span></div>
                        <div class="flex h-14 w-36 items-center justify-center rounded-2xl border border-dashed border-[#d0d5dd] bg-[#f7f3ea]"><span class="text-xs font-semibold text-[#b0b7c3]">Logo / Badge</span></div>
                    @endif
                </div>
                @if ($organisations->isEmpty())
                    <p class="mt-5 text-xs text-[#667085]">Partner logos and professional accreditations will be displayed here once approved for publication.</p>
                @endif
            </div>
        </div>
    </section>

    {{-- Work With Us CTA --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="relative overflow-hidden rounded-[2rem] bg-[#07172f] px-8 py-14 text-white md:px-14">
                <div class="relative tlg-reveal">
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Work With Us</p>
                    <h2 class="mt-4 font-serif text-4xl font-bold lg:text-[2.4rem]">Ready to discuss a requirement?</h2>
                    <p class="mt-5 max-w-2xl leading-7 text-slate-300">
                        Whether you need specialist advisory, engineering delivery, technology support, compliance guidance, or workforce solutions — we welcome your enquiry. Our team will respond within two business days.
                    </p>
                    <div class="mt-8 flex flex-wrap items-center gap-4">
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">
                            Discuss a Requirement
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                        <a href="{{ route('services') }}" class="inline-flex rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">
                            View Our Services
                        </a>
                    </div>
                    <p class="mt-6 text-xs text-slate-400">
                        For investor access, please use the <a href="{{ route('login') }}" class="text-[#c9a24d] underline-offset-2 hover:underline">investor portal login</a>.
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>

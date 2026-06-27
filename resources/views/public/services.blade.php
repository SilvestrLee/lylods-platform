<x-layouts.public title="Our Services — The Lylods Group">

    {{-- Hero --}}
    {{-- Future CMS-managed services content --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        <div class="relative mx-auto max-w-[1440px] px-6 py-28">
            <div class="tlg-reveal max-w-4xl">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">What We Offer</p>
                <h1 class="mt-6 font-serif text-4xl font-bold leading-tight tracking-tight md:text-5xl lg:text-[3.2rem]">Our Services</h1>
                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-200">The Lylods Group provides practical support across business, technology, training, recruitment, compliance, property and community development.</p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="#service-areas" class="rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">Explore Service Areas</a>
                    <a href="{{ route('contact') }}" class="rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">Discuss Your Project</a>
                </div>
            </div>
        </div>
        <div class="absolute inset-0 -z-10 opacity-10" style="background-image: radial-gradient(circle at 80% 20%, #c9a24d 0%, transparent 50%), radial-gradient(circle at 20% 80%, #123f8c 0%, transparent 50%)"></div>
    </section>

    {{-- Sticky service nav --}}
    <div class="sticky top-[65px] z-40 border-b border-[#e6e8ee] bg-white/95 backdrop-blur-xl">
        <div class="mx-auto max-w-[1440px] overflow-x-auto px-6">
            <div class="flex gap-1 py-3 text-sm font-semibold" style="white-space:nowrap;">
                <a href="#business-technology" class="rounded-full px-4 py-2 text-[#07172f] transition-all duration-200 hover:bg-[#f7f3ea]">Business &amp; Technology</a>
                <a href="#training-recruitment" class="rounded-full px-4 py-2 text-[#07172f] transition-all duration-200 hover:bg-[#f7f3ea]">Training &amp; Recruitment</a>
                <a href="#compliance-governance" class="rounded-full px-4 py-2 text-[#07172f] transition-all duration-200 hover:bg-[#f7f3ea]">Governance &amp; Compliance</a>
                <a href="#property-development" class="rounded-full px-4 py-2 text-[#07172f] transition-all duration-200 hover:bg-[#f7f3ea]">Property &amp; Development</a>
                <a href="#community-projects" class="rounded-full px-4 py-2 text-[#07172f] transition-all duration-200 hover:bg-[#f7f3ea]">Community &amp; Projects</a>
            </div>
        </div>
    </div>

    {{-- Service overview --}}
    <section id="service-areas" class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">Service Catalogue</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">Five service areas. One practical partner.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">Our service areas complement each other. Clients working across multiple areas benefit from coordinated support and clear communication throughout.</p>
            </div>

            {{-- Future CMS-managed services content --}}
            <div class="mt-14 space-y-6">

                {{-- 1. Business, Technology and Digital Solutions --}}
                <div id="business-technology" class="tlg-reveal scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="lg:grid lg:grid-cols-[300px_1fr]">
                        {{-- Future CMS-managed services content --}}
                        <div class="relative hidden min-h-[280px] items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#123f8c] to-[#07172f] lg:flex">
                            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 65% 35%, #c9a24d 0%, transparent 55%)"></div>
                            <svg class="h-20 w-20 text-white/15" fill="none" stroke="currentColor" stroke-width="0.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0H3"/></svg>
                            <div class="absolute bottom-4 left-5 text-[10px] font-semibold uppercase tracking-widest text-white/30">CMS image</div>
                        </div>
                        <div class="p-10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                                    <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0H3"/></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Service Area 01</p>
                            </div>
                            <h2 class="mt-4 font-serif text-2xl font-bold text-[#07172f]">Business, Technology and Digital Solutions</h2>
                            <p class="mt-4 max-w-2xl leading-7 text-[#667085]">We support organisations with business consultancy, software and systems development, digital transformation, data solutions, cybersecurity awareness, information management, process improvement and automation support.</p>
                            <div class="mt-7 grid grid-cols-2 gap-2 border-t border-[#e6e8ee] pt-7 sm:grid-cols-4">
                                @foreach(['Business consultancy','Software and systems development','Digital transformation','Data solutions and analytics','Cybersecurity awareness','Information management','Process improvement','Automation support'] as $item)
                                <div class="flex items-center gap-2 text-sm text-[#667085]">
                                    <span class="h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>{{ $item }}
                                </div>
                                @endforeach
                            </div>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                                Explore Business &amp; Technology
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- 2. Training, Recruitment and Capacity Building --}}
                <div id="training-recruitment" class="tlg-reveal scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="lg:grid lg:grid-cols-[300px_1fr]">
                        {{-- Future CMS-managed services content --}}
                        <div class="relative hidden min-h-[280px] items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#0d2d5e] to-[#123f8c] lg:flex">
                            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 65%, #c9a24d 0%, transparent 55%)"></div>
                            <svg class="h-20 w-20 text-white/15" fill="none" stroke="currentColor" stroke-width="0.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>
                            <div class="absolute bottom-4 left-5 text-[10px] font-semibold uppercase tracking-widest text-white/30">CMS image</div>
                        </div>
                        <div class="p-10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#123f8c]">
                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Service Area 02</p>
                            </div>
                            <h2 class="mt-4 font-serif text-2xl font-bold text-[#07172f]">Training, Recruitment and Capacity Building</h2>
                            <p class="mt-4 max-w-2xl leading-7 text-[#667085]">We help people and organisations develop the right knowledge, skills and teams through professional training, employability support, recruitment services, leadership development and tailored learning programmes.</p>
                            <div class="mt-7 grid grid-cols-2 gap-2 border-t border-[#e6e8ee] pt-7 sm:grid-cols-4">
                                @foreach(['Professional training','Leadership development','Employability support','Recruitment services','Staff development','Digital training','Community programmes','Tailored workshops'] as $item)
                                <div class="flex items-center gap-2 text-sm text-[#667085]">
                                    <span class="h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>{{ $item }}
                                </div>
                                @endforeach
                            </div>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                                Explore Training &amp; Recruitment
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- 3. Governance, Compliance and Data Protection --}}
                <div id="compliance-governance" class="tlg-reveal scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="lg:grid lg:grid-cols-[300px_1fr]">
                        {{-- Future CMS-managed services content --}}
                        <div class="relative hidden min-h-[280px] items-center justify-center overflow-hidden bg-gradient-to-br from-[#051220] via-[#07172f] to-[#0a1f42] lg:flex">
                            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 60% 40%, #c9a24d 0%, transparent 50%)"></div>
                            <svg class="h-20 w-20 text-white/15" fill="none" stroke="currentColor" stroke-width="0.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                            <div class="absolute bottom-4 left-5 text-[10px] font-semibold uppercase tracking-widest text-white/30">CMS image</div>
                        </div>
                        <div class="p-10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#c9a24d]">
                                    <svg class="h-5 w-5 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Service Area 03</p>
                            </div>
                            <h2 class="mt-4 font-serif text-2xl font-bold text-[#07172f]">Governance, Compliance and Data Protection</h2>
                            <p class="mt-4 max-w-2xl leading-7 text-[#667085]">We support businesses, charities and projects with data protection, GDPR, policy development, governance, risk awareness, documentation and practical compliance support.</p>
                            <div class="mt-7 grid grid-cols-2 gap-2 border-t border-[#e6e8ee] pt-7 sm:grid-cols-4">
                                @foreach(['GDPR support','Data protection officer services','Policy development','Governance frameworks','Risk awareness','Information management','Compliance documentation','Staff training'] as $item)
                                <div class="flex items-center gap-2 text-sm text-[#667085]">
                                    <span class="h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>{{ $item }}
                                </div>
                                @endforeach
                            </div>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                                Explore Compliance Support
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- 4. Property Packaging, Facilitation, Management and Development --}}
                <div id="property-development" class="tlg-reveal scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="lg:grid lg:grid-cols-[300px_1fr]">
                        {{-- Future CMS-managed services content --}}
                        <div class="relative hidden min-h-[280px] items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#0e243d] to-[#1a3a5c] lg:flex">
                            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 70% 30%, #c9a24d 0%, transparent 55%)"></div>
                            <svg class="h-20 w-20 text-white/15" fill="none" stroke="currentColor" stroke-width="0.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21"/></svg>
                            <div class="absolute bottom-4 left-5 text-[10px] font-semibold uppercase tracking-widest text-white/30">CMS image</div>
                        </div>
                        <div class="p-10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                                    <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21"/></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Service Area 04</p>
                            </div>
                            <h2 class="mt-4 font-serif text-2xl font-bold text-[#07172f]">Property Packaging, Facilitation, Management and Development</h2>
                            <p class="mt-4 max-w-2xl leading-7 text-[#667085]">We support clients in identifying, structuring, coordinating and managing practical property opportunities across residential, commercial, land and development contexts.</p>
                            <div class="mt-7 grid grid-cols-2 gap-2 border-t border-[#e6e8ee] pt-7 sm:grid-cols-3">
                                @foreach(['Property opportunity sourcing and packaging','Residential, commercial and land opportunities','Feasibility support','Refurbishment and development coordination','Landlord and tenant support','Property management coordination','Development monitoring','Stakeholder coordination','Investor presentations'] as $item)
                                <div class="flex items-center gap-2 text-sm text-[#667085]">
                                    <span class="h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>{{ $item }}
                                </div>
                                @endforeach
                            </div>
                            <div class="mt-7 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-6 py-4">
                                <p class="text-xs leading-6 text-[#667085]"><span class="font-semibold text-[#07172f]">Important:</span> The Lylods Group supports the coordination, packaging and practical development of property opportunities. Where specialist regulated, legal, surveying, planning, architectural, finance or tax advice is required, we work with or introduce clients to appropriately qualified independent professionals.</p>
                            </div>
                            <a href="{{ route('property') }}" class="mt-6 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                                Explore Property &amp; Development
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- 5. Community and Project Development --}}
                <div id="community-projects" class="tlg-reveal scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="lg:grid lg:grid-cols-[300px_1fr]">
                        {{-- Future CMS-managed services content --}}
                        <div class="relative hidden min-h-[280px] items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#102a50] to-[#07172f] lg:flex">
                            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 25% 60%, #c9a24d 0%, transparent 50%)"></div>
                            <svg class="h-20 w-20 text-white/15" fill="none" stroke="currentColor" stroke-width="0.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/></svg>
                            <div class="absolute bottom-4 left-5 text-[10px] font-semibold uppercase tracking-widest text-white/30">CMS image</div>
                        </div>
                        <div class="p-10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#123f8c]">
                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Service Area 05</p>
                            </div>
                            <h2 class="mt-4 font-serif text-2xl font-bold text-[#07172f]">Community and Project Development</h2>
                            <p class="mt-4 max-w-2xl leading-7 text-[#667085]">We support community-focused programmes, partnership projects and development activities through planning, coordination, stakeholder engagement and practical delivery support.</p>
                            <div class="mt-7 grid grid-cols-2 gap-2 border-t border-[#e6e8ee] pt-7 sm:grid-cols-4">
                                @foreach(['Community programmes','Project coordination','Stakeholder engagement','Development initiatives','Partnership support','Delivery planning','Monitoring and reporting','Capacity building'] as $item)
                                <div class="flex items-center gap-2 text-sm text-[#667085]">
                                    <span class="h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>{{ $item }}
                                </div>
                                @endforeach
                            </div>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                                Explore Community Projects
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Why Clients Work With Us --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-24">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Why Clients Work With Us</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">What makes the difference.</h2>
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
                        <h3 class="font-bold text-white">Focus on Measurable Outcomes</h3>
                        <p class="mt-2 text-sm leading-7 text-slate-300">We focus on what can be measured, tracked, and evidenced — so you know the value of every engagement.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- How We Work --}}
    <section class="bg-[#07172f] text-white">
        <div class="mx-auto max-w-[1440px] px-6 py-24">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">How We Work</p>
                <h2 class="mt-4 font-serif text-4xl font-bold lg:text-[2.4rem]">From conversation to outcome.</h2>
                <p class="mt-5 leading-7 text-slate-300">A consistent, practical approach — tailored to fit your situation at every step.</p>
            </div>
            <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <div class="tlg-reveal tlg-d1 rounded-[1.75rem] border border-white/10 bg-white/5 p-8 transition-all duration-300 hover:bg-white/10">
                    <span class="inline-block rounded-full bg-[#c9a24d]/15 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#c9a24d]">01</span>
                    <h3 class="mt-5 text-lg font-bold text-white">Understand your need</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-400">We take time to understand your objectives, challenges and context before recommending any approach.</p>
                </div>
                <div class="tlg-reveal tlg-d2 rounded-[1.75rem] border border-white/10 bg-white/5 p-8 transition-all duration-300 hover:bg-white/10">
                    <span class="inline-block rounded-full bg-[#c9a24d]/15 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#c9a24d]">02</span>
                    <h3 class="mt-5 text-lg font-bold text-white">Structure the right support</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-400">We organise the right combination of services, expertise and resources to match your specific situation.</p>
                </div>
                <div class="tlg-reveal tlg-d3 rounded-[1.75rem] border border-white/10 bg-white/5 p-8 transition-all duration-300 hover:bg-white/10">
                    <span class="inline-block rounded-full bg-[#c9a24d]/15 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#c9a24d]">03</span>
                    <h3 class="mt-5 text-lg font-bold text-white">Coordinate people and resources</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-400">We bring together the right people, services and professionals — managing workstreams so you can focus on your priorities.</p>
                </div>
                <div class="tlg-reveal tlg-d4 rounded-[1.75rem] bg-[#c9a24d] p-8 transition-all duration-300 hover:brightness-105">
                    <span class="inline-block rounded-full bg-[#07172f]/10 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#07172f]">04</span>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Support delivery and next steps</h3>
                    <p class="mt-3 text-sm leading-6 text-[#07172f]/80">We stay engaged through implementation — monitoring progress, communicating clearly and helping you plan what comes next.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Closing CTA --}}
    {{-- Future CMS-managed services content --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal overflow-hidden rounded-[2rem] bg-[#07172f] px-8 py-16 text-white md:px-14">
                <div class="grid gap-10 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Get Started</p>
                        <h2 class="mt-4 font-serif text-3xl font-bold leading-tight lg:text-4xl">Not sure where to start?</h2>
                        <p class="mt-5 max-w-2xl leading-8 text-slate-300">Talk to us about your business, technology, training, compliance, property or community development needs and we will help you identify the right pathway.</p>
                    </div>
                    <div class="flex shrink-0 flex-wrap gap-3">
                        <a href="{{ route('contact') }}" class="inline-flex justify-center rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">Discuss Your Project</a>
                        <a href="{{ route('about') }}" class="inline-flex justify-center rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">About The Group</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>

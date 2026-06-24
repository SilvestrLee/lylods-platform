<x-layouts.public title="Professional Services — The Lylods Group">

    {{-- Hero with background image --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        {{-- CMS: replace image with services->hero_image --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1497366811353-6870744d04b2?auto=format&fit=crop&w=1800&q=80"
                 alt="" class="h-full w-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-r from-[#07172f] via-[#07172f]/90 to-[#07172f]/60"></div>
        </div>
        <div class="relative mx-auto max-w-7xl px-6 py-28">
            <div class="tlg-reveal max-w-4xl">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">Professional Services</p>
                <h1 class="mt-6 font-serif text-4xl font-bold leading-[0.95] tracking-tight md:text-5xl lg:text-[3.5rem] xl:text-[3.85rem]">
                    Comprehensive Expertise for Complex Challenges
                </h1>
                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-200">
                    The Lylods Group delivers across eight professional service disciplines, providing clients with the full range of expertise required for high-stakes and complex engagements. We bring structure, experience, and accountability to every scope of work.
                </p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="{{ route('contact') }}" class="rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">Discuss Your Requirements</a>
                    <a href="{{ route('about') }}" class="rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">About The Group</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats band --}}
    <div class="border-t border-white/10 bg-[#07172f]">
        <div class="mx-auto max-w-7xl px-6 py-8">
            <dl class="grid grid-cols-2 gap-x-6 gap-y-8 sm:grid-cols-4 text-center">
                <div class="tlg-reveal tlg-d1">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Service Areas</dt>
                    <dd class="mt-2 font-serif text-4xl font-bold text-white">8</dd>
                </div>
                <div class="tlg-reveal tlg-d2">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Accountability Model</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">Single Partner</dd>
                    <dd class="mt-1 text-xs text-slate-400">Across all disciplines</dd>
                </div>
                <div class="tlg-reveal tlg-d3">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Delivery Approach</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">Structured Methodology</dd>
                    <dd class="mt-1 text-xs text-slate-400">Milestone-driven engagement</dd>
                </div>
                <div class="tlg-reveal tlg-d4">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Engagement Model</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">Advisory &amp; Delivery</dd>
                    <dd class="mt-1 text-xs text-slate-400">From scoping to close-out</dd>
                </div>
            </dl>
        </div>
    </div>

    {{-- Discipline quick-nav --}}
    <div class="sticky top-[65px] z-40 border-b border-[#e6e8ee] bg-white/95 backdrop-blur-xl">
        <div class="mx-auto max-w-7xl overflow-x-auto px-6">
            <div class="flex gap-1 py-3 text-sm font-semibold" style="white-space:nowrap;">
                <a href="#engineering" class="rounded-full px-4 py-2 text-[#07172f] transition-all duration-200 hover:bg-[#f7f3ea]">Engineering</a>
                <a href="#technology" class="rounded-full px-4 py-2 text-[#07172f] transition-all duration-200 hover:bg-[#f7f3ea]">Technology</a>
                <a href="#project-management" class="rounded-full px-4 py-2 text-[#07172f] transition-all duration-200 hover:bg-[#f7f3ea]">Project Management</a>
                <a href="#training" class="rounded-full px-4 py-2 text-[#07172f] transition-all duration-200 hover:bg-[#f7f3ea]">Training</a>
                <a href="#consulting" class="rounded-full px-4 py-2 text-[#07172f] transition-all duration-200 hover:bg-[#f7f3ea]">Consulting</a>
                <a href="#recruitment" class="rounded-full px-4 py-2 text-[#07172f] transition-all duration-200 hover:bg-[#f7f3ea]">Recruitment</a>
                <a href="#compliance" class="rounded-full px-4 py-2 text-[#07172f] transition-all duration-200 hover:bg-[#f7f3ea]">Compliance</a>
                <a href="#multidisciplinary" class="rounded-full px-4 py-2 text-[#07172f] transition-all duration-200 hover:bg-[#f7f3ea]">Multidisciplinary</a>
            </div>
        </div>
    </div>

    {{-- Services list --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-7xl px-6 py-20">
            <div class="tlg-reveal max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">Our Disciplines</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">Eight service areas. One accountable partner.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">Our disciplines are structured to complement each other. Clients working across multiple areas benefit from coordinated advisory and unified delivery under a single point of accountability.</p>
            </div>

            <div class="mt-14 space-y-6">

                {{-- Engineering & Infrastructure --}}
                <div id="engineering" class="tlg-reveal scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="lg:grid lg:grid-cols-[320px_1fr]">
                        {{-- CMS: replace with engineering service image --}}
                        <div class="relative hidden lg:block">
                            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=600&q=80"
                                 alt="Engineering and Infrastructure"
                                 class="h-full w-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-r from-transparent to-white/5"></div>
                        </div>
                        <div class="p-10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21"/></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Discipline 01</p>
                            </div>
                            <h2 class="mt-4 font-serif text-3xl font-bold text-[#07172f]">Engineering &amp; Infrastructure Solutions</h2>
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">We provide engineering consultancy and infrastructure advisory for projects requiring technical rigour, delivery coordination, and sector-specific expertise.</p>
                            <div class="mt-8 grid gap-6 border-t border-[#e6e8ee] pt-8 sm:grid-cols-3">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">What it covers</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Engineering consultancy and advisory</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Infrastructure planning and feasibility</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Project controls and delivery oversight</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Asset management support</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Technical coordination services</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Who it supports</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Government infrastructure departments</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Developers and project owners</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Engineering contractors and subcontractors</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Energy and utilities operators</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Typical outcomes</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Clearly defined technical scope</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Structured delivery oversight</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Risk-managed engineering programmes</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Documented feasibility and planning outputs</li>
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Technology & Innovation --}}
                <div id="technology" class="tlg-reveal scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="lg:grid lg:grid-cols-[320px_1fr]">
                        {{-- CMS: replace with technology service image --}}
                        <div class="relative hidden lg:block">
                            <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80"
                                 alt="Technology and Innovation"
                                 class="h-full w-full object-cover">
                        </div>
                        <div class="p-10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#123f8c]">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z"/></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Discipline 02</p>
                            </div>
                            <h2 class="mt-4 font-serif text-3xl font-bold text-[#07172f]">Technology &amp; Innovation Services</h2>
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">We support digital transformation, systems integration, and technology strategy for organisations navigating operational and structural change.</p>
                            <div class="mt-8 grid gap-6 border-t border-[#e6e8ee] pt-8 sm:grid-cols-3">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">What it covers</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Digital transformation strategy</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Enterprise architecture advisory</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Technology roadmap development</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Systems integration planning</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Solution selection and evaluation</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Who it supports</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>CIOs and transformation directors</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Government IT and digital teams</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Operations and process improvement leads</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Organisations modernising legacy systems</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Typical outcomes</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Aligned technology strategy</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Structured modernisation roadmap</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Improved operational efficiency</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Informed technology investment decisions</li>
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Project Management --}}
                <div id="project-management" class="tlg-reveal scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="lg:grid lg:grid-cols-[320px_1fr]">
                        {{-- CMS: replace with project management service image --}}
                        <div class="relative hidden lg:block">
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80"
                                 alt="Project Management and Delivery"
                                 class="h-full w-full object-cover">
                        </div>
                        <div class="p-10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#c9a24d]">
                                    <svg class="h-6 w-6 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25Z"/></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Discipline 03</p>
                            </div>
                            <h2 class="mt-4 font-serif text-3xl font-bold text-[#07172f]">Project Management &amp; Delivery</h2>
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">We provide structured programme and project management across planning, execution, governance, and close-out phases.</p>
                            <div class="mt-8 grid gap-6 border-t border-[#e6e8ee] pt-8 sm:grid-cols-3">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">What it covers</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Programme and project management</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>PMO design and implementation</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Risk and issue management</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Milestone planning and tracking</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Stakeholder reporting and governance</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Who it supports</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Infrastructure and capital project owners</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Government programme offices</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Corporate delivery and transformation teams</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Organisations managing multi-workstream programmes</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Typical outcomes</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>On-track, milestone-led delivery</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Clear governance and accountability structure</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Reduced delivery risk</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Documented programme close-out</li>
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Training --}}
                <div id="training" class="tlg-reveal scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="lg:grid lg:grid-cols-[320px_1fr]">
                        {{-- CMS: replace with training service image --}}
                        <div class="relative hidden lg:block">
                            <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=600&q=80"
                                 alt="Training and Capacity Development"
                                 class="h-full w-full object-cover">
                        </div>
                        <div class="p-10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.627 48.627 0 0 1 12 20.904a48.627 48.627 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.57 50.57 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Discipline 04</p>
                            </div>
                            <h2 class="mt-4 font-serif text-3xl font-bold text-[#07172f]">Training &amp; Capacity Development</h2>
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">We design and deliver professional training and capacity development programmes tailored to your sector, team, and organisational objectives.</p>
                            <div class="mt-8 grid gap-6 border-t border-[#e6e8ee] pt-8 sm:grid-cols-3">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">What it covers</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Professional skills and technical training</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Workforce upskilling programmes</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Regulatory and compliance training</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Onboarding and induction design</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Institutional capacity building</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Who it supports</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>HR and learning &amp; development teams</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Public sector agencies and institutions</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Organisations managing workforce transition</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Skills development and training bodies</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Typical outcomes</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Measurable skills and competency improvement</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Regulatory readiness and compliance capability</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Higher-performing, better-prepared teams</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Documented training frameworks</li>
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Business Consulting --}}
                <div id="consulting" class="tlg-reveal scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="lg:grid lg:grid-cols-[320px_1fr]">
                        {{-- CMS: replace with consulting service image --}}
                        <div class="relative hidden lg:block">
                            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=600&q=80"
                                 alt="Business Consulting"
                                 class="h-full w-full object-cover">
                        </div>
                        <div class="p-10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#123f8c]">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Discipline 05</p>
                            </div>
                            <h2 class="mt-4 font-serif text-3xl font-bold text-[#07172f]">Business Consulting</h2>
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">We provide strategic advisory and performance improvement consulting for leadership teams navigating change, growth, and operational complexity.</p>
                            <div class="mt-8 grid gap-6 border-t border-[#e6e8ee] pt-8 sm:grid-cols-3">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">What it covers</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Business strategy development</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Operational improvement and optimisation</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Organisational design and restructuring</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Performance benchmarking</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Executive advisory and decision support</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Who it supports</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>C-suite and senior leadership teams</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Boards and executive committees</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Growth-stage and transforming organisations</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Organisations requiring independent advisory</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Typical outcomes</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Clear strategic direction and priorities</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Improved operational performance</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Informed, evidence-based decision-making</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Structured improvement roadmaps</li>
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Recruitment --}}
                <div id="recruitment" class="tlg-reveal scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="lg:grid lg:grid-cols-[320px_1fr]">
                        {{-- CMS: replace with recruitment service image --}}
                        <div class="relative hidden lg:block">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80"
                                 alt="Recruitment and Workforce Solutions"
                                 class="h-full w-full object-cover">
                        </div>
                        <div class="p-10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#c9a24d]">
                                    <svg class="h-6 w-6 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Discipline 06</p>
                            </div>
                            <h2 class="mt-4 font-serif text-3xl font-bold text-[#07172f]">Recruitment &amp; Workforce Solutions</h2>
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">We source, screen, and place specialist professionals across permanent, interim, and contract roles — matched to the technical and cultural requirements of each engagement.</p>
                            <div class="mt-8 grid gap-6 border-t border-[#e6e8ee] pt-8 sm:grid-cols-3">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">What it covers</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Specialist professional placement</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Interim and contract staffing</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Workforce planning and gap analysis</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Role profiling and talent sourcing</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Multi-discipline team augmentation</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Who it supports</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Hiring managers and HR departments</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Project teams with specialist resource gaps</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Infrastructure and engineering programmes</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Organisations scaling delivery capacity</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Typical outcomes</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Right-fit professionals placed efficiently</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Faster capability deployment</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Reduced recruitment friction and cost</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Sustained workforce capacity</li>
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Compliance & Governance --}}
                <div id="compliance" class="tlg-reveal scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="lg:grid lg:grid-cols-[320px_1fr]">
                        {{-- CMS: replace with compliance service image --}}
                        <div class="relative hidden lg:block">
                            <img src="https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?auto=format&fit=crop&w=600&q=80"
                                 alt="Compliance Governance and Information Security"
                                 class="h-full w-full object-cover">
                        </div>
                        <div class="p-10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Discipline 07</p>
                            </div>
                            <h2 class="mt-4 font-serif text-3xl font-bold text-[#07172f]">Compliance, Governance &amp; Information Security</h2>
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">We help organisations strengthen their compliance frameworks, governance structures, and information security posture — building resilient, audit-ready practices.</p>
                            <div class="mt-8 grid gap-6 border-t border-[#e6e8ee] pt-8 sm:grid-cols-3">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">What it covers</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Compliance framework design and review</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Policy development and documentation</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Audit readiness preparation</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Data governance and protection</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Information security strategy</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Who it supports</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Compliance and legal officers</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Board governance and risk committees</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Regulated industries and public bodies</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Organisations preparing for external audit</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Typical outcomes</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Audit-ready governance documentation</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Robust and sustainable compliance culture</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Reduced regulatory and information risk</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Structured policy and governance frameworks</li>
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Multidisciplinary --}}
                <div id="multidisciplinary" class="tlg-reveal scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                    <div class="lg:grid lg:grid-cols-[320px_1fr]">
                        {{-- CMS: replace with multidisciplinary service image --}}
                        <div class="relative hidden lg:block">
                            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=600&q=80"
                                 alt="Multidisciplinary Consulting"
                                 class="h-full w-full object-cover">
                        </div>
                        <div class="p-10">
                            <div class="flex items-center gap-3">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#123f8c]">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                                </div>
                                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Discipline 08</p>
                            </div>
                            <h2 class="mt-4 font-serif text-3xl font-bold text-[#07172f]">Multidisciplinary Consulting</h2>
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">For engagements spanning multiple disciplines, The Lylods Group coordinates across practice areas under a single point of accountability — managing complexity so you can focus on outcomes.</p>
                            <div class="mt-8 grid gap-6 border-t border-[#e6e8ee] pt-8 sm:grid-cols-3">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">What it covers</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Cross-discipline programme coordination</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Integrated advisory across multiple workstreams</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Unified reporting and governance</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Multi-team delivery management</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Strategic and operational integration</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Who it supports</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Large-scale project and programme owners</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Organisations with complex multi-function requirements</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Strategic transformation initiatives</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Clients requiring a single coordinating partner</li>
                                    </ul>
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Typical outcomes</p>
                                    <ul class="mt-3 space-y-2">
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Unified delivery across disciplines</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Reduced coordination overhead and friction</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Single-source governance and accountability</li>
                                        <li class="flex items-start gap-2 text-sm leading-6 text-[#667085]"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>Structured, documented multi-discipline outputs</li>
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Capability matrix --}}
    <section class="bg-[#07172f] text-white">
        <div class="mx-auto max-w-7xl px-6 py-24">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Capability Overview</p>
                <h2 class="mt-4 font-serif text-4xl font-bold">How our disciplines are structured.</h2>
                <p class="mt-5 leading-7 text-slate-300">Our eight service areas are grouped across three practice clusters — enabling coordinated, cross-disciplinary delivery under a single accountable partner.</p>
            </div>

            <div class="mt-14 grid gap-6 lg:grid-cols-3">
                {{-- Technical Practice --}}
                <div class="tlg-reveal tlg-d1 rounded-[1.75rem] border border-white/10 bg-white/5 p-8 transition-all duration-300 hover:bg-white/10">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Technical Practice</p>
                    <h3 class="mt-4 text-xl font-bold text-white">Engineering &amp; Technology</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-300">Specialist technical expertise for infrastructure projects, digital transformation, and systems-level challenges across sectors.</p>
                    <ul class="mt-6 space-y-3">
                        <li class="flex items-center gap-2.5 text-sm text-slate-200">
                            <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            Engineering &amp; Infrastructure Solutions
                        </li>
                        <li class="flex items-center gap-2.5 text-sm text-slate-200">
                            <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            Technology &amp; Innovation Services
                        </li>
                    </ul>
                    <div class="mt-8 border-t border-white/10 pt-6">
                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-slate-400">Typical Sectors</p>
                        <p class="mt-2 text-xs text-slate-400">Infrastructure · Energy · Government · Industrial</p>
                    </div>
                </div>

                {{-- Delivery Practice --}}
                <div class="tlg-reveal tlg-d2 rounded-[1.75rem] border border-white/10 bg-white/5 p-8 transition-all duration-300 hover:bg-white/10">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Delivery Practice</p>
                    <h3 class="mt-4 text-xl font-bold text-white">Programme &amp; People</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-300">End-to-end programme management and human capital services — ensuring delivery capability and workforce readiness at every stage.</p>
                    <ul class="mt-6 space-y-3">
                        <li class="flex items-center gap-2.5 text-sm text-slate-200">
                            <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            Project Management &amp; Delivery
                        </li>
                        <li class="flex items-center gap-2.5 text-sm text-slate-200">
                            <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            Training &amp; Capacity Development
                        </li>
                        <li class="flex items-center gap-2.5 text-sm text-slate-200">
                            <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            Recruitment &amp; Workforce Solutions
                        </li>
                    </ul>
                    <div class="mt-8 border-t border-white/10 pt-6">
                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-slate-400">Typical Sectors</p>
                        <p class="mt-2 text-xs text-slate-400">All sectors · Cross-industry · Public &amp; Private</p>
                    </div>
                </div>

                {{-- Advisory Practice --}}
                <div class="tlg-reveal tlg-d3 rounded-[1.75rem] bg-[#c9a24d] p-8 transition-all duration-300 hover:brightness-105">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#07172f]">Advisory Practice</p>
                    <h3 class="mt-4 text-xl font-bold text-[#07172f]">Strategy &amp; Governance</h3>
                    <p class="mt-4 text-sm leading-7 text-[#07172f]/75">Strategic advisory, governance leadership, and integrated multi-discipline engagement for organisations navigating complexity.</p>
                    <ul class="mt-6 space-y-3">
                        <li class="flex items-center gap-2.5 text-sm text-[#07172f]">
                            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            Business Consulting
                        </li>
                        <li class="flex items-center gap-2.5 text-sm text-[#07172f]">
                            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            Compliance &amp; Governance
                        </li>
                        <li class="flex items-center gap-2.5 text-sm text-[#07172f]">
                            <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            Multidisciplinary Consulting
                        </li>
                    </ul>
                    <div class="mt-8 border-t border-[#07172f]/20 pt-6">
                        <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#07172f]/60">Typical Sectors</p>
                        <p class="mt-2 text-xs text-[#07172f]/70">Financial Services · Professional Services · Technology · Government</p>
                    </div>
                </div>
            </div>

            <div class="tlg-reveal mt-12">
                <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">
                    Discuss Your Requirements
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-20">
            <div class="tlg-reveal rounded-[2rem] bg-[#07172f] px-8 py-12 text-white md:px-12">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Work With Us</p>
                        <h2 class="mt-4 font-serif text-4xl font-bold">Discuss your requirements with our team.</h2>
                        <p class="mt-4 max-w-2xl leading-7 text-slate-300">Whether you have a defined scope of work or an early-stage need, we welcome conversations about how The Lylods Group can support your organisation.</p>
                    </div>
                    <a href="{{ route('contact') }}" class="inline-flex justify-center rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">Get in Touch</a>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>

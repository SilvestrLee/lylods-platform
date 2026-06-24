<x-layouts.public title="Professional Services — The Lylods Group">

    {{-- Hero with background image --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        {{-- CMS: replace image with services->hero_image --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1800&q=80"
                 alt="" class="h-full w-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-r from-[#07172f] via-[#07172f]/90 to-[#07172f]/60"></div>
        </div>
        <div class="relative mx-auto max-w-7xl px-6 py-28">
            <div class="max-w-4xl">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">Professional Services</p>
                <h1 class="mt-6 font-serif text-5xl font-bold leading-tight tracking-tight md:text-7xl">
                    Comprehensive Expertise for Complex Challenges
                </h1>
                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-200">
                    The Lylods Group delivers across eight professional service disciplines, providing clients with the full range of expertise required for high-stakes and complex engagements. We bring structure, experience, and accountability to every scope of work.
                </p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="{{ route('contact') }}" class="rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] hover:bg-[#d8b765]">Discuss Your Requirements</a>
                    <a href="{{ route('about') }}" class="rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white hover:bg-white/10">About The Group</a>
                </div>
            </div>
        </div>
    </section>

    {{-- Services list --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-7xl px-6 py-20">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">Our Disciplines</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">Eight service areas. One accountable partner.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">Our disciplines are structured to complement each other. Clients working across multiple areas benefit from coordinated advisory and unified delivery under a single point of accountability.</p>
            </div>

            <div class="mt-14 space-y-6">

                {{-- Engineering & Infrastructure --}}
                <div id="engineering" class="scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">
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
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">We provide engineering consultancy and infrastructure advisory for projects requiring structural, civil, and operational expertise. Our teams support feasibility assessment, technical planning, delivery oversight, and asset management across sectors. We work alongside project owners, developers, and contractors to bring clarity and rigour to complex engineering programmes.</p>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Technology & Innovation --}}
                <div id="technology" class="scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">
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
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">We support digital transformation, systems integration, and technology strategy for organisations navigating change. Our advisory covers enterprise architecture, technology roadmap development, solution selection, and emerging technology adoption. We help clients modernise operations, improve efficiency, and position themselves for sustainable growth through informed technology decisions.</p>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Project Management --}}
                <div id="project-management" class="scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">
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
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">We provide end-to-end project and programme management services, from initial scope definition and planning through to delivery, close-out, and handover. Our approach is structured, milestone-driven, and transparent. We bring experienced project professionals who can lead, coordinate, or support delivery across industries, applying recognised methodologies tailored to each engagement.</p>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Training --}}
                <div id="training" class="scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">
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
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">We design and deliver professional training, workforce upskilling, and capacity development programmes aligned to organisational goals and sector requirements. Our training engagements are tailored to the specific context of each client — whether addressing skills gaps, onboarding new capabilities, or preparing teams for regulatory or operational change. We measure our training outcomes by real-world application and sustained performance.</p>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Business Consulting --}}
                <div id="consulting" class="scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">
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
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">We provide strategic business advisory across operations, growth planning, organisational design, and performance improvement. Our consultants work alongside leadership teams to inform critical decisions, identify efficiencies, and support the execution of business strategy. We bring an independent, evidence-based perspective designed to challenge assumptions and strengthen outcomes.</p>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Recruitment --}}
                <div id="recruitment" class="scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">
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
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">We support organisations in identifying, attracting, and placing skilled professionals across a range of functions and seniority levels. Our recruitment services extend from permanent placement to specialist interim and contract roles. We take time to understand the technical and cultural requirements of each role to ensure the right fit for both client and candidate.</p>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Compliance & Governance --}}
                <div id="compliance" class="scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">
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
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">We help organisations understand and meet their regulatory obligations, strengthen internal governance structures, and protect information assets against risk. Our advisory covers compliance framework development, policy design, audit readiness, data governance, and information security strategy. We work with clients to build robust, sustainable compliance cultures rather than one-time fixes.</p>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Multidisciplinary --}}
                <div id="multidisciplinary" class="scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm">
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
                            <p class="mt-5 max-w-3xl text-lg leading-8 text-[#667085]">For engagements that require expertise across multiple disciplines, The Lylods Group coordinates across our practice areas to provide cohesive, integrated consultancy under a single point of accountability. We manage the complexity of multi-discipline programmes so our clients can focus on their objectives. This approach is particularly valuable for large-scale projects, organisational transformation, and strategic initiatives with overlapping workstreams.</p>
                            <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] hover:bg-[#07172f] hover:text-white">
                                Enquire About This Service
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-20">
            <div class="rounded-[2rem] bg-[#07172f] px-8 py-12 text-white md:px-12">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Work With Us</p>
                        <h2 class="mt-4 font-serif text-4xl font-bold">Discuss your requirements with our team.</h2>
                        <p class="mt-4 max-w-2xl leading-7 text-slate-300">Whether you have a defined scope of work or an early-stage need, we welcome conversations about how The Lylods Group can support your organisation.</p>
                    </div>
                    <a href="{{ route('contact') }}" class="inline-flex justify-center rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] hover:bg-[#d8b765]">Get in Touch</a>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>

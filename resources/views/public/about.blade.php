<x-layouts.public title="About Us — The Lylods Group">

    {{-- Hero with background image --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        {{-- CMS: replace image with about->hero_image --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=1800&q=80"
                 alt="" class="h-full w-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-r from-[#07172f] via-[#07172f]/90 to-[#07172f]/60"></div>
        </div>
        <div class="relative mx-auto max-w-7xl px-6 py-28">
            <div class="tlg-reveal max-w-4xl">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">About The Lylods Group</p>
                <h1 class="mt-6 font-serif text-4xl font-bold leading-[0.95] tracking-tight md:text-5xl lg:text-[3.5rem] xl:text-[3.85rem]">
                    A Professional Services Organisation Built on Expertise, Delivery, and Integrity
                </h1>
                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-200">
                    The Lylods Group is a multidisciplinary consulting organisation providing professional services across engineering, technology, project management, compliance, and strategic advisory to clients across sectors.
                </p>
                <p class="mt-5 max-w-3xl text-base leading-7 text-slate-300">From engineering consultancy to digital transformation, from compliance advisory to specialist recruitment — our disciplines work together to serve clients with complex, cross-functional requirements.</p>
            </div>
        </div>
    </section>

    {{-- Stats band --}}
    <div class="border-t border-white/10 bg-[#07172f]">
        <div class="mx-auto max-w-7xl px-6 py-8">
            <dl class="grid grid-cols-2 gap-x-6 gap-y-8 sm:grid-cols-4 text-center">
                <div class="tlg-reveal tlg-d1">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Service Disciplines</dt>
                    <dd class="mt-2 font-serif text-4xl font-bold text-white">8</dd>
                </div>
                <div class="tlg-reveal tlg-d2">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Practice Coverage</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">Engineering to Compliance</dd>
                    <dd class="mt-1 text-xs text-slate-400">Full professional service scope</dd>
                </div>
                <div class="tlg-reveal tlg-d3">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Partner Model</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">Single Accountable Partner</dd>
                    <dd class="mt-1 text-xs text-slate-400">Across all disciplines &amp; deliverables</dd>
                </div>
                <div class="tlg-reveal tlg-d4">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Standards</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">Governance-Led</dd>
                    <dd class="mt-1 text-xs text-slate-400">Professional conduct at every stage</dd>
                </div>
            </dl>
        </div>
    </div>

    {{-- Who we are — with image --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto grid max-w-7xl gap-16 px-6 py-24 lg:grid-cols-2 lg:items-center">
            <div class="tlg-reveal">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">Who We Are</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">
                    Multidisciplinary expertise for complex challenges.
                </h2>
                <div class="mt-6 space-y-5 text-lg leading-8 text-[#667085]">
                    <p>The Lylods Group is a professional services organisation structured to support clients across multiple disciplines. We combine consulting expertise with operational delivery, enabling clients to address complex challenges through a single, accountable partner.</p>
                    <p>Our work spans engineering and infrastructure advisory, technology and digital transformation, project and programme management, training and workforce development, business consulting, compliance and governance, and specialist recruitment.</p>
                    <p>We operate with a commitment to quality, transparency, and results. Every engagement is approached with rigour and a focus on the outcomes that matter to our clients.</p>
                </div>
                <a href="{{ route('contact') }}" class="mt-8 inline-flex items-center gap-2 rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white transition-all duration-300 hover:bg-[#123f8c]">
                    Discuss Your Requirements
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>

            {{-- CMS: replace with about->team_image --}}
            <div class="tlg-reveal tlg-d1 relative overflow-hidden rounded-[2rem] shadow-2xl">
                <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?auto=format&fit=crop&w=900&q=80"
                     alt="The Lylods Group team"
                     class="h-full w-full object-cover" style="min-height:460px;">
                <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/20 to-transparent"></div>
            </div>
        </div>
    </section>

    {{-- Values --}}
    <section id="values" class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-24">
            <div class="tlg-reveal max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Our Values</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">The principles that guide every engagement.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">Our values are operational commitments that shape how we work with clients, structure our teams, and measure success.</p>
            </div>

            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div class="tlg-reveal tlg-d1 rounded-3xl border border-[#e6e8ee] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-[#07172f]">Integrity</h3>
                    <p class="mt-4 leading-7 text-[#667085]">We operate with transparency and accountability in every engagement. Our clients can expect honest advice, clear communication, and ethical conduct at all times.</p>
                </div>
                <div class="tlg-reveal tlg-d2 rounded-3xl border border-[#e6e8ee] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#123f8c]">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-[#07172f]">Excellence</h3>
                    <p class="mt-4 leading-7 text-[#667085]">We uphold rigorous professional standards across all disciplines. Quality is not a target — it is a baseline expectation applied to every workstream and deliverable.</p>
                </div>
                <div class="tlg-reveal tlg-d3 rounded-3xl border border-[#e6e8ee] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#c9a24d]">
                        <svg class="h-6 w-6 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-[#07172f]">Delivery</h3>
                    <p class="mt-4 leading-7 text-[#667085]">We are outcomes-focused. Our engagements are structured around what clients need to achieve, with clear milestones, accountable teams, and measurable results.</p>
                </div>
                <div class="tlg-reveal tlg-d4 rounded-3xl border border-[#e6e8ee] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-[#07172f]">Partnership</h3>
                    <p class="mt-4 leading-7 text-[#667085]">We build long-term relationships with clients grounded in shared objectives and mutual trust. We invest in understanding each client's context so our work is genuinely useful.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- How We Work --}}
    <section class="bg-[#07172f] text-white">
        <div class="mx-auto max-w-7xl px-6 py-24">
            <div class="max-w-2xl tlg-reveal">
                <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Our Process</p>
                <h2 class="mt-4 font-serif text-4xl font-bold md:text-5xl">How we work.</h2>
                <p class="mt-5 leading-7 text-slate-300">Our approach is consistent and structured. Every engagement follows a clear process from initial requirements through to delivery and close-out.</p>
            </div>
            <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-[1.75rem] border border-white/10 bg-white/5 p-8 tlg-reveal tlg-d1 transition-all duration-300 hover:bg-white/10">
                    <span class="inline-block rounded-full bg-white/10 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Stage 01</span>
                    <h3 class="mt-5 text-lg font-bold text-white">Understand</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-400">We take time to understand your requirements, constraints, and objectives before proposing any approach or solution.</p>
                </div>
                <div class="rounded-[1.75rem] border border-white/10 bg-white/5 p-8 tlg-reveal tlg-d2 transition-all duration-300 hover:bg-white/10">
                    <span class="inline-block rounded-full bg-white/10 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Stage 02</span>
                    <h3 class="mt-5 text-lg font-bold text-white">Propose</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-400">We develop a clear, structured proposal with defined scope, resources, timelines, and measurable expected outcomes.</p>
                </div>
                <div class="rounded-[1.75rem] border border-white/10 bg-white/5 p-8 tlg-reveal tlg-d3 transition-all duration-300 hover:bg-white/10">
                    <span class="inline-block rounded-full bg-white/10 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Stage 03</span>
                    <h3 class="mt-5 text-lg font-bold text-white">Deliver</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-400">We execute with accountability — deploying the right expertise, maintaining communication, and managing progress against agreed milestones.</p>
                </div>
                <div class="rounded-[1.75rem] bg-[#c9a24d] p-8 tlg-reveal tlg-d4 transition-all duration-300 hover:brightness-105">
                    <span class="inline-block rounded-full bg-[#07172f]/10 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.18em] text-[#07172f]">Stage 04</span>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Review</h3>
                    <p class="mt-3 text-sm leading-6 text-[#07172f]/80">We close every engagement with a structured review, ensuring outputs are documented, outcomes are measured, and lessons are captured.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Disciplines --}}
    <section id="disciplines" class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-7xl px-6 py-24">
            <div class="tlg-reveal max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">What We Do</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">Eight disciplines. One point of accountability.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">Our capabilities span eight distinct service areas, enabling us to support clients at every stage of their projects and business objectives.</p>
            </div>

            <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <a href="{{ route('services') }}#engineering" class="tlg-reveal group flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21"/></svg>
                    <div><p class="font-bold text-[#07172f] group-hover:text-[#123f8c]">Engineering &amp; Infrastructure</p><p class="mt-1 text-sm text-[#667085]">Advisory and delivery for engineering projects.</p></div>
                </a>
                <a href="{{ route('services') }}#technology" class="tlg-reveal group flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z"/></svg>
                    <div><p class="font-bold text-[#07172f] group-hover:text-[#123f8c]">Technology &amp; Innovation</p><p class="mt-1 text-sm text-[#667085]">Digital transformation and technology strategy.</p></div>
                </a>
                <a href="{{ route('services') }}#project-management" class="tlg-reveal group flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25Z"/></svg>
                    <div><p class="font-bold text-[#07172f] group-hover:text-[#123f8c]">Project Management &amp; Delivery</p><p class="mt-1 text-sm text-[#667085]">End-to-end programme and project management.</p></div>
                </a>
                <a href="{{ route('services') }}#training" class="tlg-reveal group flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.627 48.627 0 0 1 12 20.904a48.627 48.627 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.57 50.57 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>
                    <div><p class="font-bold text-[#07172f] group-hover:text-[#123f8c]">Training &amp; Capacity Development</p><p class="mt-1 text-sm text-[#667085]">Professional training and workforce upskilling.</p></div>
                </a>
                <a href="{{ route('services') }}#consulting" class="tlg-reveal group flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/></svg>
                    <div><p class="font-bold text-[#07172f] group-hover:text-[#123f8c]">Business Consulting</p><p class="mt-1 text-sm text-[#667085]">Strategic advisory and organisational improvement.</p></div>
                </a>
                <a href="{{ route('services') }}#recruitment" class="tlg-reveal group flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                    <div><p class="font-bold text-[#07172f] group-hover:text-[#123f8c]">Recruitment &amp; Workforce</p><p class="mt-1 text-sm text-[#667085]">Specialist placement and workforce augmentation.</p></div>
                </a>
                <a href="{{ route('services') }}#compliance" class="tlg-reveal group flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                    <div><p class="font-bold text-[#07172f] group-hover:text-[#123f8c]">Compliance &amp; Governance</p><p class="mt-1 text-sm text-[#667085]">Regulatory compliance and information security.</p></div>
                </a>
                <a href="{{ route('services') }}#multidisciplinary" class="tlg-reveal group flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                    <div><p class="font-bold text-[#07172f] group-hover:text-[#123f8c]">Multidisciplinary Consulting</p><p class="mt-1 text-sm text-[#667085]">Integrated advisory across multiple practice areas.</p></div>
                </a>
            </div>

            <div class="mt-10">
                <a href="{{ route('services') }}" class="inline-flex items-center gap-2 rounded-full border border-[#07172f] px-6 py-3 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                    View Full Services Overview
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>
        </div>
    </section>

    {{-- Operating Principles --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-20">
            <div class="max-w-2xl tlg-reveal">
                <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#123f8c]">How We Operate</p>
                <h2 class="mt-3 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">Operating principles.</h2>
                <p class="mt-5 text-lg leading-7 text-[#667085]">These are the standards that govern how we structure engagements, manage our teams, and communicate with clients at every stage.</p>
            </div>
            <div class="mt-12 grid gap-5 md:grid-cols-2">
                <div class="flex items-start gap-5 rounded-2xl border border-[#e6e8ee] p-7 tlg-reveal tlg-d1 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#07172f]">Clearly Defined Scope</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Every engagement begins with a documented scope. We do not proceed until the brief, deliverables, and accountability are clearly agreed by all parties.</p>
                    </div>
                </div>
                <div class="flex items-start gap-5 rounded-2xl border border-[#e6e8ee] p-7 tlg-reveal tlg-d2 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#123f8c]">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#07172f]">Measurable Outcomes</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">We define success in measurable terms before work begins. Progress is tracked, reported, and assessed against agreed benchmarks throughout delivery.</p>
                    </div>
                </div>
                <div class="flex items-start gap-5 rounded-2xl border border-[#e6e8ee] p-7 tlg-reveal tlg-d3 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#c9a24d]">
                        <svg class="h-5 w-5 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#07172f]">Single Point of Accountability</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Regardless of discipline complexity, clients have one point of accountability. We coordinate across functions internally so clients manage a single relationship.</p>
                    </div>
                </div>
                <div class="flex items-start gap-5 rounded-2xl border border-[#e6e8ee] p-7 tlg-reveal tlg-d4 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-[#07172f]">Governance at Every Stage</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">We apply governance standards throughout — from initial scoping to final handover. Documentation, audit trails, and formal close-out are not optional; they are standard practice.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Engagement types --}}
    <section class="border-b border-[#e6e8ee] bg-white">
        <div class="mx-auto max-w-7xl px-6 py-16">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#667085]">How We Are Engaged</p>
                <h2 class="mt-3 font-serif text-3xl font-bold text-[#07172f]">Typical engagement types.</h2>
                <p class="mt-4 text-sm leading-7 text-[#667085]">Our work spans advisory, delivery, and implementation. Engagements range from focused specialist assignments to long-term multi-discipline programmes.</p>
            </div>
            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div class="tlg-reveal tlg-d1 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Technical</p>
                    <h3 class="mt-3 font-bold text-[#07172f]">Infrastructure &amp; Engineering Advisory</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">Feasibility assessments, technical planning, delivery oversight, and asset management for engineering and infrastructure projects.</p>
                </div>
                <div class="tlg-reveal tlg-d2 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Digital</p>
                    <h3 class="mt-3 font-bold text-[#07172f]">Enterprise Technology Programmes</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">Digital transformation, systems integration, technology roadmap development, and enterprise architecture advisory.</p>
                </div>
                <div class="tlg-reveal tlg-d3 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Programme</p>
                    <h3 class="mt-3 font-bold text-[#07172f]">Programme Controls &amp; PMO</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">Programme management office setup, controls frameworks, milestone reporting, and delivery assurance for complex programmes.</p>
                </div>
                <div class="tlg-reveal tlg-d1 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Advisory</p>
                    <h3 class="mt-3 font-bold text-[#07172f]">Strategic Business Consulting</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">Executive advisory on strategy, operations, organisational design, and performance improvement for leadership teams.</p>
                </div>
                <div class="tlg-reveal tlg-d2 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Compliance</p>
                    <h3 class="mt-3 font-bold text-[#07172f]">Regulatory &amp; Governance Frameworks</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">Compliance framework development, audit readiness, data governance, policy design, and information security strategy.</p>
                </div>
                <div class="tlg-reveal tlg-d3 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] p-6 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#c9a24d]">Integrated</p>
                    <h3 class="mt-3 font-bold text-[#07172f]">Multidisciplinary Programme Mobilisation</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">Coordinated mobilisation across multiple disciplines under a single point of accountability for large-scale or complex initiatives.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact CTA --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-20">
            <div class="tlg-reveal rounded-[2rem] bg-[#07172f] px-8 py-12 text-white md:px-12">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Work With Us</p>
                        <h2 class="mt-4 font-serif text-4xl font-bold">Ready to discuss your requirements?</h2>
                        <p class="mt-4 max-w-2xl leading-7 text-slate-300">Whether you have a specific project in mind, require specialist advisory, or want to understand how The Lylods Group can support your organisation, we welcome your enquiry.</p>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('contact') }}" class="inline-flex justify-center rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">Get in Touch</a>
                        <a href="{{ route('services') }}" class="inline-flex justify-center rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">Explore Services</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>

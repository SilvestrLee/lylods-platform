<x-layouts.public title="The Lylods Group — Multidisciplinary Professional Services">

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

        <div class="relative mx-auto grid max-w-7xl gap-14 px-6 py-28 lg:grid-cols-[1.1fr_0.9fr] lg:items-center lg:py-36">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">
                    The Lylods Group
                </p>
                <h1 class="mt-6 max-w-3xl font-serif text-5xl font-bold leading-tight tracking-tight md:text-6xl lg:text-7xl">
                    Delivering Excellence Across Engineering, Technology, and Professional Services
                </h1>
                <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-200">
                    We are a multidisciplinary consulting and professional services organisation. We partner with clients to deliver results across engineering, infrastructure, digital transformation, project management, compliance, and strategic advisory.
                </p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="{{ route('services') }}" class="rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] shadow-lg hover:bg-[#d8b765]">
                        Explore Our Services
                    </a>
                    <a href="{{ route('contact') }}" class="rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white hover:bg-white/10">
                        Get in Touch
                    </a>
                </div>
            </div>

            {{-- Capabilities panel --}}
            <div class="rounded-[2rem] border border-white/15 bg-white/10 p-5 shadow-2xl backdrop-blur-sm">
                <div class="rounded-[1.5rem] bg-white p-6 text-[#07172f]">
                    <div class="border-b border-[#e6e8ee] pb-5">
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Our Capabilities</p>
                        <h2 class="mt-2 text-xl font-bold text-[#07172f]">Eight Professional Disciplines</h2>
                    </div>
                    <div class="mt-5 grid gap-2 sm:grid-cols-2">
                        <div class="flex items-center gap-2.5 rounded-xl border border-[#e6e8ee] px-3.5 py-3">
                            <svg class="h-4 w-4 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21"/></svg>
                            <p class="text-xs font-bold text-[#07172f]">Engineering &amp; Infrastructure</p>
                        </div>
                        <div class="flex items-center gap-2.5 rounded-xl border border-[#e6e8ee] px-3.5 py-3">
                            <svg class="h-4 w-4 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z"/></svg>
                            <p class="text-xs font-bold text-[#07172f]">Technology &amp; Innovation</p>
                        </div>
                        <div class="flex items-center gap-2.5 rounded-xl border border-[#e6e8ee] px-3.5 py-3">
                            <svg class="h-4 w-4 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25Z"/></svg>
                            <p class="text-xs font-bold text-[#07172f]">Project Management</p>
                        </div>
                        <div class="flex items-center gap-2.5 rounded-xl border border-[#e6e8ee] px-3.5 py-3">
                            <svg class="h-4 w-4 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/></svg>
                            <p class="text-xs font-bold text-[#07172f]">Business Consulting</p>
                        </div>
                        <div class="flex items-center gap-2.5 rounded-xl border border-[#e6e8ee] px-3.5 py-3">
                            <svg class="h-4 w-4 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                            <p class="text-xs font-bold text-[#07172f]">Recruitment &amp; Workforce</p>
                        </div>
                        <div class="flex items-center gap-2.5 rounded-xl border border-[#e6e8ee] px-3.5 py-3">
                            <svg class="h-4 w-4 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                            <p class="text-xs font-bold text-[#07172f]">Compliance &amp; Governance</p>
                        </div>
                    </div>
                    <a href="{{ route('services') }}" class="mt-5 inline-flex items-center gap-2 rounded-full bg-[#07172f] px-5 py-2.5 text-xs font-bold text-white hover:bg-[#123f8c]">
                        View All Services
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Service disciplines strip --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-24">
            <div class="grid gap-4 lg:grid-cols-[1fr_auto] lg:items-end">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">Professional Services</p>
                    <h2 class="mt-3 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">
                        A single partner across<br class="hidden lg:block"> multiple disciplines.
                    </h2>
                </div>
                <a href="{{ route('services') }}" class="inline-flex items-center gap-2 rounded-full border border-[#07172f] px-6 py-3 text-sm font-bold text-[#07172f] hover:bg-[#07172f] hover:text-white">
                    View All Disciplines
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>

            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                {{-- CMS: each card image will be service->thumbnail --}}
                <a href="{{ route('services') }}#engineering" class="group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-white shadow-sm transition hover:shadow-lg hover:border-[#c9a24d]">
                    <div class="relative h-44 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=600&q=80" alt="Engineering and Infrastructure" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/60 to-transparent"></div>
                        <div class="absolute bottom-3 left-4">
                            <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21"/></svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-[#07172f]">Engineering &amp; Infrastructure</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Engineering consultancy and infrastructure advisory for complex projects.</p>
                    </div>
                </a>

                <a href="{{ route('services') }}#technology" class="group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-white shadow-sm transition hover:shadow-lg hover:border-[#c9a24d]">
                    <div class="relative h-44 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80" alt="Technology and Innovation" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/60 to-transparent"></div>
                        <div class="absolute bottom-3 left-4">
                            <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z"/></svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-[#07172f]">Technology &amp; Innovation</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Digital transformation, systems integration, and technology strategy.</p>
                    </div>
                </a>

                <a href="{{ route('services') }}#project-management" class="group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-white shadow-sm transition hover:shadow-lg hover:border-[#c9a24d]">
                    <div class="relative h-44 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=600&q=80" alt="Project Management" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/60 to-transparent"></div>
                        <div class="absolute bottom-3 left-4">
                            <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25Z"/></svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-[#07172f]">Project Management &amp; Delivery</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">End-to-end project management from scope through close-out.</p>
                    </div>
                </a>

                <a href="{{ route('services') }}#consulting" class="group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-white shadow-sm transition hover:shadow-lg hover:border-[#c9a24d]">
                    <div class="relative h-44 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=600&q=80" alt="Business Consulting" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/60 to-transparent"></div>
                        <div class="absolute bottom-3 left-4">
                            <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/></svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-[#07172f]">Business Consulting</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Strategic advisory across operations, growth, and performance improvement.</p>
                    </div>
                </a>

                <a href="{{ route('services') }}#training" class="group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-white shadow-sm transition hover:shadow-lg hover:border-[#c9a24d]">
                    <div class="relative h-44 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=600&q=80" alt="Training and Capacity Development" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/60 to-transparent"></div>
                        <div class="absolute bottom-3 left-4">
                            <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.627 48.627 0 0 1 12 20.904a48.627 48.627 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.57 50.57 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-[#07172f]">Training &amp; Capacity Development</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Professional training and workforce upskilling programmes.</p>
                    </div>
                </a>

                <a href="{{ route('services') }}#recruitment" class="group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-white shadow-sm transition hover:shadow-lg hover:border-[#c9a24d]">
                    <div class="relative h-44 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80" alt="Recruitment and Workforce" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/60 to-transparent"></div>
                        <div class="absolute bottom-3 left-4">
                            <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-[#07172f]">Recruitment &amp; Workforce Solutions</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Identifying and placing skilled professionals across roles.</p>
                    </div>
                </a>

                <a href="{{ route('services') }}#compliance" class="group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-white shadow-sm transition hover:shadow-lg hover:border-[#c9a24d]">
                    <div class="relative h-44 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?auto=format&fit=crop&w=600&q=80" alt="Compliance and Governance" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/60 to-transparent"></div>
                        <div class="absolute bottom-3 left-4">
                            <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-[#07172f]">Compliance &amp; Governance</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Regulatory compliance, governance frameworks, and information security.</p>
                    </div>
                </a>

                <a href="{{ route('services') }}#multidisciplinary" class="group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-white shadow-sm transition hover:shadow-lg hover:border-[#c9a24d]">
                    <div class="relative h-44 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=600&q=80" alt="Multidisciplinary Consulting" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/60 to-transparent"></div>
                        <div class="absolute bottom-3 left-4">
                            <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-[#07172f]">Multidisciplinary Consulting</h3>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Coordinated advisory across disciplines for integrated engagements.</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    {{-- About / values -- split with image --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-7xl px-6 py-24">
            <div class="grid gap-16 lg:grid-cols-2 lg:items-center">
                {{-- Image --}}
                {{-- CMS: replace with about->image --}}
                <div class="relative overflow-hidden rounded-[2rem] shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1560472355-536de3962603?auto=format&fit=crop&w=900&q=80"
                         alt="The Lylods Group — professionals collaborating"
                         class="h-full w-full object-cover" style="min-height: 480px;">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/30 to-transparent"></div>
                </div>

                {{-- Content --}}
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">About The Lylods Group</p>
                    <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">
                        Professional services built on expertise and integrity.
                    </h2>
                    <p class="mt-6 text-lg leading-8 text-[#667085]">
                        The Lylods Group is a multidisciplinary consulting organisation providing professional services across engineering, technology, project management, and strategic advisory. We work with clients who need a trusted partner with the depth to match their complexity.
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

                    <a href="{{ route('about') }}" class="mt-8 inline-flex items-center gap-2 rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white hover:bg-[#123f8c]">
                        About The Group
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Why TLG differentiators --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-24">
            <div class="max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Why The Lylods Group</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">Structured. Accountable. Results-driven.</h2>
            </div>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-3xl border border-[#e6e8ee] p-8">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#f7f3ea]">
                        <svg class="h-6 w-6 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Multi-Discipline Reach</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">Eight service disciplines under one accountable partner — reducing coordination burden and improving delivery cohesion for complex engagements.</p>
                </div>
                <div class="rounded-3xl border border-[#e6e8ee] p-8">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#f7f3ea]">
                        <svg class="h-6 w-6 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Structured Methodology</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">Our engagements follow a structured, milestone-driven approach that ensures clarity of scope, measurable progress, and defined accountability at every stage.</p>
                </div>
                <div class="rounded-3xl border border-[#e6e8ee] p-8">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#f7f3ea]">
                        <svg class="h-6 w-6 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Governance-Led</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">We operate with the discipline and governance standards expected of a professional services firm — across our consulting work and our investor relationships.</p>
                </div>
                <div class="rounded-3xl border border-[#e6e8ee] p-8">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#f7f3ea]">
                        <svg class="h-6 w-6 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Client-Centred Advisory</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">We invest time in understanding each client's context, objectives, and constraints — so our advice is genuinely applicable, not generic.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Investor access CTA --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-7xl px-6 py-20">
            <div class="relative overflow-hidden rounded-[2rem] bg-[#07172f] px-8 py-14 text-white md:px-14">
                {{-- CMS: replace background image with investor_cta->image --}}
                <div class="absolute inset-0 opacity-15">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=1400&q=80"
                         alt="" class="h-full w-full object-cover">
                </div>
                <div class="relative grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Investor Portal</p>
                        <h2 class="mt-4 font-serif text-4xl font-bold">Registered investors: access your portfolio dashboard.</h2>
                        <p class="mt-5 max-w-2xl leading-7 text-slate-300">
                            The Lylods Group investor portal provides registered investors with secure access to investment records, official notices, and account management. Contact us for investor access or investment enquiries.
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-3 lg:flex-col">
                        <a href="{{ route('login') }}" class="inline-flex justify-center rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] hover:bg-[#d8b765]">Investor Login</a>
                        <a href="{{ route('contact') }}" class="inline-flex justify-center rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white hover:bg-white/10">Investment Enquiry</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>

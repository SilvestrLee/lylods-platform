<x-layouts.public
    :title="$page->meta_title ?? 'Community and Project Development — The Lylods Group'"
    :description="$page->meta_description">

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=1800&q=80"
                 alt=""
                 class="h-full w-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-r from-[#07172f] via-[#07172f]/90 to-[#07172f]/60"></div>
        </div>
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

    {{-- Section One — What We Support --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">What We Support</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">Practical support across every stage of a community programme.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">From initial planning through to delivery and reporting, we help organisations structure and run community-focused work effectively.</p>
            </div>
            {{-- Future CMS-managed community content --}}
            <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

                <div class="tlg-reveal tlg-d1 rounded-3xl border border-[#e6e8ee] bg-white p-8 shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                    </div>
                    <h3 class="mt-5 font-bold text-[#07172f]">Community Programmes</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">Supporting the planning, coordination and delivery of community-facing programmes and activities.</p>
                </div>

                <div class="tlg-reveal tlg-d2 rounded-3xl border border-[#e6e8ee] bg-white p-8 shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                    </div>
                    <h3 class="mt-5 font-bold text-[#07172f]">Project Coordination</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">Keeping workstreams organised, timelines on track and communication clear across all project participants.</p>
                </div>

                <div class="tlg-reveal tlg-d3 rounded-3xl border border-[#e6e8ee] bg-white p-8 shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"/></svg>
                    </div>
                    <h3 class="mt-5 font-bold text-[#07172f]">Stakeholder Engagement</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">Facilitating communication and alignment between partners, funders, community groups and delivery teams.</p>
                </div>

                <div class="tlg-reveal tlg-d4 rounded-3xl border border-[#e6e8ee] bg-white p-8 shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21"/></svg>
                    </div>
                    <h3 class="mt-5 font-bold text-[#07172f]">Development Initiatives</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">Supporting organisations in designing and structuring community development activities with clear goals and outcomes.</p>
                </div>

                <div class="tlg-reveal tlg-d1 rounded-3xl border border-[#e6e8ee] bg-white p-8 shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#123f8c]">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016 2.993 2.993 0 0 0 2.25-1.016 3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z"/></svg>
                    </div>
                    <h3 class="mt-5 font-bold text-[#07172f]">Partnership Support</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">Helping organisations build effective working relationships with partner agencies, funders and community stakeholders.</p>
                </div>

                <div class="tlg-reveal tlg-d2 rounded-3xl border border-[#e6e8ee] bg-white p-8 shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#123f8c]">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
                    </div>
                    <h3 class="mt-5 font-bold text-[#07172f]">Delivery Planning</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">Translating programme goals into structured, actionable plans with clear milestones, responsibilities and timelines.</p>
                </div>

                <div class="tlg-reveal tlg-d3 rounded-3xl border border-[#e6e8ee] bg-white p-8 shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#123f8c]">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
                    </div>
                    <h3 class="mt-5 font-bold text-[#07172f]">Monitoring and Reporting</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">Tracking progress against objectives and producing documentation that evidences impact and informs next steps.</p>
                </div>

                <div class="tlg-reveal tlg-d4 rounded-3xl border border-[#e6e8ee] bg-white p-8 shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#c9a24d]">
                        <svg class="h-5 w-5 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>
                    </div>
                    <h3 class="mt-5 font-bold text-[#07172f]">Capacity Building</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">Helping organisations strengthen internal skills, processes and confidence to deliver community work more effectively.</p>
                </div>

            </div>
        </div>
    </section>

    {{-- Section Two — Who We Support --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal grid gap-14 lg:grid-cols-[1fr_1fr] lg:items-start">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Who We Support</p>
                    <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">We work with a wide range of organisations.</h2>
                    <p class="mt-5 text-lg leading-8 text-[#667085]">Our community and project development support is available to any organisation working toward a community-focused outcome — regardless of size, sector or structure.</p>
                    <a href="{{ route('contact') }}" class="mt-8 inline-flex items-center gap-2 rounded-full bg-[#07172f] px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-[#123f8c]">
                        Talk to Us About Your Project
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                    </a>
                    {{-- CMS: replace with community->audience_image --}}
                    <div class="mt-10 overflow-hidden rounded-2xl shadow-md">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80"
                             alt="Community stakeholder meeting"
                             class="h-64 w-full object-cover object-center">
                    </div>
                </div>
                {{-- Future CMS-managed community content --}}
                <div class="grid gap-3 sm:grid-cols-2">
                    @foreach([
                        ['label' => 'Community organisations', 'icon' => 'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z'],
                        ['label' => 'Charities', 'icon' => 'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z'],
                        ['label' => 'Local groups', 'icon' => 'M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z'],
                        ['label' => 'Public-sector partners', 'icon' => 'M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0 0 12 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75Z'],
                        ['label' => 'Faith-based organisations', 'icon' => 'M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21'],
                        ['label' => 'Training providers', 'icon' => 'M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5'],
                        ['label' => 'Social impact initiatives', 'icon' => 'M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z'],
                        ['label' => 'Businesses supporting community programmes', 'icon' => 'M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21'],
                    ] as $group)
                    <div class="flex items-center gap-4 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-5 py-4 transition-all duration-200 hover:border-[#c9a24d]">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#07172f]">
                            <svg class="h-4 w-4 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $group['icon'] }}"/></svg>
                        </div>
                        <span class="text-sm font-semibold text-[#07172f]">{{ $group['label'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Section Three — Our Role --}}
    <section class="bg-[#07172f] text-white">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal grid gap-14 lg:grid-cols-[1fr_1fr] lg:items-start">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Our Role</p>
                    <h2 class="mt-4 font-serif text-4xl font-bold lg:text-[2.4rem]">We help you move from idea to action.</h2>
                    <p class="mt-5 leading-8 text-slate-300">The Lylods Group acts as a practical delivery partner — helping community projects gain clarity, structure, coordination and momentum at every stage.</p>
                    {{-- CMS: replace with community->role_image --}}
                    <div class="mt-8 overflow-hidden rounded-2xl border border-white/10">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=800&q=80"
                             alt="Project planning and coordination session"
                             class="h-60 w-full object-cover object-center">
                    </div>
                </div>
                {{-- Future CMS-managed community content --}}
                <div class="space-y-4">
                    @foreach([
                        'Clarifying project goals so everyone involved understands the purpose and direction',
                        'Organising ideas into practical, sequenced actions with clear ownership',
                        'Coordinating stakeholders so communication is structured and progress is shared',
                        'Supporting planning and communication across all phases of delivery',
                        'Identifying delivery needs — people, resources, processes and timelines',
                        'Helping track progress and flag issues before they become blockers',
                        'Supporting documentation and reporting so outcomes are evidenced clearly',
                    ] as $index => $role)
                    <div class="tlg-reveal flex items-start gap-5 rounded-2xl border border-white/10 bg-white/5 px-6 py-5 transition-all duration-300 hover:bg-white/10">
                        <span class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-[#c9a24d]/15 text-[10px] font-bold text-[#c9a24d]">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <p class="text-sm leading-6 text-slate-300">{{ $role }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Section Four — How We Work --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">How We Work</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">A consistent four-stage approach.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">Each stage builds on the last — from understanding your programme through to supporting live delivery and review.</p>
            </div>
            {{-- Future CMS-managed community content --}}
            <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

                <div class="tlg-reveal tlg-d1 rounded-[1.75rem] border border-[#e6e8ee] bg-white p-8 shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <span class="inline-block rounded-full bg-[#07172f] px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#c9a24d]">01</span>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Understand the purpose</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">We begin by listening — understanding the programme objectives, the people involved, the context and the outcomes you are working toward.</p>
                </div>

                <div class="tlg-reveal tlg-d2 rounded-[1.75rem] border border-[#e6e8ee] bg-white p-8 shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <span class="inline-block rounded-full bg-[#07172f] px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#c9a24d]">02</span>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Structure the programme</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">We help translate your goals into a practical plan — breaking down the work into clear phases, responsibilities and milestones.</p>
                </div>

                <div class="tlg-reveal tlg-d3 rounded-[1.75rem] border border-[#e6e8ee] bg-white p-8 shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <span class="inline-block rounded-full bg-[#07172f] px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#c9a24d]">03</span>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Coordinate people and resources</h3>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">We bring together the right people, partners and resources — managing communication and coordination so nothing falls between the gaps.</p>
                </div>

                <div class="tlg-reveal tlg-d4 rounded-[1.75rem] bg-[#c9a24d] p-8 transition-all duration-300 hover:brightness-105">
                    <span class="inline-block rounded-full bg-[#07172f]/10 px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#07172f]">04</span>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Support delivery and review</h3>
                    <p class="mt-3 text-sm leading-6 text-[#07172f]/80">We stay engaged through live delivery — tracking progress, supporting reporting and helping you reflect on what worked and what to adjust.</p>
                </div>

            </div>
        </div>
    </section>

    {{-- Section Five — Example Engagement Areas --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Example Engagement Areas</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">Types of projects we can support.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">The following are examples of the kinds of community-focused programmes and initiatives we work with. These are engagement areas — not completed projects.</p>
            </div>
            {{-- Future CMS-managed community content --}}
            <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                {{-- Card 1 --}}
                <div class="tlg-reveal tlg-d1 group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] transition-all duration-300 hover:border-[#c9a24d] hover:bg-white hover:shadow-md">
                    {{-- CMS: replace with community->engagement_image_01 --}}
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=80"
                             alt="Community training session"
                             class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/40 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f] transition-all duration-300 group-hover:bg-[#123f8c]">
                            <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>
                        </div>
                        <h3 class="mt-6 font-bold text-[#07172f]">Community training programme</h3>
                        <p class="mt-3 text-sm leading-6 text-[#667085]">Designing and coordinating structured training programmes for community groups, charities or public-sector partners.</p>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="tlg-reveal tlg-d2 group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] transition-all duration-300 hover:border-[#c9a24d] hover:bg-white hover:shadow-md">
                    {{-- CMS: replace with community->engagement_image_02 --}}
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80"
                             alt="Employability support discussion"
                             class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/40 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f] transition-all duration-300 group-hover:bg-[#123f8c]">
                            <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/></svg>
                        </div>
                        <h3 class="mt-6 font-bold text-[#07172f]">Employability support initiative</h3>
                        <p class="mt-3 text-sm leading-6 text-[#667085]">Supporting programme design and delivery for employability and skills-based initiatives targeting local communities.</p>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div class="tlg-reveal tlg-d3 group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] transition-all duration-300 hover:border-[#c9a24d] hover:bg-white hover:shadow-md">
                    {{-- CMS: replace with community->engagement_image_03 --}}
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1529390079861-591de354faf5?auto=format&fit=crop&w=600&q=80"
                             alt="Youth development group activity"
                             class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/40 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f] transition-all duration-300 group-hover:bg-[#123f8c]">
                            <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                        </div>
                        <h3 class="mt-6 font-bold text-[#07172f]">Youth development project</h3>
                        <p class="mt-3 text-sm leading-6 text-[#667085]">Coordinating structured youth engagement projects that connect young people with opportunities, mentors and structured support.</p>
                    </div>
                </div>

                {{-- Card 4 --}}
                <div class="tlg-reveal tlg-d1 group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] transition-all duration-300 hover:border-[#c9a24d] hover:bg-white hover:shadow-md">
                    {{-- CMS: replace with community->engagement_image_04 --}}
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?auto=format&fit=crop&w=600&q=80"
                             alt="Local business and community meeting"
                             class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/40 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f] transition-all duration-300 group-hover:bg-[#123f8c]">
                            <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016 2.993 2.993 0 0 0 2.25-1.016 3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z"/></svg>
                        </div>
                        <h3 class="mt-6 font-bold text-[#07172f]">Local business support programme</h3>
                        <p class="mt-3 text-sm leading-6 text-[#667085]">Planning and coordinating programmes that connect local businesses with community networks, training or partnership opportunities.</p>
                    </div>
                </div>

                {{-- Card 5 --}}
                <div class="tlg-reveal tlg-d2 group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] transition-all duration-300 hover:border-[#c9a24d] hover:bg-white hover:shadow-md">
                    {{-- CMS: replace with community->engagement_image_05 --}}
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1542626991-cbc4e32524cc?auto=format&fit=crop&w=600&q=80"
                             alt="Multi-organisation partnership meeting"
                             class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/40 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f] transition-all duration-300 group-hover:bg-[#123f8c]">
                            <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"/></svg>
                        </div>
                        <h3 class="mt-6 font-bold text-[#07172f]">Partnership coordination</h3>
                        <p class="mt-3 text-sm leading-6 text-[#667085]">Supporting multi-organisation partnerships by managing communication, shared planning and joint accountability across all partners.</p>
                    </div>
                </div>

                {{-- Card 6 --}}
                <div class="tlg-reveal tlg-d3 group overflow-hidden rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] transition-all duration-300 hover:border-[#c9a24d] hover:bg-white hover:shadow-md">
                    {{-- CMS: replace with community->engagement_image_06 --}}
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=600&q=80"
                             alt="Capacity building workshop in progress"
                             class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/40 to-transparent"></div>
                    </div>
                    <div class="p-8">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f] transition-all duration-300 group-hover:bg-[#123f8c]">
                            <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                        </div>
                        <h3 class="mt-6 font-bold text-[#07172f]">Capacity building workshop</h3>
                        <p class="mt-3 text-sm leading-6 text-[#667085]">Designing and delivering structured workshops that help organisations build internal skills, confidence and processes.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Closing CTA --}}
    {{-- Future CMS-managed community content --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal overflow-hidden rounded-[2rem] bg-[#07172f] px-8 py-16 text-white md:px-14">
                <div class="grid gap-10 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Get Started</p>
                        <h2 class="mt-4 font-serif text-3xl font-bold leading-tight lg:text-4xl">Planning a community-focused project?</h2>
                        <p class="mt-5 max-w-2xl leading-8 text-slate-300">Talk to us about your programme, partnership, training or community development idea and we can help you structure the next steps.</p>
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

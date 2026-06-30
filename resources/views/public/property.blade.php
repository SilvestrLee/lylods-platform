<x-layouts.public
    :title="$page->meta_title ?? 'Property Packaging, Facilitation, Management and Development — The Lylods Group'"
    :description="$page->meta_description"
    :canonical="$page?->canonical_url"
    :robots="$page?->robots"
    :og-image="$page?->ogMedia?->url()">

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=1800&q=80"
                 alt="" class="h-full w-full object-cover opacity-20">
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
                    <a href="{{ $page->primary_cta_url }}" class="rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] shadow-lg transition-all duration-300 hover:bg-[#d8b765]">{{ $page->primary_cta_label }}</a>
                    @endif
                    @if($page->secondary_cta_label && $page->secondary_cta_url)
                    <a href="{{ $page->secondary_cta_url }}" class="rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">{{ $page->secondary_cta_label }}</a>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </section>

    {{-- What We Support --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">What We Support</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">Practical property support across the full opportunity lifecycle.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">We work with clients from initial opportunity identification through to delivery — coordinating the people, processes and practical requirements at each stage.</p>
            </div>
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                <div class="tlg-reveal tlg-d1 rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Property Sourcing and Packaging</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">Identifying and presenting opportunities aligned to your objectives, then packaging them with the coordination and documentation needed to move forward.</p>
                </div>

                <div class="tlg-reveal tlg-d2 rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Residential, Commercial and Land</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">Support across a range of property types — from residential units and buy-to-let opportunities through to commercial premises, land acquisition and mixed-use development.</p>
                </div>

                <div class="tlg-reveal tlg-d3 rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Feasibility Support</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">Helping clients assess the practical viability of property opportunities — coordinating the information, initial appraisals, and professional inputs needed to evaluate options clearly.</p>
                </div>

                <div class="tlg-reveal tlg-d1 rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#123f8c]">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Refurbishment and Development Coordination</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">Coordinating refurbishment and development programmes — managing timelines, workstreams, contractors and professional inputs to keep projects structured and on track.</p>
                </div>

                <div class="tlg-reveal tlg-d2 rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#123f8c]">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.169.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Landlord and Tenant Support</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">Supporting landlords and tenants with coordination, communication, and practical management — from tenancy setup and property readiness through to ongoing operational support.</p>
                </div>

                <div class="tlg-reveal tlg-d3 rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#123f8c]">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Property Management Coordination</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">Providing structured oversight and coordination support for property portfolios — reporting, scheduling, contractor management, and keeping assets operating smoothly.</p>
                </div>

                <div class="tlg-reveal tlg-d1 rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#c9a24d]">
                        <svg class="h-5 w-5 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Development Monitoring</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">Tracking development progress against agreed milestones — providing clients with clear, structured reporting and visibility at each stage of their development programme.</p>
                </div>

                <div class="tlg-reveal tlg-d2 rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#c9a24d]">
                        <svg class="h-5 w-5 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Stakeholder Coordination</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">Managing communication and coordination between the parties involved in a property project — developers, investors, agents, professional advisers, and community representatives.</p>
                </div>

                <div class="tlg-reveal tlg-d3 rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605"/></svg>
                    </div>
                    <h3 class="mt-5 text-lg font-bold text-[#07172f]">Investor Presentations</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">Preparing and structuring clear, professional presentations of property opportunities for investors — covering the opportunity overview, structure, and relevant supporting information.</p>
                </div>

            </div>
        </div>
    </section>

    {{-- Property context image break --}}
    <div class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-6">
            {{-- Future CMS-managed image --}}
            <div class="relative overflow-hidden rounded-[2rem] shadow-xl">
                <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=1600&q=80"
                     alt="Property coordination and professional facilitation"
                     class="h-72 w-full object-cover object-center lg:h-[420px]">
                <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/55 to-transparent"></div>
                <div class="absolute bottom-8 left-8 right-8">
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Our Reach</p>
                    <p class="mt-2 max-w-xl font-serif text-xl font-bold text-white lg:text-2xl">Supporting a wide range of clients across residential, commercial, land and development contexts.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Who We Help --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Who We Help</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">Supporting a wide range of property clients.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">Our property support is structured around the practical needs of each client type — whether you are buying for the first time or managing a development portfolio.</p>
            </div>
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

                <div class="tlg-reveal tlg-d1 rounded-[2rem] bg-white p-7 shadow-sm ring-1 ring-[#e6e8ee]">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12 11.204 3.045c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-[#07172f]">Property Owners</h3>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">Owners looking to manage, develop, refurbish or realise value from their property assets.</p>
                </div>

                <div class="tlg-reveal tlg-d2 rounded-[2rem] bg-white p-7 shadow-sm ring-1 ring-[#e6e8ee]">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-[#07172f]">Buyers</h3>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">Individuals and organisations seeking to identify and acquire suitable residential or commercial property.</p>
                </div>

                <div class="tlg-reveal tlg-d3 rounded-[2rem] bg-white p-7 shadow-sm ring-1 ring-[#e6e8ee]">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.169.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-[#07172f]">Landlords</h3>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">Landlords needing practical coordination support for property management, tenancy, and maintenance.</p>
                </div>

                <div class="tlg-reveal tlg-d4 rounded-[2rem] bg-white p-7 shadow-sm ring-1 ring-[#e6e8ee]">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#123f8c]">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941"/></svg>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-[#07172f]">Investors</h3>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">Investors seeking structured, packaged property opportunities with coordinated professional support.</p>
                </div>

                <div class="tlg-reveal tlg-d1 rounded-[2rem] bg-white p-7 shadow-sm ring-1 ring-[#e6e8ee]">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#123f8c]">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21"/></svg>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-[#07172f]">Developers</h3>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">Developers requiring coordination, programme oversight, and stakeholder management across development projects.</p>
                </div>

                <div class="tlg-reveal tlg-d2 rounded-[2rem] bg-white p-7 shadow-sm ring-1 ring-[#e6e8ee]">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#c9a24d]">
                        <svg class="h-6 w-6 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-[#07172f]">First-Time Buyers</h3>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">First-time buyers navigating the property process for the first time, needing clear coordination and guidance on next steps.</p>
                </div>

                <div class="tlg-reveal tlg-d3 rounded-[2rem] bg-white p-7 shadow-sm ring-1 ring-[#e6e8ee]">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#c9a24d]">
                        <svg class="h-6 w-6 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-[#07172f]">Community Organisations</h3>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">Community bodies, housing associations and social enterprises pursuing property-led community projects or developments.</p>
                </div>

                <div class="tlg-reveal tlg-d4 rounded-[2rem] bg-[#07172f] p-7 shadow-sm text-white">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10">
                        <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/></svg>
                    </div>
                    <h3 class="mt-5 text-base font-bold text-white">Corporate Clients</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-300">Businesses and organisations seeking property solutions for premises, portfolio management, or development-related requirements.</p>
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
                <p class="mt-5 text-lg leading-8 text-[#667085]">Our clients return because of how we work — not just what we deliver.</p>
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
        </div>
    </section>

    {{-- Our Role --}}
    <section class="bg-[#07172f] text-white">
        <div class="mx-auto max-w-[1440px] px-6 py-24">
            <div class="grid gap-16 lg:grid-cols-2 lg:items-start">

                <div class="tlg-reveal">
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Our Role</p>
                    <h2 class="mt-4 font-serif text-4xl font-bold lg:text-[2.4rem]">How The Lylods Group works with you.</h2>
                    <p class="mt-6 text-lg leading-8 text-slate-300">We coordinate, structure, facilitate and manage property processes — acting as the practical point of organisation between you and the professionals, parties and workstreams involved in your property opportunity.</p>
                    <p class="mt-5 leading-8 text-slate-400">We are not a regulated property firm. We do not provide legal, financial, surveying, planning or architectural services. Where these are needed, we work with or introduce clients to the right independent professionals.</p>

                    <div class="mt-10 space-y-4">
                        <div class="flex items-start gap-4 rounded-2xl border border-white/10 bg-white/5 p-5">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            <div>
                                <p class="font-semibold text-white">We coordinate</p>
                                <p class="mt-1 text-sm leading-6 text-slate-400">Managing workstreams, timelines, parties and communications so your property process stays organised and progresses.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 rounded-2xl border border-white/10 bg-white/5 p-5">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            <div>
                                <p class="font-semibold text-white">We structure</p>
                                <p class="mt-1 text-sm leading-6 text-slate-400">Packaging and presenting opportunities clearly — with documentation, information and context needed to support decision-making.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 rounded-2xl border border-white/10 bg-white/5 p-5">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            <div>
                                <p class="font-semibold text-white">We facilitate</p>
                                <p class="mt-1 text-sm leading-6 text-slate-400">Moving projects forward by coordinating decisions, introductions, and the practical steps between all parties involved.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 rounded-2xl border border-white/10 bg-white/5 p-5">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            <div>
                                <p class="font-semibold text-white">We connect</p>
                                <p class="mt-1 text-sm leading-6 text-slate-400">Introducing clients to appropriately qualified independent professionals where specialist or regulated advice is required.</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Professional Network --}}
                <div class="tlg-reveal tlg-d1">
                    <div class="rounded-[2rem] border border-white/10 bg-white/5 p-10">
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Our Professional Network</p>
                        <h3 class="mt-4 text-xl font-bold text-white lg:text-[1.75rem]">Independent professionals we work with.</h3>
                        <p class="mt-4 text-sm leading-7 text-slate-400">Where specialist or regulated advice is required, we work alongside or introduce clients to relevant qualified professionals. These introductions are made to appropriately qualified independent practitioners.</p>

                        <div class="mt-8 grid gap-3 sm:grid-cols-2">
                            <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                                <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                <span class="text-sm font-semibold text-white">Solicitors</span>
                            </div>
                            <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                                <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                <span class="text-sm font-semibold text-white">Surveyors</span>
                            </div>
                            <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                                <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                <span class="text-sm font-semibold text-white">Planners</span>
                            </div>
                            <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                                <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                <span class="text-sm font-semibold text-white">Brokers</span>
                            </div>
                            <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                                <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                <span class="text-sm font-semibold text-white">Architects</span>
                            </div>
                            <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 px-4 py-3">
                                <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                <span class="text-sm font-semibold text-white">Contractors</span>
                            </div>
                            <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 px-4 py-3 sm:col-span-2">
                                <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                <span class="text-sm font-semibold text-white">Financial Advisers</span>
                            </div>
                        </div>

                        <p class="mt-6 text-xs leading-6 text-slate-500">All professional introductions are to independent, qualified practitioners. The Lylods Group does not provide regulated advice.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Required Disclaimer --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-14">
            <div class="tlg-reveal rounded-[2rem] border border-[#e6e8ee] bg-white px-8 py-10 shadow-sm">
                <div class="flex items-start gap-5">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Important Notice</p>
                        <p class="mt-3 max-w-4xl leading-8 text-[#667085]">
                            The Lylods Group supports the coordination, packaging and practical development of property opportunities. Where specialist regulated, legal, surveying, planning, architectural, finance or tax advice is required, we work with or introduce clients to appropriately qualified independent professionals.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Closing CTA --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="relative overflow-hidden rounded-[2rem] bg-[#07172f] px-8 py-14 text-white md:px-14">
                <div class="relative tlg-reveal">
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Discuss a Property Opportunity</p>
                    <h2 class="mt-4 font-serif text-4xl font-bold lg:text-[2.4rem]">Ready to discuss a property opportunity?</h2>
                    <p class="mt-5 max-w-2xl leading-7 text-slate-300">Talk to us about your property sourcing, packaging, management, coordination or development support needs.</p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">
                            Start an Enquiry
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                        <a href="{{ route('services') }}" class="inline-flex rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white/10">
                            View All Services
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>

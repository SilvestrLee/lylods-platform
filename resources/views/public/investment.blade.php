<x-layouts.public
    :title="$page->meta_title ?? 'Investment Information — The Lylods Group'"
    :description="$page->meta_description">

    {{-- Hero with background image --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1800&q=80"
                 alt="" class="h-full w-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-r from-[#07172f] via-[#07172f]/90 to-[#07172f]/60"></div>
        </div>
        <div class="relative mx-auto max-w-7xl px-6 py-28">
            <div class="tlg-reveal max-w-4xl">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">{{ $page->hero_subtitle }}</p>
                <h1 class="mt-6 font-serif text-4xl font-bold leading-[0.95] tracking-tight md:text-5xl lg:text-[3.5rem] xl:text-[3.85rem]">
                    {{ $page->hero_title }}
                </h1>
                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-200">
                    {{ $page->hero_description }}
                </p>
                @if($page->primary_cta_label || $page->secondary_cta_label)
                <div class="mt-10 flex flex-wrap gap-4">
                    @if($page->primary_cta_label && $page->primary_cta_url)
                    <a href="{{ $page->primary_cta_url }}" class="rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] shadow-lg hover:bg-[#d8b765]">{{ $page->primary_cta_label }}</a>
                    @endif
                    @if($page->secondary_cta_label && $page->secondary_cta_url)
                    <a href="{{ $page->secondary_cta_url }}" class="rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white hover:bg-white/10">{{ $page->secondary_cta_label }}</a>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Stats band --}}
    <div class="border-t border-white/10 bg-[#07172f]">
        <div class="mx-auto max-w-7xl px-6 py-8">
            <dl class="grid grid-cols-2 gap-x-6 gap-y-8 sm:grid-cols-4 text-center">
                <div class="tlg-reveal tlg-d1">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Portal Type</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">Dedicated Portal</dd>
                    <dd class="mt-1 text-xs text-slate-400">Investor-only platform</dd>
                </div>
                <div class="tlg-reveal tlg-d2">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Access Model</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">Secure Login</dd>
                    <dd class="mt-1 text-xs text-slate-400">Role-restricted &amp; encrypted</dd>
                </div>
                <div class="tlg-reveal tlg-d3">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Communications</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">Official Notices</dd>
                    <dd class="mt-1 text-xs text-slate-400">Formal investor updates</dd>
                </div>
                <div class="tlg-reveal tlg-d4">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Oversight</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">Professionally Managed</dd>
                    <dd class="mt-1 text-xs text-slate-400">Administrator-controlled</dd>
                </div>
            </dl>
        </div>
    </div>

    {{-- Credibility signals --}}
    <section class="border-b border-[#e6e8ee] bg-white">
        <div class="mx-auto max-w-7xl px-6 py-10">
            <div class="grid gap-8 sm:grid-cols-3">
                <div class="tlg-reveal tlg-d1 flex items-start gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#f7f3ea]">
                        <svg class="h-5 w-5 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605"/></svg>
                    </div>
                    <div>
                        <p class="font-bold text-[#07172f]">Structured Platform</p>
                        <p class="mt-1 text-sm text-[#667085]">Investment records, notices, and portfolio visibility in a structured, organised investor dashboard.</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d2 flex items-start gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#f7f3ea]">
                        <svg class="h-5 w-5 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
                    </div>
                    <div>
                        <p class="font-bold text-[#07172f]">Secure Access</p>
                        <p class="mt-1 text-sm text-[#667085]">Dedicated investor login with encrypted, role-restricted access to your personal portfolio data.</p>
                    </div>
                </div>
                <div class="tlg-reveal tlg-d3 flex items-start gap-4">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#f7f3ea]">
                        <svg class="h-5 w-5 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"/></svg>
                    </div>
                    <div>
                        <p class="font-bold text-[#07172f]">Official Notices</p>
                        <p class="mt-1 text-sm text-[#667085]">Investor communications issued formally through the platform's official notices system.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Approach --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto grid max-w-7xl gap-14 px-6 py-24 lg:grid-cols-[1fr_1fr] lg:items-center">
            <div class="tlg-reveal">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">Our Approach</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">Investor relationships managed with structure and clarity.</h2>
                <p class="mt-6 text-lg leading-8 text-[#667085]">We believe investor relationships should be built on transparent processes, documented records, and clear communication. Our investor portal provides a structured environment for portfolio visibility, official notices, and account management — accessible securely by registered investors.</p>
                <p class="mt-5 text-lg leading-8 text-[#667085]">Investment arrangements with The Lylods Group are managed administratively, with all records maintained on the investor platform and communications delivered through the official notices system.</p>

                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="tlg-reveal tlg-d1 flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-5 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                        <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#07172f]">
                            <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
                        </div>
                        <div><p class="font-bold text-[#07172f] text-sm">Secure Portal Access</p><p class="mt-1 text-xs text-[#667085]">Dedicated login with encrypted dashboard</p></div>
                    </div>
                    <div class="tlg-reveal tlg-d2 flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-5 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                        <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#123f8c]">
                            <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605"/></svg>
                        </div>
                        <div><p class="font-bold text-[#07172f] text-sm">Investment Records</p><p class="mt-1 text-xs text-[#667085]">Portfolio visibility and record tracking</p></div>
                    </div>
                    <div class="tlg-reveal tlg-d3 flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-5 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                        <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#c9a24d]">
                            <svg class="h-4 w-4 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"/></svg>
                        </div>
                        <div><p class="font-bold text-[#07172f] text-sm">Official Notices</p><p class="mt-1 text-xs text-[#667085]">Investor updates and communications</p></div>
                    </div>
                    <div class="tlg-reveal tlg-d4 flex items-start gap-3 rounded-2xl border border-[#e6e8ee] bg-white p-5 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                        <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#07172f]">
                            <svg class="h-4 w-4 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25Z"/></svg>
                        </div>
                        <div><p class="font-bold text-[#07172f] text-sm">Account Management</p><p class="mt-1 text-xs text-[#667085]">Administrator-managed account setup</p></div>
                    </div>
                </div>
            </div>

            {{-- CMS: replace with investment->approach_image --}}
            <div class="tlg-reveal tlg-d1 relative overflow-hidden rounded-[2rem] shadow-2xl">
                <img src="https://images.unsplash.com/photo-1560472355-536de3962603?auto=format&fit=crop&w=900&q=80"
                     alt="Professional governance and investor relations"
                     class="h-full w-full object-cover" style="min-height:460px;">
                <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/30 to-transparent"></div>
            </div>
        </div>
    </section>

    {{-- Why TLG --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-24">
            <div class="tlg-reveal max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Why The Lylods Group</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">Investment governed by professional standards.</h2>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-3">
                <div class="tlg-reveal tlg-d1 rounded-3xl border border-[#e6e8ee] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-[#07172f]">Structured Visibility</h3>
                    <p class="mt-4 leading-7 text-[#667085]">Registered investors access a dedicated portal displaying investment records, status, and historical account information in a clear, organised format.</p>
                </div>

                <div class="tlg-reveal tlg-d2 rounded-3xl border border-[#e6e8ee] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#123f8c]">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-[#07172f]">Official Communications</h3>
                    <p class="mt-4 leading-7 text-[#667085]">Investors receive updates, notices, and communications through the official notices system — ensuring timely, documented, and auditable investor communication.</p>
                </div>

                <div class="tlg-reveal tlg-d3 rounded-3xl border border-[#e6e8ee] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#c9a24d]">
                        <svg class="h-6 w-6 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-[#07172f]">Governance-First</h3>
                    <p class="mt-4 leading-7 text-[#667085]">All investor relationships are managed within a structured, accountable administrative framework consistent with the professional standards The Lylods Group applies across all its activities.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Process --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-7xl px-6 py-24">
            <div class="tlg-reveal max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">The Process</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">How investor relationships are established.</h2>
            </div>

            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <div class="tlg-reveal tlg-d1 rounded-3xl border border-[#e6e8ee] bg-white p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                    </div>
                    <span class="mt-5 inline-block rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-bold text-[#07172f]">Step 01</span>
                    <h3 class="mt-3 text-lg font-bold text-[#07172f]">Enquiry</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">Contact The Lylods Group to express an interest in investment or to discuss investor access requirements.</p>
                </div>

                <div class="tlg-reveal tlg-d2 rounded-3xl border border-[#e6e8ee] bg-white p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155"/></svg>
                    </div>
                    <span class="mt-5 inline-block rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-bold text-[#07172f]">Step 02</span>
                    <h3 class="mt-3 text-lg font-bold text-[#07172f]">Engagement</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">Our team engages with you directly to discuss investment arrangements, answer questions, and agree on terms.</p>
                </div>

                <div class="tlg-reveal tlg-d3 rounded-3xl border border-[#e6e8ee] bg-white p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                    </div>
                    <span class="mt-5 inline-block rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-bold text-[#07172f]">Step 03</span>
                    <h3 class="mt-3 text-lg font-bold text-[#07172f]">Onboarding</h3>
                    <p class="mt-3 text-sm leading-7 text-[#667085]">Your investor account is created and configured by the platform administrator, with records set up under your portfolio.</p>
                </div>

                <div class="tlg-reveal tlg-d4 rounded-3xl border border-[#07172f] bg-[#07172f] p-8 text-white transition-all duration-300 hover:shadow-md">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#c9a24d]">
                        <svg class="h-5 w-5 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0H3"/></svg>
                    </div>
                    <span class="mt-5 inline-block rounded-full bg-white/10 px-3 py-1 text-xs font-bold text-[#c9a24d]">Step 04</span>
                    <h3 class="mt-3 text-lg font-bold text-white">Portal Access</h3>
                    <p class="mt-3 text-sm leading-7 text-slate-300">Log in to the investor dashboard to view your investment records, read official notices, and manage your account.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Login CTA --}}
    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-20">
            <div class="rounded-[2rem] bg-[#07172f] px-8 py-12 text-white md:px-12">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Investor Access</p>
                        <h2 class="mt-4 font-serif text-4xl font-bold">Already have investor access?</h2>
                        <p class="mt-4 max-w-2xl leading-7 text-slate-300">Use the secure investor login to access your dashboard, view investment records, and read official notices. If you require access or assistance, contact the platform administrator.</p>
                    </div>
                    <div class="flex flex-wrap gap-3 lg:flex-col">
                        <a href="{{ route('login') }}" class="inline-flex justify-center rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] hover:bg-[#d8b765]">Go to Login</a>
                        <a href="{{ route('contact') }}" class="inline-flex justify-center rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white hover:bg-white/10">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>

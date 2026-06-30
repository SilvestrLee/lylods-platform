<x-layouts.public
    :title="$page->meta_title ?? 'Careers and Placements — The Lylods Group'"
    :description="$page->meta_description"
    :canonical="$page?->canonical_url"
    :robots="$page?->robots"
    :og-image="$page?->ogMedia?->url()">

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
    </section>

    {{-- Opportunity Areas --}}
    {{-- Future CMS-managed careers content --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Opportunity Areas</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">Ways to work with us.</h2>
                <p class="mt-5 text-lg leading-8 text-[#667085]">We engage with professionals, candidates and contributors across a range of pathways — from formal placements to skilled network participation.</p>
            </div>
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                <div class="tlg-reveal tlg-d1 flex flex-col overflow-hidden rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea]">
                    {{-- Future CMS-managed careers content --}}
                    <div class="relative flex h-40 items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#123f8c] to-[#07172f]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 65% 35%, #c9a24d 0%, transparent 55%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col p-7">
                        <h3 class="font-bold text-[#07172f]">Professional Placements</h3>
                        <p class="mt-2 flex-1 text-sm leading-7 text-[#667085]">Structured placement opportunities for professionals seeking experience across our service disciplines, working alongside our team on real client engagements.</p>
                    </div>
                </div>

                <div class="tlg-reveal tlg-d2 flex flex-col overflow-hidden rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea]">
                    {{-- Future CMS-managed careers content --}}
                    <div class="relative flex h-40 items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#0d2d5e] to-[#123f8c]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 65%, #c9a24d 0%, transparent 55%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col p-7">
                        <h3 class="font-bold text-[#07172f]">Recruitment Support</h3>
                        <p class="mt-2 flex-1 text-sm leading-7 text-[#667085]">For organisations and individuals seeking support with finding the right role or the right candidate. We help structure the process and identify suitable pathways.</p>
                    </div>
                </div>

                <div class="tlg-reveal tlg-d3 flex flex-col overflow-hidden rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea]">
                    {{-- Future CMS-managed careers content --}}
                    <div class="relative flex h-40 items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#102a50] to-[#07172f]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 60% 40%, #c9a24d 0%, transparent 50%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col p-7">
                        <h3 class="font-bold text-[#07172f]">Training and Employability</h3>
                        <p class="mt-2 flex-1 text-sm leading-7 text-[#667085]">Programmes and pathways to support skills development, employability and professional readiness — particularly for those entering or re-entering the job market.</p>
                    </div>
                </div>

                <div class="tlg-reveal tlg-d1 flex flex-col overflow-hidden rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea]">
                    {{-- Future CMS-managed careers content --}}
                    <div class="relative flex h-40 items-center justify-center overflow-hidden bg-gradient-to-br from-[#051220] via-[#07172f] to-[#0a1f42]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 35% 65%, #c9a24d 0%, transparent 55%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col p-7">
                        <h3 class="font-bold text-[#07172f]">Project-Based Roles</h3>
                        <p class="mt-2 flex-1 text-sm leading-7 text-[#667085]">Time-limited engagements supporting specific client projects across our business, technology, compliance, property and community disciplines.</p>
                    </div>
                </div>

                <div class="tlg-reveal tlg-d2 flex flex-col overflow-hidden rounded-3xl border border-[#e6e8ee] bg-[#f7f3ea]">
                    {{-- Future CMS-managed careers content --}}
                    <div class="relative flex h-40 items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#0e243d] to-[#1a3a5c]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 70% 30%, #c9a24d 0%, transparent 55%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col p-7">
                        <h3 class="font-bold text-[#07172f]">Community Programme Support</h3>
                        <p class="mt-2 flex-1 text-sm leading-7 text-[#667085]">Opportunities for individuals who want to contribute to community-focused initiatives — through coordination, delivery support, or programme participation.</p>
                    </div>
                </div>

                <div class="tlg-reveal tlg-d3 flex flex-col overflow-hidden rounded-3xl bg-[#07172f]">
                    {{-- Future CMS-managed careers content --}}
                    <div class="relative flex h-40 items-center justify-center overflow-hidden bg-gradient-to-br from-[#07172f] via-[#123f8c] to-[#0a1f42]">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 40% 60%, #c9a24d 0%, transparent 55%)"></div>
                        <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456Z"/></svg>
                    </div>
                    <div class="flex flex-1 flex-col p-7">
                        <h3 class="font-bold text-white">Skilled Professional Network</h3>
                        <p class="mt-2 flex-1 text-sm leading-7 text-slate-300">For experienced professionals who wish to be part of our wider network — available for introductions, collaborations or specialist engagements as suitable opportunities arise.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Candidate Message + How It Works --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="grid gap-16 lg:grid-cols-2 lg:items-start">

                {{-- Candidate Message --}}
                <div class="tlg-reveal">
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">What to Tell Us</p>
                    <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">Help us understand how you can contribute.</h2>
                    <div class="mt-8 rounded-[2rem] border border-[#e6e8ee] bg-white p-8 shadow-sm">
                        <div class="flex items-start gap-5">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                                <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"/></svg>
                            </div>
                            <p class="leading-7 text-[#667085]">Tell us about your experience, the role or placement you are interested in, and how your skills could contribute to our work.</p>
                        </div>
                    </div>
                    <div class="mt-6 rounded-[2rem] border border-amber-200 bg-amber-50 p-6">
                        <p class="text-sm leading-6 text-amber-900">Submitting your details does not guarantee employment, placement or project engagement. It helps us understand your interests and contact you where a suitable opportunity or pathway may be available.</p>
                    </div>
                </div>

                {{-- How It Works --}}
                <div class="tlg-reveal tlg-d1">
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">How It Works</p>
                    <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">Simple steps to connect.</h2>
                    <div class="mt-8 space-y-4">
                        <div class="flex items-start gap-5 rounded-2xl border border-[#e6e8ee] bg-white p-6 shadow-sm">
                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#07172f] text-sm font-bold text-[#c9a24d]">1</div>
                            <div>
                                <p class="font-bold text-[#07172f]">Share your interest</p>
                                <p class="mt-1 text-sm leading-6 text-[#667085]">Use our contact form to reach out, selecting the recruitment or placement option.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-5 rounded-2xl border border-[#e6e8ee] bg-white p-6 shadow-sm">
                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#07172f] text-sm font-bold text-[#c9a24d]">2</div>
                            <div>
                                <p class="font-bold text-[#07172f]">Tell us about your skills and experience</p>
                                <p class="mt-1 text-sm leading-6 text-[#667085]">Give us a clear picture of your background, what you are looking for, and how you think you can contribute.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-5 rounded-2xl border border-[#e6e8ee] bg-white p-6 shadow-sm">
                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#07172f] text-sm font-bold text-[#c9a24d]">3</div>
                            <div>
                                <p class="font-bold text-[#07172f]">We review suitable opportunities or pathways</p>
                                <p class="mt-1 text-sm leading-6 text-[#667085]">We review your details against current and anticipated needs across our service areas and network.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-5 rounded-2xl border border-[#e6e8ee] bg-white p-6 shadow-sm">
                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#c9a24d] text-sm font-bold text-[#07172f]">4</div>
                            <div>
                                <p class="font-bold text-[#07172f]">We contact you if there is a relevant next step</p>
                                <p class="mt-1 text-sm leading-6 text-[#667085]">If a suitable opportunity or pathway becomes available that matches your profile, we will be in touch directly.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal overflow-hidden rounded-[2rem] bg-[#07172f] px-8 py-16 text-white md:px-14">
                <div class="grid gap-10 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">Get In Touch</p>
                        <h2 class="mt-4 font-serif text-3xl font-bold leading-tight lg:text-4xl">Interested in working with us or joining our network?</h2>
                        <p class="mt-5 max-w-2xl leading-8 text-slate-300">Send us your details and tell us how your skills, experience or interests align with our work.</p>
                    </div>
                    <div class="shrink-0">
                        <a href="{{ route('contact') }}" class="inline-flex justify-center rounded-full bg-[#c9a24d] px-8 py-4 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">Submit Your Interest</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>

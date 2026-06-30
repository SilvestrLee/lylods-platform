<x-layouts.public
    :title="$page->meta_title ?? 'Contact — The Lylods Group'"
    :description="$page->meta_description">

    {{-- Hero with background image --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1800&q=80"
                 alt="" class="h-full w-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-r from-[#07172f] via-[#07172f]/90 to-[#07172f]/60"></div>
        </div>
        <div class="relative mx-auto max-w-[1440px] px-6 py-28">
            <div class="tlg-reveal max-w-4xl">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">{{ $page->hero_subtitle }}</p>
                <h1 class="mt-6 font-serif text-4xl font-bold leading-tight tracking-tight md:text-5xl lg:text-[3.2rem]">{{ $page->hero_title }}</h1>
                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-200">{{ $page->hero_description }}</p>
            </div>
        </div>
    </section>

    {{-- Stats band --}}
    <div class="border-t border-white/10 bg-[#07172f]">
        <div class="mx-auto max-w-[1440px] px-6 py-8">
            <dl class="grid grid-cols-2 gap-x-6 gap-y-8 sm:grid-cols-4 text-center">
                <div class="tlg-reveal tlg-d1">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Response Target</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">2 Business Days</dd>
                    <dd class="mt-1 text-xs text-slate-400">For all enquiry types</dd>
                </div>
                <div class="tlg-reveal tlg-d2">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Service Areas</dt>
                    <dd class="mt-2 font-serif text-4xl font-bold text-white">5</dd>
                </div>
                <div class="tlg-reveal tlg-d3">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Our Base</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">United Kingdom</dd>
                    <dd class="mt-1 text-xs text-slate-400">Operating internationally</dd>
                </div>
                <div class="tlg-reveal tlg-d4">
                    <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Enquiry Types</dt>
                    <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">Services, Investment &amp; General</dd>
                </div>
            </dl>
        </div>
    </div>

    {{-- Contact info + form --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto grid max-w-[1440px] gap-12 px-6 py-20 lg:grid-cols-[0.85fr_1.15fr] lg:items-start">

            {{-- Contact info panel --}}
            <div class="tlg-reveal">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">Contact Information</p>
                <h2 class="mt-4 font-serif text-3xl font-bold text-[#07172f]">Reach our team directly.</h2>
                <p class="mt-4 leading-7 text-[#667085]">Use the form to send an enquiry or contact us using the details below. We aim to respond to all enquiries within two business days.</p>

                <div class="mt-8 space-y-4">
                    <div class="flex items-start gap-4 rounded-2xl border border-[#e6e8ee] bg-white p-6">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#07172f]">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#c9a24d]">General Enquiries</p>
                            <p class="mt-1 font-semibold text-[#07172f]">{{ $siteSetting->primary_email ?? 'enquiries@lylodsgroup.com' }}</p>
                            <p class="mt-1 text-sm text-[#667085]">For business, services, and general company information.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 rounded-2xl border border-[#e6e8ee] bg-white p-6">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#123f8c]">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#c9a24d]">Office</p>
                            <p class="mt-1 font-semibold text-[#07172f]">{{ $siteSetting->address ?? 'United Kingdom' }}</p>
                            <p class="mt-1 text-sm text-[#667085]">Office address available upon request.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 rounded-2xl border border-[#e6e8ee] bg-white p-6">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#c9a24d]">
                            <svg class="h-5 w-5 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#c9a24d]">Business Hours</p>
                            <p class="mt-1 font-semibold text-[#07172f]">{{ $siteSetting->office_hours ?? 'Monday – Friday, 9:00am – 5:00pm GMT' }}</p>
                        </div>
                    </div>

                    {{-- Future CMS-managed image --}}
                    <div class="relative overflow-hidden rounded-2xl shadow-md">
                        <img src="https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?auto=format&fit=crop&w=900&q=80"
                             alt="Professional client consultation and support"
                             class="h-44 w-full object-cover object-center">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/50 to-transparent"></div>
                    </div>

                    <div class="rounded-2xl bg-[#07172f] p-6 text-white">
                        <div class="flex items-start gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#c9a24d]">
                                <svg class="h-5 w-5 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#c9a24d]">Investor Access</p>
                                <p class="mt-1 font-semibold">Existing investors</p>
                                <p class="mt-1 text-sm text-slate-300">Log in to the investor portal for dashboard access, records, and official notices.</p>
                            </div>
                        </div>
                        <a href="{{ route('login') }}" class="mt-4 inline-flex rounded-full bg-[#c9a24d] px-5 py-2.5 text-sm font-bold text-[#07172f] hover:bg-[#d8b765]">Investor Login</a>
                    </div>
                </div>
            </div>

            {{-- Contact form --}}
            <div class="tlg-reveal tlg-d1 rounded-[2rem] border border-[#e6e8ee] bg-white p-8 shadow-sm"
                 x-data="{ submitted: false, enquiryType: '' }">

                <div x-show="!submitted">
                    <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#123f8c]">Send an Enquiry</p>
                    <h3 class="mt-2 text-2xl font-bold text-[#07172f]">What can we help you with?</h3>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">Complete the form and a member of our team will be in touch within two business days.</p>

                    <form class="mt-8 space-y-5" @submit.prevent="submitted = true">
                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label class="block text-sm font-semibold text-[#07172f]">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" required
                                       class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-[#07172f]">Email Address <span class="text-red-500">*</span></label>
                                <input type="email" required
                                       class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Enquiry Type <span class="text-red-500">*</span></label>
                            <select required x-model="enquiryType"
                                    class="mt-2 w-full rounded-2xl border border-[#d0d5dd] bg-white px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                                <option value="">Select an option</option>
                                <option value="business-consultancy">Business consultancy</option>
                                <option value="technology-digital">Technology or digital solution</option>
                                <option value="training">Training</option>
                                <option value="recruitment">Recruitment</option>
                                <option value="compliance">Compliance</option>
                                <option value="property-sourcing">Property sourcing</option>
                                <option value="property-management">Property management</option>
                                <option value="property-development">Property development</option>
                                <option value="community-project">Community project</option>
                                <option value="partnership-investment">Partnership or investment</option>
                                <option value="other">Other</option>
                            </select>
                        </div>

                        {{-- Careers / placement guidance --}}
                        <div x-show="enquiryType === 'recruitment' || enquiryType === 'other'"
                             x-transition
                             style="display:none;"
                             class="rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-5 py-4">
                            <p class="text-sm leading-6 text-[#667085]">
                                <span class="font-semibold text-[#07172f]">Careers &amp; placements: </span>Tell us about your experience, the role or placement you are interested in, and how your skills could contribute to our work.
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Organisation <span class="text-sm font-normal text-[#667085]">(optional)</span></label>
                            <input type="text"
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Message <span class="text-red-500">*</span></label>
                            <textarea required rows="5"
                                      class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]"></textarea>
                        </div>

                        <div class="border-t border-[#e6e8ee] pt-5">
                            <p class="mb-4 text-xs leading-5 text-[#667085]">By submitting this form, you agree that The Lylods Group may use your details to respond to your enquiry. Please read our <a href="{{ route('privacy-notice') }}" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">Privacy Notice</a> to understand how we collect, use, store and protect your personal data.</p>
                            <button type="submit"
                                    class="w-full rounded-full bg-[#07172f] px-6 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-[#123f8c] sm:w-auto">
                                Send Enquiry
                            </button>
                            <p class="mt-3 text-xs text-[#667085]">We aim to respond within two business days.</p>
                        </div>
                    </form>
                </div>

                <div x-show="submitted" style="display:none;" class="py-8 text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full bg-[#f7f3ea]">
                        <svg class="h-8 w-8 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                        </svg>
                    </div>
                    <h3 class="mt-6 font-serif text-2xl font-bold text-[#07172f]">Enquiry Received</h3>
                    <p class="mt-3 leading-7 text-[#667085]">Thank you for reaching out. A member of our team will review your enquiry and respond within two business days.</p>
                    <button @click="submitted = false"
                            class="mt-6 rounded-full border border-[#d0d5dd] px-6 py-2.5 text-sm font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                        Send Another Enquiry
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Enquiry types --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="tlg-reveal max-w-2xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">How We Can Help</p>
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">What is your enquiry about?</h2>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <div class="tlg-reveal tlg-d1 rounded-3xl border border-[#e6e8ee] border-t-4 border-t-[#07172f] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#07172f]">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-[#07172f]">Business &amp; Services</h3>
                    <p class="mt-4 leading-7 text-[#667085]">For enquiries about our professional services, specific disciplines, project-based engagements, or partnership opportunities with The Lylods Group.</p>
                </div>

                <div class="tlg-reveal tlg-d2 rounded-3xl border border-[#e6e8ee] border-t-4 border-t-[#123f8c] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#123f8c]">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-[#07172f]">Investment Enquiries</h3>
                    <p class="mt-4 leading-7 text-[#667085]">For enquiries related to investment, investor access, dashboard support, or investor account assistance. Existing investors can also log in directly via the investor portal.</p>
                </div>

                <div class="tlg-reveal tlg-d3 rounded-3xl border border-[#e6e8ee] border-t-4 border-t-[#c9a24d] p-8 transition-all duration-300 hover:border-[#c9a24d] hover:shadow-md">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#c9a24d]">
                        <svg class="h-6 w-6 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z"/></svg>
                    </div>
                    <h3 class="mt-6 text-xl font-bold text-[#07172f]">General Information</h3>
                    <p class="mt-4 leading-7 text-[#667085]">For general questions about The Lylods Group, our organisation, our approach, or any other matter not covered above. We welcome all professional enquiries.</p>
                </div>
            </div>
        </div>
    </section>

</x-layouts.public>

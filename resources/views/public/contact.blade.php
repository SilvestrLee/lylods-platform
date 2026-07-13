<x-layouts.public
    :title="$page->meta_title ?? 'Contact — The Lylods Group'"
    :description="$page->meta_description"
    :canonical="$page?->canonical_url"
    :robots="$page?->robots"
    :og-image="$page?->ogMedia?->url()">

    <x-sections.contact.hero
        :eyebrow="$page->hero_subtitle"
        :heading="$page->hero_title"
        :description="$page->hero_description"
        :background-image="$page->heroMedia?->url()"
        :background-image-alt="$page->heroMedia?->alt_text"
    />

    @php
        $statistics = $page->statistics->isNotEmpty()
            ? $page->statistics->map(fn ($stat) => [
                'label' => $stat->label,
                'value' => $stat->value,
                'caption' => $stat->caption,
            ])->all()
            : [
                ['label' => 'Response Target', 'value' => '2 Business Days', 'caption' => 'For all enquiry types'],
                ['label' => 'Service Areas', 'value' => '5'],
                ['label' => 'Our Base', 'value' => 'United Kingdom', 'caption' => 'Operating internationally'],
                ['label' => 'Enquiry Types', 'value' => 'Services, Investment & General'],
            ];
    @endphp
    <x-sections.statistics :items="$statistics" />

    {{-- Contact info + form --}}
    <section class="bg-[#f7f3ea]">
        <div class="mx-auto grid max-w-[1440px] gap-12 px-6 py-20 lg:grid-cols-[0.85fr_1.15fr] lg:items-start">

            <x-sections.contact.info-panel
                :eyebrow="$page->contact_info_eyebrow"
                :heading="$page->contact_info_heading"
                :body="$page->contact_info_body"
                :general-label="$page->contact_general_label"
                :general-description="$page->contact_general_description"
                :general-value="$siteSetting->primary_email ?? null"
                :office-label="$page->contact_office_label"
                :office-description="$page->contact_office_description"
                :office-value="$siteSetting->address ?? null"
                :hours-label="$page->contact_hours_label"
                :hours-value="$siteSetting->office_hours ?? null"
                :image="$page->contactInfoMedia?->url()"
                :image-alt="$page->contactInfoMedia?->alt_text ?: $page->contact_info_media_alt"
                :investor-eyebrow="$page->contact_investor_eyebrow"
                :investor-heading="$page->contact_investor_heading"
                :investor-body="$page->contact_investor_body"
                :investor-cta-label="$page->contact_investor_cta_label"
            />

            {{-- Contact form — developer-owned interactive component, not CMS-editable.
                 Business logic ownership boundary: form fields, the enquiry-type
                 list, and submit/success behaviour stay in Blade/Alpine, same as
                 Services reusing ServiceGroup CRUD rather than duplicating it. --}}
            <div class="tlg-reveal tlg-d1 rounded-[2rem] border border-[#e6e8ee] bg-white p-8 shadow-sm"
                 x-data="{ submitted: {{ session('enquiry_sent') ? 'true' : 'false' }}, enquiryType: '{{ old('enquiry_type') }}' }">

                <div x-show="!submitted">
                    <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#123f8c]">Send an Enquiry</p>
                    <h3 class="mt-2 text-2xl font-bold text-[#07172f]">What can we help you with?</h3>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">Complete the form and a member of our team will be in touch within two business days.</p>

                    <form method="POST" action="{{ route('contact.store') }}" class="mt-8 space-y-5">
                        @csrf
                        {{-- Honeypot: hidden from real visitors, bots tend to fill every field --}}
                        <input type="text" name="website" value="" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px;" aria-hidden="true">

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label class="block text-sm font-semibold text-[#07172f]">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" name="name" required value="{{ old('name') }}"
                                       class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                                @error('name')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-[#07172f]">Email Address <span class="text-red-500">*</span></label>
                                <input type="email" name="email" required value="{{ old('email') }}"
                                       class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                                @error('email')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Enquiry Type <span class="text-red-500">*</span></label>
                            <select name="enquiry_type" required x-model="enquiryType"
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
                            @error('enquiry_type')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
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
                            <input type="text" name="organisation" value="{{ old('organisation') }}"
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                                @error('organisation')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Message <span class="text-red-500">*</span></label>
                            <textarea name="message" required rows="5" maxlength="5000"
                                      class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('message') }}</textarea>
                            @error('message')<p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div class="border-t border-[#e6e8ee] pt-5">
                            <p class="mb-4 text-xs leading-5 text-[#667085]">By submitting this form, you agree that The Lylods Group may use your details to respond to your enquiry. Please read our <a href="{{ route('privacy-notice') }}" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">Privacy Notice</a> to understand how we collect, use, store and protect your personal data.</p>
                            <button type="submit" x-data="{ sending: false }" @click="sending = true" :disabled="sending"
                                    class="w-full rounded-full bg-[#07172f] px-6 py-3.5 text-sm font-bold text-white transition-all duration-300 hover:bg-[#123f8c] disabled:opacity-60 sm:w-auto">
                                <span x-show="!sending">Send Enquiry</span>
                                <span x-show="sending" style="display:none;">Sending…</span>
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

    @php
        $enquiryCards = $page->contactEnquiryCards
            ->where('visibility', true)
            ->values()
            ->map(fn ($card) => [
                'icon' => \App\Support\HeroIconRegistry::path($card->icon),
                'title' => $card->title,
                'description' => $card->description,
            ])
            ->all();
    @endphp
    <x-sections.contact.enquiry-cards
        :eyebrow="$page->contact_enquiry_eyebrow"
        :heading="$page->contact_enquiry_heading"
        :cards="$enquiryCards"
    />

</x-layouts.public>

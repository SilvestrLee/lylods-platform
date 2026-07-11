<x-admin.panel subtitle="Section Intro" title="Contact Information">
    <x-admin.field label="Eyebrow">
        <input type="text" name="contact_info_eyebrow" value="{{ old('contact_info_eyebrow', $page->contact_info_eyebrow) }}"
               placeholder="Contact Information"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Heading">
        <input type="text" name="contact_info_heading" value="{{ old('contact_info_heading', $page->contact_info_heading) }}"
               placeholder="Reach our team directly."
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Body">
        <textarea name="contact_info_body" rows="3"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('contact_info_body', $page->contact_info_body) }}</textarea>
    </x-admin.field>

    <div class="grid gap-5 sm:grid-cols-3">
        <div class="rounded-2xl border border-[#e6e8ee] p-5">
            <h4 class="mb-4 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">General Enquiries</h4>
            <div class="space-y-4">
                <x-admin.field label="Label">
                    <input type="text" name="contact_general_label" value="{{ old('contact_general_label', $page->contact_general_label) }}"
                           class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </x-admin.field>
                <x-admin.field label="Description" helper="The email address itself comes from Site Settings, not here.">
                    <textarea name="contact_general_description" rows="2"
                              class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('contact_general_description', $page->contact_general_description) }}</textarea>
                </x-admin.field>
            </div>
        </div>
        <div class="rounded-2xl border border-[#e6e8ee] p-5">
            <h4 class="mb-4 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Office</h4>
            <div class="space-y-4">
                <x-admin.field label="Label">
                    <input type="text" name="contact_office_label" value="{{ old('contact_office_label', $page->contact_office_label) }}"
                           class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </x-admin.field>
                <x-admin.field label="Description" helper="The address itself comes from Site Settings, not here.">
                    <textarea name="contact_office_description" rows="2"
                              class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('contact_office_description', $page->contact_office_description) }}</textarea>
                </x-admin.field>
            </div>
        </div>
        <div class="rounded-2xl border border-[#e6e8ee] p-5">
            <h4 class="mb-4 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Business Hours</h4>
            <div class="space-y-4">
                <x-admin.field label="Label" helper="The hours value itself comes from Site Settings, not here.">
                    <input type="text" name="contact_hours_label" value="{{ old('contact_hours_label', $page->contact_hours_label) }}"
                           class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </x-admin.field>
            </div>
        </div>
    </div>

    <x-admin.image-field
        label="Info Panel Image"
        :media="$page->contactInfoMedia"
        input-name="contact_info_media_file"
        remove-name="remove_contact_info_media"
        alt-name="contact_info_media_alt"
        :alt-value="$page->contact_info_media_alt"
        helper="Leave empty to use the default placeholder image."
    />

    <div class="rounded-2xl border border-[#e6e8ee] p-5">
        <h4 class="mb-4 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Investor Access Callout</h4>
        <div class="grid gap-5 sm:grid-cols-2">
            <x-admin.field label="Eyebrow">
                <input type="text" name="contact_investor_eyebrow" value="{{ old('contact_investor_eyebrow', $page->contact_investor_eyebrow) }}"
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            </x-admin.field>
            <x-admin.field label="Heading">
                <input type="text" name="contact_investor_heading" value="{{ old('contact_investor_heading', $page->contact_investor_heading) }}"
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            </x-admin.field>
        </div>
        <div class="mt-4">
            <x-admin.field label="Body">
                <textarea name="contact_investor_body" rows="2"
                          class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('contact_investor_body', $page->contact_investor_body) }}</textarea>
            </x-admin.field>
        </div>
        <div class="mt-4">
            <x-admin.field label="CTA Label" helper="Always links to the investor login page.">
                <input type="text" name="contact_investor_cta_label" value="{{ old('contact_investor_cta_label', $page->contact_investor_cta_label) }}"
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            </x-admin.field>
        </div>
    </div>
</x-admin.panel>

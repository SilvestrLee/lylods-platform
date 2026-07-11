<x-admin.panel subtitle="Closing CTA" title="Get In Touch">
    <x-admin.field label="Eyebrow">
        <input type="text" name="careers_page_cta_eyebrow" value="{{ old('careers_page_cta_eyebrow', $page->careers_page_cta_eyebrow) }}"
               placeholder="Get In Touch"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Heading">
        <input type="text" name="careers_page_cta_heading" value="{{ old('careers_page_cta_heading', $page->careers_page_cta_heading) }}"
               placeholder="Interested in working with us or joining our network?"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Body">
        <textarea name="careers_page_cta_body" rows="3"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('careers_page_cta_body', $page->careers_page_cta_body) }}</textarea>
    </x-admin.field>
    <x-admin.field label="CTA Label" helper="Always links to the contact page.">
        <input type="text" name="careers_page_cta_label" value="{{ old('careers_page_cta_label', $page->careers_page_cta_label) }}"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
</x-admin.panel>

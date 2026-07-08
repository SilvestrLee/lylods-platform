<x-admin.panel subtitle="Closing CTA" title="Get Started">
    <x-admin.field label="Heading">
        <input type="text" name="services_page_cta_heading" value="{{ old('services_page_cta_heading', $page->services_page_cta_heading) }}"
               placeholder="Not sure where to start?"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Description">
        <textarea name="services_page_cta_description" rows="3"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('services_page_cta_description', $page->services_page_cta_description) }}</textarea>
    </x-admin.field>
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Primary CTA Label">
            <input type="text" name="services_page_cta_primary_label" value="{{ old('services_page_cta_primary_label', $page->services_page_cta_primary_label) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Primary CTA URL">
            <input type="text" name="services_page_cta_primary_url" value="{{ old('services_page_cta_primary_url', $page->services_page_cta_primary_url) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Secondary CTA Label">
            <input type="text" name="services_page_cta_secondary_label" value="{{ old('services_page_cta_secondary_label', $page->services_page_cta_secondary_label) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Secondary CTA URL">
            <input type="text" name="services_page_cta_secondary_url" value="{{ old('services_page_cta_secondary_url', $page->services_page_cta_secondary_url) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>
</x-admin.panel>

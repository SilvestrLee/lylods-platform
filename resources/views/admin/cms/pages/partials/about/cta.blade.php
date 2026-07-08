<x-admin.panel subtitle="Closing CTA" title="Work With Us">
    <x-admin.field label="Heading">
        <input type="text" name="about_page_cta_heading" value="{{ old('about_page_cta_heading', $page->about_page_cta_heading) }}"
               placeholder="Let's Build Something Meaningful Together"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Description">
        <textarea name="about_page_cta_description" rows="3"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('about_page_cta_description', $page->about_page_cta_description) }}</textarea>
    </x-admin.field>
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Primary CTA Label">
            <input type="text" name="about_page_cta_primary_label" value="{{ old('about_page_cta_primary_label', $page->about_page_cta_primary_label) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Primary CTA URL">
            <input type="text" name="about_page_cta_primary_url" value="{{ old('about_page_cta_primary_url', $page->about_page_cta_primary_url) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Secondary CTA Label">
            <input type="text" name="about_page_cta_secondary_label" value="{{ old('about_page_cta_secondary_label', $page->about_page_cta_secondary_label) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Secondary CTA URL">
            <input type="text" name="about_page_cta_secondary_url" value="{{ old('about_page_cta_secondary_url', $page->about_page_cta_secondary_url) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>
</x-admin.panel>

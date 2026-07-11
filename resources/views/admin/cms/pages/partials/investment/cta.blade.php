<x-admin.panel subtitle="Login CTA" title="Investor Access">
    <x-admin.field label="Eyebrow">
        <input type="text" name="investment_cta_eyebrow" value="{{ old('investment_cta_eyebrow', $page->investment_cta_eyebrow) }}"
               placeholder="Investor Access"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Heading">
        <input type="text" name="investment_cta_heading" value="{{ old('investment_cta_heading', $page->investment_cta_heading) }}"
               placeholder="Already have investor access?"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Body">
        <textarea name="investment_cta_body" rows="3"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('investment_cta_body', $page->investment_cta_body) }}</textarea>
    </x-admin.field>
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Primary CTA Label" helper="Always links to the investor login page.">
            <input type="text" name="investment_cta_primary_label" value="{{ old('investment_cta_primary_label', $page->investment_cta_primary_label) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Secondary CTA Label">
            <input type="text" name="investment_cta_secondary_label" value="{{ old('investment_cta_secondary_label', $page->investment_cta_secondary_label) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Secondary CTA URL">
            <input type="text" name="investment_cta_secondary_url" value="{{ old('investment_cta_secondary_url', $page->investment_cta_secondary_url) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>
</x-admin.panel>

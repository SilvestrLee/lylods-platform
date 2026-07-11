<x-admin.panel subtitle="Required Disclaimer" title="Important Notice">
    <x-admin.field label="Heading">
        <input type="text" name="property_disclaimer_heading" value="{{ old('property_disclaimer_heading', $page->property_disclaimer_heading) }}"
               placeholder="Important Notice"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Body">
        <textarea name="property_disclaimer_body" rows="4"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('property_disclaimer_body', $page->property_disclaimer_body) }}</textarea>
    </x-admin.field>
</x-admin.panel>

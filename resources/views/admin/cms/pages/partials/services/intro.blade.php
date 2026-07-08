<x-admin.panel subtitle="Service Catalogue" title="Introduction">
    <x-admin.field label="Heading">
        <input type="text" name="services_page_intro_heading" value="{{ old('services_page_intro_heading', $page->services_page_intro_heading) }}"
               placeholder="Five service areas. One practical partner."
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Body">
        <textarea name="services_page_intro_body" rows="4"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('services_page_intro_body', $page->services_page_intro_body) }}</textarea>
    </x-admin.field>
</x-admin.panel>

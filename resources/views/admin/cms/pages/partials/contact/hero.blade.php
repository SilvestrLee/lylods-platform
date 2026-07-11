<x-admin.panel subtitle="/contact" title="Hero" :open="true">
    <x-admin.field label="Eyebrow" helper="Gold label above the heading.">
        <input type="text" name="hero_subtitle" value="{{ old('hero_subtitle', $page->hero_subtitle) }}"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Heading">
        <textarea name="hero_title" rows="2"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('hero_title', $page->hero_title) }}</textarea>
    </x-admin.field>
    <x-admin.field label="Description">
        <textarea name="hero_description" rows="4"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('hero_description', $page->hero_description) }}</textarea>
    </x-admin.field>
    <x-admin.image-field
        label="Hero Background Image"
        :media="$page->heroMedia"
        input-name="hero_image_file"
        remove-name="remove_hero_image"
        helper="Leave empty to use the default placeholder image."
    />
</x-admin.panel>

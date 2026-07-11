<x-admin.panel subtitle="Image Break" title="Context Banner">
    <div class="grid gap-8 lg:grid-cols-2">
        <div class="space-y-6">
            <x-admin.field label="Eyebrow">
                <input type="text" name="property_context_eyebrow" value="{{ old('property_context_eyebrow', $page->property_context_eyebrow) }}"
                       placeholder="Our Reach"
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            </x-admin.field>
            <x-admin.field label="Heading">
                <textarea name="property_context_heading" rows="3"
                          class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('property_context_heading', $page->property_context_heading) }}</textarea>
            </x-admin.field>
        </div>
        <div class="space-y-6">
            <x-admin.image-field
                label="Banner Image"
                :media="$page->propertyContextMedia"
                input-name="property_context_media_file"
                remove-name="remove_property_context_media"
                helper="Leave empty to keep the default image."
            />
        </div>
    </div>
</x-admin.panel>

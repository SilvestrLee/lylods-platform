<x-admin.panel subtitle="Who We Are" title="Introduction">
    <div class="grid gap-8 lg:grid-cols-2">
        <div class="space-y-6">
            <h3 class="text-xs font-bold uppercase tracking-[0.18em] text-[#667085]">Left Column</h3>
            <x-admin.field label="Heading">
                <input type="text" name="about_page_intro_heading" value="{{ old('about_page_intro_heading', $page->about_page_intro_heading) }}"
                       placeholder="Practical experience. Structured delivery. Lasting results."
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            </x-admin.field>
            <x-admin.field label="Body" helper="Separate paragraphs with a blank line.">
                <textarea name="about_page_intro_body" rows="6"
                          class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('about_page_intro_body', $page->about_page_intro_body) }}</textarea>
            </x-admin.field>
            <div class="grid gap-5 sm:grid-cols-2">
                <x-admin.field label="CTA Label">
                    <input type="text" name="about_page_intro_cta_label" value="{{ old('about_page_intro_cta_label', $page->about_page_intro_cta_label) }}"
                           class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </x-admin.field>
                <x-admin.field label="CTA Link">
                    <input type="text" name="about_page_intro_cta_url" value="{{ old('about_page_intro_cta_url', $page->about_page_intro_cta_url) }}"
                           class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </x-admin.field>
            </div>
        </div>

        <div class="space-y-6">
            <h3 class="text-xs font-bold uppercase tracking-[0.18em] text-[#667085]">Right Column</h3>
            <x-admin.image-field
                label="Image"
                :media="$page->aboutPageIntroMedia"
                input-name="about_page_intro_media_file"
                remove-name="remove_about_page_intro_media"
                helper="Leave empty to keep the default decorative panel."
            />
        </div>
    </div>
</x-admin.panel>

<x-admin.panel subtitle="Closing CTA" title="Work With Us CTA">
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Eyebrow">
            <input type="text" name="wwu_eyebrow" value="{{ old('wwu_eyebrow', $page->wwu_eyebrow) }}"
                   placeholder="e.g. Work With Us"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Heading">
            <input type="text" name="wwu_heading" value="{{ old('wwu_heading', $page->wwu_heading) }}"
                   placeholder="e.g. Ready to discuss a requirement?"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>

    <x-admin.field label="Description">
        <textarea name="wwu_description" rows="3"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('wwu_description', $page->wwu_description) }}</textarea>
    </x-admin.field>

    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Primary Button Label">
            <input type="text" name="wwu_primary_cta_label" value="{{ old('wwu_primary_cta_label', $page->wwu_primary_cta_label) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Primary Button Link">
            <input type="text" name="wwu_primary_cta_url" value="{{ old('wwu_primary_cta_url', $page->wwu_primary_cta_url) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>

    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Secondary Button Label">
            <input type="text" name="wwu_secondary_cta_label" value="{{ old('wwu_secondary_cta_label', $page->wwu_secondary_cta_label) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Secondary Button Link">
            <input type="text" name="wwu_secondary_cta_url" value="{{ old('wwu_secondary_cta_url', $page->wwu_secondary_cta_url) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>

    <div class="grid gap-6 sm:grid-cols-3">
        <x-admin.field label="Investor Note" helper="Short text shown before the investor portal link.">
            <input type="text" name="wwu_investor_note" value="{{ old('wwu_investor_note', $page->wwu_investor_note) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Investor Portal Link Label">
            <input type="text" name="wwu_investor_cta_label" value="{{ old('wwu_investor_cta_label', $page->wwu_investor_cta_label) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Investor Portal Link" helper="Defaults to the investor login route.">
            <input type="text" name="wwu_investor_cta_url" value="{{ old('wwu_investor_cta_url', $page->wwu_investor_cta_url) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>
</x-admin.panel>

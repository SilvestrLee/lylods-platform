@php $industries = $page->industries->values(); @endphp

<x-admin.panel subtitle="Section Intro" title="Industries We Serve">
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Eyebrow">
            <input type="text" name="industries_eyebrow" value="{{ old('industries_eyebrow', $page->industries_eyebrow) }}"
                   placeholder="e.g. Sectors of Practice"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Heading">
            <input type="text" name="industries_heading" value="{{ old('industries_heading', $page->industries_heading) }}"
                   placeholder="e.g. Industries We Serve"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="CTA Label">
            <input type="text" name="industries_cta_label" value="{{ old('industries_cta_label', $page->industries_cta_label) }}"
                   placeholder="e.g. Explore our disciplines →"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="CTA Link">
            <input type="text" name="industries_cta_url" value="{{ old('industries_cta_url', $page->industries_cta_url) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>

    <div class="grid gap-4 sm:grid-cols-2">
        @for ($i = 0; $i < 8; $i++)
            @php $industry = $industries->get($i); @endphp
            <x-admin.field label="Industry {{ $i + 1 }}">
                <input type="text" name="industries[{{ $i }}][title]" value="{{ old("industries.$i.title", $industry?->title) }}"
                       placeholder="e.g. Energy & Utilities"
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            </x-admin.field>
        @endfor
    </div>
</x-admin.panel>

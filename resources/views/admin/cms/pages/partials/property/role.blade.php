@php
    $steps = $page->propertyRoleSteps->values();
    $tags = $page->propertyNetworkTags->values();
@endphp

<x-admin.panel subtitle="Exactly Four Steps" title="Our Role">
    <x-admin.field label="Eyebrow">
        <input type="text" name="property_role_eyebrow" value="{{ old('property_role_eyebrow', $page->property_role_eyebrow) }}"
               placeholder="Our Role"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Heading">
        <input type="text" name="property_role_heading" value="{{ old('property_role_heading', $page->property_role_heading) }}"
               placeholder="How The Lylods Group works with you."
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Body" helper="Separate paragraphs with a blank line.">
        <textarea name="property_role_body" rows="5"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('property_role_body', $page->property_role_body) }}</textarea>
    </x-admin.field>

    <div class="grid gap-5 sm:grid-cols-2">
        @for ($i = 0; $i < 4; $i++)
            @php $step = $steps->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-5">
                <h4 class="mb-4 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Step {{ $i + 1 }}</h4>
                <div class="space-y-4">
                    <x-admin.field label="Title">
                        <input type="text" name="property_role_steps[{{ $i }}][title]" value="{{ old("property_role_steps.$i.title", $step?->title) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <x-admin.field label="Description">
                        <textarea name="property_role_steps[{{ $i }}][description]" rows="3"
                                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old("property_role_steps.$i.description", $step?->description) }}</textarea>
                    </x-admin.field>
                    <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                        <input type="checkbox" name="property_role_steps[{{ $i }}][visibility]" value="1"
                               {{ old("property_role_steps.$i.visibility", $step?->visibility ?? true) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                        Visible
                    </label>
                </div>
            </div>
        @endfor
    </div>
</x-admin.panel>

<x-admin.panel subtitle="Exactly Seven Tags" title="Professional Network">
    <x-admin.field label="Eyebrow">
        <input type="text" name="property_network_eyebrow" value="{{ old('property_network_eyebrow', $page->property_network_eyebrow) }}"
               placeholder="Our Professional Network"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Heading">
        <input type="text" name="property_network_heading" value="{{ old('property_network_heading', $page->property_network_heading) }}"
               placeholder="Independent professionals we work with."
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Body">
        <textarea name="property_network_body" rows="3"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('property_network_body', $page->property_network_body) }}</textarea>
    </x-admin.field>
    <x-admin.field label="Footnote">
        <textarea name="property_network_footnote" rows="2"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('property_network_footnote', $page->property_network_footnote) }}</textarea>
    </x-admin.field>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @for ($i = 0; $i < 7; $i++)
            @php $tag = $tags->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-4">
                <h4 class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Tag {{ $i + 1 }}</h4>
                <div class="space-y-3">
                    <x-admin.field label="Label">
                        <input type="text" name="property_network_tags[{{ $i }}][label]" value="{{ old("property_network_tags.$i.label", $tag?->label) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                        <input type="checkbox" name="property_network_tags[{{ $i }}][visibility]" value="1"
                               {{ old("property_network_tags.$i.visibility", $tag?->visibility ?? true) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                        Visible
                    </label>
                </div>
            </div>
        @endfor
    </div>
</x-admin.panel>

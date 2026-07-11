@php $tags = $page->communityAudienceTags->values(); @endphp

<x-admin.panel subtitle="Section Intro" title="Who We Support">
    <div class="grid gap-8 lg:grid-cols-2">
        <div class="space-y-6">
            <x-admin.field label="Eyebrow">
                <input type="text" name="community_audience_eyebrow" value="{{ old('community_audience_eyebrow', $page->community_audience_eyebrow) }}"
                       placeholder="Who We Support"
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            </x-admin.field>
            <x-admin.field label="Heading">
                <input type="text" name="community_audience_heading" value="{{ old('community_audience_heading', $page->community_audience_heading) }}"
                       placeholder="We work with a wide range of organisations."
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            </x-admin.field>
            <x-admin.field label="Body">
                <textarea name="community_audience_body" rows="3"
                          class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('community_audience_body', $page->community_audience_body) }}</textarea>
            </x-admin.field>
            <div class="grid gap-5 sm:grid-cols-2">
                <x-admin.field label="CTA Label">
                    <input type="text" name="community_audience_cta_label" value="{{ old('community_audience_cta_label', $page->community_audience_cta_label) }}"
                           class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </x-admin.field>
                <x-admin.field label="CTA Link">
                    <input type="text" name="community_audience_cta_url" value="{{ old('community_audience_cta_url', $page->community_audience_cta_url) }}"
                           class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </x-admin.field>
            </div>
        </div>
        <div class="space-y-6">
            <x-admin.image-field
                label="Image"
                :media="$page->communityAudienceMedia"
                input-name="community_audience_media_file"
                remove-name="remove_community_audience_media"
                helper="Leave empty to use the default placeholder image."
            />
        </div>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @for ($i = 0; $i < 8; $i++)
            @php $tag = $tags->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-4">
                <h4 class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Tag {{ $i + 1 }}</h4>
                <div class="space-y-3">
                    <x-admin.field label="Icon">
                        <select name="community_audience_tags[{{ $i }}][icon]"
                                class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            <option value="">— Select icon —</option>
                            @foreach (\App\Support\HeroIconRegistry::labels() as $iconKey => $iconLabel)
                                <option value="{{ $iconKey }}" {{ old("community_audience_tags.$i.icon", $tag?->icon) === $iconKey ? 'selected' : '' }}>{{ $iconLabel }}</option>
                            @endforeach
                        </select>
                    </x-admin.field>
                    <x-admin.field label="Label">
                        <input type="text" name="community_audience_tags[{{ $i }}][label]" value="{{ old("community_audience_tags.$i.label", $tag?->label) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                        <input type="checkbox" name="community_audience_tags[{{ $i }}][visibility]" value="1"
                               {{ old("community_audience_tags.$i.visibility", $tag?->visibility ?? true) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                        Visible
                    </label>
                </div>
            </div>
        @endfor
    </div>
</x-admin.panel>

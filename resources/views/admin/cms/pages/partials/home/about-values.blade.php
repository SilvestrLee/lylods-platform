@php $aboutValues = $page->aboutValues->values(); @endphp

<x-admin.panel subtitle="Left Column / Right Column" title="About & Values">
    <div class="grid gap-8 lg:grid-cols-2">
        <div class="space-y-6">
            <h3 class="text-xs font-bold uppercase tracking-[0.18em] text-[#667085]">Left Column</h3>
            <x-admin.image-field
                label="Image"
                :media="$page->aboutMedia"
                input-name="about_media_file"
                remove-name="remove_about_media"
                alt-name="about_media_alt"
                :alt-value="$page->about_media_alt"
            />
        </div>

        <div class="space-y-6">
            <h3 class="text-xs font-bold uppercase tracking-[0.18em] text-[#667085]">Right Column</h3>
            <x-admin.field label="Eyebrow">
                <input type="text" name="about_eyebrow" value="{{ old('about_eyebrow', $page->about_eyebrow) }}"
                       placeholder="e.g. About The Lylods Group"
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            </x-admin.field>
            <x-admin.field label="Heading">
                <input type="text" name="about_heading" value="{{ old('about_heading', $page->about_heading) }}"
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            </x-admin.field>
            <x-admin.field label="Description">
                <textarea name="about_description" rows="4"
                          class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('about_description', $page->about_description) }}</textarea>
            </x-admin.field>
            <div class="grid gap-5 sm:grid-cols-2">
                <x-admin.field label="CTA Label">
                    <input type="text" name="about_cta_label" value="{{ old('about_cta_label', $page->about_cta_label) }}"
                           class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </x-admin.field>
                <x-admin.field label="CTA Link">
                    <input type="text" name="about_cta_url" value="{{ old('about_cta_url', $page->about_cta_url) }}"
                           class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </x-admin.field>
            </div>
        </div>
    </div>

    <div>
        <h3 class="mb-4 text-xs font-bold uppercase tracking-[0.18em] text-[#667085]">Value Cards</h3>
        <div class="grid gap-5 sm:grid-cols-2">
            @for ($i = 0; $i < 4; $i++)
                @php $value = $aboutValues->get($i); @endphp
                <div class="rounded-2xl border border-[#e6e8ee] p-5">
                    <h4 class="mb-4 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Value {{ $i + 1 }}</h4>
                    <div class="space-y-4">
                        <x-admin.field label="Icon">
                            <select name="about_values[{{ $i }}][icon]"
                                    class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                                <option value="">— Select icon —</option>
                                @foreach (\App\Support\HeroIconRegistry::labels() as $iconKey => $iconLabel)
                                    <option value="{{ $iconKey }}" {{ old("about_values.$i.icon", $value?->icon) === $iconKey ? 'selected' : '' }}>{{ $iconLabel }}</option>
                                @endforeach
                            </select>
                        </x-admin.field>
                        <x-admin.field label="Title">
                            <input type="text" name="about_values[{{ $i }}][title]" value="{{ old("about_values.$i.title", $value?->title) }}"
                                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        </x-admin.field>
                        <x-admin.field label="Description">
                            <textarea name="about_values[{{ $i }}][description]" rows="2"
                                      class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old("about_values.$i.description", $value?->description) }}</textarea>
                        </x-admin.field>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</x-admin.panel>

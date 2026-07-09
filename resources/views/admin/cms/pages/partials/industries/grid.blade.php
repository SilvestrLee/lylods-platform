@php $cards = $page->industryCards->values(); @endphp

<x-admin.panel subtitle="Exactly Eight Cards" title="Industry Grid">
    <div class="grid gap-5 sm:grid-cols-2">
        @for ($i = 0; $i < 8; $i++)
            @php $card = $cards->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-5">
                <h4 class="mb-4 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Card {{ $i + 1 }}</h4>
                <div class="space-y-4">
                    <x-admin.field label="Icon">
                        <select name="industry_cards[{{ $i }}][icon]"
                                class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            <option value="">— Select icon —</option>
                            @foreach (\App\Support\HeroIconRegistry::labels() as $iconKey => $iconLabel)
                                <option value="{{ $iconKey }}" {{ old("industry_cards.$i.icon", $card?->icon) === $iconKey ? 'selected' : '' }}>{{ $iconLabel }}</option>
                            @endforeach
                        </select>
                    </x-admin.field>
                    <x-admin.field label="Title">
                        <input type="text" name="industry_cards[{{ $i }}][title]" value="{{ old("industry_cards.$i.title", $card?->title) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <x-admin.field label="Slug" helper="Optional — reserved for future use, not currently used for routing.">
                        <input type="text" name="industry_cards[{{ $i }}][slug]" value="{{ old("industry_cards.$i.slug", $card?->slug) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <x-admin.field label="Description">
                        <textarea name="industry_cards[{{ $i }}][description]" rows="3"
                                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old("industry_cards.$i.description", $card?->description) }}</textarea>
                    </x-admin.field>
                    <x-admin.image-field
                        label="Card Image"
                        helper="Optional — falls back to the icon when no image is uploaded."
                        :media="$card?->image"
                        input-name="industry_cards[{{ $i }}][image_file]"
                        remove-name="industry_cards[{{ $i }}][remove_image]"
                        alt-name="industry_cards[{{ $i }}][image_alt]"
                        :alt-value="$card?->image_alt"
                    />
                    <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                        <input type="checkbox" name="industry_cards[{{ $i }}][visibility]" value="1"
                               {{ old("industry_cards.$i.visibility", $card?->visibility ?? true) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                        Visible
                    </label>
                </div>
            </div>
        @endfor
    </div>
</x-admin.panel>

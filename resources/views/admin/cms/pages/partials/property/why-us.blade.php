@php $whyUsCards = $page->propertyWhyUsCards->values(); @endphp

<x-admin.panel subtitle="Exactly Six Cards" title="Why Clients Work With Us">
    <x-admin.field label="Eyebrow">
        <input type="text" name="property_why_us_eyebrow" value="{{ old('property_why_us_eyebrow', $page->property_why_us_eyebrow) }}"
               placeholder="Why Clients Work With Us"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Heading">
        <input type="text" name="property_why_us_heading" value="{{ old('property_why_us_heading', $page->property_why_us_heading) }}"
               placeholder="What makes the difference."
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Body">
        <textarea name="property_why_us_body" rows="2"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('property_why_us_body', $page->property_why_us_body) }}</textarea>
    </x-admin.field>

    <div class="grid gap-5 sm:grid-cols-2">
        @for ($i = 0; $i < 6; $i++)
            @php $item = $whyUsCards->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-5">
                <h4 class="mb-4 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Card {{ $i + 1 }}</h4>
                <div class="space-y-4">
                    <x-admin.field label="Icon">
                        <select name="property_why_us_cards[{{ $i }}][icon]"
                                class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            <option value="">— Select icon —</option>
                            @foreach (\App\Support\HeroIconRegistry::labels() as $iconKey => $iconLabel)
                                <option value="{{ $iconKey }}" {{ old("property_why_us_cards.$i.icon", $item?->icon) === $iconKey ? 'selected' : '' }}>{{ $iconLabel }}</option>
                            @endforeach
                        </select>
                    </x-admin.field>
                    <x-admin.field label="Title">
                        <input type="text" name="property_why_us_cards[{{ $i }}][title]" value="{{ old("property_why_us_cards.$i.title", $item?->title) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <x-admin.field label="Description">
                        <textarea name="property_why_us_cards[{{ $i }}][description]" rows="3"
                                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old("property_why_us_cards.$i.description", $item?->description) }}</textarea>
                    </x-admin.field>
                    <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                        <input type="checkbox" name="property_why_us_cards[{{ $i }}][is_dark]" value="1"
                               {{ old("property_why_us_cards.$i.is_dark", $item?->is_dark) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                        Display as dark card
                    </label>
                    <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                        <input type="checkbox" name="property_why_us_cards[{{ $i }}][visibility]" value="1"
                               {{ old("property_why_us_cards.$i.visibility", $item?->visibility ?? true) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                        Visible
                    </label>
                </div>
            </div>
        @endfor
    </div>
</x-admin.panel>

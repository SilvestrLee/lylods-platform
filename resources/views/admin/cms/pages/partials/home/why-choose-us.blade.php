@php $whyChooseUsCards = $page->whyChooseUsCards->values(); @endphp

<x-admin.panel subtitle="Section Intro" title="Why Choose Us">
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Eyebrow">
            <input type="text" name="why_choose_us_eyebrow" value="{{ old('why_choose_us_eyebrow', $page->why_choose_us_eyebrow) }}"
                   placeholder="e.g. Why Clients Work With Us"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Heading">
            <input type="text" name="why_choose_us_heading" value="{{ old('why_choose_us_heading', $page->why_choose_us_heading) }}"
                   placeholder="e.g. What makes the difference."
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>
    <x-admin.field label="Description">
        <textarea name="why_choose_us_description" rows="2"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('why_choose_us_description', $page->why_choose_us_description) }}</textarea>
    </x-admin.field>
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="CTA Label">
            <input type="text" name="why_choose_us_cta_label" value="{{ old('why_choose_us_cta_label', $page->why_choose_us_cta_label) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="CTA Link">
            <input type="text" name="why_choose_us_cta_url" value="{{ old('why_choose_us_cta_url', $page->why_choose_us_cta_url) }}"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>

    <div class="space-y-5">
        @for ($i = 0; $i < 6; $i++)
            @php $card = $whyChooseUsCards->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-5">
                <h3 class="mb-4 text-sm font-bold uppercase tracking-[0.18em] text-[#07172f]">Card {{ $i + 1 }}</h3>
                <div class="grid gap-5 sm:grid-cols-2">
                    <x-admin.field label="Icon">
                        <select name="why_choose_us[{{ $i }}][icon]"
                                class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            <option value="">— Select icon —</option>
                            @foreach (\App\Support\HeroIconRegistry::labels() as $iconKey => $iconLabel)
                                <option value="{{ $iconKey }}" {{ old("why_choose_us.$i.icon", $card?->icon) === $iconKey ? 'selected' : '' }}>{{ $iconLabel }}</option>
                            @endforeach
                        </select>
                    </x-admin.field>
                    <x-admin.field label="Title">
                        <input type="text" name="why_choose_us[{{ $i }}][title]" value="{{ old("why_choose_us.$i.title", $card?->title) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                </div>
                <div class="mt-5">
                    <x-admin.field label="Description">
                        <textarea name="why_choose_us[{{ $i }}][description]" rows="2"
                                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old("why_choose_us.$i.description", $card?->description) }}</textarea>
                    </x-admin.field>
                </div>
                <label class="mt-4 flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                    <input type="checkbox" name="why_choose_us[{{ $i }}][is_dark]" value="1"
                           {{ old("why_choose_us.$i.is_dark", $card?->is_dark) ? 'checked' : '' }}
                           class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                    Display as dark card
                </label>
            </div>
        @endfor
    </div>
</x-admin.panel>

@php $cards = $page->investmentApproachCards->values(); @endphp

<x-admin.panel subtitle="Section Intro" title="Our Approach">
    <div class="grid gap-8 lg:grid-cols-2">
        <div class="space-y-6">
            <x-admin.field label="Eyebrow">
                <input type="text" name="investment_approach_eyebrow" value="{{ old('investment_approach_eyebrow', $page->investment_approach_eyebrow) }}"
                       placeholder="Our Approach"
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            </x-admin.field>
            <x-admin.field label="Heading">
                <input type="text" name="investment_approach_heading" value="{{ old('investment_approach_heading', $page->investment_approach_heading) }}"
                       placeholder="Investor relationships managed with structure and clarity."
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            </x-admin.field>
            <x-admin.field label="Body" helper="Separate paragraphs with a blank line.">
                <textarea name="investment_approach_body" rows="6"
                          class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('investment_approach_body', $page->investment_approach_body) }}</textarea>
            </x-admin.field>
        </div>
        <div class="space-y-6">
            <x-admin.image-field
                label="Image"
                :media="$page->investmentApproachMedia"
                input-name="investment_approach_media_file"
                remove-name="remove_investment_approach_media"
                helper="Leave empty to use the default placeholder image."
            />
        </div>
    </div>

    <div class="grid gap-5 sm:grid-cols-2">
        @for ($i = 0; $i < 4; $i++)
            @php $card = $cards->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-5">
                <h4 class="mb-4 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Card {{ $i + 1 }}</h4>
                <div class="space-y-4">
                    <x-admin.field label="Icon">
                        <select name="investment_approach_cards[{{ $i }}][icon]"
                                class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            <option value="">— Select icon —</option>
                            @foreach (\App\Support\HeroIconRegistry::labels() as $iconKey => $iconLabel)
                                <option value="{{ $iconKey }}" {{ old("investment_approach_cards.$i.icon", $card?->icon) === $iconKey ? 'selected' : '' }}>{{ $iconLabel }}</option>
                            @endforeach
                        </select>
                    </x-admin.field>
                    <x-admin.field label="Title">
                        <input type="text" name="investment_approach_cards[{{ $i }}][title]" value="{{ old("investment_approach_cards.$i.title", $card?->title) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <x-admin.field label="Description">
                        <textarea name="investment_approach_cards[{{ $i }}][description]" rows="2"
                                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old("investment_approach_cards.$i.description", $card?->description) }}</textarea>
                    </x-admin.field>
                    <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                        <input type="checkbox" name="investment_approach_cards[{{ $i }}][visibility]" value="1"
                               {{ old("investment_approach_cards.$i.visibility", $card?->visibility ?? true) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                        Visible
                    </label>
                </div>
            </div>
        @endfor
    </div>
</x-admin.panel>

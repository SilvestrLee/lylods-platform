@php $cards = $page->communitySupportCards->values(); @endphp

<x-admin.panel subtitle="Section Intro" title="What We Support">
    <x-admin.field label="Eyebrow">
        <input type="text" name="community_support_eyebrow" value="{{ old('community_support_eyebrow', $page->community_support_eyebrow) }}"
               placeholder="What We Support"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Heading">
        <input type="text" name="community_support_heading" value="{{ old('community_support_heading', $page->community_support_heading) }}"
               placeholder="Practical support across every stage of a community programme."
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Body">
        <textarea name="community_support_body" rows="3"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('community_support_body', $page->community_support_body) }}</textarea>
    </x-admin.field>

    <div class="grid gap-5 sm:grid-cols-2">
        @for ($i = 0; $i < 8; $i++)
            @php $card = $cards->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-5">
                <h4 class="mb-4 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Card {{ $i + 1 }}</h4>
                <div class="space-y-4">
                    <x-admin.field label="Icon">
                        <select name="community_support_cards[{{ $i }}][icon]"
                                class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            <option value="">— Select icon —</option>
                            @foreach (\App\Support\HeroIconRegistry::labels() as $iconKey => $iconLabel)
                                <option value="{{ $iconKey }}" {{ old("community_support_cards.$i.icon", $card?->icon) === $iconKey ? 'selected' : '' }}>{{ $iconLabel }}</option>
                            @endforeach
                        </select>
                    </x-admin.field>
                    <x-admin.field label="Title">
                        <input type="text" name="community_support_cards[{{ $i }}][title]" value="{{ old("community_support_cards.$i.title", $card?->title) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <x-admin.field label="Description">
                        <textarea name="community_support_cards[{{ $i }}][description]" rows="3"
                                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old("community_support_cards.$i.description", $card?->description) }}</textarea>
                    </x-admin.field>
                    <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                        <input type="checkbox" name="community_support_cards[{{ $i }}][visibility]" value="1"
                               {{ old("community_support_cards.$i.visibility", $card?->visibility ?? true) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                        Visible
                    </label>
                </div>
            </div>
        @endfor
    </div>
</x-admin.panel>

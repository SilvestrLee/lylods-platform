@php $heroCards = $page->heroCards->values(); @endphp

<x-admin.panel subtitle="/{{ $page->slug }}" title="Hero" :open="true">

    <x-admin.field label="Eyebrow" helper="Small gold label displayed above the hero heading.">
        <input type="text" name="hero_subtitle" value="{{ old('hero_subtitle', $page->hero_subtitle) }}"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>

    <x-admin.field label="Heading" helper="The main hero headline.">
        <textarea name="hero_title" rows="2"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('hero_title', $page->hero_title) }}</textarea>
    </x-admin.field>

    <x-admin.field label="Description" helper="Supporting paragraph shown beneath the heading.">
        <textarea name="hero_description" rows="4"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('hero_description', $page->hero_description) }}</textarea>
    </x-admin.field>

    <x-admin.image-field
        label="Background Image"
        helper="Recommended size 1920 × 1080. Landscape orientation. Upload a new file to replace the current background."
        :media="$page->heroMedia"
        input-name="hero_image_file"
        remove-name="remove_hero_image"
    />

    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Primary Button Label" helper="Displayed as the main call to action button.">
            <input type="text" name="primary_cta_label" value="{{ old('primary_cta_label', $page->primary_cta_label) }}"
                   placeholder="e.g. Discuss Your Project"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Primary Button Link" helper="Use an internal URL where possible, e.g. /contact.">
            <input type="text" name="primary_cta_url" value="{{ old('primary_cta_url', $page->primary_cta_url) }}"
                   placeholder="e.g. /contact or #anchor"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>

    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Secondary Button Label">
            <input type="text" name="secondary_cta_label" value="{{ old('secondary_cta_label', $page->secondary_cta_label) }}"
                   placeholder="e.g. Explore Our Services"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Secondary Button Link">
            <input type="text" name="secondary_cta_url" value="{{ old('secondary_cta_url', $page->secondary_cta_url) }}"
                   placeholder="e.g. /services"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>

    @for ($i = 0; $i < 2; $i++)
        @php $card = $heroCards->get($i); $cardLabel = $i === 0 ? 'One' : 'Two'; @endphp
        <div class="rounded-2xl border border-[#e6e8ee] p-5">
            <div class="mb-5 flex items-center justify-between border-b border-dashed border-[#e6e8ee] pb-4">
                <h3 class="text-sm font-bold uppercase tracking-[0.18em] text-[#07172f]">Hero Card {{ $cardLabel }}</h3>
                <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                    <input type="hidden" name="hero_cards[{{ $i }}][is_visible]" value="0">
                    <input type="checkbox" name="hero_cards[{{ $i }}][is_visible]" value="1"
                           {{ old("hero_cards.$i.is_visible", $card?->is_visible ?? true) ? 'checked' : '' }}
                           class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                    Visible
                </label>
            </div>

            <div class="space-y-5">
                <x-admin.image-field
                    label="Image"
                    :media="$card?->image"
                    input-name="hero_cards[{{ $i }}][image_file]"
                    remove-name="hero_cards[{{ $i }}][remove_image]"
                    alt-name="hero_cards[{{ $i }}][image_alt]"
                    :alt-value="$card?->image_alt"
                />

                <x-admin.field label="Badge" helper="Small label shown on the card.">
                    <input type="text" name="hero_cards[{{ $i }}][badge]" value="{{ old("hero_cards.$i.badge", $card?->badge) }}"
                           placeholder="e.g. Business Advisory"
                           class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </x-admin.field>

                <x-admin.field label="Hero Card {{ $cardLabel }} Title" helper="Only used on text-style cards.">
                    <input type="text" name="hero_cards[{{ $i }}][title]" value="{{ old("hero_cards.$i.title", $card?->title) }}"
                           placeholder="e.g. Capacity Building"
                           class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </x-admin.field>

                <x-admin.field label="Hero Card {{ $cardLabel }} Description" helper="Only used on text-style cards.">
                    <textarea name="hero_cards[{{ $i }}][description]" rows="2"
                              class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old("hero_cards.$i.description", $card?->description) }}</textarea>
                </x-admin.field>

                <div class="grid gap-5 sm:grid-cols-2">
                    <x-admin.field label="Hero Card {{ $cardLabel }} CTA Label">
                        <input type="text" name="hero_cards[{{ $i }}][cta_label]" value="{{ old("hero_cards.$i.cta_label", $card?->cta_label) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <x-admin.field label="Hero Card {{ $cardLabel }} CTA URL">
                        <input type="text" name="hero_cards[{{ $i }}][cta_url]" value="{{ old("hero_cards.$i.cta_url", $card?->cta_url) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                </div>

                <x-admin.field label="Icons" helper="Only used on icon-list-style cards — leave blank for text-style cards.">
                    <div class="space-y-3">
                        @php $cardIcons = $card?->icons->values(); @endphp
                        @for ($r = 0; $r < 3; $r++)
                            @php $row = $cardIcons?->get($r); @endphp
                            <div class="grid gap-3 sm:grid-cols-3">
                                <input type="text" name="hero_cards[{{ $i }}][icons][{{ $r }}][label]" value="{{ old("hero_cards.$i.icons.$r.label", $row?->label) }}"
                                       placeholder="Label, e.g. Business growth"
                                       class="rounded-2xl border border-[#d0d5dd] px-3 py-2 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                                <input type="text" name="hero_cards[{{ $i }}][icons][{{ $r }}][tag]" value="{{ old("hero_cards.$i.icons.$r.tag", $row?->tag) }}"
                                       placeholder="Tag, e.g. Strategy"
                                       class="rounded-2xl border border-[#d0d5dd] px-3 py-2 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                                <select name="hero_cards[{{ $i }}][icons][{{ $r }}][icon]"
                                        class="rounded-2xl border border-[#d0d5dd] px-3 py-2 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                                    <option value="">— Select icon —</option>
                                    @foreach (\App\Support\HeroIconRegistry::labels() as $iconKey => $iconLabel)
                                        <option value="{{ $iconKey }}" {{ old("hero_cards.$i.icons.$r.icon", $row?->icon) === $iconKey ? 'selected' : '' }}>{{ $iconLabel }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endfor
                    </div>
                </x-admin.field>
            </div>
        </div>
    @endfor
</x-admin.panel>

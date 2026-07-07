@php $serviceCards = $page->serviceCards->values(); @endphp

<x-admin.panel subtitle="Section Intro" title="Services">
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Eyebrow">
            <input type="text" name="services_eyebrow" value="{{ old('services_eyebrow', $page->services_eyebrow) }}"
                   placeholder="e.g. Professional Services"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="CTA Label">
            <input type="text" name="services_cta_label" value="{{ old('services_cta_label', $page->services_cta_label) }}"
                   placeholder="e.g. View All Disciplines"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Heading">
            <input type="text" name="services_heading" value="{{ old('services_heading', $page->services_heading) }}"
                   placeholder="e.g. A single partner across"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Heading (second line)">
            <input type="text" name="services_heading_break" value="{{ old('services_heading_break', $page->services_heading_break) }}"
                   placeholder="e.g. multiple disciplines."
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>
    <x-admin.field label="CTA Link">
        <input type="text" name="services_cta_url" value="{{ old('services_cta_url', $page->services_cta_url) }}"
               class="w-full max-w-md rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>

    <div class="space-y-5">
        @for ($i = 0; $i < 5; $i++)
            @php $card = $serviceCards->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-5">
                <h3 class="mb-4 text-sm font-bold uppercase tracking-[0.18em] text-[#07172f]">Service Card {{ $i + 1 }}</h3>
                <div class="space-y-5">
                    <x-admin.image-field
                        label="Image"
                        :media="$card?->image"
                        input-name="service_cards[{{ $i }}][image_file]"
                        remove-name="service_cards[{{ $i }}][remove_image]"
                        alt-name="service_cards[{{ $i }}][image_alt]"
                        :alt-value="$card?->image_alt"
                    />

                    <x-admin.field label="Title">
                        <input type="text" name="service_cards[{{ $i }}][title]" value="{{ old("service_cards.$i.title", $card?->title) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>

                    <x-admin.field label="Description">
                        <textarea name="service_cards[{{ $i }}][description]" rows="2"
                                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old("service_cards.$i.description", $card?->description) }}</textarea>
                    </x-admin.field>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <x-admin.field label="Link" helper="e.g. /services#business-technology">
                            <input type="text" name="service_cards[{{ $i }}][href]" value="{{ old("service_cards.$i.href", $card?->href) }}"
                                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        </x-admin.field>
                        <x-admin.field label="Icon">
                            <select name="service_cards[{{ $i }}][icon]"
                                    class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                                <option value="">— Select icon —</option>
                                @foreach (\App\Support\HeroIconRegistry::labels() as $iconKey => $iconLabel)
                                    <option value="{{ $iconKey }}" {{ old("service_cards.$i.icon", $card?->icon) === $iconKey ? 'selected' : '' }}>{{ $iconLabel }}</option>
                                @endforeach
                            </select>
                        </x-admin.field>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</x-admin.panel>

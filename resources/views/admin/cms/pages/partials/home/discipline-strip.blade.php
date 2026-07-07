@php $disciplineItems = old('discipline_items', collect($page->discipline_items ?? [])->map(fn ($label) => ['label' => $label])->all()); @endphp

<x-admin.panel subtitle="Simple Editing" title="Discipline Identity Strip">
    <x-admin.field label="Eyebrow">
        <input type="text" name="discipline_eyebrow" value="{{ old('discipline_eyebrow', $page->discipline_eyebrow) }}"
               placeholder="e.g. Our Services"
               class="w-full max-w-md rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>

    <x-admin.field label="Pill Labels" helper="Up to 5 short labels displayed as pills across the strip.">
        <div class="space-y-3">
            @for ($i = 0; $i < 5; $i++)
                <input type="text" name="discipline_items[{{ $i }}][label]" value="{{ $disciplineItems[$i]['label'] ?? '' }}"
                       placeholder="e.g. Business, Technology & Digital"
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            @endfor
        </div>
    </x-admin.field>
</x-admin.panel>

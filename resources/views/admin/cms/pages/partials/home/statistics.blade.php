@php $stats = $page->statistics->values(); @endphp

<x-admin.panel subtitle="Stats Band" title="Statistics">
    <div class="space-y-5">
        @for ($i = 0; $i < 4; $i++)
            @php $stat = $stats->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-5">
                <div class="grid gap-5 sm:grid-cols-3">
                    <x-admin.field label="Label">
                        <input type="text" name="statistics[{{ $i }}][label]" value="{{ old("statistics.$i.label", $stat?->label) }}"
                               placeholder="e.g. Service Areas"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <x-admin.field label="Number" helper="Can be numeric or short text, e.g. 5 or Multi-Sector.">
                        <input type="text" name="statistics[{{ $i }}][value]" value="{{ old("statistics.$i.value", $stat?->value) }}"
                               placeholder="e.g. 5"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <x-admin.field label="Description" helper="Optional caption shown beneath the number.">
                        <input type="text" name="statistics[{{ $i }}][caption]" value="{{ old("statistics.$i.caption", $stat?->caption) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                </div>
            </div>
        @endfor
    </div>
</x-admin.panel>

@php $stats = $page->statistics->values(); @endphp

<x-admin.panel subtitle="Stats Band" title="Statistics">
    <div class="space-y-5">
        @for ($i = 0; $i < 4; $i++)
            @php $stat = $stats->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-5">
                <div class="grid gap-5 sm:grid-cols-3">
                    <x-admin.field label="Label">
                        <input type="text" name="statistics[{{ $i }}][label]" value="{{ old("statistics.$i.label", $stat?->label) }}"
                               placeholder="e.g. Response Target"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <x-admin.field label="Value">
                        <input type="text" name="statistics[{{ $i }}][value]" value="{{ old("statistics.$i.value", $stat?->value) }}"
                               placeholder="e.g. 2 Business Days"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <x-admin.field label="Caption" helper="Optional — leave empty to display the value larger, as Service Areas does.">
                        <input type="text" name="statistics[{{ $i }}][caption]" value="{{ old("statistics.$i.caption", $stat?->caption) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                </div>
            </div>
        @endfor
    </div>
</x-admin.panel>

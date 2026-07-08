@php $audienceTags = $page->aboutAudienceTags->values(); @endphp

<x-admin.panel subtitle="Exactly Eight Labels" title="Who We Support">
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @for ($i = 0; $i < 8; $i++)
            @php $item = $audienceTags->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-4">
                <h4 class="mb-3 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Tag {{ $i + 1 }}</h4>
                <div class="space-y-3">
                    <x-admin.field label="Label">
                        <input type="text" name="audience_tags[{{ $i }}][label]" value="{{ old("audience_tags.$i.label", $item?->label) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                        <input type="checkbox" name="audience_tags[{{ $i }}][visibility]" value="1"
                               {{ old("audience_tags.$i.visibility", $item?->visibility ?? true) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                        Visible
                    </label>
                </div>
            </div>
        @endfor
    </div>
</x-admin.panel>

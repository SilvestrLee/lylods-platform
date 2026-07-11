@php $steps = $page->communityHowWorkSteps->values(); @endphp

<x-admin.panel subtitle="Exactly Four Steps" title="How We Work">
    <x-admin.field label="Eyebrow">
        <input type="text" name="community_how_work_eyebrow" value="{{ old('community_how_work_eyebrow', $page->community_how_work_eyebrow) }}"
               placeholder="How We Work"
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Heading">
        <input type="text" name="community_how_work_heading" value="{{ old('community_how_work_heading', $page->community_how_work_heading) }}"
               placeholder="A consistent four-stage approach."
               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
    </x-admin.field>
    <x-admin.field label="Body">
        <textarea name="community_how_work_body" rows="3"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('community_how_work_body', $page->community_how_work_body) }}</textarea>
    </x-admin.field>

    <div class="grid gap-5 sm:grid-cols-2">
        @for ($i = 0; $i < 4; $i++)
            @php $step = $steps->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-5">
                <h4 class="mb-4 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Step {{ $i + 1 }}</h4>
                <div class="space-y-4">
                    <x-admin.field label="Title">
                        <input type="text" name="community_how_work_steps[{{ $i }}][title]" value="{{ old("community_how_work_steps.$i.title", $step?->title) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <x-admin.field label="Description">
                        <textarea name="community_how_work_steps[{{ $i }}][description]" rows="3"
                                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old("community_how_work_steps.$i.description", $step?->description) }}</textarea>
                    </x-admin.field>
                    <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                        <input type="checkbox" name="community_how_work_steps[{{ $i }}][visibility]" value="1"
                               {{ old("community_how_work_steps.$i.visibility", $step?->visibility ?? true) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                        Visible
                    </label>
                </div>
            </div>
        @endfor
    </div>
</x-admin.panel>

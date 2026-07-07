@php $steps = $page->engagementSteps->values(); @endphp

<x-admin.panel subtitle="Section Intro" title="Engagement Process">
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Eyebrow">
            <input type="text" name="engagement_eyebrow" value="{{ old('engagement_eyebrow', $page->engagement_eyebrow) }}"
                   placeholder="e.g. Our Approach"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Heading">
            <input type="text" name="engagement_heading" value="{{ old('engagement_heading', $page->engagement_heading) }}"
                   placeholder="e.g. How we engage with clients."
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>
    <x-admin.field label="Description">
        <textarea name="engagement_description" rows="2"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('engagement_description', $page->engagement_description) }}</textarea>
    </x-admin.field>

    <div class="space-y-5">
        @for ($i = 0; $i < 4; $i++)
            @php $step = $steps->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-5">
                <h3 class="mb-4 text-sm font-bold uppercase tracking-[0.18em] text-[#07172f]">Step {{ $i + 1 }}</h3>
                <x-admin.field label="Heading">
                    <input type="text" name="engagement_steps[{{ $i }}][title]" value="{{ old("engagement_steps.$i.title", $step?->title) }}"
                           class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </x-admin.field>
                <div class="mt-5">
                    <x-admin.field label="Description">
                        <textarea name="engagement_steps[{{ $i }}][description]" rows="2"
                                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old("engagement_steps.$i.description", $step?->description) }}</textarea>
                    </x-admin.field>
                </div>
                <label class="mt-4 flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                    <input type="checkbox" name="engagement_steps[{{ $i }}][is_dark]" value="1"
                           {{ old("engagement_steps.$i.is_dark", $step?->is_dark) ? 'checked' : '' }}
                           class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                    Dark Card Toggle
                </label>
            </div>
        @endfor
    </div>
</x-admin.panel>

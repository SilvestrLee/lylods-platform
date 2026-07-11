@php $steps = $page->careersHowItWorksSteps->values(); @endphp

<x-admin.panel subtitle="Candidate Message" title="What to Tell Us">
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Eyebrow">
            <input type="text" name="careers_message_eyebrow" value="{{ old('careers_message_eyebrow', $page->careers_message_eyebrow) }}"
                   placeholder="What to Tell Us"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Heading">
            <input type="text" name="careers_message_heading" value="{{ old('careers_message_heading', $page->careers_message_heading) }}"
                   placeholder="Help us understand how you can contribute."
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>
    <x-admin.field label="Message Card Body">
        <textarea name="careers_message_body" rows="3"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('careers_message_body', $page->careers_message_body) }}</textarea>
    </x-admin.field>
    <x-admin.field label="Disclaimer Notice">
        <textarea name="careers_notice_body" rows="3"
                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('careers_notice_body', $page->careers_notice_body) }}</textarea>
    </x-admin.field>
</x-admin.panel>

<x-admin.panel subtitle="Exactly Four Steps" title="How It Works">
    <div class="grid gap-6 sm:grid-cols-2">
        <x-admin.field label="Eyebrow">
            <input type="text" name="careers_how_eyebrow" value="{{ old('careers_how_eyebrow', $page->careers_how_eyebrow) }}"
                   placeholder="How It Works"
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
        <x-admin.field label="Heading">
            <input type="text" name="careers_how_heading" value="{{ old('careers_how_heading', $page->careers_how_heading) }}"
                   placeholder="Simple steps to connect."
                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </x-admin.field>
    </div>

    <div class="grid gap-5 sm:grid-cols-2">
        @for ($i = 0; $i < 4; $i++)
            @php $step = $steps->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-5">
                <h4 class="mb-4 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Step {{ $i + 1 }}</h4>
                <div class="space-y-4">
                    <x-admin.field label="Title">
                        <input type="text" name="careers_how_it_works_steps[{{ $i }}][title]" value="{{ old("careers_how_it_works_steps.$i.title", $step?->title) }}"
                               class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </x-admin.field>
                    <x-admin.field label="Description">
                        <textarea name="careers_how_it_works_steps[{{ $i }}][description]" rows="3"
                                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old("careers_how_it_works_steps.$i.description", $step?->description) }}</textarea>
                    </x-admin.field>
                    <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                        <input type="checkbox" name="careers_how_it_works_steps[{{ $i }}][visibility]" value="1"
                               {{ old("careers_how_it_works_steps.$i.visibility", $step?->visibility ?? true) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                        Visible
                    </label>
                </div>
            </div>
        @endfor
    </div>
</x-admin.panel>

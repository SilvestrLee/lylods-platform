@php $steps = $page->communityRoleSteps->values(); @endphp

<x-admin.panel subtitle="Exactly Seven Steps" title="Our Role">
    <div class="grid gap-8 lg:grid-cols-2">
        <div class="space-y-6">
            <x-admin.field label="Eyebrow">
                <input type="text" name="community_role_eyebrow" value="{{ old('community_role_eyebrow', $page->community_role_eyebrow) }}"
                       placeholder="Our Role"
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            </x-admin.field>
            <x-admin.field label="Heading">
                <input type="text" name="community_role_heading" value="{{ old('community_role_heading', $page->community_role_heading) }}"
                       placeholder="We help you move from idea to action."
                       class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
            </x-admin.field>
            <x-admin.field label="Body">
                <textarea name="community_role_body" rows="4"
                          class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('community_role_body', $page->community_role_body) }}</textarea>
            </x-admin.field>
        </div>
        <div class="space-y-6">
            <x-admin.image-field
                label="Image"
                :media="$page->communityRoleMedia"
                input-name="community_role_media_file"
                remove-name="remove_community_role_media"
                helper="Leave empty to use the default placeholder image."
            />
        </div>
    </div>

    <div class="grid gap-5 sm:grid-cols-2">
        @for ($i = 0; $i < 7; $i++)
            @php $step = $steps->get($i); @endphp
            <div class="rounded-2xl border border-[#e6e8ee] p-5">
                <h4 class="mb-4 text-xs font-bold uppercase tracking-[0.18em] text-[#07172f]">Step {{ $i + 1 }}</h4>
                <div class="space-y-4">
                    <x-admin.field label="Description">
                        <textarea name="community_role_steps[{{ $i }}][description]" rows="3"
                                  class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old("community_role_steps.$i.description", $step?->description) }}</textarea>
                    </x-admin.field>
                    <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                        <input type="checkbox" name="community_role_steps[{{ $i }}][visibility]" value="1"
                               {{ old("community_role_steps.$i.visibility", $step?->visibility ?? true) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                        Visible
                    </label>
                </div>
            </div>
        @endfor
    </div>
</x-admin.panel>

<x-admin.panel subtitle="Partners, Clients & Accreditations" title="Partners & Accreditations">
    <p class="text-sm text-[#667085]">
        Organisation records are managed under
        <a href="{{ route('admin.cms.trust.index') }}" class="font-semibold text-[#123f8c] underline">Manage Partners & Accreditations</a>.
        Use the controls below to choose homepage visibility and ordering for partner and accreditation logos.
    </p>

    @if ($organisations->isEmpty())
        <p class="rounded-2xl border border-dashed border-[#d0d5dd] p-6 text-center text-sm text-[#667085]">
            No partner or accreditation organisations yet. Add one from Manage Partners & Accreditations to feature it here.
        </p>
    @else
        <div class="divide-y divide-[#e6e8ee] rounded-2xl border border-[#e6e8ee]">
            @foreach ($organisations as $organisation)
                <div class="flex flex-col gap-3 p-4 sm:flex-row sm:items-center sm:justify-between">
                    <div class="flex min-w-0 flex-1 items-center gap-3">
                        @if ($organisation->logo)
                            <img src="{{ $organisation->logo->url() }}" alt="" class="h-8 w-14 rounded object-contain">
                        @endif
                        <div class="min-w-0">
                            <p class="truncate text-sm font-semibold text-[#07172f]">{{ $organisation->name }}</p>
                            <p class="truncate text-xs uppercase tracking-wide text-[#667085]">{{ $organisation->type }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                            <input type="checkbox" name="partners[{{ $organisation->id }}][is_active]" value="1"
                                   {{ old("partners.{$organisation->id}.is_active", $organisation->is_active) ? 'checked' : '' }}
                                   class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                            Visible on Homepage
                        </label>
                        <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                            Order
                            <input type="number" min="0" name="partners[{{ $organisation->id }}][display_order]"
                                   value="{{ old("partners.{$organisation->id}.display_order", $organisation->display_order) }}"
                                   class="w-16 rounded-lg border border-[#d0d5dd] px-2 py-1 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-admin.panel>

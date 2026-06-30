<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Organisations & Trust</h2>
            </div>
            <a href="{{ route('admin.cms.trust.create') }}"
               class="inline-flex items-center gap-2 rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-bold text-white hover:bg-[#123f8c]">
                + Add Organisation
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Organisations & Trust']]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <h1 class="text-xl font-bold text-[#07172f]">All Organisations</h1>
                <p class="mt-1 text-sm text-[#667085]">Manage partners, clients, associations, accreditations and suppliers. Partners and accreditations appear on the public site.</p>
            </div>

            @php
                $grouped = $organisations->groupBy('type');
                $typeLabels = [
                    'partner'       => 'Partners',
                    'accreditation' => 'Accreditations',
                    'client'        => 'Clients',
                    'association'   => 'Associations',
                    'supplier'      => 'Suppliers',
                ];
            @endphp

            @forelse ($organisations as $org)
                @if ($loop->first || $organisations[$loop->index - 1]->type !== $org->type)
                    @if (!$loop->first)
                        </div>{{-- close previous section --}}
                    @endif
                    <div class="border-b border-[#e6e8ee]">
                        <div class="bg-[#f8fafc] px-6 py-3">
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#667085]">{{ $typeLabels[$org->type] ?? ucfirst($org->type) }}</p>
                        </div>
                @endif

                <div class="flex items-center justify-between gap-4 border-t border-[#e6e8ee] px-6 py-4">
                    <div class="min-w-0 flex-1">
                        <div class="flex items-center gap-3">
                            <p class="truncate font-semibold text-[#07172f]">{{ $org->name }}</p>
                            @if ($org->website)
                                <a href="{{ $org->website }}" target="_blank" rel="noopener" class="shrink-0 text-xs text-[#123f8c] hover:underline">↗ Website</a>
                            @endif
                            @if (!$org->is_active)
                                <span class="rounded-full bg-red-50 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide text-red-600 ring-1 ring-red-200">Hidden</span>
                            @endif
                        </div>
                    </div>
                    <a href="{{ route('admin.cms.trust.edit', $org) }}"
                       class="shrink-0 rounded-full bg-[#07172f] px-4 py-1.5 text-xs font-semibold text-white hover:bg-[#123f8c]">
                        Edit
                    </a>
                </div>

                @if ($loop->last)
                    </div>{{-- close last section --}}
                @endif
            @empty
                <div class="px-6 py-10 text-center text-sm text-[#667085]">
                    No organisations yet.
                    <a href="{{ route('admin.cms.trust.create') }}" class="font-semibold text-[#123f8c] hover:underline">Add the first organisation.</a>
                </div>
            @endforelse
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS · Services</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">{{ $serviceGroup->name }}</h2>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.cms.services.groups.index') }}"
                   class="rounded-full border border-[#d0d5dd] px-5 py-2 text-sm font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                    ← All Groups
                </a>
                <a href="{{ route('admin.cms.services.items.create', $serviceGroup) }}"
                   class="rounded-full bg-[#07172f] px-5 py-2 text-sm font-semibold text-white hover:bg-[#123f8c]">
                    + Add Item
                </a>
            </div>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[
                ['label' => 'CMS'],
                ['label' => 'Service Groups', 'url' => route('admin.cms.services.groups.index')],
                ['label' => $serviceGroup->name],
            ]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <h1 class="text-xl font-bold text-[#07172f]">Service Items</h1>
                <p class="mt-1 text-sm text-[#667085]">These items are displayed as bullet points under the group on the public services page.</p>
            </div>

            <div class="divide-y divide-[#e6e8ee]">
                @forelse ($items as $item)
                    <div class="flex items-center justify-between gap-4 px-6 py-4">
                        <div class="flex min-w-0 flex-1 items-center gap-3">
                            <span class="h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>
                            <span class="truncate text-sm font-medium text-[#07172f]">{{ $item->title }}</span>
                            @if (!$item->is_active)
                                <span class="rounded-full bg-red-50 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide text-red-600 ring-1 ring-red-200">Hidden</span>
                            @endif
                        </div>
                        <a href="{{ route('admin.cms.services.items.edit', [$serviceGroup, $item]) }}"
                           class="shrink-0 rounded-full border border-[#d0d5dd] px-4 py-1.5 text-xs font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                            Edit
                        </a>
                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-sm text-[#667085]">No service items yet.
                        <a href="{{ route('admin.cms.services.items.create', $serviceGroup) }}" class="font-semibold text-[#123f8c] hover:underline">Add the first item.</a>
                    </div>
                @endforelse
            </div>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Service Groups</h2>
            </div>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Service Groups']]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <h1 class="text-xl font-bold text-[#07172f]">All Service Groups</h1>
                <p class="mt-1 text-sm text-[#667085]">Edit group details or manage individual service items within each group.</p>
            </div>

            <div class="divide-y divide-[#e6e8ee]">
                @forelse ($groups as $group)
                    <div class="flex items-center justify-between gap-4 px-6 py-5">
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-3">
                                <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#07172f] text-[10px] font-bold text-[#c9a24d]">
                                    {{ str_pad($group->display_order, 2, '0', STR_PAD_LEFT) }}
                                </span>
                                <p class="truncate font-semibold text-[#07172f]">{{ $group->name }}</p>
                                @if (!$group->is_active)
                                    <span class="rounded-full bg-red-50 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide text-red-600 ring-1 ring-red-200">Hidden</span>
                                @endif
                            </div>
                            <p class="mt-1.5 pl-10 text-xs text-[#667085]">{{ $group->services_count }} service {{ Str::plural('item', $group->services_count) }}</p>
                        </div>
                        <div class="flex shrink-0 gap-2">
                            <a href="{{ route('admin.cms.services.items.index', $group) }}"
                               class="rounded-full border border-[#d0d5dd] px-4 py-1.5 text-xs font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                                Items
                            </a>
                            <a href="{{ route('admin.cms.services.groups.edit', $group) }}"
                               class="rounded-full bg-[#07172f] px-4 py-1.5 text-xs font-semibold text-white hover:bg-[#123f8c]">
                                Edit Group
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-sm text-[#667085]">
                        No service groups found. Run <code class="rounded bg-slate-100 px-1 py-0.5 text-xs">php artisan db:seed --class=ServiceGroupSeeder</code> to seed defaults.
                    </div>
                @endforelse
            </div>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

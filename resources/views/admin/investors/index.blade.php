<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Investor Accounts</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Manage Investors</h2>
            </div>
            <a href="{{ route('admin.investors.create') }}"
               class="rounded-full bg-[#07172f] px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#123f8c]">
                Add Investor
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'Investors']]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div x-data="{ search: '' }" class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">

            {{-- Header --}}
            <div class="flex flex-col gap-4 border-b border-[#e6e8ee] p-6 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Investor Records</p>
                    <h1 class="mt-2 text-2xl font-bold text-[#07172f]">Investor Account List</h1>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">Create and manage investor login accounts connected to investment records.</p>
                </div>
                <a href="{{ route('admin.investors.create') }}"
                   class="inline-flex shrink-0 rounded-full bg-[#c9a24d] px-5 py-3 text-sm font-bold text-[#07172f] hover:bg-[#d7b567]">
                    Create Investor Account
                </a>
            </div>

            {{-- Live search --}}
            <div class="border-b border-[#e6e8ee] px-6 py-4">
                <div class="relative max-w-sm">
                    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-[#98a2b3]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                        </svg>
                    </span>
                    <input x-model="search" type="text" placeholder="Search by name or email…"
                           class="w-full rounded-full border border-[#e6e8ee] bg-[#f7f9fc] py-2 pl-9 pr-4 text-sm text-[#07172f] placeholder:text-[#98a2b3] focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </div>
            </div>

            {{-- Mobile card view --}}
            <div class="divide-y divide-[#e6e8ee] sm:hidden">
                @forelse ($investors as $investor)
                    <div x-show="search === '' || '{{ strtolower($investor->name) }}'.includes(search.toLowerCase()) || '{{ strtolower($investor->email) }}'.includes(search.toLowerCase())"
                         class="p-5 transition hover:bg-[#f8fafc]">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="font-bold text-[#07172f]">{{ $investor->name }}</p>
                                <p class="mt-0.5 text-xs text-[#667085]">{{ $investor->email }}</p>
                            </div>
                            <span class="shrink-0 rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-bold text-[#07172f]">
                                {{ $investor->investor_number ?? 'INV-' . str_pad($investor->id, 5, '0', STR_PAD_LEFT) }}
                            </span>
                        </div>
                        <div class="mt-3 flex items-center justify-between gap-3">
                            <span class="rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-semibold text-[#07172f]">
                                {{ $investor->investments_count }} record{{ $investor->investments_count === 1 ? '' : 's' }}
                            </span>
                            <a href="{{ route('admin.investors.edit', $investor) }}"
                               class="rounded-full bg-[#07172f] px-4 py-2 text-xs font-bold text-white hover:bg-[#123f8c]">Edit</a>
                        </div>
                    </div>
                @empty
                    <div class="p-8">
                        <x-empty-state icon="investors"
                                       heading="No investor accounts yet"
                                       subtext="Create your first investor account to begin assigning investment records."
                                       :action-url="route('admin.investors.create')"
                                       action-label="Add First Investor" />
                    </div>
                @endforelse
            </div>

            {{-- Desktop table --}}
            <div class="hidden overflow-x-auto sm:block">
                <table class="min-w-full divide-y divide-[#e6e8ee] text-left text-sm">
                    <thead class="bg-[#f8fafc] text-[#667085]">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Investor ID</th>
                            <th class="px-6 py-4 font-semibold">Investor</th>
                            <th class="px-6 py-4 font-semibold">Email</th>
                            <th class="px-6 py-4 font-semibold">Records</th>
                            <th class="px-6 py-4 font-semibold">Joined</th>
                            <th class="px-6 py-4 font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#e6e8ee] bg-white">
                        @forelse ($investors as $investor)
                            <tr x-show="search === '' || '{{ strtolower($investor->name) }}'.includes(search.toLowerCase()) || '{{ strtolower($investor->email) }}'.includes(search.toLowerCase())"
                                class="transition hover:bg-[#f8fafc]">
                                <td class="px-6 py-5">
                                    <span class="rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-bold text-[#07172f]">
                                        {{ $investor->investor_number ?? 'INV-' . str_pad($investor->id, 5, '0', STR_PAD_LEFT) }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <p class="font-bold text-[#07172f]">{{ $investor->name }}</p>
                                    <p class="mt-1 text-xs font-semibold uppercase tracking-[0.16em] text-[#c9a24d]">Investor</p>
                                </td>
                                <td class="px-6 py-5 text-[#667085]">{{ $investor->email }}</td>
                                <td class="px-6 py-5">
                                    <span class="rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-bold text-[#07172f]">
                                        {{ $investor->investments_count }} record{{ $investor->investments_count === 1 ? '' : 's' }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-[#667085]">{{ $investor->created_at?->format('M d, Y') }}</td>
                                <td class="px-6 py-5">
                                    <a href="{{ route('admin.investors.edit', $investor) }}"
                                       class="rounded-full bg-[#07172f] px-4 py-2 text-xs font-bold text-white hover:bg-[#123f8c]">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <x-empty-state icon="investors"
                                                   heading="No investor accounts yet"
                                                   subtext="Create your first investor account to begin assigning investment records."
                                                   :action-url="route('admin.investors.create')"
                                                   action-label="Add First Investor" />
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

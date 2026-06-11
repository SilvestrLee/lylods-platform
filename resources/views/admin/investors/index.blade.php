<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">
                    Investor Accounts
                </p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">
                    Manage Investors
                </h2>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.dashboard') }}"
                   class="rounded-full border border-[#d0d5dd] bg-white px-5 py-2 text-sm font-semibold text-[#07172f] shadow-sm hover:bg-[#f7f3ea]">
                    Admin Dashboard
                </a>

                <a href="{{ route('admin.investors.create') }}"
                   class="rounded-full bg-[#07172f] px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#123f8c]">
                    Add Investor
                </a>
            </div>
        </div>
    </x-slot>

    <div class="bg-[#f7f3ea] py-10">
        <div class="mx-auto max-w-7xl px-6">
            @if (session('success'))
                <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                <div class="flex flex-col gap-4 border-b border-[#e6e8ee] p-6 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">
                            Investor Records
                        </p>
                        <h1 class="mt-2 text-2xl font-bold text-[#07172f]">
                            Investor Account List
                        </h1>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">
                            Create and manage investor login accounts connected to investment records.
                        </p>
                    </div>

                    <a href="{{ route('admin.investors.create') }}"
                       class="inline-flex rounded-full bg-[#c9a24d] px-5 py-3 text-sm font-bold text-[#07172f] hover:bg-[#d7b567]">
                        Create Investor Account
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#e6e8ee] text-left text-sm">
                        <thead class="bg-[#f8fafc] text-[#667085]">
                            <tr>
                                <th class="px-6 py-4 font-semibold">Investor ID</th>
                                <th class="px-6 py-4 font-semibold">Investor</th>
                                <th class="px-6 py-4 font-semibold">Email</th>
                                <th class="px-6 py-4 font-semibold">Investment Records</th>
                                <th class="px-6 py-4 font-semibold">Date Created</th>
                                <th class="px-6 py-4 font-semibold">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-[#e6e8ee] bg-white">
                            @forelse ($investors as $investor)
                                <tr>
                                    <td class="px-6 py-5">
                                        <span class="rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-bold text-[#07172f]">
                                            {{ $investor->investor_number ?? 'INV-' . str_pad($investor->id, 5, '0', STR_PAD_LEFT) }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-5">
                                        <p class="font-bold text-[#07172f]">
                                            {{ $investor->name }}
                                        </p>
                                        <p class="mt-1 text-xs font-semibold uppercase tracking-[0.16em] text-[#c9a24d]">
                                            Investor
                                        </p>
                                    </td>

                                    <td class="px-6 py-5 text-[#667085]">
                                        {{ $investor->email }}
                                    </td>

                                    <td class="px-6 py-5">
                                        <span class="rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-bold text-[#07172f]">
                                            {{ $investor->investments_count }} record{{ $investor->investments_count === 1 ? '' : 's' }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-5 text-[#667085]">
                                        {{ $investor->created_at?->format('M d, Y') }}
                                    </td>

                                    <td class="px-6 py-5">
                                        <a href="{{ route('admin.investors.edit', $investor) }}"
                                           class="rounded-full bg-[#07172f] px-4 py-2 text-xs font-bold text-white hover:bg-[#123f8c]">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <p class="text-lg font-bold text-[#07172f]">
                                            No investor accounts yet
                                        </p>
                                        <p class="mt-2 text-sm text-[#667085]">
                                            Create your first investor account to begin assigning investment records.
                                        </p>

                                        <a href="{{ route('admin.investors.create') }}"
                                           class="mt-5 inline-flex rounded-full bg-[#07172f] px-5 py-3 text-sm font-bold text-white hover:bg-[#123f8c]">
                                            Add First Investor
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#c9a24d]">Admin Dashboard</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Investment Records</h2>
            </div>
            <a href="{{ route('admin.investments.create') }}"
               class="rounded-full bg-[#07172f] px-5 py-2 text-sm font-semibold text-white hover:bg-[#123f8c]">
                Add Investment
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'Investment Records']]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div x-data="{ filter: 'all' }" class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">

            {{-- Header --}}
            <div class="flex flex-col gap-4 border-b border-[#e6e8ee] p-6 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-lg font-bold text-[#07172f]">All Investment Records</h3>
                    <p class="mt-1 text-sm text-[#667085]">View and manage investor investment records.</p>
                </div>
                <span class="w-fit rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-semibold text-[#07172f]">
                    {{ $investments->count() }} records
                </span>
            </div>

            {{-- Status filter tabs --}}
            <div class="flex flex-wrap gap-2 border-b border-[#e6e8ee] px-6 py-4">
                <button @click="filter = 'all'" :class="filter === 'all' ? 'bg-[#07172f] text-white' : 'bg-[#f7f9fc] text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]'" class="rounded-full px-4 py-1.5 text-xs font-semibold transition">All</button>
                <button @click="filter = 'active'" :class="filter === 'active' ? 'bg-emerald-600 text-white' : 'bg-[#f7f9fc] text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]'" class="rounded-full px-4 py-1.5 text-xs font-semibold transition">Active</button>
                <button @click="filter = 'pending'" :class="filter === 'pending' ? 'bg-amber-500 text-white' : 'bg-[#f7f9fc] text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]'" class="rounded-full px-4 py-1.5 text-xs font-semibold transition">Pending</button>
                <button @click="filter = 'matured'" :class="filter === 'matured' ? 'bg-sky-600 text-white' : 'bg-[#f7f9fc] text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]'" class="rounded-full px-4 py-1.5 text-xs font-semibold transition">Matured</button>
                <button @click="filter = 'withdrawn'" :class="filter === 'withdrawn' ? 'bg-slate-600 text-white' : 'bg-[#f7f9fc] text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]'" class="rounded-full px-4 py-1.5 text-xs font-semibold transition">Withdrawn</button>
                <button @click="filter = 'cancelled'" :class="filter === 'cancelled' ? 'bg-red-500 text-white' : 'bg-[#f7f9fc] text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]'" class="rounded-full px-4 py-1.5 text-xs font-semibold transition">Cancelled</button>
            </div>

            {{-- Mobile card view --}}
            <div class="divide-y divide-[#e6e8ee] sm:hidden">
                @forelse ($investments as $investment)
                    <div x-show="filter === 'all' || filter === '{{ $investment->status }}'"
                         class="p-5 transition hover:bg-[#f8fafc]">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="font-bold text-[#07172f]">{{ $investment->user?->name ?? 'Unknown Investor' }}</p>
                                <p class="mt-0.5 text-xs text-[#667085]">{{ $investment->investmentPlan?->name ?? 'No Plan' }}</p>
                            </div>
                            <x-status-badge :status="$investment->status" />
                        </div>
                        <div class="mt-3 grid grid-cols-2 gap-3">
                            <div>
                                <p class="text-xs text-[#98a2b3]">Amount</p>
                                <p class="mt-0.5 text-sm font-semibold text-[#07172f]">£{{ number_format($investment->amount, 2) }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-[#98a2b3]">Expected Return</p>
                                <p class="mt-0.5 text-sm font-semibold text-[#07172f]">£{{ number_format($investment->expected_return ?? 0, 2) }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-[#98a2b3]">Start Date</p>
                                <p class="mt-0.5 text-sm text-[#667085]">{{ $investment->start_date?->format('M d, Y') ?? '—' }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-[#98a2b3]">Action</p>
                                <a href="{{ route('admin.investments.edit', $investment) }}"
                                   class="mt-0.5 inline-flex rounded-full bg-[#07172f] px-3 py-1 text-xs font-bold text-white hover:bg-[#123f8c]">Edit</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-8">
                        <x-empty-state icon="investments"
                                       heading="No investment records yet"
                                       subtext="Create the first investment record to get started."
                                       :action-url="route('admin.investments.create')"
                                       action-label="Add Investment" />
                    </div>
                @endforelse
            </div>

            {{-- Desktop table --}}
            <div class="hidden overflow-x-auto sm:block">
                <table class="min-w-full divide-y divide-[#e6e8ee] text-left text-sm">
                    <thead class="bg-[#f8fafc] text-[#667085]">
                        <tr>
                            <th class="px-5 py-4 font-semibold">Investor</th>
                            <th class="px-5 py-4 font-semibold">Plan</th>
                            <th class="px-5 py-4 text-right font-semibold">Amount</th>
                            <th class="px-5 py-4 text-right font-semibold">Expected Return</th>
                            <th class="px-5 py-4 font-semibold">Status</th>
                            <th class="px-5 py-4 font-semibold">Start Date</th>
                            <th class="px-5 py-4 font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#e6e8ee] bg-white">
                        @forelse ($investments as $investment)
                            <tr x-show="filter === 'all' || filter === '{{ $investment->status }}'"
                                class="transition hover:bg-[#f8fafc]">
                                <td class="px-5 py-4 font-medium text-[#07172f]">
                                    {{ $investment->user?->name ?? 'Unknown Investor' }}
                                </td>
                                <td class="px-5 py-4 text-[#667085]">
                                    {{ $investment->investmentPlan?->name ?? 'No Plan' }}
                                </td>
                                <td class="px-5 py-4 text-right font-semibold text-[#07172f]">
                                    £{{ number_format($investment->amount, 2) }}
                                </td>
                                <td class="px-5 py-4 text-right font-semibold text-[#07172f]">
                                    £{{ number_format($investment->expected_return ?? 0, 2) }}
                                </td>
                                <td class="px-5 py-4">
                                    <x-status-badge :status="$investment->status" />
                                </td>
                                <td class="px-5 py-4 text-[#667085]">
                                    {{ $investment->start_date?->format('M d, Y') ?? '-' }}
                                </td>
                                <td class="px-5 py-4">
                                    <a href="{{ route('admin.investments.edit', $investment) }}"
                                       class="rounded-full bg-[#07172f] px-4 py-2 text-xs font-semibold text-white hover:bg-[#123f8c]">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <x-empty-state icon="investments"
                                                   heading="No investment records yet"
                                                   subtext="Create the first investment record to get started."
                                                   :action-url="route('admin.investments.create')"
                                                   action-label="Add Investment" />
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Investment Plans</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Manage Investment Plans</h2>
            </div>
            <a href="{{ route('admin.investment-plans.create') }}"
               class="rounded-full bg-[#07172f] px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#123f8c]">
                Add Plan
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'Investment Plans']]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="flex flex-col gap-4 border-b border-[#e6e8ee] p-6 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Plan Records</p>
                    <h1 class="mt-2 text-2xl font-bold text-[#07172f]">Investment Plan List</h1>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">
                        Create and manage plan options that can be attached to investor investment records.
                    </p>
                </div>
                <a href="{{ route('admin.investment-plans.create') }}"
                   class="inline-flex shrink-0 rounded-full bg-[#c9a24d] px-5 py-3 text-sm font-bold text-[#07172f] hover:bg-[#d7b567]">
                    Create New Plan
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-[#e6e8ee] text-left text-sm">
                    <thead class="bg-[#f8fafc] text-[#667085]">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Plan Name</th>
                            <th class="px-6 py-4 text-right font-semibold">Minimum Amount</th>
                            <th class="px-6 py-4 text-right font-semibold">Expected Return</th>
                            <th class="px-6 py-4 font-semibold">Duration</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                            <th class="px-6 py-4 font-semibold">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-[#e6e8ee] bg-white">
                        @forelse ($plans as $plan)
                            <tr class="transition hover:bg-[#f8fafc]">
                                <td class="px-6 py-5">
                                    <p class="font-bold text-[#07172f]">{{ $plan->name }}</p>
                                    @if ($plan->description)
                                        <p class="mt-1 max-w-md text-sm leading-6 text-[#667085]">{{ $plan->description }}</p>
                                    @endif
                                </td>
                                <td class="px-6 py-5 text-right font-semibold text-[#07172f]">
                                    £{{ number_format($plan->minimum_amount, 2) }}
                                </td>
                                <td class="px-6 py-5 text-right text-[#667085]">
                                    @if (!is_null($plan->expected_return_rate))
                                        {{ number_format($plan->expected_return_rate, 2) }}%
                                    @else
                                        —
                                    @endif
                                </td>
                                <td class="px-6 py-5 text-[#667085]">{{ $plan->duration ?? '—' }}</td>
                                <td class="px-6 py-5">
                                    <x-status-badge :status="$plan->is_active ? 'active' : 'inactive'" />
                                </td>
                                <td class="px-6 py-5">
                                    <a href="{{ route('admin.investment-plans.edit', $plan) }}"
                                       class="rounded-full bg-[#07172f] px-4 py-2 text-xs font-bold text-white hover:bg-[#123f8c]">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <x-empty-state icon="plans"
                                                   heading="No investment plans yet"
                                                   subtext="Create your first investment plan to begin linking records properly."
                                                   :action-url="route('admin.investment-plans.create')"
                                                   action-label="Add First Plan" />
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

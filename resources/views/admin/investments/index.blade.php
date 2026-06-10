<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#c9a24d]">
                    Admin Dashboard
                </p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">
                    Investment Records
                </h2>
            </div>

            <a href="{{ route('admin.investments.create') }}"
               class="rounded-full bg-[#07172f] px-5 py-2 text-sm font-semibold text-white">
                Add Investment
            </a>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#f7f3ea] py-10">
        <div class="mx-auto max-w-7xl px-6">
            @if (session('success'))
                <div class="mb-6 rounded-2xl bg-green-50 px-5 py-4 text-sm font-medium text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                <div class="border-b border-[#e6e8ee] px-6 py-5">
                    <h3 class="text-lg font-bold text-[#07172f]">
                        All Investment Records
                    </h3>
                    <p class="mt-1 text-sm text-[#667085]">
                        View investor investment records managed by the admin.
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#e6e8ee] text-left text-sm">
                        <thead class="bg-[#f8fafc] text-[#667085]">
                            <tr>
                                <th class="px-5 py-4 font-semibold">Investor</th>
                                <th class="px-5 py-4 font-semibold">Plan</th>
                                <th class="px-5 py-4 font-semibold">Amount</th>
                                <th class="px-5 py-4 font-semibold">Expected Return</th>
                                <th class="px-5 py-4 font-semibold">Status</th>
                                <th class="px-5 py-4 font-semibold">Start Date</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-[#e6e8ee] bg-white">
                            @forelse ($investments as $investment)
                                <tr>
                                    <td class="px-5 py-5 font-medium text-[#07172f]">
                                        {{ $investment->user?->name ?? 'Unknown Investor' }}
                                    </td>

                                    <td class="px-5 py-5 text-[#667085]">
                                        {{ $investment->investmentPlan?->name ?? 'No Plan' }}
                                    </td>

                                    <td class="px-5 py-5 text-[#667085]">
                                        &#163;{{ number_format($investment->amount, 2) }}
                                    </td>

                                    <td class="px-5 py-5 text-[#667085]">
                                        &#163;{{ number_format($investment->expected_return ?? 0, 2) }}
                                    </td>

                                    <td class="px-5 py-5">
                                        <span class="rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-semibold text-[#667085]">
                                            {{ ucfirst($investment->status) }}
                                        </span>
                                    </td>

                                    <td class="px-5 py-5 text-[#667085]">
                                        {{ $investment->start_date?->format('M d, Y') ?? '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-5 py-8 text-center text-[#667085]">
                                        No investment records have been created yet.
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
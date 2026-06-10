<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#c9a24d]">
                    Investor Portal
                </p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">
                    Dashboard Overview
                </h2>
            </div>

            <div class="rounded-full bg-[#07172f] px-5 py-2 text-sm font-semibold text-white">
                Investor Access
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-[#f7f3ea] py-10">
        <div class="mx-auto max-w-7xl px-6">
            <div class="grid gap-8 lg:grid-cols-[280px_1fr]">
                <aside class="rounded-[2rem] bg-[#07172f] p-6 text-white shadow-sm">
                    <p class="text-xs font-bold uppercase tracking-[0.25em] text-[#c9a24d]">
                        The Lylods Group
                    </p>

                    <h3 class="mt-3 text-xl font-bold">
                        Investor Area
                    </h3>

                    <nav class="mt-8 space-y-2 text-sm font-medium">
                        <a href="{{ route('dashboard') }}" class="flex items-center justify-between rounded-2xl bg-white/10 px-4 py-3 text-white">
                            <span>Overview</span>
                            <span class="text-[#c9a24d]">&bull;</span>
                        </a>

                        <a href="#" class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                            Investments
                        </a>

                        <a href="#" class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                            Documents
                        </a>

                        <a href="#" class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                            Notices
                        </a>

                        <a href="#" class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                            Support
                        </a>

                        <a href="{{ route('profile.edit') }}" class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                            Profile
                        </a>
                    </nav>

                    <div class="mt-10 rounded-3xl bg-white/10 p-5">
                        <p class="text-sm font-semibold text-white">Need assistance?</p>
                        <p class="mt-2 text-sm leading-6 text-slate-300">
                            Contact the platform administrator for investor account support.
                        </p>
                    </div>
                </aside>

                <main class="space-y-8">
                    <section class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                        <div class="grid gap-6 lg:grid-cols-[1fr_auto] lg:items-center">
                            <div>
                                <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#123f8c]">
                                    Welcome back
                                </p>

                                <h1 class="mt-3 font-serif text-4xl font-bold text-[#07172f]">
                                    {{ auth()->user()->name }}
                                </h1>

                                <p class="mt-4 max-w-2xl leading-7 text-[#667085]">
                                    This dashboard is the foundation for investor account visibility, investment records, notices, documents, and future reporting.
                                </p>
                            </div>

                            <div class="rounded-3xl bg-[#f7f3ea] px-6 py-5 text-center">
                                <p class="text-sm text-[#667085]">Account Status</p>
                                <p class="mt-2 text-lg font-bold text-[#07172f]">Active</p>
                            </div>
                        </div>
                    </section>

                    <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                        <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                            <p class="text-sm font-medium text-[#667085]">Total Investment</p>
                            <p class="mt-3 text-3xl font-bold text-[#07172f]">
                                &#163;{{ number_format($totalInvestment ?? 0, 2) }}
                            </p>
                            <p class="mt-3 text-sm text-[#667085]">Approved investment records</p>
                        </div>

                        <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                            <p class="text-sm font-medium text-[#667085]">Active Investments</p>
                            <p class="mt-3 text-3xl font-bold text-[#07172f]">
                                {{ $activeInvestments ?? 0 }}
                            </p>
                            <p class="mt-3 text-sm text-[#667085]">Currently active records</p>
                        </div>

                        <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                            <p class="text-sm font-medium text-[#667085]">Expected Returns</p>
                            <p class="mt-3 text-3xl font-bold text-[#07172f]">
                                &#163;{{ number_format($expectedReturns ?? 0, 2) }}
                            </p>
                            <p class="mt-3 text-sm text-[#667085]">Based on recorded investments</p>
                        </div>

                        <div class="rounded-3xl bg-[#07172f] p-6 text-white shadow-sm">
                            <p class="text-sm font-medium text-slate-300">Portal Stage</p>
                            <p class="mt-3 text-3xl font-bold">Foundation</p>
                            <p class="mt-3 text-sm text-slate-300">Ready for data modules</p>
                        </div>
                    </section>

                    <section class="grid gap-8 xl:grid-cols-[1.2fr_0.8fr]">
                        <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                <div>
                                    <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#c9a24d]">
                                        Investment Records
                                    </p>
                                    <h2 class="mt-2 text-2xl font-bold text-[#07172f]">
                                        Recent Activity
                                    </h2>
                                </div>

                                <span class="rounded-full bg-[#f7f3ea] px-4 py-2 text-sm font-semibold text-[#07172f]">
                                    GBP Account
                                </span>
                            </div>

                            <div class="mt-8 overflow-hidden rounded-2xl border border-[#e6e8ee]">
                                <table class="min-w-full divide-y divide-[#e6e8ee] text-left text-sm">
                                    <thead class="bg-[#f8fafc] text-[#667085]">
                                        <tr>
                                            <th class="px-5 py-4 font-semibold">Plan</th>
                                            <th class="px-5 py-4 font-semibold">Amount</th>
                                            <th class="px-5 py-4 font-semibold">Status</th>
                                            <th class="px-5 py-4 font-semibold">Date</th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-[#e6e8ee] bg-white">
                                        @forelse ($investments ?? [] as $investment)
                                            <tr>
                                                <td class="px-5 py-5 font-medium text-[#07172f]">
                                                    {{ $investment->investmentPlan?->name ?? 'Investment Record' }}
                                                </td>

                                                <td class="px-5 py-5 text-[#667085]">
                                                    &#163;{{ number_format($investment->amount, 2) }}
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
                                                <td class="px-5 py-5 font-medium text-[#07172f]">No investment record yet</td>
                                                <td class="px-5 py-5 text-[#667085]">-</td>
                                                <td class="px-5 py-5">
                                                    <span class="rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-semibold text-[#667085]">
                                                        Pending
                                                    </span>
                                                </td>
                                                <td class="px-5 py-5 text-[#667085]">-</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="space-y-8">
                            <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                                <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#123f8c]">
                                    Notices
                                </p>

                                <h2 class="mt-2 text-2xl font-bold text-[#07172f]">
                                    Updates
                                </h2>

                                <div class="mt-6 space-y-4">
                                    <div class="rounded-2xl border border-[#e6e8ee] p-5">
                                        <p class="font-semibold text-[#07172f]">Dashboard foundation is active</p>
                                        <p class="mt-2 text-sm leading-6 text-[#667085]">
                                            Investment records and documents will appear here when approved modules are added.
                                        </p>
                                    </div>

                                    <div class="rounded-2xl border border-[#e6e8ee] p-5">
                                        <p class="font-semibold text-[#07172f]">Secure routing enabled</p>
                                        <p class="mt-2 text-sm leading-6 text-[#667085]">
                                            Investor users are separated from admin-only routes.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-[2rem] bg-[#07172f] p-8 text-white shadow-sm">
                                <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#c9a24d]">
                                    Next Module
                                </p>

                                <h2 class="mt-2 text-2xl font-bold">
                                    Investor records
                                </h2>

                                <p class="mt-4 leading-7 text-slate-300">
                                    The next backend step is to create investment plans, investor records, and admin-managed investment entries.
                                </p>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
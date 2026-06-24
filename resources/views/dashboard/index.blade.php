<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#c9a24d]">Investor Portal</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">
                    Welcome back, {{ auth()->user()->name }}
                </h2>
            </div>
            <div class="hidden sm:flex items-center gap-3">
                <span class="text-xs text-[#667085]">
                    ID: <strong class="text-[#07172f]">{{ auth()->user()->investor_number ?? 'INV-' . str_pad(auth()->id(), 5, '0', STR_PAD_LEFT) }}</strong>
                </span>
                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-emerald-200">
                    Active
                </span>
            </div>
        </div>
    </x-slot>

    <x-user-dashboard-shell :notice-count="isset($notices) ? $notices->count() : 0">

        {{-- Metric stat cards --}}
        <section class="grid gap-5 md:grid-cols-2 xl:grid-cols-4" aria-label="Portfolio summary">

            <div class="flex items-start justify-between rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                <div>
                    <p class="text-sm font-medium text-[#667085]">Total Investment</p>
                    <p class="mt-3 text-3xl font-bold text-[#07172f]">£{{ number_format($totalInvestment ?? 0, 2) }}</p>
                    <p class="mt-2 text-xs text-[#667085]">Approved records</p>
                </div>
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#f7f3ea]">
                    <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </div>
            </div>

            <div class="flex items-start justify-between rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                <div>
                    <p class="text-sm font-medium text-[#667085]">Active Investments</p>
                    <p class="mt-3 text-3xl font-bold text-[#07172f]">{{ $activeInvestments ?? 0 }}</p>
                    <p class="mt-2 text-xs text-[#667085]">Currently active</p>
                </div>
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#f7f3ea]">
                    <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/>
                    </svg>
                </div>
            </div>

            <div class="flex items-start justify-between rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                <div>
                    <p class="text-sm font-medium text-[#667085]">Expected Returns</p>
                    <p class="mt-3 text-3xl font-bold text-[#07172f]">£{{ number_format($expectedReturns ?? 0, 2) }}</p>
                    <p class="mt-2 text-xs text-[#667085]">Based on plan ROI</p>
                </div>
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#f7f3ea]">
                    <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941"/>
                    </svg>
                </div>
            </div>

            <div class="flex items-start justify-between rounded-[1.75rem] bg-[#07172f] p-6 shadow-sm">
                <div>
                    <p class="text-sm font-medium text-slate-300">Total Records</p>
                    <p class="mt-3 text-3xl font-bold text-white">{{ ($investments ?? collect())->count() }}</p>
                    <p class="mt-2 text-xs text-slate-400">All investment entries</p>
                </div>
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-white/10">
                    <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z"/>
                    </svg>
                </div>
            </div>
        </section>

        {{-- Investments + Sidebar --}}
        <section id="investments" class="grid gap-8 xl:grid-cols-[1.4fr_0.6fr]">

            {{-- Investments table / mobile cards --}}
            <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee] sm:p-8">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Investment Records</p>
                        <h2 class="mt-2 text-2xl font-bold text-[#07172f]">Recent Activity</h2>
                    </div>
                    <span class="inline-flex w-fit rounded-full bg-[#f7f3ea] px-4 py-2 text-sm font-semibold text-[#07172f]">GBP Account</span>
                </div>

                @forelse ($investments ?? [] as $investment)
                    @php
                        $start    = $investment->start_date;
                        $maturity = $investment->maturity_date;
                        $progress = 0;
                        if ($start && $maturity) {
                            $total   = $start->diffInDays($maturity);
                            $elapsed = $start->diffInDays(now());
                            $progress = $total > 0 ? min(100, round(($elapsed / $total) * 100)) : 0;
                        }
                    @endphp

                    {{-- Mobile card --}}
                    <div class="mt-5 rounded-2xl border border-[#e6e8ee] p-5 sm:hidden">
                        <div class="flex items-start justify-between gap-3">
                            <div>
                                <p class="font-bold text-[#07172f]">{{ $investment->investmentPlan?->name ?? 'Investment Record' }}</p>
                                <p class="mt-1 text-xs text-[#667085]">Started {{ $investment->start_date?->format('M d, Y') ?? '-' }}</p>
                            </div>
                            <x-status-badge :status="$investment->status ?? 'pending'" />
                        </div>
                        <div class="mt-4 grid grid-cols-2 gap-3">
                            <div>
                                <p class="text-xs text-[#98a2b3]">Amount</p>
                                <p class="mt-0.5 text-sm font-semibold text-[#07172f]">£{{ number_format($investment->amount ?? 0, 2) }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-[#98a2b3]">Return</p>
                                <p class="mt-0.5 text-sm font-semibold text-[#07172f]">£{{ number_format($investment->expected_return ?? 0, 2) }}</p>
                            </div>
                            <div class="col-span-2">
                                <p class="text-xs text-[#98a2b3]">Matures {{ $investment->maturity_date?->format('M d, Y') ?? 'N/A' }}</p>
                                <div class="mt-1.5 h-1.5 w-full overflow-hidden rounded-full bg-[#e6e8ee]">
                                    <div class="h-full rounded-full bg-[#c9a24d] transition-all" style="width: {{ $progress }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

                {{-- Desktop table --}}
                <div class="mt-8 hidden overflow-hidden rounded-2xl border border-[#e6e8ee] sm:block">
                    <table class="min-w-full divide-y divide-[#e6e8ee] text-left text-sm">
                        <thead class="bg-[#f8fafc] text-[#667085]">
                            <tr>
                                <th class="px-5 py-4 font-semibold">Plan</th>
                                <th class="px-5 py-4 text-right font-semibold">Amount</th>
                                <th class="px-5 py-4 text-right font-semibold">Return</th>
                                <th class="px-5 py-4 font-semibold">Status</th>
                                <th class="px-5 py-4 font-semibold">Maturity</th>
                                <th class="px-5 py-4 font-semibold">Progress</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#e6e8ee] bg-white">
                            @forelse ($investments ?? [] as $investment)
                                @php
                                    $start    = $investment->start_date;
                                    $maturity = $investment->maturity_date;
                                    $progress = 0;
                                    if ($start && $maturity) {
                                        $total   = $start->diffInDays($maturity);
                                        $elapsed = $start->diffInDays(now());
                                        $progress = $total > 0 ? min(100, round(($elapsed / $total) * 100)) : 0;
                                    }
                                @endphp
                                <tr class="transition hover:bg-[#f8fafc]">
                                    <td class="px-5 py-4 font-medium text-[#07172f]">
                                        {{ $investment->investmentPlan?->name ?? 'Investment Record' }}
                                    </td>
                                    <td class="px-5 py-4 text-right font-semibold text-[#07172f]">
                                        £{{ number_format($investment->amount ?? 0, 2) }}
                                    </td>
                                    <td class="px-5 py-4 text-right text-[#667085]">
                                        £{{ number_format($investment->expected_return ?? 0, 2) }}
                                    </td>
                                    <td class="px-5 py-4">
                                        <x-status-badge :status="$investment->status ?? 'pending'" />
                                    </td>
                                    <td class="px-5 py-4 text-[#667085]">
                                        {{ $investment->maturity_date?->format('M d, Y') ?? '-' }}
                                    </td>
                                    <td class="px-5 py-4">
                                        <div class="flex items-center gap-2">
                                            <div class="h-1.5 w-20 overflow-hidden rounded-full bg-[#e6e8ee]">
                                                <div class="h-full rounded-full bg-[#c9a24d]" style="width: {{ $progress }}%"></div>
                                            </div>
                                            <span class="text-xs text-[#98a2b3]">{{ $progress }}%</span>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <x-empty-state icon="investments"
                                                       heading="No investment records yet"
                                                       subtext="Your investment records will appear here once assigned by the administrator." />
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if (isset($investments) && $investments->isEmpty())
                    <div class="mt-6 sm:hidden">
                        <x-empty-state icon="investments"
                                       heading="No investment records yet"
                                       subtext="Your investment records will appear here once assigned by the administrator." />
                    </div>
                @endif
            </div>

            {{-- Sidebar: Notices + Support --}}
            <div class="space-y-8">
                <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#123f8c]">Notices</p>
                            <h2 class="mt-2 text-2xl font-bold text-[#07172f]">Latest Updates</h2>
                        </div>
                        <a href="{{ route('dashboard.notices') }}"
                           class="shrink-0 rounded-full bg-[#07172f] px-4 py-2 text-sm font-semibold text-white hover:bg-[#123f8c]">
                            View All
                        </a>
                    </div>

                    <div class="mt-6 space-y-4">
                        @forelse ($notices->take(3) as $notice)
                            <div class="rounded-2xl border border-[#e6e8ee] p-5 transition hover:border-[#c9a24d]">
                                <h3 class="font-semibold leading-6 text-[#07172f]">{{ $notice->title }}</h3>
                                <p class="mt-1 text-xs font-semibold uppercase tracking-[0.16em] text-[#c9a24d]">
                                    {{ optional($notice->published_at)->format('M d, Y') ?? 'Published' }}
                                </p>
                                <p class="mt-3 line-clamp-3 text-sm leading-6 text-[#667085]">{{ $notice->body }}</p>
                            </div>
                        @empty
                            <x-empty-state icon="notices"
                                           heading="No notices yet"
                                           subtext="Platform communications will appear here." />
                        @endforelse
                    </div>
                </div>

                <div class="rounded-[2rem] bg-[#07172f] p-8 text-white shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Account Support</p>
                    <h2 class="mt-2 text-2xl font-bold">Need help?</h2>
                    <p class="mt-4 leading-7 text-slate-300">
                        Contact the administrator if your investment records, account status, or expected returns require review.
                    </p>
                </div>
            </div>
        </section>

    </x-user-dashboard-shell>
</x-app-layout>

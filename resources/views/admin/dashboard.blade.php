<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">
                    The Lylods Group
                </p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">
                    Admin Control Centre
                </h2>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.investments.index') }}"
                   class="rounded-full border border-[#d0d5dd] bg-white px-5 py-2 text-sm font-semibold text-[#07172f] shadow-sm hover:bg-[#f7f3ea]">
                    View Records
                </a>

                <a href="{{ route('admin.investments.create') }}"
                   class="rounded-full bg-[#07172f] px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#123f8c]">
                    Add Investment
                </a>
            </div>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>

        {{-- Hero banner --}}
        <div class="overflow-hidden rounded-[2rem] bg-[#07172f] shadow-sm">
            <div class="grid gap-8 p-8 lg:grid-cols-[1.3fr_0.7fr] lg:items-center">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#c9a24d]">
                        Platform Administration
                    </p>

                    <h1 class="mt-4 max-w-3xl font-serif text-4xl font-bold leading-tight text-white md:text-5xl">
                        Manage investor records, platform data, and backend operations.
                    </h1>

                    <p class="mt-5 max-w-2xl text-base leading-7 text-slate-300">
                        This admin area is the operational backend for The Lylods Group Laravel platform. From here, authorised administrators can manage investment records and monitor the platform foundation.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="{{ route('admin.investment-plans.index') }}"
                           class="rounded-full border border-white/20 px-6 py-3 text-sm font-bold text-white hover:bg-white/10">
                            Investment Plans
                        </a>

                        <a href="{{ route('admin.investments.index') }}"
                           class="rounded-full border border-white/20 px-6 py-3 text-sm font-bold text-white hover:bg-white/10">
                            Review Records
                        </a>
                    </div>
                </div>

                <div class="rounded-[1.75rem] bg-white/10 p-6 ring-1 ring-white/10">
                    <p class="text-sm font-semibold text-slate-300">Admin Session</p>

                    <div class="mt-5 rounded-2xl bg-white p-5">
                        <p class="text-sm text-[#667085]">Signed in as</p>
                        <p class="mt-1 text-lg font-bold text-[#07172f]">{{ auth()->user()->name }}</p>
                        <p class="mt-1 text-sm text-[#667085]">{{ auth()->user()->email }}</p>
                    </div>

                    <div class="mt-4 grid grid-cols-2 gap-4">
                        <div class="rounded-2xl bg-white/10 p-4">
                            <p class="text-xs uppercase tracking-[0.18em] text-[#c9a24d]">Access</p>
                            <p class="mt-2 font-bold text-white">Admin</p>
                        </div>
                        <div class="rounded-2xl bg-white/10 p-4">
                            <p class="text-xs uppercase tracking-[0.18em] text-[#c9a24d]">Status</p>
                            <p class="mt-2 font-bold text-white">Active</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Metric stat cards --}}
        <section class="grid gap-5 md:grid-cols-2 xl:grid-cols-4" aria-label="Key metrics">

            <div class="flex items-start justify-between rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                <div>
                    <p class="text-sm font-medium text-[#667085]">Total Investors</p>
                    <p class="mt-3 text-3xl font-bold text-[#07172f]">{{ number_format($totalInvestors) }}</p>
                    <p class="mt-2 text-xs text-[#667085]">Registered accounts</p>
                </div>
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#f7f3ea]">
                    <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
                    </svg>
                </div>
            </div>

            <div class="flex items-start justify-between rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                <div>
                    <p class="text-sm font-medium text-[#667085]">Active Investments</p>
                    <p class="mt-3 text-3xl font-bold text-[#07172f]">{{ number_format($activeInvestments) }}</p>
                    <p class="mt-2 text-xs text-[#667085]">Currently active records</p>
                </div>
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#f7f3ea]">
                    <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/>
                    </svg>
                </div>
            </div>

            <div class="flex items-start justify-between rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                <div>
                    <p class="text-sm font-medium text-[#667085]">Portfolio Value</p>
                    <p class="mt-3 text-3xl font-bold text-[#07172f]">£{{ number_format($totalPortfolioValue, 2) }}</p>
                    <p class="mt-2 text-xs text-[#667085]">Total assigned investments</p>
                </div>
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#f7f3ea]">
                    <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                </div>
            </div>

            <div class="flex items-start justify-between rounded-[1.75rem] bg-[#07172f] p-6 shadow-sm">
                <div>
                    <p class="text-sm font-medium text-slate-300">Published Notices</p>
                    <p class="mt-3 text-3xl font-bold text-white">{{ number_format($publishedNotices) }}</p>
                    <p class="mt-2 text-xs text-slate-400">Visible communications</p>
                </div>
                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-white/10">
                    <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a3 3 0 1 1-5.714 0"/>
                    </svg>
                </div>
            </div>
        </section>

        {{-- Quick actions + build status --}}
        <section class="grid gap-8 xl:grid-cols-[1fr_0.85fr]">
            <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Management Shortcuts</p>
                <h2 class="mt-2 text-2xl font-bold text-[#07172f]">Quick Actions</h2>

                <div class="mt-6 grid gap-4 md:grid-cols-2">
                    <a href="{{ route('admin.investments.index') }}"
                       class="group rounded-3xl border border-[#e6e8ee] p-6 transition hover:border-[#c9a24d] hover:bg-[#f7f3ea]">
                        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#c9a24d]">Investments</p>
                        <h3 class="mt-3 text-xl font-bold text-[#07172f]">Investment Records</h3>
                        <p class="mt-3 text-sm leading-6 text-[#667085]">View all investment entries and open records for editing.</p>
                        <span class="mt-5 inline-flex rounded-full bg-[#07172f] px-4 py-2 text-xs font-bold text-white">Open</span>
                    </a>

                    <a href="{{ route('admin.investments.create') }}"
                       class="group rounded-3xl border border-[#e6e8ee] p-6 transition hover:border-[#c9a24d] hover:bg-[#f7f3ea]">
                        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#c9a24d]">New Entry</p>
                        <h3 class="mt-3 text-xl font-bold text-[#07172f]">Add Investment</h3>
                        <p class="mt-3 text-sm leading-6 text-[#667085]">Create a new GBP investment record for an investor account.</p>
                        <span class="mt-5 inline-flex rounded-full bg-[#07172f] px-4 py-2 text-xs font-bold text-white">Add</span>
                    </a>

                    <a href="{{ route('admin.investors.index') }}"
                       class="group rounded-3xl border border-[#e6e8ee] p-6 transition hover:border-[#c9a24d] hover:bg-[#f7f3ea]">
                        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#123f8c]">Investor Accounts</p>
                        <h3 class="mt-3 text-xl font-bold text-[#07172f]">User Management</h3>
                        <p class="mt-3 text-sm leading-6 text-[#667085]">Create, view, and update investor login accounts from the admin backend.</p>
                        <span class="mt-5 inline-flex rounded-full bg-[#07172f] px-4 py-2 text-xs font-bold text-white">Manage</span>
                    </a>

                    <div class="rounded-3xl border border-dashed border-[#d0d5dd] p-6">
                        <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#123f8c]">Documents</p>
                        <h3 class="mt-3 text-xl font-bold text-[#07172f]">Investor Documents</h3>
                        <p class="mt-3 text-sm leading-6 text-[#667085]">Future module for attaching notices, statements, and documents to investor accounts.</p>
                        <span class="mt-5 inline-flex rounded-full border border-[#d0d5dd] bg-[#f7f9fc] px-4 py-2 text-xs font-semibold text-[#98a2b3]">Coming Soon</span>
                    </div>
                </div>
            </div>

            <div class="space-y-8">
                <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Current Build Status</p>
                    <h2 class="mt-2 text-2xl font-bold text-[#07172f]">Completed Modules</h2>

                    <div class="mt-6 space-y-4">
                        <div class="flex gap-4 rounded-2xl border border-[#e6e8ee] p-4">
                            <div class="mt-1 h-3 w-3 shrink-0 rounded-full bg-[#c9a24d]"></div>
                            <div>
                                <p class="font-semibold text-[#07172f]">Admin routing secured</p>
                                <p class="mt-1 text-sm leading-6 text-[#667085]">Admin users are separated from investor dashboard access.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 rounded-2xl border border-[#e6e8ee] p-4">
                            <div class="mt-1 h-3 w-3 shrink-0 rounded-full bg-[#c9a24d]"></div>
                            <div>
                                <p class="font-semibold text-[#07172f]">Investment records active</p>
                                <p class="mt-1 text-sm leading-6 text-[#667085]">Records can now be created, viewed, and edited.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 rounded-2xl border border-[#e6e8ee] p-4">
                            <div class="mt-1 h-3 w-3 shrink-0 rounded-full bg-[#c9a24d]"></div>
                            <div>
                                <p class="font-semibold text-[#07172f]">Investor dashboard connected</p>
                                <p class="mt-1 text-sm leading-6 text-[#667085]">Investor totals update from saved investment entries.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-[2rem] bg-[#07172f] p-8 text-white shadow-sm">
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Recently Added</p>
                    <h2 class="mt-2 text-2xl font-bold">Investment plans management</h2>
                    <p class="mt-4 leading-7 text-slate-300">Admin users can now create, edit, activate, and deactivate investment plans directly from the backend.</p>
                    <div class="mt-6 rounded-2xl bg-white/10 p-5">
                        <p class="font-semibold text-white">Current backend capability</p>
                        <p class="mt-2 text-sm leading-6 text-slate-300">Investment records can now be tied to admin-managed plan options instead of relying only on seed or test data.</p>
                        <a href="{{ route('admin.investment-plans.index') }}"
                           class="mt-5 inline-flex rounded-full bg-[#c9a24d] px-5 py-3 text-sm font-bold text-[#07172f] hover:bg-[#d7b567]">
                            Manage Plans
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- Recent activity --}}
        <section class="grid gap-8 xl:grid-cols-2">
            <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                <div class="mb-6 flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Recent Investments</p>
                        <h2 class="mt-2 text-2xl font-bold text-[#07172f]">Latest Activity</h2>
                    </div>
                    <a href="{{ route('admin.investments.index') }}"
                       class="shrink-0 rounded-full border border-[#e6e8ee] px-3 py-1.5 text-xs font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                        View all
                    </a>
                </div>

                @forelse ($recentInvestments as $investment)
                    <div class="rounded-2xl border border-[#e6e8ee] p-5 {{ !$loop->last ? 'mb-4' : '' }} transition hover:border-[#c9a24d]">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="font-bold text-[#07172f]">{{ $investment->user?->name ?? 'Investor' }}</p>
                                <p class="mt-1 text-sm text-[#667085]">{{ $investment->investmentPlan?->name ?? 'Investment Record' }}</p>
                            </div>
                            <x-status-badge :status="$investment->status ?? 'pending'" />
                        </div>
                        <div class="mt-4 flex items-center justify-between text-sm">
                            <span class="font-semibold text-[#07172f]">£{{ number_format($investment->amount ?? 0, 2) }}</span>
                            <span class="text-[#667085]">{{ $investment->created_at?->format('M d, Y') }}</span>
                        </div>
                    </div>
                @empty
                    <x-empty-state icon="investments"
                                   heading="No investment records yet"
                                   subtext="Add your first investment to get started."
                                   :action-url="route('admin.investments.create')"
                                   action-label="Add Investment" />
                @endforelse
            </div>

            <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                <div class="mb-6 flex items-start justify-between gap-4">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#123f8c]">Recent Notices</p>
                        <h2 class="mt-2 text-2xl font-bold text-[#07172f]">Investor Communications</h2>
                    </div>
                    <a href="{{ route('admin.notices.index') }}"
                       class="shrink-0 rounded-full border border-[#e6e8ee] px-3 py-1.5 text-xs font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                        View all
                    </a>
                </div>

                @forelse ($recentNotices as $notice)
                    <div class="rounded-2xl border border-[#e6e8ee] p-5 {{ !$loop->last ? 'mb-4' : '' }} transition hover:border-[#c9a24d]">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="font-bold text-[#07172f]">{{ $notice->title }}</p>
                                <p class="mt-1 text-sm text-[#667085]">{{ \Illuminate\Support\Str::limit($notice->body, 80) }}</p>
                            </div>
                            <x-status-badge :status="$notice->is_published ? 'published' : 'draft'" />
                        </div>
                        <div class="mt-4 flex items-center justify-between text-sm">
                            <span class="text-[#667085]">By {{ $notice->creator?->name ?? 'Admin' }}</span>
                            <span class="text-[#667085]">{{ $notice->created_at?->format('M d, Y') }}</span>
                        </div>
                    </div>
                @empty
                    <x-empty-state icon="notices"
                                   heading="No notices yet"
                                   subtext="Create a notice to communicate with investors."
                                   :action-url="route('admin.notices.create')"
                                   action-label="Create Notice" />
                @endforelse
            </div>
        </section>

    </x-admin-dashboard-shell>
</x-app-layout>

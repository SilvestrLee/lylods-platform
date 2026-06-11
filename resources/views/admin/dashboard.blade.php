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

    <div class="bg-[#f7f3ea]">
        <section class="mx-auto max-w-7xl px-6 py-10">
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
                            class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                                    Investment Plans
                            </a>

                            <a href="{{ route('admin.investments.index') }}"
                               class="rounded-full border border-white/20 px-6 py-3 text-sm font-bold text-white hover:bg-white/10">
                                Review Existing Records
                            </a>
                        </div>
                    </div>

                    <div class="rounded-[1.75rem] bg-white/10 p-6 ring-1 ring-white/10">
                        <p class="text-sm font-semibold text-slate-300">
                            Admin Session
                        </p>

                        <div class="mt-5 rounded-2xl bg-white p-5">
                            <p class="text-sm text-[#667085]">Signed in as</p>
                            <p class="mt-1 text-lg font-bold text-[#07172f]">
                                {{ auth()->user()->name }}
                            </p>
                            <p class="mt-1 text-sm text-[#667085]">
                                {{ auth()->user()->email }}
                            </p>
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
        </section>

        <section id="admin-workspace-start" class="mx-auto max-w-7xl px-6 pb-12">
            <div class="grid gap-8 lg:grid-cols-[300px_1fr] lg:items-start">
                <aside class="w-full lg:sticky lg:top-[88px] lg:self-start">
                    <div class="w-full rounded-[2rem] bg-[#07172f] p-6 text-white shadow-sm">
                        <p class="text-xs font-bold uppercase tracking-[0.24em] text-[#c9a24d]">
                            Admin Menu
                        </p>

                        <h3 class="mt-3 text-xl font-bold">
                            Control Panel
                        </h3>

                        <nav class="mt-8 space-y-2 text-sm font-medium">
                            <a href="{{ route('admin.dashboard') }}"
                               class="flex items-center justify-between rounded-2xl bg-white/10 px-4 py-3 text-white">
                                <span>Overview</span>
                                <span class="text-[#c9a24d]">&bull;</span>
                            </a>

                            <a href="{{ route('admin.investments.index') }}"
                               class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                                Investment Records
                            </a>

                            <a href="{{ route('admin.investments.create') }}"
                               class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                                Add Investment
                            </a>

                            <a href="{{ route('admin.investment-plans.index') }}"
                               class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                                Investment Plans
                            </a>

                            <a href="{{ route('admin.investors.index') }}"
                               class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                                Investors
                            </a>

                            <a href="#"
                               class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                                Documents
                            </a>

                            <a href="{{ route('admin.notices.index') }}"
                                class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                                Notices
                            </a>

                            <a href="{{ route('profile.edit') }}"
                               class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                                Profile Settings
                            </a>
                        </nav>

                        <div class="mt-10 rounded-3xl bg-white/10 p-5">
                            <p class="text-sm font-semibold text-white">Backend focus</p>
                            <p class="mt-2 text-sm leading-6 text-slate-300">
                                Investment records are currently active. Plan management and investor documents come next.
                            </p>
                        </div>
                    </div>
                </aside>

                <main class="space-y-8">
                    <section class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                        <div class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                            <p class="text-sm font-medium text-[#667085]">Total Investors</p>
                            <p class="mt-3 text-3xl font-bold text-[#07172f]">
                                {{ number_format($totalInvestors) }}
                            </p>
                            <p class="mt-3 text-sm leading-6 text-[#667085]">
                                Registered investor accounts.
                            </p>
                        </div>

                        <div class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                            <p class="text-sm font-medium text-[#667085]">Active Investments</p>
                            <p class="mt-3 text-3xl font-bold text-[#07172f]">
                                {{ number_format($activeInvestments) }}
                            </p>
                            <p class="mt-3 text-sm leading-6 text-[#667085]">
                                Currently active investment records.
                            </p>
                        </div>

                        <div class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                            <p class="text-sm font-medium text-[#667085]">Portfolio Value</p>
                            <p class="mt-3 text-3xl font-bold text-[#07172f]">
                                £{{ number_format($totalPortfolioValue, 2) }}
                            </p>
                            <p class="mt-3 text-sm leading-6 text-[#667085]">
                                Total assigned investments.
                            </p>
                        </div>

                        <div class="rounded-[1.75rem] bg-[#07172f] p-6 shadow-sm">
                            <p class="text-sm font-medium text-slate-300">Published Notices</p>
                            <p class="mt-3 text-3xl font-bold text-white">
                                {{ number_format($publishedNotices) }}
                            </p>
                            <p class="mt-3 text-sm leading-6 text-slate-300">
                                Investor communications currently visible.
                            </p>
                        </div>

                    </section>

                    <section class="grid gap-8 xl:grid-cols-[1fr_0.85fr]">
                        <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                            <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">
                                Management Shortcuts
                            </p>

                            <h2 class="mt-2 text-2xl font-bold text-[#07172f]">
                                Quick Actions
                            </h2>

                            <div class="mt-6 grid gap-4 md:grid-cols-2">
                                <a href="{{ route('admin.investments.index') }}"
                                   class="group rounded-3xl border border-[#e6e8ee] p-6 transition hover:border-[#c9a24d] hover:bg-[#f7f3ea]">
                                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#c9a24d]">
                                        Investments
                                    </p>

                                    <h3 class="mt-3 text-xl font-bold text-[#07172f]">
                                        Investment Records
                                    </h3>

                                    <p class="mt-3 text-sm leading-6 text-[#667085]">
                                        View all investment entries and open records for editing.
                                    </p>

                                    <span class="mt-5 inline-flex rounded-full bg-[#07172f] px-4 py-2 text-xs font-bold text-white">
                                        Open
                                    </span>
                                </a>

                                <a href="{{ route('admin.investments.create') }}"
                                   class="group rounded-3xl border border-[#e6e8ee] p-6 transition hover:border-[#c9a24d] hover:bg-[#f7f3ea]">
                                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#c9a24d]">
                                        New Entry
                                    </p>

                                    <h3 class="mt-3 text-xl font-bold text-[#07172f]">
                                        Add Investment
                                    </h3>

                                    <p class="mt-3 text-sm leading-6 text-[#667085]">
                                        Create a new GBP investment record for an investor account.
                                    </p>

                                    <span class="mt-5 inline-flex rounded-full bg-[#07172f] px-4 py-2 text-xs font-bold text-white">
                                        Add
                                    </span>
                                </a>

                                <a href="{{ route('admin.investors.index') }}"
                                   class="group rounded-3xl border border-[#e6e8ee] p-6 transition hover:border-[#c9a24d] hover:bg-[#f7f3ea]">
                                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#123f8c]">
                                        Investor Accounts
                                    </p>

                                    <h3 class="mt-3 text-xl font-bold text-[#07172f]">
                                        User Management
                                    </h3>

                                    <p class="mt-3 text-sm leading-6 text-[#667085]">
                                        Create, view, and update investor login accounts from the admin backend.
                                    </p>

                                    <span class="mt-5 inline-flex rounded-full bg-[#07172f] px-4 py-2 text-xs font-bold text-white">
                                        Manage
                                    </span>
                                </a>

                                <div class="rounded-3xl border border-dashed border-[#d0d5dd] p-6">
                                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#123f8c]">
                                        Documents
                                    </p>
                                    <h3 class="mt-3 text-xl font-bold text-[#07172f]">
                                        Investor Documents
                                    </h3>
                                    <p class="mt-3 text-sm leading-6 text-[#667085]">
                                        Future module for attaching notices, statements, and documents to investor accounts.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-8">
                            <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#c9a24d]">
                                    Current Build Status
                                </p>

                                <h2 class="mt-2 text-2xl font-bold text-[#07172f]">
                                    Completed Modules
                                </h2>

                                <div class="mt-6 space-y-4">
                                    <div class="flex gap-4 rounded-2xl border border-[#e6e8ee] p-4">
                                        <div class="mt-1 h-3 w-3 rounded-full bg-[#c9a24d]"></div>
                                        <div>
                                            <p class="font-semibold text-[#07172f]">Admin routing secured</p>
                                            <p class="mt-1 text-sm leading-6 text-[#667085]">
                                                Admin users are separated from investor dashboard access.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex gap-4 rounded-2xl border border-[#e6e8ee] p-4">
                                        <div class="mt-1 h-3 w-3 rounded-full bg-[#c9a24d]"></div>
                                        <div>
                                            <p class="font-semibold text-[#07172f]">Investment records active</p>
                                            <p class="mt-1 text-sm leading-6 text-[#667085]">
                                                Records can now be created, viewed, and edited.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="flex gap-4 rounded-2xl border border-[#e6e8ee] p-4">
                                        <div class="mt-1 h-3 w-3 rounded-full bg-[#c9a24d]"></div>
                                        <div>
                                            <p class="font-semibold text-[#07172f]">Investor dashboard connected</p>
                                            <p class="mt-1 text-sm leading-6 text-[#667085]">
                                                Investor totals update from saved investment entries.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-[2rem] bg-[#07172f] p-8 text-white shadow-sm">
                                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#c9a24d]">
                                    Recently Added
                                </p>

                                <h2 class="mt-2 text-2xl font-bold">
                                    Investment plans management
                                </h2>

                                <p class="mt-4 leading-7 text-slate-300">
                                    Admin users can now create, edit, activate, and deactivate investment plans directly from the backend.
                                </p>

                                <div class="mt-6 rounded-2xl bg-white/10 p-5">
                                    <p class="font-semibold text-white">
                                        Current backend capability
                                    </p>
                                    <p class="mt-2 text-sm leading-6 text-slate-300">
                                        Investment records can now be tied to admin-managed plan options instead of relying only on seed or test data.
                                    </p>

                                    <a href="{{ route('admin.investment-plans.index') }}"
                                    class="mt-5 inline-flex rounded-full bg-[#c9a24d] px-5 py-3 text-sm font-bold text-[#07172f] hover:bg-[#d7b567]">
                                        Manage Plans
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="grid gap-8 xl:grid-cols-2">
    <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#c9a24d]">
                Recent Investments
            </p>
            <h2 class="mt-2 text-2xl font-bold text-[#07172f]">
                Latest Investment Activity
            </h2>
        </div>

        <div class="space-y-4">
            @forelse ($recentInvestments as $investment)
                <div class="rounded-2xl border border-[#e6e8ee] p-5">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="font-bold text-[#07172f]">
                                {{ $investment->user?->name ?? 'Investor' }}
                            </p>

                            <p class="mt-1 text-sm text-[#667085]">
                                {{ $investment->investmentPlan?->name ?? 'Investment Record' }}
                            </p>
                        </div>

                        <span class="rounded-full bg-[#f7f3ea] px-3 py-1 text-xs font-bold text-[#07172f]">
                            {{ ucfirst($investment->status ?? 'pending') }}
                        </span>
                    </div>

                    <div class="mt-4 flex items-center justify-between text-sm">
                        <span class="font-semibold text-[#07172f]">
                            £{{ number_format($investment->amount ?? 0, 2) }}
                        </span>

                        <span class="text-[#667085]">
                            {{ $investment->created_at?->format('M d, Y') }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-[#e6e8ee] p-5 text-sm text-[#667085]">
                    No recent investment records yet.
                </div>
            @endforelse
        </div>
    </div>

    <div class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
        <div class="mb-6">
            <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#123f8c]">
                Recent Notices
            </p>
            <h2 class="mt-2 text-2xl font-bold text-[#07172f]">
                Latest Investor Communications
            </h2>
        </div>

        <div class="space-y-4">
            @forelse ($recentNotices as $notice)
                <div class="rounded-2xl border border-[#e6e8ee] p-5">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="font-bold text-[#07172f]">
                                {{ $notice->title }}
                            </p>

                            <p class="mt-1 text-sm text-[#667085]">
                                {{ \Illuminate\Support\Str::limit($notice->body, 100) }}
                            </p>
                        </div>

                        @if ($notice->is_published)
                            <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-bold text-green-700">
                                Published
                            </span>
                        @else
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-600">
                                Draft
                            </span>
                        @endif
                    </div>

                    <div class="mt-4 flex items-center justify-between text-sm">
                        <span class="text-[#667085]">
                            By {{ $notice->creator?->name ?? 'Admin' }}
                        </span>

                        <span class="text-[#667085]">
                            {{ $notice->created_at?->format('M d, Y') }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-[#e6e8ee] p-5 text-sm text-[#667085]">
                    No recent notices yet.
                </div>
            @endforelse
        </div>
    </div>
</section>
                </main>
            </div>
        </section>
    </div>
</x-app-layout>
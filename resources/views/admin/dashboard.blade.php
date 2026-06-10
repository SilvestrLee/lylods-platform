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
                            <a href="{{ route('admin.investments.create') }}"
                               class="rounded-full bg-[#c9a24d] px-6 py-3 text-sm font-bold text-[#07172f] shadow-sm hover:bg-[#d7b567]">
                                Create Investment Record
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

                            <a href="#"
                               class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                                Investment Plans
                            </a>

                            <a href="#"
                               class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                                Investors
                            </a>

                            <a href="#"
                               class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                                Documents
                            </a>

                            <a href="#"
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
                            <p class="text-sm font-medium text-[#667085]">Backend Stage</p>
                            <p class="mt-3 text-3xl font-bold text-[#07172f]">Phase 1</p>
                            <p class="mt-3 text-sm leading-6 text-[#667085]">
                                Core admin foundation is active.
                            </p>
                        </div>

                        <div class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                            <p class="text-sm font-medium text-[#667085]">Investment Module</p>
                            <p class="mt-3 text-3xl font-bold text-[#07172f]">Live</p>
                            <p class="mt-3 text-sm leading-6 text-[#667085]">
                                Create, view, and update investment records.
                            </p>
                        </div>

                        <div class="rounded-[1.75rem] bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                            <p class="text-sm font-medium text-[#667085]">Investor Portal</p>
                            <p class="mt-3 text-3xl font-bold text-[#07172f]">Linked</p>
                            <p class="mt-3 text-sm leading-6 text-[#667085]">
                                Investor totals update from admin records.
                            </p>
                        </div>

                        <div class="rounded-[1.75rem] bg-[#c9a24d] p-6 shadow-sm">
                            <p class="text-sm font-medium text-[#07172f]/80">Currency</p>
                            <p class="mt-3 text-3xl font-bold text-[#07172f]">GBP</p>
                            <p class="mt-3 text-sm leading-6 text-[#07172f]/80">
                                All investment values use pounds sterling.
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

                                <div class="rounded-3xl border border-dashed border-[#d0d5dd] p-6">
                                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#123f8c]">
                                        Investor Accounts
                                    </p>
                                    <h3 class="mt-3 text-xl font-bold text-[#07172f]">
                                        User Management
                                    </h3>
                                    <p class="mt-3 text-sm leading-6 text-[#667085]">
                                        Future module for creating, editing, and managing investor account details.
                                    </p>
                                </div>

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
                                    Recommended Next
                                </p>

                                <h2 class="mt-2 text-2xl font-bold">
                                    Investment plans management
                                </h2>

                                <p class="mt-4 leading-7 text-slate-300">
                                    The next backend improvement should allow admins to create and manage investment plans directly from the admin panel instead of relying on seed or test data.
                                </p>

                                <div class="mt-6 rounded-2xl bg-white/10 p-5">
                                    <p class="font-semibold text-white">
                                        Suggested next module
                                    </p>
                                    <p class="mt-2 text-sm leading-6 text-slate-300">
                                        Create, edit, activate, and deactivate investment plans so future investment records can be tied to admin-managed plan options.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            </div>
        </section>
    </div>
</x-app-layout>
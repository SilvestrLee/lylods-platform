<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#c9a24d]">
                    The Lylods Group
                </p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">
                    Admin Dashboard
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
            <section class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
                <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#123f8c]">
                    Admin Backend
                </p>

                <h1 class="mt-3 font-serif text-4xl font-bold text-[#07172f]">
                    Welcome to The Lylods Group admin backend.
                </h1>

                <p class="mt-4 max-w-3xl leading-7 text-[#667085]">
                    Manage investor records, investment entries, and platform data from this admin area.
                </p>
            </section>

            <section class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                <a href="{{ route('admin.investments.index') }}"
                   class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee] transition hover:-translate-y-1 hover:shadow-md">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#c9a24d]">
                        Investments
                    </p>

                    <h2 class="mt-3 text-2xl font-bold text-[#07172f]">
                        Investment Records
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-[#667085]">
                        View all investor investment records currently saved in the platform.
                    </p>
                </a>

                <a href="{{ route('admin.investments.create') }}"
                   class="rounded-[2rem] bg-[#07172f] p-6 text-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#c9a24d]">
                        New Entry
                    </p>

                    <h2 class="mt-3 text-2xl font-bold">
                        Add Investment
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-slate-300">
                        Create a new GBP investment record for an investor account.
                    </p>
                </a>

                <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-[#e6e8ee]">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#123f8c]">
                        Investor Portal
                    </p>

                    <h2 class="mt-3 text-2xl font-bold text-[#07172f]">
                        Dashboard Data
                    </h2>

                    <p class="mt-3 text-sm leading-6 text-[#667085]">
                        Investor dashboards update automatically from investment records created by the admin.
                    </p>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
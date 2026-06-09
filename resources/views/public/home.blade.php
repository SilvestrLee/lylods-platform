<x-layouts.public title="The Lylods Group">
    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-6 py-24">
            <div class="max-w-3xl">
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-blue-700">
                    Laravel Platform Upgrade
                </p>

                <h1 class="mt-5 text-4xl md:text-6xl font-bold tracking-tight text-slate-950">
                    The Lylods Group business and investor platform.
                </h1>

                <p class="mt-6 text-lg leading-8 text-slate-600">
                    A professional public website, backend administration system, and investor dashboard foundation for The Lylods Group.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="{{ route('investment') }}"
                       class="rounded-xl bg-slate-950 px-6 py-3 text-sm font-semibold text-white hover:bg-slate-800">
                        View Investment Information
                    </a>

                    <a href="{{ route('contact') }}"
                       class="rounded-xl border border-slate-300 px-6 py-3 text-sm font-semibold text-slate-900 hover:bg-slate-100">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-50">
        <div class="max-w-7xl mx-auto px-6 py-20">
            <div class="grid gap-6 md:grid-cols-3">
                <div class="rounded-2xl bg-white p-8 shadow-sm border border-slate-200">
                    <h3 class="text-lg font-bold">Public Website</h3>
                    <p class="mt-3 text-slate-600">
                        Company information, services, investment messaging, and contact pathways.
                    </p>
                </div>

                <div class="rounded-2xl bg-white p-8 shadow-sm border border-slate-200">
                    <h3 class="text-lg font-bold">Admin Backend</h3>
                    <p class="mt-3 text-slate-600">
                        Protected backend area for managing platform records and future administrative functions.
                    </p>
                </div>

                <div class="rounded-2xl bg-white p-8 shadow-sm border border-slate-200">
                    <h3 class="text-lg font-bold">Investor Dashboard</h3>
                    <p class="mt-3 text-slate-600">
                        Secure user access foundation for investor account and investment-related visibility.
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>

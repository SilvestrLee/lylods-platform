<x-layouts.public title="Investment Information - The Lylods Group">
    <section class="bg-[#07172f] text-white">
        <div class="mx-auto max-w-7xl px-6 py-24">
            <div class="max-w-4xl">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">
                    Investment Information
                </p>

                <h1 class="mt-6 font-serif text-5xl font-bold leading-tight tracking-tight md:text-7xl">
                    Investor-facing access built on clarity and structure.
                </h1>

                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-200">
                    The Lylods Group platform includes an investor dashboard foundation designed to support account visibility, investment-related records, and future investor communication.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="{{ route('login') }}"
                       class="rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] shadow-lg hover:bg-[#d8b765]">
                        Investor Login
                    </a>

                    <a href="{{ route('contact') }}"
                       class="rounded-full border border-white/30 px-7 py-3.5 text-sm font-bold text-white hover:bg-white/10">
                        Make an Enquiry
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#f7f3ea]">
        <div class="mx-auto grid max-w-7xl gap-12 px-6 py-20 lg:grid-cols-[0.95fr_1.05fr] lg:items-start">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">
                    Portal Direction
                </p>

                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">
                    A foundation for organized investor visibility.
                </h2>

                <p class="mt-5 text-lg leading-8 text-[#667085]">
                    This first version gives the platform the right access structure, so investor-facing features can grow in a controlled and secure way.
                </p>
            </div>

            <div class="rounded-[2rem] border border-[#e6e8ee] bg-white p-6 shadow-sm">
                <div class="rounded-[1.5rem] bg-[#07172f] p-6 text-white">
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">
                        Investor Dashboard Foundation
                    </p>

                    <div class="mt-6 grid gap-4">
                        <div class="rounded-2xl bg-white/10 p-5">
                            <p class="text-sm text-slate-300">Account Access</p>
                            <p class="mt-2 text-xl font-bold">Secure login and dashboard routing</p>
                        </div>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="rounded-2xl bg-white/10 p-5">
                                <p class="text-sm text-slate-300">Records</p>
                                <p class="mt-2 font-bold">Investment visibility</p>
                            </div>

                            <div class="rounded-2xl bg-white/10 p-5">
                                <p class="text-sm text-slate-300">Admin</p>
                                <p class="mt-2 font-bold">Protected management</p>
                            </div>
                        </div>

                        <div class="rounded-2xl bg-[#c9a24d] p-5 text-[#07172f]">
                            <p class="text-sm font-semibold leading-6">
                                Built to support future modules such as records, notices, reports, documents, and investor updates.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-20">
            <div class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">
                    What the First Version Supports
                </p>

                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">
                    Practical now, expandable later.
                </h2>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-3">
                <div class="rounded-3xl border border-[#e6e8ee] p-8">
                    <h3 class="text-xl font-bold text-[#07172f]">Investor Login</h3>
                    <p class="mt-4 leading-7 text-[#667085]">
                        Investors or users can access a dedicated dashboard separate from the admin backend.
                    </p>
                </div>

                <div class="rounded-3xl border border-[#e6e8ee] p-8">
                    <h3 class="text-xl font-bold text-[#07172f]">Dashboard Foundation</h3>
                    <p class="mt-4 leading-7 text-[#667085]">
                        The dashboard gives the project a foundation for account summaries and investment-related visibility.
                    </p>
                </div>

                <div class="rounded-3xl border border-[#e6e8ee] p-8">
                    <h3 class="text-xl font-bold text-[#07172f]">Future Expansion</h3>
                    <p class="mt-4 leading-7 text-[#667085]">
                        The structure can later support documents, reports, notices, payment records, and investor communication.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#f7f3ea]">
        <div class="mx-auto max-w-7xl px-6 py-20">
            <div class="rounded-[2rem] bg-[#07172f] px-8 py-12 text-white md:px-12">
                <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">
                            Investor Access
                        </p>
                        <h2 class="mt-4 font-serif text-4xl font-bold">
                            Already have access?
                        </h2>
                        <p class="mt-4 max-w-2xl leading-7 text-slate-300">
                            Use the secure login area to access your investor dashboard. If you need assistance, contact the platform administrator.
                        </p>
                    </div>

                    <a href="{{ route('login') }}"
                       class="inline-flex justify-center rounded-full bg-[#c9a24d] px-7 py-3.5 text-sm font-bold text-[#07172f] hover:bg-[#d8b765]">
                        Go to Login
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>

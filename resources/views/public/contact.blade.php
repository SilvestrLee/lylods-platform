<x-layouts.public title="Contact - The Lylods Group">
    <section class="bg-[#07172f] text-white">
        <div class="mx-auto max-w-7xl px-6 py-24">
            <div class="max-w-4xl">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">
                    Contact The Lylods Group
                </p>

                <h1 class="mt-6 font-serif text-5xl font-bold leading-tight tracking-tight md:text-7xl">
                    Enquiries, access support, and platform communication.
                </h1>

                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-200">
                    Use this page for company enquiries, investor access support, and communication related to The Lylods Group platform.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-[#f7f3ea]">
        <div class="mx-auto grid max-w-7xl gap-10 px-6 py-20 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">
                    Get in Touch
                </p>

                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] md:text-5xl">
                    Contact details will be added from approved client information.
                </h2>

                <p class="mt-5 text-lg leading-8 text-[#667085]">
                    Final contact details, office information, phone numbers, email addresses, and inquiry handling notes should come from the client-approved content.
                </p>
            </div>

            <div class="rounded-[2rem] border border-[#e6e8ee] bg-white p-8 shadow-sm">
                <div class="space-y-6">
                    <div class="rounded-2xl border border-[#e6e8ee] p-6">
                        <h3 class="text-lg font-bold text-[#07172f]">General Enquiries</h3>
                        <p class="mt-2 leading-7 text-[#667085]">
                            For business, service, company, or partnership-related communication.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-[#e6e8ee] p-6">
                        <h3 class="text-lg font-bold text-[#07172f]">Investor Access Support</h3>
                        <p class="mt-2 leading-7 text-[#667085]">
                            For login, dashboard access, or investor account-related assistance.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-[#07172f] p-6 text-white">
                        <h3 class="text-lg font-bold">Secure Platform Access</h3>
                        <p class="mt-2 leading-7 text-slate-300">
                            Existing users can log in through the secure dashboard access area.
                        </p>

                        <a href="{{ route('login') }}"
                           class="mt-5 inline-flex rounded-full bg-[#c9a24d] px-6 py-3 text-sm font-bold text-[#07172f] hover:bg-[#d8b765]">
                            Go to Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-6 py-20">
            <div class="grid gap-6 md:grid-cols-3">
                <div class="rounded-3xl border border-[#e6e8ee] p-8">
                    <h3 class="text-xl font-bold text-[#07172f]">Business Enquiry</h3>
                    <p class="mt-4 leading-7 text-[#667085]">
                        For enquiries about The Lylods Group, services, company information, and public-facing communication.
                    </p>
                </div>

                <div class="rounded-3xl border border-[#e6e8ee] p-8">
                    <h3 class="text-xl font-bold text-[#07172f]">Investor Enquiry</h3>
                    <p class="mt-4 leading-7 text-[#667085]">
                        For investor-related questions, dashboard access, and investment information support.
                    </p>
                </div>

                <div class="rounded-3xl border border-[#e6e8ee] p-8">
                    <h3 class="text-xl font-bold text-[#07172f]">Admin Support</h3>
                    <p class="mt-4 leading-7 text-[#667085]">
                        For platform management, account setup, and backend-related operational support.
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>

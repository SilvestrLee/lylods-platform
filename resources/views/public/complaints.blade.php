<x-layouts.public title="Complaints Process — The Lylods Group">

    {{-- Future CMS-managed compliance content --}}

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        <div class="relative mx-auto max-w-[1440px] px-6 py-24">
            <div class="tlg-reveal max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">Legal</p>
                <h1 class="mt-6 font-serif text-4xl font-bold leading-tight tracking-tight md:text-5xl">Complaints Process</h1>
                <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-200">The Lylods Group aims to communicate clearly and respond professionally where a concern or complaint is raised.</p>
            </div>
        </div>
        <div class="absolute inset-0 -z-10 opacity-10" style="background-image: radial-gradient(circle at 80% 20%, #c9a24d 0%, transparent 50%), radial-gradient(circle at 20% 80%, #123f8c 0%, transparent 50%)"></div>
    </section>

    {{-- Content --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="mx-auto max-w-3xl">

                {{-- Future CMS-managed compliance content --}}
                <div class="tlg-reveal mb-10 rounded-[2rem] border border-[#e6e8ee] bg-[#f7f3ea] px-8 py-6">
                    <p class="text-sm font-semibold text-[#07172f]">Last updated: June 2026</p>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">We take concerns seriously. If you are not satisfied with how an interaction has been handled, we encourage you to contact us directly so we can understand and respond to your concern.</p>
                </div>

                <div class="tlg-reveal space-y-10 text-[#667085]">

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">How to raise a complaint</h2>
                        <p class="mt-4 leading-7">If you have a concern or complaint about any aspect of your experience with The Lylods Group — including our communications, services, or how a matter was handled — you are encouraged to raise it with us directly in the first instance.</p>
                        <p class="mt-4 leading-7">Complaints can be submitted by:</p>
                        <ul class="mt-4 space-y-2">
                            @foreach([
                                'Email: enquiries@lylodsgroup.com — please use the subject line "Formal Complaint"',
                                'Contact form: via the Contact page on this website',
                            ] as $item)
                            <li class="flex items-start gap-3">
                                <svg class="mt-1 h-4 w-4 shrink-0 text-[#c9a24d]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15l-4.121-4.121a1 1 0 111.414-1.414L8.414 12.172l7.879-7.879a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span>{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">What information to provide</h2>
                        <p class="mt-4 leading-7">To help us review your complaint efficiently and fairly, please include the following information where possible:</p>
                        <ul class="mt-4 space-y-2">
                            @foreach([
                                'Your full name and contact details',
                                'A clear description of the concern or complaint',
                                'The date or timeframe the issue occurred',
                                'Any relevant reference numbers, correspondence or documentation',
                                'What outcome or resolution you are seeking',
                            ] as $item)
                            <li class="flex items-start gap-3">
                                <svg class="mt-1 h-4 w-4 shrink-0 text-[#c9a24d]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15l-4.121-4.121a1 1 0 111.414-1.414L8.414 12.172l7.879-7.879a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span>{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">How complaints are reviewed</h2>
                        <p class="mt-4 leading-7">On receipt of a complaint, we will:</p>
                        <ul class="mt-4 space-y-2">
                            @foreach([
                                'Acknowledge your complaint promptly — typically within two to three business days',
                                'Review the matter thoroughly and fairly, gathering relevant information',
                                'Communicate with you if we require further clarification or information',
                                'Assess the complaint against the relevant facts and our internal standards',
                            ] as $item)
                            <li class="flex items-start gap-3">
                                <svg class="mt-1 h-4 w-4 shrink-0 text-[#c9a24d]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15l-4.121-4.121a1 1 0 111.414-1.414L8.414 12.172l7.879-7.879a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span>{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Response expectations</h2>
                        <p class="mt-4 leading-7">We aim to provide a full written response to complaints within ten business days of receipt. Where a complaint is more complex and requires additional time to investigate, we will communicate this to you and provide an updated timeframe.</p>
                        <p class="mt-4 leading-7">Our response will set out our findings, the steps taken to address the matter where appropriate, and any action we intend to take as a result.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Escalation or further review</h2>
                        <p class="mt-4 leading-7">If you are not satisfied with the outcome of your complaint after we have responded, you may request that the matter is reviewed further. Please indicate this clearly in your follow-up communication and we will arrange for the matter to be considered at a senior level.</p>
                        <p class="mt-4 leading-7">Where a complaint relates to the handling of personal data, you also have the right to contact the Information Commissioner's Office (ICO) at <span class="font-semibold text-[#07172f]">ico.org.uk</span>.</p>
                    </div>

                </div>

            </div>
        </div>
    </section>

</x-layouts.public>

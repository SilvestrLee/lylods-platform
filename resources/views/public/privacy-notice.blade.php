<x-layouts.public title="Privacy Notice — The Lylods Group">

    {{-- Future CMS-managed compliance content --}}

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        <div class="relative mx-auto max-w-[1440px] px-6 py-24">
            <div class="tlg-reveal max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">Legal</p>
                <h1 class="mt-6 font-serif text-4xl font-bold leading-tight tracking-tight md:text-5xl">Privacy Notice</h1>
                <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-200">This Privacy Notice explains how The Lylods Group may collect, use, store and protect personal information submitted through the website and related enquiry channels.</p>
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
                    <p class="mt-2 text-sm leading-6 text-[#667085]">This page should be reviewed and finalised with appropriate legal or data protection guidance where required. If you have any questions about how we use your data, please <a href="{{ route('contact') }}" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">contact us directly</a>.</p>
                </div>

                <div class="tlg-reveal space-y-10 text-[#667085]">

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Who we are</h2>
                        <p class="mt-4 leading-7">The Lylods Group is a UK-based professional services organisation. We are the data controller for personal data you provide to us through our website and enquiry channels.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Information we may collect</h2>
                        <p class="mt-4 leading-7">When you interact with us through this website or related channels, we may collect the following types of information:</p>
                        <ul class="mt-4 space-y-2">
                            @foreach([
                                'Your name and email address',
                                'Your organisation or company name (if provided)',
                                'The content of your message, enquiry or request',
                                'Your telephone number (if provided)',
                                'Information about the type of enquiry you are submitting',
                                'Technical information such as your browser type and IP address (where applicable)',
                            ] as $item)
                            <li class="flex items-start gap-3">
                                <svg class="mt-1 h-4 w-4 shrink-0 text-[#c9a24d]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15l-4.121-4.121a1 1 0 111.414-1.414L8.414 12.172l7.879-7.879a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span>{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">How we use information</h2>
                        <p class="mt-4 leading-7">We use personal information only to respond to your enquiry and to communicate with you about the services or matters you have raised. We do not use your information for unsolicited marketing or share it for commercial purposes without your knowledge.</p>
                        <p class="mt-4 leading-7">Our lawful basis for processing enquiry data is legitimate interests — specifically, responding to a request you have made to us.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Enquiries and contact forms</h2>
                        <p class="mt-4 leading-7">When you submit an enquiry via our website contact form, the information you provide is used solely to review and respond to your request. We may retain a record of your enquiry for a reasonable period in order to manage our correspondence and provide continuity of service.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Careers and placement enquiries</h2>
                        <p class="mt-4 leading-7">If you contact us in relation to a career opportunity, placement or professional role, we may retain the information you provide — such as your name, contact details and experience summary — for the purpose of reviewing your interest and contacting you if a suitable opportunity arises.</p>
                        <p class="mt-4 leading-7">We will not retain careers-related information beyond a reasonable period without a specific ongoing purpose. You may ask us to remove your details at any time.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Data sharing where necessary</h2>
                        <p class="mt-4 leading-7">We do not sell, rent or trade personal information. We may share your data with trusted third parties only where it is necessary to deliver a service you have requested — for example, a professional we are introducing you to — and only on a need-to-know basis.</p>
                        <p class="mt-4 leading-7">Where required by law or a regulatory authority, we may also be required to disclose information.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Data storage and protection</h2>
                        <p class="mt-4 leading-7">We take reasonable technical and organisational steps to protect personal information from loss, misuse or unauthorised access. Data submitted through our website is handled securely.</p>
                        <p class="mt-4 leading-7">We retain your data only for as long as is necessary to fulfil the purpose for which it was collected, or as required by applicable law. Enquiry data is reviewed periodically and removed when no longer needed.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Your rights</h2>
                        <p class="mt-4 leading-7">Under UK data protection law, you have the right to:</p>
                        <ul class="mt-4 space-y-2">
                            @foreach([
                                'Access the personal data we hold about you',
                                'Request correction of inaccurate or incomplete information',
                                'Request erasure of your data where there is no compelling reason for us to continue processing it',
                                'Object to or restrict how your data is processed',
                                'Request portability of your data in a structured format',
                                'Withdraw consent where consent is the basis for processing',
                            ] as $item)
                            <li class="flex items-start gap-3">
                                <svg class="mt-1 h-4 w-4 shrink-0 text-[#c9a24d]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15l-4.121-4.121a1 1 0 111.414-1.414L8.414 12.172l7.879-7.879a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span>{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                        <p class="mt-4 leading-7">To exercise any of these rights, please contact us using the details below. We will aim to respond within 30 days.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Contact about privacy</h2>
                        <p class="mt-4 leading-7">If you have any questions, concerns or requests relating to how we handle your personal data, please contact us at <a href="mailto:enquiries@lylodsgroup.com" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">enquiries@lylodsgroup.com</a> or via our <a href="{{ route('contact') }}" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">contact form</a>.</p>
                        <p class="mt-4 leading-7">You also have the right to lodge a complaint with the Information Commissioner's Office (ICO) if you believe your data has been handled unlawfully. More information is available at <span class="font-semibold text-[#07172f]">ico.org.uk</span>.</p>
                    </div>

                </div>

            </div>
        </div>
    </section>

</x-layouts.public>

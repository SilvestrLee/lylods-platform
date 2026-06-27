<x-layouts.public title="Accessibility Statement — The Lylods Group">

    {{-- Future CMS-managed compliance content --}}

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        <div class="relative mx-auto max-w-[1440px] px-6 py-24">
            <div class="tlg-reveal max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">Legal</p>
                <h1 class="mt-6 font-serif text-4xl font-bold leading-tight tracking-tight md:text-5xl">Accessibility Statement</h1>
                <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-200">The Lylods Group aims to provide a website that is accessible, usable and clear for as many visitors as possible.</p>
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
                    <p class="mt-2 text-sm leading-6 text-[#667085]">We are committed to improving accessibility on an ongoing basis. If you encounter any difficulty using this website, please <a href="{{ route('contact') }}" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">contact us</a> and we will do our best to assist.</p>
                </div>

                <div class="tlg-reveal space-y-10 text-[#667085]">

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Accessibility commitment</h2>
                        <p class="mt-4 leading-7">The Lylods Group is committed to making this website as accessible and usable as possible for all visitors, including those with disabilities, impairments or those using assistive technology.</p>
                        <p class="mt-4 leading-7">We aim to meet the Web Content Accessibility Guidelines (WCAG) 2.1 at Level AA where reasonably practicable. This is an ongoing commitment and we continue to review and improve the website over time.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Design and readability</h2>
                        <p class="mt-4 leading-7">This website is designed to be clear and easy to read. Our design choices aim to support readability across a range of devices and visual abilities:</p>
                        <ul class="mt-4 space-y-2">
                            @foreach([
                                'Text is presented at a legible size with adequate spacing',
                                'Colour contrast ratios are maintained to assist those with low vision or colour blindness',
                                'Page structure uses clear headings to support navigation and screen readers',
                                'Images include descriptive alternative text where appropriate',
                                'Links are clearly distinguishable from surrounding text',
                            ] as $item)
                            <li class="flex items-start gap-3">
                                <svg class="mt-1 h-4 w-4 shrink-0 text-[#c9a24d]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15l-4.121-4.121a1 1 0 111.414-1.414L8.414 12.172l7.879-7.879a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span>{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Keyboard and mobile access</h2>
                        <p class="mt-4 leading-7">This website is designed to be navigable using a keyboard alone, without requiring a mouse. Interactive elements such as navigation menus, forms and buttons are accessible via standard keyboard commands.</p>
                        <p class="mt-4 leading-7">The website is also designed to be fully responsive and usable on mobile devices, tablets and desktop screens of varying sizes.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Ongoing improvements</h2>
                        <p class="mt-4 leading-7">We recognise that accessibility is not a one-time task but an ongoing process. We review the website periodically and aim to address any accessibility issues as they are identified.</p>
                        <p class="mt-4 leading-7">Where third-party content or tools are embedded in this website, we are not always able to guarantee their accessibility compliance, but we seek to use services that prioritise accessible design.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Reporting accessibility issues</h2>
                        <p class="mt-4 leading-7">If you experience any difficulty accessing content on this website, or if you feel any part of it is not meeting accessibility standards, please contact us. We welcome feedback and will aim to address issues promptly.</p>
                        <p class="mt-4 leading-7">You can reach us at <a href="mailto:enquiries@lylodsgroup.com" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">enquiries@lylodsgroup.com</a> or via our <a href="{{ route('contact') }}" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">contact form</a>. Please describe the issue you experienced and the page or section it relates to, so we can investigate and respond appropriately.</p>
                    </div>

                </div>

            </div>
        </div>
    </section>

</x-layouts.public>

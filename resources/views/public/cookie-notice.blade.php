<x-layouts.public title="Cookie Notice — The Lylods Group">

    {{-- Future CMS-managed compliance content --}}

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        <div class="relative mx-auto max-w-[1440px] px-6 py-24">
            <div class="tlg-reveal max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">Legal</p>
                <h1 class="mt-6 font-serif text-4xl font-bold leading-tight tracking-tight md:text-5xl">Cookie Notice</h1>
                <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-200">This Cookie Notice explains how cookies and similar technologies may be used to improve website functionality, performance and user experience.</p>
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
                    <p class="mt-2 text-sm leading-6 text-[#667085]">This notice describes how we may use cookies on this website. If you have any questions, please <a href="{{ route('contact') }}" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">contact us</a>.</p>
                </div>

                <div class="tlg-reveal space-y-10 text-[#667085]">

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">What cookies are</h2>
                        <p class="mt-4 leading-7">Cookies are small text files that are stored on your device when you visit a website. They are widely used to make websites work efficiently, to improve the user experience, and to provide information to website operators.</p>
                        <p class="mt-4 leading-7">Cookies do not typically contain personal information that identifies you directly, but they may be linked to information you provide through the website — for example, when completing an enquiry form.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">How we may use cookies</h2>
                        <p class="mt-4 leading-7">The Lylods Group website may use cookies for the following purposes:</p>
                        <ul class="mt-4 space-y-2">
                            @foreach([
                                'To ensure the website functions correctly and pages load as expected',
                                'To remember your preferences or form inputs during a session',
                                'To understand how visitors use the website so we can improve it',
                                'To help us measure the effectiveness of our online presence',
                            ] as $item)
                            <li class="flex items-start gap-3">
                                <svg class="mt-1 h-4 w-4 shrink-0 text-[#c9a24d]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15l-4.121-4.121a1 1 0 111.414-1.414L8.414 12.172l7.879-7.879a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                <span>{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Essential cookies</h2>
                        <p class="mt-4 leading-7">Some cookies are strictly necessary for the website to operate. These include session cookies that allow the website to function as you navigate between pages and enable secure form submission. Essential cookies cannot be switched off as they are required for core functionality.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Analytics or performance cookies</h2>
                        <p class="mt-4 leading-7">We may use analytics tools to understand how visitors use this website — for example, which pages are visited most frequently, where visitors arrive from, and how long they spend on each page. This information helps us improve the website experience.</p>
                        <p class="mt-4 leading-7">Where analytics cookies are used, they collect information in an aggregated, anonymised form and are not used to identify individuals. Where a third-party analytics provider is used, their own privacy and data practices will apply.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Managing cookies</h2>
                        <p class="mt-4 leading-7">Most web browsers allow you to control how cookies are used through your browser settings. You can typically choose to block all cookies, accept only certain types, or delete cookies already stored on your device.</p>
                        <p class="mt-4 leading-7">Please note that disabling cookies may affect the functionality of this website and some features may not work as intended. Guidance on managing cookies is available from your browser provider or from resources such as <span class="font-semibold text-[#07172f]">allaboutcookies.org</span>.</p>
                    </div>

                    <div>
                        <h2 class="font-serif text-2xl font-bold text-[#07172f]">Cookie consent</h2>
                        <p class="mt-4 leading-7">Where non-essential cookies are used, we aim to make this clear and to provide you with appropriate choices. By continuing to use this website after being informed of our cookie practices, you are indicating acceptance of cookies as described in this notice.</p>
                        <p class="mt-4 leading-7">This Cookie Notice may be updated from time to time to reflect changes in technology, legislation or our website functionality. Please check this page periodically for the latest information.</p>
                        <p class="mt-4 leading-7">If you have any questions about our use of cookies, please <a href="{{ route('contact') }}" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">contact us</a> or read our <a href="{{ route('privacy-notice') }}" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">Privacy Notice</a> for more information about how we handle personal data.</p>
                    </div>

                </div>

            </div>
        </div>
    </section>

</x-layouts.public>

<?php

namespace Database\Seeders;

use App\Models\CompliancePage;
use Illuminate\Database\Seeder;

class CompliancePageSeeder extends Seeder
{
    public function run(): void
    {
        CompliancePage::truncate();

        $li = fn (string $text) => '<li class="flex items-start gap-3"><svg class="mt-1 h-4 w-4 shrink-0 text-[#c9a24d]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414L8.414 15l-4.121-4.121a1 1 0 111.414-1.414L8.414 12.172l7.879-7.879a1 1 0 011.414 0z" clip-rule="evenodd"/></svg><span>' . $text . '</span></li>';

        $pages = [

            // ─── Privacy Notice ───────────────────────────────────────
            [
                'slug'             => 'privacy-notice',
                'title'            => 'Privacy Notice',
                'last_reviewed_at' => '2026-06-30',
                'content'          => implode('', [
                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Who we are</h2><p class="mt-4 leading-7">The Lylods Group is a UK-based professional services organisation. We are the data controller for personal data you provide to us through our website and enquiry channels.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Information we may collect</h2><p class="mt-4 leading-7">When you interact with us through this website or related channels, we may collect the following types of information:</p><ul class="mt-4 space-y-2">'
                        . $li('Your name and email address')
                        . $li('Your organisation or company name (if provided)')
                        . $li('The content of your message, enquiry or request')
                        . $li('Your telephone number (if provided)')
                        . $li('Information about the type of enquiry you are submitting')
                        . $li('Technical information such as your browser type and IP address (where applicable)')
                        . '</ul></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">How we use information</h2><p class="mt-4 leading-7">We use personal information only to respond to your enquiry and to communicate with you about the services or matters you have raised. We do not use your information for unsolicited marketing or share it for commercial purposes without your knowledge.</p><p class="mt-4 leading-7">Our lawful basis for processing enquiry data is legitimate interests — specifically, responding to a request you have made to us.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Enquiries and contact forms</h2><p class="mt-4 leading-7">When you submit an enquiry via our website contact form, the information you provide is used solely to review and respond to your request. We may retain a record of your enquiry for a reasonable period in order to manage our correspondence and provide continuity of service.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Careers and placement enquiries</h2><p class="mt-4 leading-7">If you contact us in relation to a career opportunity, placement or professional role, we may retain the information you provide — such as your name, contact details and experience summary — for the purpose of reviewing your interest and contacting you if a suitable opportunity arises.</p><p class="mt-4 leading-7">We will not retain careers-related information beyond a reasonable period without a specific ongoing purpose. You may ask us to remove your details at any time.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Data sharing where necessary</h2><p class="mt-4 leading-7">We do not sell, rent or trade personal information. We may share your data with trusted third parties only where it is necessary to deliver a service you have requested — for example, a professional we are introducing you to — and only on a need-to-know basis.</p><p class="mt-4 leading-7">Where required by law or a regulatory authority, we may also be required to disclose information.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Data storage and protection</h2><p class="mt-4 leading-7">We take reasonable technical and organisational steps to protect personal information from loss, misuse or unauthorised access. Data submitted through our website is handled securely.</p><p class="mt-4 leading-7">We retain your data only for as long as is necessary to fulfil the purpose for which it was collected, or as required by applicable law. Enquiry data is reviewed periodically and removed when no longer needed.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Your rights</h2><p class="mt-4 leading-7">Under UK data protection law, you have the right to:</p><ul class="mt-4 space-y-2">'
                        . $li('Access the personal data we hold about you')
                        . $li('Request correction of inaccurate or incomplete information')
                        . $li('Request erasure of your data where there is no compelling reason for us to continue processing it')
                        . $li('Object to or restrict how your data is processed')
                        . $li('Request portability of your data in a structured format')
                        . $li('Withdraw consent where consent is the basis for processing')
                        . '</ul><p class="mt-4 leading-7">To exercise any of these rights, please contact us using the details below. We will aim to respond within 30 days.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Contact about privacy</h2><p class="mt-4 leading-7">If you have any questions, concerns or requests relating to how we handle your personal data, please contact us at <a href="mailto:enquiries@lylodsgroup.com" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">enquiries@lylodsgroup.com</a> or via our <a href="/contact" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">contact form</a>.</p><p class="mt-4 leading-7">You also have the right to lodge a complaint with the Information Commissioner\'s Office (ICO) if you believe your data has been handled unlawfully. More information is available at <span class="font-semibold text-[#07172f]">ico.org.uk</span>.</p></div>',
                ]),
            ],

            // ─── Cookie Notice ────────────────────────────────────────
            [
                'slug'             => 'cookie-notice',
                'title'            => 'Cookie Notice',
                'last_reviewed_at' => '2026-06-30',
                'content'          => implode('', [
                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">What cookies are</h2><p class="mt-4 leading-7">Cookies are small text files that are stored on your device when you visit a website. They are widely used to make websites work efficiently, to improve the user experience, and to provide information to website operators.</p><p class="mt-4 leading-7">Cookies do not typically contain personal information that identifies you directly, but they may be linked to information you provide through the website — for example, when completing an enquiry form.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">How we may use cookies</h2><p class="mt-4 leading-7">The Lylods Group website may use cookies for the following purposes:</p><ul class="mt-4 space-y-2">'
                        . $li('To ensure the website functions correctly and pages load as expected')
                        . $li('To remember your preferences or form inputs during a session')
                        . $li('To understand how visitors use the website so we can improve it')
                        . $li('To help us measure the effectiveness of our online presence')
                        . '</ul></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Essential cookies</h2><p class="mt-4 leading-7">Some cookies are strictly necessary for the website to operate. These include session cookies that allow the website to function as you navigate between pages and enable secure form submission. Essential cookies cannot be switched off as they are required for core functionality.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Analytics or performance cookies</h2><p class="mt-4 leading-7">We may use analytics tools to understand how visitors use this website — for example, which pages are visited most frequently, where visitors arrive from, and how long they spend on each page. This information helps us improve the website experience.</p><p class="mt-4 leading-7">Where analytics cookies are used, they collect information in an aggregated, anonymised form and are not used to identify individuals. Where a third-party analytics provider is used, their own privacy and data practices will apply.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Managing cookies</h2><p class="mt-4 leading-7">Most web browsers allow you to control how cookies are used through your browser settings. You can typically choose to block all cookies, accept only certain types, or delete cookies already stored on your device.</p><p class="mt-4 leading-7">Please note that disabling cookies may affect the functionality of this website and some features may not work as intended. Guidance on managing cookies is available from your browser provider or from resources such as <span class="font-semibold text-[#07172f]">allaboutcookies.org</span>.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Cookie consent</h2><p class="mt-4 leading-7">Where non-essential cookies are used, we aim to make this clear and to provide you with appropriate choices. By continuing to use this website after being informed of our cookie practices, you are indicating acceptance of cookies as described in this notice.</p><p class="mt-4 leading-7">This Cookie Notice may be updated from time to time to reflect changes in technology, legislation or our website functionality. Please check this page periodically for the latest information.</p><p class="mt-4 leading-7">If you have any questions about our use of cookies, please <a href="/contact" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">contact us</a> or read our <a href="/privacy-notice" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">Privacy Notice</a> for more information about how we handle personal data.</p></div>',
                ]),
            ],

            // ─── Accessibility Statement ──────────────────────────────
            [
                'slug'             => 'accessibility',
                'title'            => 'Accessibility Statement',
                'last_reviewed_at' => '2026-06-30',
                'content'          => implode('', [
                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Accessibility commitment</h2><p class="mt-4 leading-7">The Lylods Group is committed to making this website as accessible and usable as possible for all visitors, including those with disabilities, impairments or those using assistive technology.</p><p class="mt-4 leading-7">We aim to meet the Web Content Accessibility Guidelines (WCAG) 2.1 at Level AA where reasonably practicable. This is an ongoing commitment and we continue to review and improve the website over time.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Design and readability</h2><p class="mt-4 leading-7">This website is designed to be clear and easy to read. Our design choices aim to support readability across a range of devices and visual abilities:</p><ul class="mt-4 space-y-2">'
                        . $li('Text is presented at a legible size with adequate spacing')
                        . $li('Colour contrast ratios are maintained to assist those with low vision or colour blindness')
                        . $li('Page structure uses clear headings to support navigation and screen readers')
                        . $li('Images include descriptive alternative text where appropriate')
                        . $li('Links are clearly distinguishable from surrounding text')
                        . '</ul></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Keyboard and mobile access</h2><p class="mt-4 leading-7">This website is designed to be navigable using a keyboard alone, without requiring a mouse. Interactive elements such as navigation menus, forms and buttons are accessible via standard keyboard commands.</p><p class="mt-4 leading-7">The website is also designed to be fully responsive and usable on mobile devices, tablets and desktop screens of varying sizes.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Ongoing improvements</h2><p class="mt-4 leading-7">We recognise that accessibility is not a one-time task but an ongoing process. We review the website periodically and aim to address any accessibility issues as they are identified.</p><p class="mt-4 leading-7">Where third-party content or tools are embedded in this website, we are not always able to guarantee their accessibility compliance, but we seek to use services that prioritise accessible design.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Reporting accessibility issues</h2><p class="mt-4 leading-7">If you experience any difficulty accessing content on this website, or if you feel any part of it is not meeting accessibility standards, please contact us. We welcome feedback and will aim to address issues promptly.</p><p class="mt-4 leading-7">You can reach us at <a href="mailto:enquiries@lylodsgroup.com" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">enquiries@lylodsgroup.com</a> or via our <a href="/contact" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">contact form</a>. Please describe the issue you experienced and the page or section it relates to, so we can investigate and respond appropriately.</p></div>',
                ]),
            ],

            // ─── Complaints Process ───────────────────────────────────
            [
                'slug'             => 'complaints',
                'title'            => 'Complaints Process',
                'last_reviewed_at' => '2026-06-30',
                'content'          => implode('', [
                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">How to raise a complaint</h2><p class="mt-4 leading-7">If you have a concern or complaint about any aspect of your experience with The Lylods Group — including our communications, services, or how a matter was handled — you are encouraged to raise it with us directly in the first instance.</p><p class="mt-4 leading-7">Complaints can be submitted by:</p><ul class="mt-4 space-y-2">'
                        . $li('Email: enquiries@lylodsgroup.com — please use the subject line "Formal Complaint"')
                        . $li('Contact form: via the Contact page on this website')
                        . '</ul></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">What information to provide</h2><p class="mt-4 leading-7">To help us review your complaint efficiently and fairly, please include the following information where possible:</p><ul class="mt-4 space-y-2">'
                        . $li('Your full name and contact details')
                        . $li('A clear description of the concern or complaint')
                        . $li('The date or timeframe the issue occurred')
                        . $li('Any relevant reference numbers, correspondence or documentation')
                        . $li('What outcome or resolution you are seeking')
                        . '</ul></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">How complaints are reviewed</h2><p class="mt-4 leading-7">On receipt of a complaint, we will:</p><ul class="mt-4 space-y-2">'
                        . $li('Acknowledge your complaint promptly — typically within two to three business days')
                        . $li('Review the matter thoroughly and fairly, gathering relevant information')
                        . $li('Communicate with you if we require further clarification or information')
                        . $li('Assess the complaint against the relevant facts and our internal standards')
                        . '</ul></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Response expectations</h2><p class="mt-4 leading-7">We aim to provide a full written response to complaints within ten business days of receipt. Where a complaint is more complex and requires additional time to investigate, we will communicate this to you and provide an updated timeframe.</p><p class="mt-4 leading-7">Our response will set out our findings, the steps taken to address the matter where appropriate, and any action we intend to take as a result.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Escalation or further review</h2><p class="mt-4 leading-7">If you are not satisfied with the outcome of your complaint after we have responded, you may request that the matter is reviewed further. Please indicate this clearly in your follow-up communication and we will arrange for the matter to be considered at a senior level.</p><p class="mt-4 leading-7">Where a complaint relates to the handling of personal data, you also have the right to contact the Information Commissioner\'s Office (ICO) at <span class="font-semibold text-[#07172f]">ico.org.uk</span>.</p></div>',
                ]),
            ],

            // ─── Terms of Use ─────────────────────────────────────────
            [
                'slug'             => 'terms',
                'title'            => 'Terms of Use',
                'last_reviewed_at' => '2026-06-30',
                'content'          => implode('', [
                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Website information</h2><p class="mt-4 leading-7">This website is operated by The Lylods Group, a UK-based professional services organisation. The information provided on this website is for general information purposes only and is subject to change without notice.</p><p class="mt-4 leading-7">While we take reasonable care to ensure the accuracy of information published on this website, we make no warranty or representation — express or implied — about its completeness, accuracy, reliability or suitability for any particular purpose.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">No professional advice disclaimer</h2><p class="mt-4 leading-7">Nothing on this website constitutes professional, legal, financial, investment, tax, compliance or regulatory advice. The content of this website is provided for general informational purposes only.</p><p class="mt-4 leading-7">You should not rely on any information on this website as a substitute for professional advice relevant to your specific circumstances. Where specialist guidance is required, we strongly recommend seeking advice from appropriately qualified and regulated professionals.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Property-related information disclaimer</h2><div class="mt-4 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] px-6 py-5"><p class="leading-7">The Lylods Group supports the coordination, packaging and practical development of property opportunities. Where specialist regulated, legal, surveying, planning, architectural, finance or tax advice is required, we work with or introduce clients to appropriately qualified independent professionals.</p></div><p class="mt-4 leading-7">Any property-related information published on this website is provided for general awareness and does not constitute a regulated financial promotion, investment advice, or a solicitation to invest.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">User responsibilities</h2><p class="mt-4 leading-7">By using this website, you agree to use it only for lawful purposes and in a manner that does not infringe the rights of others. You must not:</p><ul class="mt-4 space-y-2">'
                        . $li('Use the website in any way that violates applicable laws or regulations')
                        . $li('Transmit unsolicited commercial communications or spam')
                        . $li('Attempt to gain unauthorised access to any part of the website or its systems')
                        . $li('Introduce viruses, malicious code or other harmful material')
                        . $li('Copy, reproduce or republish content from this website without permission')
                        . '</ul></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Intellectual property</h2><p class="mt-4 leading-7">All content on this website — including text, design, logos, graphics and structure — is the property of The Lylods Group or its licensors and is protected by applicable intellectual property laws.</p><p class="mt-4 leading-7">You may view and print content from this website for personal, non-commercial reference only. Any other use — including reproduction, distribution, modification or commercial use — requires prior written permission from The Lylods Group.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">External links</h2><p class="mt-4 leading-7">This website may contain links to external websites operated by third parties. These links are provided for convenience and information only. The Lylods Group does not endorse, control or accept responsibility for the content, privacy practices or accuracy of any external website.</p><p class="mt-4 leading-7">Visiting any linked third-party website is at your own risk and is subject to that website\'s own terms and conditions.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Limitation of liability</h2><p class="mt-4 leading-7">To the fullest extent permitted by applicable law, The Lylods Group shall not be liable for any loss or damage — whether direct, indirect, incidental, consequential or otherwise — arising from your use of, or inability to use, this website or reliance on any information provided through it.</p><p class="mt-4 leading-7">This limitation does not affect any liability that cannot be excluded or limited under applicable law.</p></div>',

                    '<div><h2 class="font-serif text-2xl font-bold text-[#07172f]">Updates to these terms</h2><p class="mt-4 leading-7">We may update these Terms of Use from time to time to reflect changes to our practices, legal requirements or the operation of this website. The updated terms will be published on this page with a revised date.</p><p class="mt-4 leading-7">Continued use of this website after any changes have been published constitutes your acceptance of the revised terms. We recommend checking this page periodically.</p><p class="mt-4 leading-7">If you have any questions about these terms, please <a href="/contact" class="font-semibold text-[#123f8c] underline underline-offset-2 hover:text-[#07172f]">contact us</a>.</p></div>',
                ]),
            ],

        ];

        foreach ($pages as $page) {
            CompliancePage::create($page);
        }
    }
}

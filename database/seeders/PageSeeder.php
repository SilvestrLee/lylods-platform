<?php

namespace Database\Seeders;

use App\Models\HeroCard;
use App\Models\HeroCardIcon;
use App\Models\Page;
use App\Models\PageAboutValue;
use App\Models\PageEngagementStep;
use App\Models\PageIndustry;
use App\Models\PageServiceCard;
use App\Models\PageStatistic;
use App\Models\PageWhyChooseUsCard;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'slug'                => 'home',
                'title'               => 'Home',
                'hero_title'          => 'Building Better Businesses, Stronger Communities and Sustainable Opportunities',
                'hero_subtitle'       => 'The Lylods Group',
                'hero_description'    => 'The Lylods Group helps businesses, organisations and communities move from ideas to practical results — through business support, technology, training, compliance and project delivery.',
                'primary_cta_label'   => 'Discuss Your Project',
                'primary_cta_url'     => '/contact',
                'secondary_cta_label' => 'Explore Our Services',
                'secondary_cta_url'   => '/services',
                'section_visibility'  => [
                    'hero'          => true,
                    'why_choose_us' => true,
                    'services'      => true,
                    'testimonials'  => true,
                    'partners'      => true,
                    'cta'           => true,
                ],
                'discipline_eyebrow' => 'Our Services',
                'discipline_items' => [
                    'Business, Technology & Digital',
                    'Training, Recruitment & Capacity',
                    'Governance, Compliance & Data Protection',
                    'Property & Development',
                    'Community & Project Development',
                ],
                'services_eyebrow' => 'Professional Services',
                'services_heading' => 'A single partner across',
                'services_heading_break' => 'multiple disciplines.',
                'services_cta_label' => 'View All Disciplines',
                'services_cta_url' => '/services',
                'industries_eyebrow' => 'Sectors of Practice',
                'industries_heading' => 'Industries We Serve',
                'industries_cta_label' => 'Explore our disciplines →',
                'industries_cta_url' => '/services',
                'why_choose_us_eyebrow' => 'Why Clients Work With Us',
                'why_choose_us_heading' => 'What makes the difference.',
                'why_choose_us_description' => 'Our clients come back because of how we work — not just what we deliver.',
                'why_choose_us_cta_label' => 'Discuss Your Project',
                'why_choose_us_cta_url' => '/contact',
                'engagement_eyebrow' => 'Our Approach',
                'engagement_heading' => 'How we engage with clients.',
                'engagement_description' => 'Every engagement is structured from first conversation to final deliverable — ensuring clarity, accountability, and measurable progress at every stage.',
                'about_eyebrow' => 'About The Lylods Group',
                'about_heading' => 'Professional services built on expertise and integrity.',
                'about_description' => 'The Lylods Group is a multidisciplinary professional services organisation working across business, technology, training, compliance, property and community development. We work with clients who need a capable, accountable partner across multiple disciplines.',
                'about_media_alt' => 'The Lylods Group — professionals collaborating',
                'about_cta_label' => 'About The Group',
                'about_cta_url' => '/about',
                'wwu_eyebrow' => 'Work With Us',
                'wwu_heading' => 'Ready to discuss a requirement?',
                'wwu_description' => 'Whether you need specialist advisory, engineering delivery, technology support, compliance guidance, or workforce solutions — we welcome your enquiry. Our team will respond within two business days.',
                'wwu_primary_cta_label' => 'Discuss a Requirement',
                'wwu_primary_cta_url' => '/contact',
                'wwu_secondary_cta_label' => 'View Our Services',
                'wwu_secondary_cta_url' => '/services',
                'wwu_investor_note' => 'For investor access, please use the',
                'wwu_investor_cta_label' => 'investor portal login',
                'wwu_investor_cta_url' => '/login',
            ],
            [
                'slug'                => 'about',
                'title'               => 'About Us',
                'hero_title'          => 'About The Lylods Group',
                'hero_subtitle'       => 'About Us',
                'hero_description'    => 'The Lylods Group is a UK-based business, technology, property and community development organisation helping individuals and organisations build practical systems, skilled teams, sustainable assets and lasting opportunities.',
                'primary_cta_label'   => 'Discuss Your Project',
                'primary_cta_url'     => '/contact',
                'secondary_cta_label' => 'Our Services',
                'secondary_cta_url'   => '/services',
            ],
            [
                'slug'                => 'services',
                'title'               => 'Our Services',
                'hero_title'          => 'Our Services',
                'hero_subtitle'       => 'What We Offer',
                'hero_description'    => 'The Lylods Group provides practical support across business, technology, training, recruitment, compliance, property and community development.',
                'primary_cta_label'   => 'Explore Service Areas',
                'primary_cta_url'     => '#service-areas',
                'secondary_cta_label' => 'Discuss Your Project',
                'secondary_cta_url'   => '/contact',
            ],
            [
                'slug'                => 'investment',
                'title'               => 'Investment Information',
                'hero_title'          => 'Structured Investment Relationships Built on Transparency and Accountability',
                'hero_subtitle'       => 'Investor Relations',
                'hero_description'    => 'The Lylods Group maintains a dedicated investor platform providing registered investors with secure access to investment records, official notices, and account visibility. Our investor relationships are managed with the same standards of professionalism and accountability that define our consulting practice.',
                'primary_cta_label'   => 'Investor Login',
                'primary_cta_url'     => '/login',
                'secondary_cta_label' => 'Contact Us',
                'secondary_cta_url'   => '/contact',
            ],
            [
                'slug'                => 'property',
                'title'               => 'Property Services',
                'hero_title'          => 'Property Packaging, Facilitation, Management and Development',
                'hero_subtitle'       => 'Property Services',
                'hero_description'    => 'We support clients in identifying, structuring, coordinating and managing practical property opportunities across residential, commercial, land and development contexts.',
                'primary_cta_label'   => 'Discuss a Property Requirement',
                'primary_cta_url'     => '/contact',
                'secondary_cta_label' => 'All Services',
                'secondary_cta_url'   => '/services',
            ],
            [
                'slug'                => 'community-projects',
                'title'               => 'Community and Project Development',
                'hero_title'          => 'Community and Project Development',
                'hero_subtitle'       => 'Service Area 05',
                'hero_description'    => 'We support community-focused programmes, partnership projects and development activities through planning, coordination, stakeholder engagement and practical delivery support.',
                'primary_cta_label'   => 'Discuss a Community Project',
                'primary_cta_url'     => '/contact',
                'secondary_cta_label' => 'Contact Us',
                'secondary_cta_url'   => '/contact',
            ],
            [
                'slug'                => 'case-studies',
                'title'               => 'Case Studies',
                'hero_title'          => 'Case Studies',
                'hero_subtitle'       => 'Our Work',
                'hero_description'    => 'Engagement examples across our professional service disciplines — illustrating how The Lylods Group approaches practical client challenges.',
            ],
            [
                'slug'                => 'insights',
                'title'               => 'Insights and News',
                'hero_title'          => 'Insights and News',
                'hero_subtitle'       => 'Knowledge & Perspectives',
                'hero_description'    => 'Practical updates, guidance and perspectives on business growth, technology, compliance, training, property and community development.',
            ],
            [
                'slug'                => 'careers',
                'title'               => 'Careers and Placements',
                'hero_title'          => 'Careers and Placements',
                'hero_subtitle'       => 'Work With Us',
                'hero_description'    => 'Explore opportunities to work with us, develop your skills, support projects or connect with suitable placement and recruitment pathways.',
                'primary_cta_label'   => 'Submit Your Interest',
                'primary_cta_url'     => '/contact',
                'secondary_cta_label' => 'About The Group',
                'secondary_cta_url'   => '/about',
            ],
            [
                'slug'                => 'contact',
                'title'               => 'Contact',
                'hero_title'          => 'Get in Touch',
                'hero_subtitle'       => 'Contact The Lylods Group',
                'hero_description'    => 'Whether you have a business enquiry, require information about our services, are interested in investment, or need investor access support — we are here to assist.',
                'primary_cta_label'   => 'Send an Enquiry',
                'primary_cta_url'     => '#contact-form',
            ],
            [
                'slug'             => 'privacy',
                'title'            => 'Privacy Notice',
                'hero_title'       => 'Privacy Notice',
                'hero_subtitle'    => 'Legal',
                'hero_description' => 'How The Lylods Group collects, uses, stores, and protects your personal data.',
            ],
            [
                'slug'             => 'privacy-notice',
                'title'            => 'Privacy Notice',
                'hero_title'       => 'Privacy Notice',
                'hero_subtitle'    => 'Legal',
                'hero_description' => 'This Privacy Notice explains how The Lylods Group may collect, use, store and protect personal information submitted through the website and related enquiry channels.',
            ],
            [
                'slug'             => 'cookie-notice',
                'title'            => 'Cookie Notice',
                'hero_title'       => 'Cookie Notice',
                'hero_subtitle'    => 'Legal',
                'hero_description' => 'This Cookie Notice explains how cookies and similar technologies may be used to improve website functionality, performance and user experience.',
            ],
            [
                'slug'             => 'accessibility',
                'title'            => 'Accessibility Statement',
                'hero_title'       => 'Accessibility Statement',
                'hero_subtitle'    => 'Legal',
                'hero_description' => 'The Lylods Group aims to provide a website that is accessible, usable and clear for as many visitors as possible.',
            ],
            [
                'slug'             => 'complaints',
                'title'            => 'Complaints Process',
                'hero_title'       => 'Complaints Process',
                'hero_subtitle'    => 'Legal',
                'hero_description' => 'The Lylods Group aims to communicate clearly and respond professionally where a concern or complaint is raised.',
            ],
            [
                'slug'             => 'terms',
                'title'            => 'Terms of Use',
                'hero_title'       => 'Terms of Use',
                'hero_subtitle'    => 'Legal',
                'hero_description' => 'These Terms of Use explain the general conditions for using The Lylods Group website and information provided through it.',
            ],
        ];

        foreach ($pages as $data) {
            Page::firstOrCreate(['slug' => $data['slug']], $data);
        }

        $this->seedHomeHeroCards();
        $this->seedHomeStatistics();
        $this->seedHomeServiceCards();
        $this->seedHomeIndustries();
        $this->seedHomeWhyChooseUsCards();
        $this->seedHomeEngagementSteps();
        $this->seedHomeAboutValues();
    }

    private function seedHomeHeroCards(): void
    {
        $home = Page::where('slug', 'home')->first();

        if (! $home) {
            return;
        }

        $cards = [
            [
                'order' => 1,
                'badge' => 'Business Advisory',
                'title' => null,
                'description' => null,
                'icons' => [
                    ['icon' => 'chart-bar', 'label' => 'Business growth', 'tag' => 'Strategy'],
                    ['icon' => 'cog', 'label' => 'Digital solutions', 'tag' => 'Tech'],
                    ['icon' => 'check-circle', 'label' => 'Operational support', 'tag' => 'Advisory'],
                ],
                'image_media_id' => null,
                'image_alt' => 'Business advisory',
                'cta_label' => 'Learn More',
                'cta_url' => '/services#business-technology',
                'is_visible' => true,
            ],
            [
                'order' => 2,
                'badge' => 'Community Projects',
                'title' => 'Capacity Building',
                'description' => 'Training programmes, project coordination and community initiatives delivered end to end.',
                'icons' => [],
                'image_media_id' => null,
                'image_alt' => 'Training and community development',
                'cta_label' => 'Explore',
                'cta_url' => '/services#community-projects',
                'is_visible' => true,
            ],
        ];

        foreach ($cards as $card) {
            $icons = $card['icons'];
            unset($card['icons']);

            $heroCard = HeroCard::firstOrCreate(
                ['page_id' => $home->id, 'order' => $card['order']],
                array_merge(['page_id' => $home->id], $card)
            );

            foreach ($icons as $index => $icon) {
                HeroCardIcon::firstOrCreate(
                    ['hero_card_id' => $heroCard->id, 'order' => $index + 1],
                    array_merge(['hero_card_id' => $heroCard->id, 'order' => $index + 1], $icon)
                );
            }
        }
    }

    private function seedHomeStatistics(): void
    {
        $home = Page::where('slug', 'home')->first();

        if (! $home) {
            return;
        }

        $statistics = [
            ['label' => 'Service Areas', 'value' => '5', 'caption' => null],
            ['label' => 'Industry Reach', 'value' => 'Multi-Sector', 'caption' => 'Energy · Infrastructure · Finance · Public'],
            ['label' => 'Delivery Model', 'value' => 'End-to-End', 'caption' => 'Discovery through close-out'],
            ['label' => 'Accountability', 'value' => 'One Partner', 'caption' => 'Across all disciplines'],
        ];

        foreach ($statistics as $index => $statistic) {
            PageStatistic::firstOrCreate(
                ['page_id' => $home->id, 'order' => $index + 1],
                array_merge(['page_id' => $home->id, 'order' => $index + 1], $statistic)
            );
        }
    }

    private function seedHomeServiceCards(): void
    {
        $home = Page::where('slug', 'home')->first();

        if (! $home) {
            return;
        }

        $cards = [
            ['icon' => 'cog', 'title' => 'Business, Technology and Digital Solutions', 'description' => 'Strategy, digital transformation, technology advisory, and business consulting.', 'href' => '/services#business-technology', 'image_alt' => 'Business Technology and Digital Solutions'],
            ['icon' => 'academic-cap', 'title' => 'Training, Recruitment and Capacity Building', 'description' => 'Professional development, workforce upskilling, and specialist placement.', 'href' => '/services#training-recruitment', 'image_alt' => 'Training Recruitment and Capacity Building'],
            ['icon' => 'check-circle', 'title' => 'Governance, Compliance and Data Protection', 'description' => 'Compliance frameworks, policy, audit readiness, and data governance.', 'href' => '/services#compliance-governance', 'image_alt' => 'Governance Compliance and Data Protection'],
            ['icon' => 'building-office', 'title' => 'Property Packaging, Facilitation, Management and Development', 'description' => 'Property opportunity coordination, packaging, and development management.', 'href' => '/services#property-development', 'image_alt' => 'Property Packaging Facilitation Management and Development'],
            ['icon' => 'user-group', 'title' => 'Community and Project Development', 'description' => 'Social impact delivery, community project coordination and development support.', 'href' => '/services#community-projects', 'image_alt' => 'Community and Project Development'],
        ];

        foreach ($cards as $index => $card) {
            PageServiceCard::firstOrCreate(
                ['page_id' => $home->id, 'order' => $index + 1],
                array_merge(['page_id' => $home->id, 'order' => $index + 1], $card)
            );
        }
    }

    private function seedHomeIndustries(): void
    {
        $home = Page::where('slug', 'home')->first();

        if (! $home) {
            return;
        }

        $industries = [
            'Energy & Utilities',
            'Infrastructure & Civil',
            'Financial Services',
            'Government & Public Sector',
            'Technology & Digital',
            'Oil & Gas / Industrial',
            'Professional Services',
            'Education & Training',
        ];

        foreach ($industries as $index => $title) {
            PageIndustry::firstOrCreate(
                ['page_id' => $home->id, 'order' => $index + 1],
                ['page_id' => $home->id, 'order' => $index + 1, 'title' => $title]
            );
        }
    }

    private function seedHomeWhyChooseUsCards(): void
    {
        $home = Page::where('slug', 'home')->first();

        if (! $home) {
            return;
        }

        $cards = [
            ['icon' => 'check-circle', 'title' => 'Practical Delivery', 'description' => 'From planning to execution — we stay engaged across the full lifecycle, not just the advisory phase.', 'is_dark' => false],
            ['icon' => 'squares-2x2', 'title' => 'Multi-Sector Experience', 'description' => 'Experience across business, public sector, technology, property and community contexts informs how we approach every engagement.', 'is_dark' => false],
            ['icon' => 'chat-bubble', 'title' => 'Clear Communication', 'description' => 'Structured coordination and honest reporting — clients are never left guessing about progress, priorities, or next steps.', 'is_dark' => false],
            ['icon' => 'user', 'title' => 'Tailored Support', 'description' => 'We shape our approach to fit your situation — no generic frameworks pushed onto problems they were not built to solve.', 'is_dark' => false],
            ['icon' => 'user-group', 'title' => 'Strong Professional Network', 'description' => 'Where specialist or regulated input is needed, we introduce clients to appropriate, qualified independent professionals.', 'is_dark' => false],
            ['icon' => 'chart-bar', 'title' => 'Measurable Outcomes', 'description' => 'We focus on what can be measured, tracked, and evidenced — so you know the value of every engagement.', 'is_dark' => true],
        ];

        foreach ($cards as $index => $card) {
            PageWhyChooseUsCard::firstOrCreate(
                ['page_id' => $home->id, 'order' => $index + 1],
                array_merge(['page_id' => $home->id, 'order' => $index + 1], $card)
            );
        }
    }

    private function seedHomeEngagementSteps(): void
    {
        $home = Page::where('slug', 'home')->first();

        if (! $home) {
            return;
        }

        $steps = [
            ['title' => 'Discovery', 'description' => 'We invest time upfront understanding your context, objectives, and constraints — ensuring our engagement is grounded in what actually matters to you.', 'is_dark' => false],
            ['title' => 'Scoping', 'description' => 'We define a clear, structured scope of work with measurable milestones, agreed deliverables, and defined lines of accountability before any work begins.', 'is_dark' => false],
            ['title' => 'Delivery', 'description' => 'We execute with discipline, keeping clients informed at every stage. Our teams are empowered to make decisions without creating unnecessary escalation or delay.', 'is_dark' => false],
            ['title' => 'Review', 'description' => 'We close every engagement with structured review, capturing outcomes against objectives — ensuring continuous improvement and a foundation for future work.', 'is_dark' => true],
        ];

        foreach ($steps as $index => $step) {
            PageEngagementStep::firstOrCreate(
                ['page_id' => $home->id, 'order' => $index + 1],
                array_merge(['page_id' => $home->id, 'order' => $index + 1], $step)
            );
        }
    }

    private function seedHomeAboutValues(): void
    {
        $home = Page::where('slug', 'home')->first();

        if (! $home) {
            return;
        }

        $values = [
            ['icon' => 'check-circle', 'title' => 'Integrity', 'description' => 'Transparent, ethical conduct in every engagement.'],
            ['icon' => 'star', 'title' => 'Excellence', 'description' => 'Rigorous professional standards on every deliverable.'],
            ['icon' => 'chart-bar', 'title' => 'Delivery', 'description' => 'Measurable results and sustainable client outcomes.'],
            ['icon' => 'user-duo', 'title' => 'Partnership', 'description' => 'Long-term relationships built on shared objectives.'],
        ];

        foreach ($values as $index => $value) {
            PageAboutValue::firstOrCreate(
                ['page_id' => $home->id, 'order' => $index + 1],
                array_merge(['page_id' => $home->id, 'order' => $index + 1], $value)
            );
        }
    }
}

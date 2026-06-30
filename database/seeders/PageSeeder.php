<?php

namespace Database\Seeders;

use App\Models\Page;
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
    }
}

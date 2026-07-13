<?php

namespace Database\Seeders;

use App\Models\FooterLink;
use Illuminate\Database\Seeder;

class FooterLinkSeeder extends Seeder
{
    public function run(): void
    {
        FooterLink::truncate();

        $links = [
            // Company column — per NAVIGATION_GOVERNANCE.md §5: About Us, Careers, Contact
            ['group' => 'company', 'label' => 'About Us', 'url' => '/about',    'display_order' => 1],
            ['group' => 'company', 'label' => 'Careers',  'url' => '/careers',  'display_order' => 2],
            ['group' => 'company', 'label' => 'Contact',  'url' => '/contact',  'display_order' => 3],

            // Services column — unchanged from current (5 anchor links + View All Services)
            ['group' => 'services', 'label' => 'Business & Technology',    'url' => '/services#business-technology',   'display_order' => 1],
            ['group' => 'services', 'label' => 'Training & Recruitment',   'url' => '/services#training-recruitment',  'display_order' => 2],
            ['group' => 'services', 'label' => 'Compliance & Governance',  'url' => '/services#compliance-governance', 'display_order' => 3],
            ['group' => 'services', 'label' => 'Property & Development',   'url' => '/property',                       'display_order' => 4],
            ['group' => 'services', 'label' => 'Community Projects',       'url' => '/community-projects',             'display_order' => 5],
            ['group' => 'services', 'label' => 'View All Services →',      'url' => '/services',                       'display_order' => 6],

            // Industries column
            ['group' => 'industries', 'label' => 'Explore Industries →', 'url' => '/industries', 'display_order' => 1],

            // Insights column — per NAVIGATION_GOVERNANCE.md §5: absorbs Case Studies
            ['group' => 'insights', 'label' => 'Insights',     'url' => '/insights',      'display_order' => 1],
            ['group' => 'insights', 'label' => 'Case Studies', 'url' => '/case-studies',   'display_order' => 2],

            // Support column — per NAVIGATION_GOVERNANCE.md §5: Contact-oriented links
            ['group' => 'support', 'label' => 'Contact Us', 'url' => '/contact', 'display_order' => 1],

            // Portal column
            ['group' => 'portal', 'label' => 'Investment Information', 'url' => '/investment', 'display_order' => 1],
        ];

        foreach ($links as $link) {
            FooterLink::create($link);
        }
    }
}

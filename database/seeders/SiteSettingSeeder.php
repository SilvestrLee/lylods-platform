<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::firstOrCreate([], [
            'site_name'               => 'The Lylods Group',
            'tagline'                 => 'Building Better Businesses, Stronger Communities and Sustainable Opportunities',
            'primary_email'           => 'sample@thelylodsgroup.com',
            'support_email'           => 'support@thelylodsgroup.com',
            'enquiries_email'         => 'info@thelylodsgroup.com',
            'phone'                   => '012345678',
            'alternative_phone'       => '098765432',
            'address'                 => "The Lylods Group\nBusiness District\nUnited Kingdom",
            'office_hours'            => 'Monday – Friday, 9:00 AM – 5:00 PM',
            'footer_text'             => 'The Lylods Group is a UK-based business, technology, property and community development organisation.',
            'copyright'               => '© ' . date('Y') . ' The Lylods Group. All rights reserved.',
            'default_meta_title'      => 'The Lylods Group — Multidisciplinary Professional Services',
            'default_meta_description'=> 'The Lylods Group helps businesses, organisations and communities move from ideas to practical results — through business support, technology, training, compliance and project delivery.',
        ]);
    }
}

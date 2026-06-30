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
            'primary_email'           => null,
            'phone'                   => null,
            'address'                 => null,
            'office_hours'            => null,
            'footer_text'             => 'The Lylods Group is a UK-based business, technology, property and community development organisation.',
            'copyright'               => '© ' . date('Y') . ' The Lylods Group. All rights reserved.',
            'default_meta_title'      => 'The Lylods Group — Multidisciplinary Professional Services',
            'default_meta_description'=> 'The Lylods Group helps businesses, organisations and communities move from ideas to practical results — through business support, technology, training, compliance and project delivery.',
        ]);
    }
}

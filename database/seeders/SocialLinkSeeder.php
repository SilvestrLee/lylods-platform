<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        SocialLink::truncate();

        $links = [
            ['platform' => 'linkedin', 'url' => '#', 'display_order' => 1],
            ['platform' => 'x',        'url' => '#', 'display_order' => 2],
        ];

        foreach ($links as $link) {
            SocialLink::create($link);
        }
    }
}

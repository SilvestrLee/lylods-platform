<?php

namespace App\Support;

use App\Models\PublicImageSlot;
use Illuminate\Support\Facades\Schema;

/** Central media assignments for static, editorial/public image panels. */
final class PublicImageSlots
{
    private static ?array $loaded = null;

    /** @return array<string, array{label: string, pool: string}> */
    public static function definitions(): array
    {
        return [
            'services.group.1' => ['label' => 'Services: Business and Technology', 'pool' => 'services'],
            'services.group.2' => ['label' => 'Services: Training and Recruitment', 'pool' => 'services'],
            'services.group.3' => ['label' => 'Services: Governance and Compliance', 'pool' => 'services'],
            'services.group.4' => ['label' => 'Services: Property Development', 'pool' => 'services'],
            'services.group.5' => ['label' => 'Services: Community Projects', 'pool' => 'services'],
            'about.focus.1' => ['label' => 'About: Business and Technology', 'pool' => 'pages'],
            'about.focus.2' => ['label' => 'About: Training and Capacity Building', 'pool' => 'pages'],
            'about.focus.3' => ['label' => 'About: Governance and Compliance', 'pool' => 'pages'],
            'about.focus.4' => ['label' => 'About: Property and Development', 'pool' => 'pages'],
            'about.focus.5' => ['label' => 'About: Community Projects', 'pool' => 'pages'],
            'careers.card.1' => ['label' => 'Careers: Professional Placements', 'pool' => 'pages'],
            'careers.card.2' => ['label' => 'Careers: Recruitment Support', 'pool' => 'pages'],
            'careers.card.3' => ['label' => 'Careers: Training and Employability', 'pool' => 'pages'],
            'careers.card.4' => ['label' => 'Careers: Project-based Roles', 'pool' => 'pages'],
            'careers.card.5' => ['label' => 'Careers: Community Programme Support', 'pool' => 'pages'],
            'careers.card.6' => ['label' => 'Careers: Skilled Professional Network', 'pool' => 'pages'],
            'case-studies.example.1' => ['label' => 'Case Studies: Business Digital Transformation', 'pool' => 'pages'],
            'case-studies.example.2' => ['label' => 'Case Studies: Training Programme', 'pool' => 'pages'],
            'case-studies.example.3' => ['label' => 'Case Studies: Compliance Documentation', 'pool' => 'pages'],
            'case-studies.example.4' => ['label' => 'Case Studies: Community Project Coordination', 'pool' => 'pages'],
            'case-studies.example.5' => ['label' => 'Case Studies: Property Project Coordination', 'pool' => 'pages'],
            'case-studies.example.6' => ['label' => 'Case Studies: Recruitment Support', 'pool' => 'pages'],
            'insights.featured' => ['label' => 'Insights: Featured example', 'pool' => 'pages'],
            'insights.example.1' => ['label' => 'Insights: Business example', 'pool' => 'pages'],
            'insights.example.2' => ['label' => 'Insights: Technology example', 'pool' => 'pages'],
            'insights.example.3' => ['label' => 'Insights: Compliance example', 'pool' => 'pages'],
            'insights.example.4' => ['label' => 'Insights: Training example', 'pool' => 'pages'],
            'insights.example.5' => ['label' => 'Insights: Property example', 'pool' => 'pages'],
            'insights.example.6' => ['label' => 'Insights: Community example', 'pool' => 'pages'],
        ];
    }

    public static function url(string $key): ?string
    {
        if (self::$loaded === null) {
            // Avoid a page outage during the short code-before-migration deploy window.
            if (!Schema::hasTable('public_image_slots')) {
                return null;
            }

            self::$loaded = PublicImageSlot::with('media')
                ->get()
                ->keyBy('key')
                ->all();
        }

        $media = (self::$loaded[$key] ?? null)?->media;
        return ($media && $media->is_public && $media->isImage()) ? $media->url() : null;
    }
}

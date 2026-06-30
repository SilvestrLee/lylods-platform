<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceGroup;
use Illuminate\Database\Seeder;

class ServiceGroupSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            [
                'name'          => 'Business, Technology and Digital Solutions',
                'slug'          => 'business-technology',
                'description'   => 'We support organisations with business consultancy, software and systems development, digital transformation, data solutions, cybersecurity awareness, information management, process improvement and automation support.',
                'display_order' => 1,
                'services'      => [
                    'Business consultancy',
                    'Software and systems development',
                    'Digital transformation',
                    'Data solutions and analytics',
                    'Cybersecurity awareness',
                    'Information management',
                    'Process improvement',
                    'Automation support',
                ],
            ],
            [
                'name'          => 'Training, Recruitment and Capacity Building',
                'slug'          => 'training-recruitment',
                'description'   => 'We help people and organisations develop the right knowledge, skills and teams through professional training, employability support, recruitment services, leadership development and tailored learning programmes.',
                'display_order' => 2,
                'services'      => [
                    'Professional training',
                    'Leadership development',
                    'Employability support',
                    'Recruitment services',
                    'Staff development',
                    'Digital training',
                    'Community programmes',
                    'Tailored workshops',
                ],
            ],
            [
                'name'          => 'Governance, Compliance and Data Protection',
                'slug'          => 'compliance-governance',
                'description'   => 'We support businesses, charities and projects with data protection, GDPR, policy development, governance, risk awareness, documentation and practical compliance support.',
                'display_order' => 3,
                'services'      => [
                    'GDPR support',
                    'Data protection officer services',
                    'Policy development',
                    'Governance frameworks',
                    'Risk awareness',
                    'Information management',
                    'Compliance documentation',
                    'Staff training',
                ],
            ],
            [
                'name'          => 'Property Packaging, Facilitation, Management and Development',
                'slug'          => 'property-development',
                'description'   => 'We support clients in identifying, structuring, coordinating and managing practical property opportunities across residential, commercial, land and development contexts.',
                'display_order' => 4,
                'services'      => [
                    'Property opportunity sourcing and packaging',
                    'Residential, commercial and land opportunities',
                    'Feasibility support',
                    'Refurbishment and development coordination',
                    'Landlord and tenant support',
                    'Property management coordination',
                    'Development monitoring',
                    'Stakeholder coordination',
                    'Investor presentations',
                ],
            ],
            [
                'name'          => 'Community and Project Development',
                'slug'          => 'community-projects',
                'description'   => 'We support community-focused programmes, partnership projects and development activities through planning, coordination, stakeholder engagement and practical delivery support.',
                'display_order' => 5,
                'services'      => [
                    'Community programmes',
                    'Project coordination',
                    'Stakeholder engagement',
                    'Development initiatives',
                    'Partnership support',
                    'Delivery planning',
                    'Monitoring and reporting',
                    'Capacity building',
                ],
            ],
        ];

        foreach ($groups as $groupData) {
            $services = $groupData['services'];
            unset($groupData['services']);

            $group = ServiceGroup::firstOrCreate(
                ['slug' => $groupData['slug']],
                $groupData
            );

            foreach ($services as $order => $title) {
                Service::firstOrCreate(
                    ['service_group_id' => $group->id, 'title' => $title],
                    [
                        'slug'          => $group->slug . '--' . \Illuminate\Support\Str::slug($title),
                        'display_order' => $order + 1,
                        'is_active'     => true,
                    ]
                );
            }
        }
    }
}

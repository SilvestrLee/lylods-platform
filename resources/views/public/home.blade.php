<x-layouts.public
    :title="$page->meta_title ?? 'The Lylods Group — Multidisciplinary Professional Services'"
    :description="$page->meta_description"
    :canonical="$page?->canonical_url"
    :robots="$page?->robots"
    :og-image="$page?->ogMedia?->url()">

    {{-- Hero --}}
    @php
        $heroCardOne = $page->heroCards->firstWhere('order', 1);
        $heroCardTwo = $page->heroCards->firstWhere('order', 2);
        $showHeroCardOne = $heroCardOne?->is_visible ?? true;
        $showHeroCardTwo = $heroCardTwo?->is_visible ?? true;

        $heroCardOneIcons = $heroCardOne?->icons->isNotEmpty()
            ? $heroCardOne->icons->map(fn ($item) => [
                'icon' => \App\Support\HeroIconRegistry::path($item->icon),
                'label' => $item->label,
                'tag' => $item->tag,
            ])->all()
            : [
                ['icon' => \App\Support\HeroIconRegistry::path('chart-bar'), 'label' => 'Business growth', 'tag' => 'Strategy'],
                ['icon' => \App\Support\HeroIconRegistry::path('cog'), 'label' => 'Digital solutions', 'tag' => 'Tech'],
                ['icon' => \App\Support\HeroIconRegistry::path('check-circle'), 'label' => 'Operational support', 'tag' => 'Advisory'],
            ];
    @endphp
    <x-sections.hero
        :eyebrow="$page->hero_subtitle"
        :heading="$page->hero_title"
        :description="$page->hero_description"
        :background-image="$page->heroMedia?->url()"
        :primary-cta-label="$page->primary_cta_label"
        :primary-cta-url="$page->primary_cta_url"
        :secondary-cta-label="$page->secondary_cta_label"
        :secondary-cta-url="$page->secondary_cta_url"
        :card-one-image="$showHeroCardOne ? $heroCardOne?->image?->url() : null"
        :card-one-alt="$heroCardOne?->image_alt ?? 'Business advisory'"
        :card-one-label="$heroCardOne?->badge ?? 'Business Advisory'"
        :card-one-rows="$heroCardOneIcons"
        :card-one-cta-label="$heroCardOne?->cta_label ?? 'Learn More'"
        :card-one-cta-url="$heroCardOne?->cta_url ?? (route('services') . '#business-technology')"
        :card-two-image="$showHeroCardTwo ? $heroCardTwo?->image?->url() : null"
        :card-two-alt="$heroCardTwo?->image_alt ?? 'Training and community development'"
        :card-two-label="$heroCardTwo?->badge ?? 'Community Projects'"
        :card-two-title="$heroCardTwo?->title ?? 'Capacity Building'"
        :card-two-description="$heroCardTwo?->description ?? 'Training programmes, project coordination and community initiatives delivered end to end.'"
        :card-two-cta-label="$heroCardTwo?->cta_label ?? 'Explore'"
        :card-two-cta-url="$heroCardTwo?->cta_url ?? (route('services') . '#community-projects')"
    />

    {{-- Stats band --}}
    @php
        $statistics = $page->statistics->isNotEmpty()
            ? $page->statistics->map(fn ($stat) => [
                'label' => $stat->label,
                'value' => $stat->value,
                'caption' => $stat->caption,
            ])->all()
            : [
                ['label' => 'Service Areas', 'value' => '5'],
                ['label' => 'Industry Reach', 'value' => 'Multi-Sector', 'caption' => 'Energy · Infrastructure · Finance · Public'],
                ['label' => 'Delivery Model', 'value' => 'End-to-End', 'caption' => 'Discovery through close-out'],
                ['label' => 'Accountability', 'value' => 'One Partner', 'caption' => 'Across all disciplines'],
            ];
    @endphp
    <x-sections.statistics :items="$statistics" />

    {{-- Discipline identity strip --}}
    <x-sections.discipline-strip
        :eyebrow="$page->discipline_eyebrow ?? 'Our Services'"
        :items="$page->discipline_items ?: [
            'Business, Technology & Digital',
            'Training, Recruitment & Capacity',
            'Governance, Compliance & Data Protection',
            'Property & Development',
            'Community & Project Development',
        ]"
    />

    {{-- Service disciplines strip --}}
    @php
        $services = $page->serviceCards->isNotEmpty()
            ? $page->serviceCards->map(fn ($card) => [
                'href' => $card->href ?? route('services'),
                'image' => $card->image?->url(),
                'alt' => $card->image_alt ?? $card->title,
                'icon' => \App\Support\HeroIconRegistry::path($card->icon) ?? \App\Support\HeroIconRegistry::path('cog'),
                'title' => $card->title,
                'description' => $card->description,
            ])->all()
            : [
                [
                    'href' => route('services') . '#business-technology',
                    'image' => null,
                    'alt' => 'Business Technology and Digital Solutions',
                    'icon' => \App\Support\HeroIconRegistry::path('cog'),
                    'title' => 'Business, Technology and Digital Solutions',
                    'description' => 'Strategy, digital transformation, technology advisory, and business consulting.',
                ],
                [
                    'href' => route('services') . '#training-recruitment',
                    'image' => null,
                    'alt' => 'Training Recruitment and Capacity Building',
                    'icon' => \App\Support\HeroIconRegistry::path('academic-cap'),
                    'title' => 'Training, Recruitment and Capacity Building',
                    'description' => 'Professional development, workforce upskilling, and specialist placement.',
                ],
                [
                    'href' => route('services') . '#compliance-governance',
                    'image' => null,
                    'alt' => 'Governance Compliance and Data Protection',
                    'icon' => \App\Support\HeroIconRegistry::path('check-circle'),
                    'title' => 'Governance, Compliance and Data Protection',
                    'description' => 'Compliance frameworks, policy, audit readiness, and data governance.',
                ],
                [
                    'href' => route('services') . '#property-development',
                    'image' => null,
                    'alt' => 'Property Packaging Facilitation Management and Development',
                    'icon' => \App\Support\HeroIconRegistry::path('building-office'),
                    'title' => 'Property Packaging, Facilitation, Management and Development',
                    'description' => 'Property opportunity coordination, packaging, and development management.',
                ],
                [
                    'href' => route('services') . '#community-projects',
                    'image' => null,
                    'alt' => 'Community and Project Development',
                    'icon' => \App\Support\HeroIconRegistry::path('user-group'),
                    'title' => 'Community and Project Development',
                    'description' => 'Social impact delivery, community project coordination and development support.',
                ],
            ];
    @endphp
    <x-sections.services
        :eyebrow="$page->services_eyebrow ?? 'Professional Services'"
        :heading="$page->services_heading ?? 'A single partner across'"
        :headingBreak="$page->services_heading_break ?? 'multiple disciplines.'"
        :ctaLabel="$page->services_cta_label ?? 'View All Disciplines'"
        :ctaUrl="$page->services_cta_url ?? route('services')"
        :services="$services"
    />

    {{-- How We Engage --}}
    @php
        $engagementSteps = $page->engagementSteps->isNotEmpty()
            ? $page->engagementSteps->values()->map(fn ($step, $index) => [
                'number' => sprintf('%02d', $index + 1),
                'title' => $step->title,
                'description' => $step->description,
                'dark' => $step->is_dark,
            ])->all()
            : [
                ['number' => '01', 'title' => 'Discovery', 'description' => 'We invest time upfront understanding your context, objectives, and constraints — ensuring our engagement is grounded in what actually matters to you.'],
                ['number' => '02', 'title' => 'Scoping', 'description' => 'We define a clear, structured scope of work with measurable milestones, agreed deliverables, and defined lines of accountability before any work begins.'],
                ['number' => '03', 'title' => 'Delivery', 'description' => 'We execute with discipline, keeping clients informed at every stage. Our teams are empowered to make decisions without creating unnecessary escalation or delay.'],
                ['number' => '04', 'title' => 'Review', 'description' => 'We close every engagement with structured review, capturing outcomes against objectives — ensuring continuous improvement and a foundation for future work.', 'dark' => true],
            ];
    @endphp
    <x-sections.how-we-engage
        :eyebrow="$page->engagement_eyebrow ?? 'Our Approach'"
        :heading="$page->engagement_heading ?? 'How we engage with clients.'"
        :description="$page->engagement_description ?? 'Every engagement is structured from first conversation to final deliverable — ensuring clarity, accountability, and measurable progress at every stage.'"
        :steps="$engagementSteps"
    />

    {{-- Industries served --}}
    @php
        $industries = $page->industries->isNotEmpty()
            ? $page->industries->values()->map(fn ($industry, $index) => [
                'number' => sprintf('%02d', $index + 1),
                'title' => $industry->title,
            ])->all()
            : [
                ['number' => '01', 'title' => 'Energy & Utilities'],
                ['number' => '02', 'title' => 'Infrastructure & Civil'],
                ['number' => '03', 'title' => 'Financial Services'],
                ['number' => '04', 'title' => 'Government & Public Sector'],
                ['number' => '05', 'title' => 'Technology & Digital'],
                ['number' => '06', 'title' => 'Oil & Gas / Industrial'],
                ['number' => '07', 'title' => 'Professional Services'],
                ['number' => '08', 'title' => 'Education & Training'],
            ];
    @endphp
    <x-sections.industries
        :eyebrow="$page->industries_eyebrow ?? 'Sectors of Practice'"
        :heading="$page->industries_heading ?? 'Industries We Serve'"
        :ctaLabel="$page->industries_cta_label ?? 'Explore our disciplines →'"
        :ctaUrl="$page->industries_cta_url ?? route('services')"
        :items="$industries"
    />

    {{-- About / values -- split with image --}}
    @php
        $aboutValues = $page->aboutValues->isNotEmpty()
            ? $page->aboutValues->map(fn ($value) => [
                'icon' => \App\Support\HeroIconRegistry::path($value->icon) ?? \App\Support\HeroIconRegistry::path('check-circle'),
                'title' => $value->title,
                'description' => $value->description,
            ])->all()
            : [
                ['icon' => \App\Support\HeroIconRegistry::path('check-circle'), 'title' => 'Integrity', 'description' => 'Transparent, ethical conduct in every engagement.'],
                ['icon' => 'M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z', 'title' => 'Excellence', 'description' => 'Rigorous professional standards on every deliverable.'],
                ['icon' => \App\Support\HeroIconRegistry::path('chart-bar'), 'title' => 'Delivery', 'description' => 'Measurable results and sustainable client outcomes.'],
                ['icon' => 'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z', 'title' => 'Partnership', 'description' => 'Long-term relationships built on shared objectives.'],
            ];
    @endphp
    <x-sections.about-values
        :eyebrow="$page->about_eyebrow ?? 'About The Lylods Group'"
        :heading="$page->about_heading ?? 'Professional services built on expertise and integrity.'"
        :description="$page->about_description ?? 'The Lylods Group is a multidisciplinary professional services organisation working across business, technology, training, compliance, property and community development. We work with clients who need a capable, accountable partner across multiple disciplines.'"
        :image="$page->aboutMedia?->url()"
        :image-alt="$page->about_media_alt ?? 'The Lylods Group — professionals collaborating'"
        :values="$aboutValues"
        :ctaLabel="$page->about_cta_label ?? 'About The Group'"
        :ctaUrl="$page->about_cta_url ?? route('about')"
    />

    {{-- Why Clients Work With Us --}}
    @php
        $whyChooseUsItems = $page->whyChooseUsCards->isNotEmpty()
            ? $page->whyChooseUsCards->map(fn ($card) => [
                'icon' => \App\Support\HeroIconRegistry::path($card->icon) ?? \App\Support\HeroIconRegistry::path('check-circle'),
                'title' => $card->title,
                'description' => $card->description,
                'dark' => $card->is_dark,
            ])->all()
            : [
                [
                    'icon' => \App\Support\HeroIconRegistry::path('check-circle'),
                    'title' => 'Practical Delivery',
                    'description' => 'From planning to execution — we stay engaged across the full lifecycle, not just the advisory phase.',
                ],
                [
                    'icon' => 'M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z',
                    'title' => 'Multi-Sector Experience',
                    'description' => 'Experience across business, public sector, technology, property and community contexts informs how we approach every engagement.',
                ],
                [
                    'icon' => 'M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z',
                    'title' => 'Clear Communication',
                    'description' => 'Structured coordination and honest reporting — clients are never left guessing about progress, priorities, or next steps.',
                ],
                [
                    'icon' => 'M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z',
                    'title' => 'Tailored Support',
                    'description' => 'We shape our approach to fit your situation — no generic frameworks pushed onto problems they were not built to solve.',
                ],
                [
                    'icon' => \App\Support\HeroIconRegistry::path('user-group'),
                    'title' => 'Strong Professional Network',
                    'description' => 'Where specialist or regulated input is needed, we introduce clients to appropriate, qualified independent professionals.',
                ],
                [
                    'icon' => \App\Support\HeroIconRegistry::path('chart-bar'),
                    'title' => 'Measurable Outcomes',
                    'description' => 'We focus on what can be measured, tracked, and evidenced — so you know the value of every engagement.',
                    'dark' => true,
                ],
            ];
    @endphp
    <x-sections.why-choose-us
        :eyebrow="$page->why_choose_us_eyebrow ?? 'Why Clients Work With Us'"
        :heading="$page->why_choose_us_heading ?? 'What makes the difference.'"
        :description="$page->why_choose_us_description ?? 'Our clients come back because of how we work — not just what we deliver.'"
        :ctaLabel="$page->why_choose_us_cta_label ?? 'Discuss Your Project'"
        :ctaUrl="$page->why_choose_us_cta_url ?? route('contact')"
        :items="$whyChooseUsItems"
    />

    {{-- Testimonials --}}
    <x-sections.testimonials
        eyebrow="Client Testimonials"
        heading="What our clients say."
        empty-description="Client feedback will be added here as testimonials are collected and approved."
        :testimonials="$testimonials"
    />

    {{-- Partners and accreditations --}}
    <x-sections.partners
        eyebrow="Partners, Clients & Accreditations"
        :organisations="$organisations"
        empty-description="Partner logos and professional accreditations will be displayed here once approved for publication."
    />

    {{-- Work With Us CTA --}}
    <x-sections.work-with-us
        :eyebrow="$page->wwu_eyebrow ?? 'Work With Us'"
        :heading="$page->wwu_heading ?? 'Ready to discuss a requirement?'"
        :description="$page->wwu_description ?? 'Whether you need specialist advisory, engineering delivery, technology support, compliance guidance, or workforce solutions — we welcome your enquiry. Our team will respond within two business days.'"
        :primary-cta-label="$page->wwu_primary_cta_label ?? 'Discuss a Requirement'"
        :primary-cta-url="$page->wwu_primary_cta_url ?? route('contact')"
        :secondary-cta-label="$page->wwu_secondary_cta_label ?? 'View Our Services'"
        :secondary-cta-url="$page->wwu_secondary_cta_url ?? route('services')"
        :investor-note="$page->wwu_investor_note ?? 'For investor access, please use the'"
        :investor-cta-label="$page->wwu_investor_cta_label ?? 'investor portal login'"
        :investor-cta-url="$page->wwu_investor_cta_url ?? route('login')"
    />

</x-layouts.public>

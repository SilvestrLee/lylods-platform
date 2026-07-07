<x-layouts.public
    :title="$page->meta_title ?? 'The Lylods Group — Multidisciplinary Professional Services'"
    :description="$page->meta_description"
    :canonical="$page?->canonical_url"
    :robots="$page?->robots"
    :og-image="$page?->ogMedia?->url()">

    {{-- Hero --}}
    {{-- CMS: replace image src with dynamic hero image field; hero->card_01_image, hero->card_02_image --}}
    <x-sections.hero
        :eyebrow="$page->hero_subtitle"
        :heading="$page->hero_title"
        :description="$page->hero_description"
        background-image="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1800&q=80"
        :primary-cta-label="$page->primary_cta_label"
        :primary-cta-url="$page->primary_cta_url"
        :secondary-cta-label="$page->secondary_cta_label"
        :secondary-cta-url="$page->secondary_cta_url"
        card-one-image="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=600&q=80"
        card-one-alt="Business advisory"
        card-one-label="Business Advisory"
        :card-one-rows="[
            ['icon' => 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z', 'label' => 'Business growth', 'tag' => 'Strategy'],
            ['icon' => 'M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z', 'label' => 'Digital solutions', 'tag' => 'Tech'],
            ['icon' => 'M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z', 'label' => 'Operational support', 'tag' => 'Advisory'],
        ]"
        card-one-cta-label="Learn More"
        :card-one-cta-url="route('services') . '#business-technology'"
        card-two-image="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=600&q=80"
        card-two-alt="Training and community development"
        card-two-label="Community Projects"
        card-two-title="Capacity Building"
        card-two-description="Training programmes, project coordination and community initiatives delivered end to end."
        card-two-cta-label="Explore"
        :card-two-cta-url="route('services') . '#community-projects'"
    />

    {{-- Stats band --}}
    <x-sections.statistics :items="[
        ['label' => 'Service Areas', 'value' => '5'],
        ['label' => 'Industry Reach', 'value' => 'Multi-Sector', 'caption' => 'Energy · Infrastructure · Finance · Public'],
        ['label' => 'Delivery Model', 'value' => 'End-to-End', 'caption' => 'Discovery through close-out'],
        ['label' => 'Accountability', 'value' => 'One Partner', 'caption' => 'Across all disciplines'],
    ]" />

    {{-- Discipline identity strip --}}
    <x-sections.discipline-strip
        eyebrow="Our Services"
        :items="[
            'Business, Technology & Digital',
            'Training, Recruitment & Capacity',
            'Governance, Compliance & Data Protection',
            'Property & Development',
            'Community & Project Development',
        ]"
    />

    {{-- Service disciplines strip --}}
    {{-- CMS: each card image will be service->thumbnail --}}
    <x-sections.services
        eyebrow="Professional Services"
        heading="A single partner across"
        headingBreak="multiple disciplines."
        ctaLabel="View All Disciplines"
        :ctaUrl="route('services')"
        :services="[
            [
                'href' => route('services') . '#business-technology',
                'image' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80',
                'alt' => 'Business Technology and Digital Solutions',
                'icon' => 'M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z',
                'title' => 'Business, Technology and Digital Solutions',
                'description' => 'Strategy, digital transformation, technology advisory, and business consulting.',
            ],
            [
                'href' => route('services') . '#training-recruitment',
                'image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=600&q=80',
                'alt' => 'Training Recruitment and Capacity Building',
                'icon' => 'M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.627 48.627 0 0 1 12 20.904a48.627 48.627 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.57 50.57 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5',
                'title' => 'Training, Recruitment and Capacity Building',
                'description' => 'Professional development, workforce upskilling, and specialist placement.',
            ],
            [
                'href' => route('services') . '#compliance-governance',
                'image' => 'https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?auto=format&fit=crop&w=600&q=80',
                'alt' => 'Governance Compliance and Data Protection',
                'icon' => 'M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z',
                'title' => 'Governance, Compliance and Data Protection',
                'description' => 'Compliance frameworks, policy, audit readiness, and data governance.',
            ],
            [
                'href' => route('services') . '#property-development',
                'image' => 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=600&q=80',
                'alt' => 'Property Packaging Facilitation Management and Development',
                'icon' => 'M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21',
                'title' => 'Property Packaging, Facilitation, Management and Development',
                'description' => 'Property opportunity coordination, packaging, and development management.',
            ],
            [
                'href' => route('services') . '#community-projects',
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=600&q=80',
                'alt' => 'Community and Project Development',
                'icon' => 'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z',
                'title' => 'Community and Project Development',
                'description' => 'Social impact delivery, community project coordination and development support.',
            ],
        ]"
    />

    {{-- How We Engage --}}
    <x-sections.how-we-engage
        eyebrow="Our Approach"
        heading="How we engage with clients."
        description="Every engagement is structured from first conversation to final deliverable — ensuring clarity, accountability, and measurable progress at every stage."
        :steps="[
            ['number' => '01', 'title' => 'Discovery', 'description' => 'We invest time upfront understanding your context, objectives, and constraints — ensuring our engagement is grounded in what actually matters to you.'],
            ['number' => '02', 'title' => 'Scoping', 'description' => 'We define a clear, structured scope of work with measurable milestones, agreed deliverables, and defined lines of accountability before any work begins.'],
            ['number' => '03', 'title' => 'Delivery', 'description' => 'We execute with discipline, keeping clients informed at every stage. Our teams are empowered to make decisions without creating unnecessary escalation or delay.'],
            ['number' => '04', 'title' => 'Review', 'description' => 'We close every engagement with structured review, capturing outcomes against objectives — ensuring continuous improvement and a foundation for future work.', 'dark' => true],
        ]"
    />

    {{-- Industries served --}}
    <x-sections.industries
        eyebrow="Sectors of Practice"
        heading="Industries We Serve"
        ctaLabel="Explore our disciplines →"
        :ctaUrl="route('services')"
        :items="[
            ['number' => '01', 'title' => 'Energy & Utilities'],
            ['number' => '02', 'title' => 'Infrastructure & Civil'],
            ['number' => '03', 'title' => 'Financial Services'],
            ['number' => '04', 'title' => 'Government & Public Sector'],
            ['number' => '05', 'title' => 'Technology & Digital'],
            ['number' => '06', 'title' => 'Oil & Gas / Industrial'],
            ['number' => '07', 'title' => 'Professional Services'],
            ['number' => '08', 'title' => 'Education & Training'],
        ]"
    />

    {{-- About / values -- split with image --}}
    {{-- CMS: replace with about->image --}}
    <x-sections.about-values
        eyebrow="About The Lylods Group"
        heading="Professional services built on expertise and integrity."
        description="The Lylods Group is a multidisciplinary professional services organisation working across business, technology, training, compliance, property and community development. We work with clients who need a capable, accountable partner across multiple disciplines."
        image="https://images.unsplash.com/photo-1560472355-536de3962603?auto=format&fit=crop&w=900&q=80"
        image-alt="The Lylods Group — professionals collaborating"
        :values="[
            ['icon' => 'M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z', 'title' => 'Integrity', 'description' => 'Transparent, ethical conduct in every engagement.'],
            ['icon' => 'M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z', 'title' => 'Excellence', 'description' => 'Rigorous professional standards on every deliverable.'],
            ['icon' => 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z', 'title' => 'Delivery', 'description' => 'Measurable results and sustainable client outcomes.'],
            ['icon' => 'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z', 'title' => 'Partnership', 'description' => 'Long-term relationships built on shared objectives.'],
        ]"
        ctaLabel="About The Group"
        :ctaUrl="route('about')"
    />

    {{-- Why Clients Work With Us --}}
    <x-sections.why-choose-us
        eyebrow="Why Clients Work With Us"
        heading="What makes the difference."
        description="Our clients come back because of how we work — not just what we deliver."
        ctaLabel="Discuss Your Project"
        :ctaUrl="route('contact')"
        :items="[
            [
                'icon' => 'M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z',
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
                'icon' => 'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z',
                'title' => 'Strong Professional Network',
                'description' => 'Where specialist or regulated input is needed, we introduce clients to appropriate, qualified independent professionals.',
            ],
            [
                'icon' => 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z',
                'title' => 'Measurable Outcomes',
                'description' => 'We focus on what can be measured, tracked, and evidenced — so you know the value of every engagement.',
                'dark' => true,
            ],
        ]"
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
        eyebrow="Work With Us"
        heading="Ready to discuss a requirement?"
        description="Whether you need specialist advisory, engineering delivery, technology support, compliance guidance, or workforce solutions — we welcome your enquiry. Our team will respond within two business days."
        primary-cta-label="Discuss a Requirement"
        :primary-cta-url="route('contact')"
        secondary-cta-label="View Our Services"
        :secondary-cta-url="route('services')"
        investor-note="For investor access, please use the"
        investor-cta-label="investor portal login"
        :investor-cta-url="route('login')"
    />

</x-layouts.public>

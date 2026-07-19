@inject('cmsSettingSvc', 'App\Services\CMS\SiteSettingService')
@inject('cmsFooterSvc', 'App\Services\CMS\FooterService')
@inject('structuredDataSvc', 'App\Services\CMS\StructuredDataService')
@props([
    'title'         => null,
    'description'   => null,
    'canonical'     => null,
    'robots'        => null,
    'ogImage'       => null,
    'schemaContext' => [],
])
@php
    try {
        $cmsSite = $cmsSettingSvc->current();
    } catch (\Throwable $e) {
        $cmsSite = null;
    }
    try {
        $cmsFooterLinks  = $cmsFooterSvc->linksByGroup();
        $cmsSocialLinks  = $cmsFooterSvc->socialLinks();
    } catch (\Throwable $e) {
        $cmsFooterLinks  = collect();
        $cmsSocialLinks  = collect();
    }

    // --- Metadata resolution ---
    $siteName      = $cmsSite?->site_name ?? "The Lylod's Group";
    $seoTitle      = filled($title) ? $title : (filled($cmsSite?->default_meta_title) ? $cmsSite->default_meta_title : "The Lylod's Group");
    $seoDesc       = filled($description) ? $description : ($cmsSite?->default_meta_description ?: null);
    $seoCanonical  = filled($canonical) ? $canonical : request()->url();
    $seoRobots     = filled($robots) ? $robots : 'index,follow';
    $seoOgImage    = filled($ogImage) ? $ogImage : ($cmsSite?->defaultOgImage?->url() ?? null);
    // --- End metadata resolution ---

    $footerText    = $cmsSite?->footer_text ?? 'A UK-based business, technology, property and community development organisation helping clients move from ideas to practical results.';
    $footerCopy    = $cmsSite?->copyright ?? '© ' . date('Y') . ' The Lylods Group. All rights reserved.';

    // --- Footer navigation groups (Phase 17.4 premium footer) ---
    $footerCompany    = $cmsFooterLinks->get('company', collect());
    $footerServices   = $cmsFooterLinks->get('services', collect());
    $footerIndustries = $cmsFooterLinks->get('industries', collect());
    $footerInsights   = $cmsFooterLinks->get('insights', collect());
    $footerSupport    = $cmsFooterLinks->get('support', collect());
    $footerPortalAll  = $cmsFooterLinks->get('portal', collect());
    $portalHighlight  = $footerPortalAll->first();
    $portalExtraLinks = $portalHighlight ? $footerPortalAll->slice(1) : collect();
    $footerLinkedIn   = $cmsSocialLinks->firstWhere('platform', 'linkedin');
    $footerRegisteredStatement = 'The Lylods Group is a professional services organisation registered in the United Kingdom.';
    $footerLocation   = $cmsSite?->address
        ? trim(collect(preg_split('/\r\n|\r|\n/', $cmsSite->address))->filter()->last())
        : 'United Kingdom';
    // --- End footer navigation groups ---

    // --- Structured Data ---
    try {
        $ldJson = $structuredDataSvc->buildJson($cmsSite, $cmsSocialLinks, $seoTitle, $seoDesc, $seoCanonical, $schemaContext);
    } catch (\Throwable $e) {
        $ldJson = null;
    }
    // --- End Structured Data ---
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $seoTitle }}</title>
    @if($seoDesc)
    <meta name="description" content="{{ $seoDesc }}">
    @endif
    <meta name="robots" content="{{ $seoRobots }}">
    <link rel="canonical" href="{{ $seoCanonical }}">
    @if($cmsSite?->favicon)
    <link rel="icon" href="{{ $cmsSite->favicon->url() }}">
    @endif

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $seoCanonical }}">
    <meta property="og:title" content="{{ $seoTitle }}">
    @if($seoDesc)
    <meta property="og:description" content="{{ $seoDesc }}">
    @endif
    @if($seoOgImage)
    <meta property="og:image" content="{{ $seoOgImage }}">
    @endif

    @if($ldJson)
    <script type="application/ld+json">{!! $ldJson !!}</script>
    @endif

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800|playfair-display:600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f7f3ea] text-[#172033] antialiased">

    <header x-data="{ open: false, openMenu: null, menuTimer: null, mobileServices: false, mobileAbout: false, mobileIndustries: false, mobileInsights: false, scrolled: false }"
            @scroll.window="scrolled = window.scrollY > 8"
            @keydown.escape.window="clearTimeout(menuTimer); openMenu = null; open = false"
            :class="scrolled ? 'shadow-[0_2px_20px_rgba(7,23,47,0.08)]' : ''"
            class="sticky top-0 z-50 border-b border-[#e6e8ee] bg-white/95 backdrop-blur-xl transition-shadow duration-300">
        <div class="mx-auto flex max-w-[1440px] items-center justify-between px-6 py-4">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center font-serif text-xl font-extrabold tracking-tight text-[#07172f]">
                @if($cmsSite?->logo)
                    <img src="{{ $cmsSite->logo->url() }}" alt="{{ $siteName }}" class="h-12 w-auto object-contain">
                @else
                    {{ $siteName }}
                @endif
            </a>

            {{-- Desktop navigation — position:relative makes it the containing block for mega panels --}}
            <nav class="relative hidden items-center gap-1 lg:flex" aria-label="Main navigation">

                <a href="{{ route('home') }}"
                   class="rounded-full px-4 py-2 text-sm font-semibold transition-colors duration-200 hover:bg-[#f7f3ea] hover:text-[#07172f] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d] {{ request()->routeIs('home') ? 'bg-[#f7f3ea] text-[#07172f]' : 'text-[#172033]' }}">
                    Home
                </a>

                {{-- About mega menu --}}
                <div @mouseenter="clearTimeout(menuTimer); menuTimer = setTimeout(() => openMenu = 'about', 150)"
                     @mouseleave="clearTimeout(menuTimer); menuTimer = setTimeout(() => openMenu = null, 300)"
                     @focusout="if (! $el.contains($event.relatedTarget)) { clearTimeout(menuTimer); openMenu = null }">
                    <button class="inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-sm font-semibold transition-colors duration-200 hover:bg-[#f7f3ea] hover:text-[#07172f] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d] {{ request()->routeIs('about') ? 'bg-[#f7f3ea] text-[#07172f]' : 'text-[#172033]' }}"
                            aria-haspopup="true"
                            :aria-expanded="openMenu === 'about'"
                            @click="openMenu = openMenu === 'about' ? null : 'about'">
                        About
                        <svg class="h-3.5 w-3.5 transition-transform duration-150" :class="openMenu === 'about' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    {{-- About mega panel — centered against nav width --}}
                    <div x-show="openMenu === 'about'"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="absolute left-1/2 top-full mt-3 w-[680px] -translate-x-1/2 rounded-[28px] border border-[#e7e1d4] bg-white/95 px-10 py-9 shadow-[0_35px_80px_rgba(7,23,47,.18)] backdrop-blur-xl"
                         style="display:none;">
                        <div class="grid grid-cols-[280px_220px] gap-8">
                            {{-- Column 1 --}}
                            <div>
                                <h2 class="font-serif text-2xl font-bold leading-tight text-[#07172f]">About The Lylod's Group</h2>
                                <p class="mt-3 text-sm leading-7 text-slate-600">
                                    Learn about our approach, sectors,<br>experience and commitment to delivering<br>practical outcomes.
                                </p>
                                <a href="{{ route('about') }}"
                                   class="mt-3 inline-flex items-center rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-bold text-white transition-colors duration-200 hover:bg-[#123f8c] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">
                                    About Us →
                                </a>
                            </div>
                            {{-- Column 2 --}}
                            <div class="space-y-3">
                                <a href="{{ route('careers') }}" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Careers &amp; Placements</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Services mega menu --}}
                <div @mouseenter="clearTimeout(menuTimer); menuTimer = setTimeout(() => openMenu = 'services', 150)"
                     @mouseleave="clearTimeout(menuTimer); menuTimer = setTimeout(() => openMenu = null, 300)"
                     @focusout="if (! $el.contains($event.relatedTarget)) { clearTimeout(menuTimer); openMenu = null }">
                    <button class="inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-sm font-semibold transition-colors duration-200 hover:bg-[#f7f3ea] hover:text-[#07172f] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d] {{ request()->routeIs('services') ? 'bg-[#f7f3ea] text-[#07172f]' : 'text-[#172033]' }}"
                            aria-haspopup="true"
                            :aria-expanded="openMenu === 'services'"
                            @click="openMenu = openMenu === 'services' ? null : 'services'">
                        Services
                        <svg class="h-3.5 w-3.5 transition-transform duration-150" :class="openMenu === 'services' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    {{-- Services mega panel — centered against nav width --}}
                    <div x-show="openMenu === 'services'"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="absolute left-1/2 top-full mt-3 w-[960px] -translate-x-1/2 rounded-[28px] border border-[#e7e1d4] bg-white/95 px-10 py-9 shadow-[0_35px_80px_rgba(7,23,47,.18)] backdrop-blur-xl"
                         style="display:none;">
                        <div class="grid grid-cols-[300px_1fr_1fr] gap-8">

                            {{-- Column 1: Intro (320px) --}}
                            <div>
                                <p class="text-xs uppercase tracking-[0.18em] text-[#c9a24d]">OUR SERVICES</p>
                                <h2 class="mt-3 font-serif text-[2.25rem] font-bold leading-tight text-[#07172f]">Business, Technology &amp;<br>Professional Support</h2>
                                <p class="mt-3 text-sm leading-7 text-slate-600">Helping organisations build stronger systems, develop people, improve governance and coordinate practical projects.</p>
                                <a href="{{ route('services') }}"
                                   class="mt-6 inline-flex items-center rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-bold text-white transition-colors duration-200 hover:bg-[#123f8c] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">
                                    Explore Services →
                                </a>
                                <a href="{{ route('industries') }}"
                                   class="mt-3 block text-sm font-semibold text-[#123f8c] hover:underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">
                                    Browse by industry →
                                </a>
                            </div>

                            {{-- Column 2: Business & Technology + Training & Recruitment --}}
                            <div class="space-y-6">
                                <div>
                                    <p class="text-xs uppercase tracking-[0.18em] text-[#c9a24d]">Business &amp; Technology</p>
                                    <div class="mt-3 space-y-2">
                                        <a href="{{ route('services') }}#business-technology" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Business Consultancy</a>
                                        <a href="{{ route('services') }}#business-technology" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Software &amp; Systems Development</a>
                                        <a href="{{ route('services') }}#business-technology" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Digital Transformation</a>
                                        <a href="{{ route('services') }}#business-technology" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Data Solutions</a>
                                        <a href="{{ route('services') }}#business-technology" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Cybersecurity Awareness</a>
                                        <a href="{{ route('services') }}#business-technology" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Process Improvement</a>
                                        <a href="{{ route('services') }}#business-technology" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Automation Support</a>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-xs uppercase tracking-[0.18em] text-[#c9a24d]">Training &amp; Recruitment</p>
                                    <div class="mt-3 space-y-2">
                                        <a href="{{ route('services') }}#training-recruitment" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Professional Training</a>
                                        <a href="{{ route('services') }}#training-recruitment" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Leadership Development</a>
                                        <a href="{{ route('services') }}#training-recruitment" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Recruitment Services</a>
                                        <a href="{{ route('services') }}#training-recruitment" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Employability Support</a>
                                        <a href="{{ route('services') }}#training-recruitment" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Tailored Workshops</a>
                                    </div>
                                </div>
                            </div>

                            {{-- Column 3: Compliance + Property + Community --}}
                            <div class="space-y-6">
                                <div>
                                    <p class="text-xs uppercase tracking-[0.18em] text-[#c9a24d]">Compliance &amp; Governance</p>
                                    <div class="mt-3 space-y-2">
                                        <a href="{{ route('services') }}#compliance-governance" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">GDPR Support</a>
                                        <a href="{{ route('services') }}#compliance-governance" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Policy Development</a>
                                        <a href="{{ route('services') }}#compliance-governance" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Governance Frameworks</a>
                                        <a href="{{ route('services') }}#compliance-governance" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Compliance Documentation</a>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-xs uppercase tracking-[0.18em] text-[#c9a24d]">Property &amp; Development</p>
                                    <div class="mt-3 space-y-2">
                                        <a href="{{ route('property') }}" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Property Packaging</a>
                                        <a href="{{ route('property') }}" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Property Facilitation</a>
                                        <a href="{{ route('property') }}" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Property Management</a>
                                        <a href="{{ route('property') }}" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Development Support</a>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-xs uppercase tracking-[0.18em] text-[#c9a24d]">Community Projects</p>
                                    <div class="mt-3 space-y-2">
                                        <a href="{{ route('community-projects') }}" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Community Programmes</a>
                                        <a href="{{ route('community-projects') }}" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Project Coordination</a>
                                        <a href="{{ route('community-projects') }}" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Stakeholder Engagement</a>
                                        <a href="{{ route('community-projects') }}" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Capacity Building</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- Industries mega menu --}}
                <div @mouseenter="clearTimeout(menuTimer); menuTimer = setTimeout(() => openMenu = 'industries', 150)"
                     @mouseleave="clearTimeout(menuTimer); menuTimer = setTimeout(() => openMenu = null, 300)"
                     @focusout="if (! $el.contains($event.relatedTarget)) { clearTimeout(menuTimer); openMenu = null }">
                    <button class="inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-sm font-semibold transition-colors duration-200 hover:bg-[#f7f3ea] hover:text-[#07172f] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d] {{ request()->routeIs('industries') ? 'bg-[#f7f3ea] text-[#07172f]' : 'text-[#172033]' }}"
                            aria-haspopup="true"
                            :aria-expanded="openMenu === 'industries'"
                            @click="openMenu = openMenu === 'industries' ? null : 'industries'">
                        Industries
                        <svg class="h-3.5 w-3.5 transition-transform duration-150" :class="openMenu === 'industries' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    {{-- Industries mega panel — single column, centered against nav width --}}
                    <div x-show="openMenu === 'industries'"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="absolute left-1/2 top-full mt-3 w-[420px] -translate-x-1/2 rounded-[28px] border border-[#e7e1d4] bg-white/95 px-10 py-9 shadow-[0_35px_80px_rgba(7,23,47,.18)] backdrop-blur-xl"
                         style="display:none;">
                        <p class="text-xs uppercase tracking-[0.18em] text-[#c9a24d]">Sectors of Practice</p>
                        <h2 class="mt-3 font-serif text-2xl font-bold leading-tight text-[#07172f]">Industries We Serve</h2>
                        <p class="mt-3 text-sm leading-7 text-slate-600">Energy, infrastructure, financial services, government, technology and more — sector-specific experience across every discipline we deliver.</p>
                        <a href="{{ route('industries') }}"
                           class="mt-6 inline-flex items-center rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-bold text-white transition-colors duration-200 hover:bg-[#123f8c] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">
                            Explore Industries →
                        </a>
                        <a href="{{ route('services') }}"
                           class="mt-3 block text-sm font-semibold text-[#123f8c] hover:underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">
                            Browse by service →
                        </a>
                    </div>
                </div>

                {{-- Insights mega menu — absorbs Case Studies per Navigation Governance v1.0 §3 --}}
                <div @mouseenter="clearTimeout(menuTimer); menuTimer = setTimeout(() => openMenu = 'insights', 150)"
                     @mouseleave="clearTimeout(menuTimer); menuTimer = setTimeout(() => openMenu = null, 300)"
                     @focusout="if (! $el.contains($event.relatedTarget)) { clearTimeout(menuTimer); openMenu = null }">
                    <button class="inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-sm font-semibold transition-colors duration-200 hover:bg-[#f7f3ea] hover:text-[#07172f] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d] {{ request()->routeIs('insights') || request()->routeIs('insight') || request()->routeIs('case-studies') || request()->routeIs('case-study') ? 'bg-[#f7f3ea] text-[#07172f]' : 'text-[#172033]' }}"
                            aria-haspopup="true"
                            :aria-expanded="openMenu === 'insights'"
                            @click="openMenu = openMenu === 'insights' ? null : 'insights'">
                        Insights
                        <svg class="h-3.5 w-3.5 transition-transform duration-150" :class="openMenu === 'insights' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    {{-- Insights mega panel — single column, centered against nav width --}}
                    <div x-show="openMenu === 'insights'"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-2"
                         class="absolute left-1/2 top-full mt-3 w-[420px] -translate-x-1/2 rounded-[28px] border border-[#e7e1d4] bg-white/95 px-10 py-9 shadow-[0_35px_80px_rgba(7,23,47,.18)] backdrop-blur-xl"
                         style="display:none;">
                        <p class="text-xs uppercase tracking-[0.18em] text-[#c9a24d]">Knowledge</p>
                        <h2 class="mt-3 font-serif text-2xl font-bold leading-tight text-[#07172f]">Insights &amp; Case Studies</h2>
                        <p class="mt-3 text-sm leading-7 text-slate-600">Perspectives, articles and real client outcomes from across our service areas.</p>
                        <a href="{{ route('insights') }}"
                           class="mt-6 inline-flex items-center rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-bold text-white transition-colors duration-200 hover:bg-[#123f8c] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">
                            View All Insights →
                        </a>
                        <a href="{{ route('case-studies') }}"
                           class="mt-3 block text-sm font-semibold text-[#123f8c] hover:underline focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">
                            Case Studies →
                        </a>
                    </div>
                </div>

                <a href="{{ route('contact') }}"
                   class="rounded-full px-4 py-2 text-sm font-semibold transition-colors duration-200 hover:bg-[#f7f3ea] hover:text-[#07172f] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d] {{ request()->routeIs('contact') ? 'bg-[#f7f3ea] text-[#07172f]' : 'text-[#172033]' }}">
                    Contact
                </a>
            </nav>

            {{-- Client Portal CTA + hamburger --}}
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                       class="hidden rounded-full bg-[#c9a24d] px-5 py-2.5 text-sm font-bold text-[#07172f] shadow-sm hover:bg-[#d8b765] lg:inline-flex">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="hidden rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-bold text-white transition-all duration-300 hover:bg-[#123f8c] lg:inline-flex">
                        Client Portal
                    </a>
                @endauth

                <button type="button" @click="open = !open"
                        class="inline-flex items-center justify-center rounded-xl border border-[#e6e8ee] p-2 text-[#07172f] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d] lg:hidden"
                        aria-label="Toggle navigation"
                        :aria-expanded="open">
                    <svg x-show="!open" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16"/></svg>
                    <svg x-show="open" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display:none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        {{-- Mobile drawer — unchanged --}}
        <div x-show="open" x-transition class="border-t border-[#e6e8ee] bg-white lg:hidden" style="display:none;">
            <div class="mx-auto flex max-w-[1440px] flex-col gap-0.5 px-6 py-4 text-sm font-semibold">
                <a href="{{ route('home') }}" @click="open = false" class="rounded-xl px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">Home</a>

                {{-- Mobile About accordion --}}
                <div>
                    <button @click="mobileAbout = !mobileAbout"
                            class="flex w-full items-center justify-between rounded-xl px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">
                        About
                        <svg class="h-4 w-4 transition-transform duration-150" :class="mobileAbout ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="mobileAbout" class="ml-3 mt-0.5 space-y-0.5 border-l border-[#e6e8ee] pl-3" style="display:none;">
                        <a href="{{ route('careers') }}" @click="open = false" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Careers</a>
                    </div>
                </div>

                {{-- Mobile Services accordion --}}
                <div>
                    <button @click="mobileServices = !mobileServices"
                            class="flex w-full items-center justify-between rounded-xl px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">
                        Services
                        <svg class="h-4 w-4 transition-transform duration-150" :class="mobileServices ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="mobileServices" class="ml-3 mt-0.5 space-y-0.5 border-l border-[#e6e8ee] pl-3" style="display:none;">
                        <a href="{{ route('services') }}" @click="open = false" class="block rounded-xl px-3 py-2.5 text-sm font-semibold text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">All Services</a>
                        <a href="{{ route('services') }}#business-technology" @click="open = false" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Business &amp; Technology</a>
                        <a href="{{ route('services') }}#training-recruitment" @click="open = false" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Training &amp; Recruitment</a>
                        <a href="{{ route('services') }}#compliance-governance" @click="open = false" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Compliance</a>
                        <a href="{{ route('property') }}" @click="open = false" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Property</a>
                        <a href="{{ route('community-projects') }}" @click="open = false" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Community</a>
                    </div>
                </div>

                {{-- Mobile Industries accordion --}}
                <div>
                    <button @click="mobileIndustries = !mobileIndustries"
                            class="flex w-full items-center justify-between rounded-xl px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">
                        Industries
                        <svg class="h-4 w-4 transition-transform duration-150" :class="mobileIndustries ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="mobileIndustries" class="ml-3 mt-0.5 space-y-0.5 border-l border-[#e6e8ee] pl-3" style="display:none;">
                        <a href="{{ route('industries') }}" @click="open = false" class="block rounded-xl px-3 py-2.5 text-sm font-semibold text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Explore Industries</a>
                        <a href="{{ route('services') }}" @click="open = false" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Browse by service</a>
                    </div>
                </div>

                {{-- Mobile Insights accordion --}}
                <div>
                    <button @click="mobileInsights = !mobileInsights"
                            class="flex w-full items-center justify-between rounded-xl px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">
                        Insights
                        <svg class="h-4 w-4 transition-transform duration-150" :class="mobileInsights ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="mobileInsights" class="ml-3 mt-0.5 space-y-0.5 border-l border-[#e6e8ee] pl-3" style="display:none;">
                        <a href="{{ route('insights') }}" @click="open = false" class="block rounded-xl px-3 py-2.5 text-sm font-semibold text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">View All Insights</a>
                        <a href="{{ route('case-studies') }}" @click="open = false" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Case Studies</a>
                    </div>
                </div>

                <a href="{{ route('contact') }}" @click="open = false" class="rounded-xl px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">Contact</a>
                <div class="mt-3 border-t border-[#e6e8ee] pt-3">
                    @auth
                        <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="block rounded-full bg-[#c9a24d] px-4 py-3 text-center font-bold text-[#07172f]">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block rounded-full bg-[#07172f] px-4 py-3 text-center font-bold text-white transition-all duration-300 hover:bg-[#123f8c]">Client Portal</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main>{{ $slot }}</main>

    <footer class="bg-[#07172f] text-white">

        {{-- Layer 1 — Brand and Primary Action --}}
        <div class="border-b border-white/10">
            <div class="mx-auto max-w-[1440px] px-6 py-16 lg:py-20">
                <div class="grid gap-12 lg:grid-cols-[1.15fr_0.85fr] lg:items-start lg:gap-16">

                    {{-- Brand --}}
                    <div class="max-w-xl">
                        @if($cmsSite?->logoFooter)
                            <img src="{{ $cmsSite->logoFooter->url() }}" alt="{{ $siteName }}" class="h-10 w-auto object-contain">
                        @else
                            <span class="font-serif text-2xl font-bold text-white">{{ $siteName }}</span>
                        @endif

                        <p class="mt-6 max-w-lg font-serif text-xl leading-9 text-slate-200 sm:text-2xl sm:leading-10">
                            {{ $footerText }}
                        </p>

                        <p class="mt-6 text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">
                            United Kingdom
                        </p>

                        @if ($cmsSocialLinks->isNotEmpty())
                        <div class="mt-7 flex gap-3">
                            @foreach ($cmsSocialLinks as $social)
                            <a href="{{ $social->url }}" aria-label="{{ ucfirst($social->platform) }}"
                               class="flex h-10 w-10 items-center justify-center rounded-full border border-white/20 text-slate-400 transition-colors duration-200 hover:border-[#c9a24d] hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">
                                @switch($social->platform)
                                    @case('linkedin')
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                        @break
                                    @case('x')
                                    @case('twitter')
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                        @break
                                    @case('facebook')
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                        @break
                                    @case('instagram')
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/></svg>
                                        @break
                                    @case('youtube')
                                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.495 6.205a3.007 3.007 0 0 0-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 0 0 .527 6.205a31.247 31.247 0 0 0-.522 5.805 31.247 31.247 0 0 0 .522 5.783 3.007 3.007 0 0 0 2.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 0 0 2.088-2.088 31.247 31.247 0 0 0 .5-5.783 31.247 31.247 0 0 0-.5-5.805zM9.609 15.601V8.408l6.264 3.602z"/></svg>
                                        @break
                                    @default
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244"/></svg>
                                @endswitch
                            </a>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    {{-- Client Access panel --}}
                    <div class="rounded-[28px] border border-white/15 bg-[#0d2a52] px-8 py-10 shadow-[0_25px_60px_rgba(0,0,0,0.25)] sm:px-10">
                        <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Client Access</p>
                        <h2 class="mt-3 font-serif text-2xl font-bold leading-tight text-white sm:text-[1.75rem]">Access your secure portal</h2>
                        <p class="mt-4 text-sm leading-7 text-slate-300">
                            Secure access for registered clients and investors. Contact our team for onboarding support.
                        </p>
                        <div class="mt-8 flex flex-col items-start gap-4">
                            @auth
                                <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                                   class="inline-flex items-center justify-center rounded-full bg-[#c9a24d] px-6 py-3 text-sm font-bold text-[#07172f] shadow-sm transition-colors duration-200 hover:bg-[#d8b765] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-[#0d2a52]">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                   class="inline-flex items-center justify-center rounded-full bg-[#c9a24d] px-6 py-3 text-sm font-bold text-[#07172f] shadow-sm transition-colors duration-200 hover:bg-[#d8b765] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-[#0d2a52]">
                                    Client Portal
                                </a>
                            @endauth
                            @if ($portalHighlight)
                                <a href="{{ $portalHighlight->url }}"
                                   class="inline-flex items-center text-sm font-semibold text-slate-300 underline decoration-white/30 underline-offset-4 transition-colors duration-200 hover:text-white hover:decoration-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d] rounded">
                                    {{ $portalHighlight->label }}
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Layer 2 — Main Footer Navigation --}}
        <div class="border-b border-white/10">
            <div class="mx-auto max-w-[1440px] px-6 py-14">
                <nav aria-label="Footer" class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4">

                    {{-- Company --}}
                    @if ($footerCompany->isNotEmpty())
                    <div>
                        <h3 class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Company</h3>
                        <div class="mt-5 space-y-3 text-sm leading-6 text-slate-300">
                            @foreach ($footerCompany as $footerLink)
                                <a href="{{ $footerLink->url }}" class="block rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">{{ $footerLink->label }}</a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- What We Do: Services + Industries --}}
                    @if ($footerServices->isNotEmpty() || $footerIndustries->isNotEmpty())
                    <div>
                        <h3 class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">What We Do</h3>

                        @if ($footerServices->isNotEmpty())
                        <div class="mt-5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Services</p>
                            <div class="mt-3 space-y-3 text-sm leading-6 text-slate-300">
                                @foreach ($footerServices as $footerLink)
                                    <a href="{{ $footerLink->url }}" class="block rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">{{ $footerLink->label }}</a>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if ($footerIndustries->isNotEmpty())
                        <div class="mt-6">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Industries</p>
                            <div class="mt-3 space-y-3 text-sm leading-6 text-slate-300">
                                @foreach ($footerIndustries as $footerLink)
                                    <a href="{{ $footerLink->url }}" class="block rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">{{ $footerLink->label }}</a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    {{-- Knowledge & Support: Insights + Support --}}
                    @if ($footerInsights->isNotEmpty() || $footerSupport->isNotEmpty())
                    <div>
                        <h3 class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Knowledge &amp; Support</h3>

                        @if ($footerInsights->isNotEmpty())
                        <div class="mt-5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Insights</p>
                            <div class="mt-3 space-y-3 text-sm leading-6 text-slate-300">
                                @foreach ($footerInsights as $footerLink)
                                    <a href="{{ $footerLink->url }}" class="block rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">{{ $footerLink->label }}</a>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if ($footerSupport->isNotEmpty())
                        <div class="mt-6">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Support</p>
                            <div class="mt-3 space-y-3 text-sm leading-6 text-slate-300">
                                @foreach ($footerSupport as $footerLink)
                                    <a href="{{ $footerLink->url }}" class="block rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">{{ $footerLink->label }}</a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    @endif

                    {{-- Legal & Access: Legal + Portal --}}
                    <div>
                        <h3 class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Legal &amp; Access</h3>

                        <div class="mt-5">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Legal</p>
                            <div class="mt-3 space-y-3 text-sm leading-6 text-slate-300">
                                <a href="{{ route('privacy-notice') }}" class="block rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Privacy Notice</a>
                                <a href="{{ route('cookie-notice') }}" class="block rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Cookie Notice</a>
                                <a href="{{ route('accessibility') }}" class="block rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Accessibility Statement</a>
                                <a href="{{ route('complaints') }}" class="block rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Complaints Process</a>
                                <a href="{{ route('terms') }}" class="block rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Terms of Use</a>
                            </div>
                        </div>

                        @if ($portalExtraLinks->isNotEmpty())
                        <div class="mt-6">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.14em] text-slate-400">Portal</p>
                            <div class="mt-3 space-y-3 text-sm leading-6 text-slate-300">
                                @foreach ($portalExtraLinks as $footerLink)
                                    <a href="{{ $footerLink->url }}" class="block rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">{{ $footerLink->label }}</a>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

                </nav>
            </div>
        </div>

        {{-- Layer 3 — Contact and Trust Strip --}}
        <div class="border-b border-white/10">
            <div class="mx-auto max-w-[1440px] px-6 py-6">
                <div class="flex flex-wrap items-center gap-x-8 gap-y-2 text-xs leading-6 text-slate-400">
                    <span>{{ $footerLocation }}</span>
                    @if($cmsSite?->phone)
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $cmsSite->phone) }}" class="rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">{{ $cmsSite->phone }}</a>
                    @endif
                    @if($cmsSite?->primary_email)
                        <a href="mailto:{{ $cmsSite->primary_email }}" class="rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">General enquiries: {{ $cmsSite->primary_email }}</a>
                    @endif
                    @if($footerLinkedIn)
                        <a href="{{ $footerLinkedIn->url }}" class="rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">LinkedIn</a>
                    @endif
                    <span>{{ $footerRegisteredStatement }}</span>
                </div>
            </div>
        </div>

        {{-- Layer 4 — Bottom bar --}}
        <div class="mx-auto max-w-[1440px] px-6 py-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-sm text-slate-400">{{ $footerCopy }}</p>
                <div class="flex flex-wrap gap-x-6 gap-y-2 text-sm text-slate-400">
                    <a href="{{ route('privacy-notice') }}" class="rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Privacy Notice</a>
                    <a href="{{ route('cookie-notice') }}" class="rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Cookie Notice</a>
                    <a href="{{ route('accessibility') }}" class="rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Accessibility Statement</a>
                    <a href="{{ route('terms') }}" class="rounded transition-colors duration-200 hover:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>


    {{-- Reveal scroll animations --}}
    <style>
    .tlg-reveal{opacity:0;transform:translateY(22px);transition:opacity .6s cubic-bezier(.16,1,.3,1),transform .6s cubic-bezier(.16,1,.3,1)}
    .tlg-reveal.tlg-in{opacity:1;transform:translateY(0)}
    .tlg-d1{transition-delay:.1s}.tlg-d2{transition-delay:.2s}.tlg-d3{transition-delay:.3s}.tlg-d4{transition-delay:.4s}
    </style>
    <script>
    document.addEventListener('DOMContentLoaded',function(){
        var io=new IntersectionObserver(function(e){e.forEach(function(x){if(x.isIntersecting)x.target.classList.add('tlg-in')})},{threshold:.07});
        document.querySelectorAll('.tlg-reveal').forEach(function(el){io.observe(el)});
    });
    </script>
</body>
</html>

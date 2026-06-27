<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'The Lylods Group' }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800|playfair-display:600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#f7f3ea] text-[#172033] antialiased">

    <header x-data="{ open: false, openMenu: null, mobileServices: false, mobileAbout: false, scrolled: false }"
            @scroll.window="scrolled = window.scrollY > 8"
            @keydown.escape.window="openMenu = null; open = false"
            :class="scrolled ? 'shadow-[0_2px_20px_rgba(7,23,47,0.08)]' : ''"
            class="sticky top-0 z-50 border-b border-[#e6e8ee] bg-white/95 backdrop-blur-xl transition-shadow duration-300">
        <div class="mx-auto flex max-w-[1440px] items-center justify-between px-6 py-4">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="font-serif text-xl font-extrabold tracking-tight text-[#07172f]">
                The Lylods Group
            </a>

            {{-- Desktop navigation — position:relative makes it the containing block for mega panels --}}
            <nav class="relative hidden items-center gap-1 lg:flex" aria-label="Main navigation">

                <a href="{{ route('home') }}"
                   class="rounded-full px-4 py-2 text-sm font-semibold transition-colors duration-200 hover:bg-[#f7f3ea] hover:text-[#07172f] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d] {{ request()->routeIs('home') ? 'bg-[#f7f3ea] text-[#07172f]' : 'text-[#172033]' }}">
                    Home
                </a>

                {{-- About mega menu --}}
                <div @mouseenter="$el._t = setTimeout(() => openMenu = 'about', 175)"
                     @mouseleave="clearTimeout($el._t); openMenu = null">
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
                                <a href="{{ route('about') }}#who-we-are" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Who We Are</a>
                                <a href="{{ route('about') }}#how-we-work" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">How We Work</a>
                                <a href="{{ route('about') }}#industries" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Industries We Serve</a>
                                <a href="{{ route('about') }}#why-clients" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Why Clients Choose Us</a>
                                <a href="{{ route('careers') }}" class="block rounded text-[14px] font-medium text-[#172033] transition-colors hover:text-[#c9a24d] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">Careers &amp; Placements</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Services mega menu --}}
                <div @mouseenter="$el._t = setTimeout(() => openMenu = 'services', 175)"
                     @mouseleave="clearTimeout($el._t); openMenu = null">
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

                <a href="{{ route('case-studies') }}"
                   class="rounded-full px-4 py-2 text-sm font-semibold transition-colors duration-200 hover:bg-[#f7f3ea] hover:text-[#07172f] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d] {{ request()->routeIs('case-studies') ? 'bg-[#f7f3ea] text-[#07172f]' : 'text-[#172033]' }}">
                    Case Studies
                </a>

                <a href="{{ route('insights') }}"
                   class="rounded-full px-4 py-2 text-sm font-semibold transition-colors duration-200 hover:bg-[#f7f3ea] hover:text-[#07172f] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d] {{ request()->routeIs('insights') ? 'bg-[#f7f3ea] text-[#07172f]' : 'text-[#172033]' }}">
                    Insights
                </a>

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
                        <a href="{{ route('about') }}#who-we-are" @click="open = false" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Who We Are</a>
                        <a href="{{ route('about') }}#how-we-work" @click="open = false" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">How We Work</a>
                        <a href="{{ route('about') }}#industries" @click="open = false" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Industries</a>
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

                <a href="{{ route('case-studies') }}" @click="open = false" class="rounded-xl px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">Case Studies</a>
                <a href="{{ route('insights') }}" @click="open = false" class="rounded-xl px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">Insights</a>
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
        <div class="mx-auto max-w-[1440px] px-6 py-16">
            <div class="grid gap-10 lg:grid-cols-[1.6fr_1fr_1fr_1fr]">

                {{-- Brand column --}}
                <div>
                    <span class="font-serif text-xl font-bold text-white">The Lylods Group</span>
                    <p class="mt-4 max-w-xs text-sm leading-7 text-slate-300">
                        A UK-based business, technology, property and community development organisation helping clients move from ideas to practical results.
                    </p>
                    <div class="mt-6 flex gap-3">
                        <a href="#" aria-label="LinkedIn" class="flex h-9 w-9 items-center justify-center rounded-full border border-white/20 text-slate-400 hover:border-[#c9a24d] hover:text-[#c9a24d]">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <a href="#" aria-label="X / Twitter" class="flex h-9 w-9 items-center justify-center rounded-full border border-white/20 text-slate-400 hover:border-[#c9a24d] hover:text-[#c9a24d]">
                            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- Company column --}}
                <div>
                    <h4 class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Company</h4>
                    <div class="mt-4 space-y-2.5 text-sm text-slate-300">
                        <a href="{{ route('about') }}" class="block hover:text-white">About Us</a>
                        <a href="{{ route('case-studies') }}" class="block hover:text-white">Case Studies</a>
                        <a href="{{ route('insights') }}" class="block hover:text-white">Insights</a>
                        <a href="{{ route('contact') }}" class="block hover:text-white">Contact</a>
                        <a href="{{ route('careers') }}" class="block hover:text-white">Careers</a>
                    </div>
                </div>

                {{-- Services column --}}
                <div>
                    <h4 class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Services</h4>
                    <div class="mt-4 space-y-2.5 text-sm text-slate-300">
                        <a href="{{ route('services') }}#business-technology" class="block hover:text-white">Business &amp; Technology</a>
                        <a href="{{ route('services') }}#training-recruitment" class="block hover:text-white">Training &amp; Recruitment</a>
                        <a href="{{ route('services') }}#compliance-governance" class="block hover:text-white">Compliance &amp; Governance</a>
                        <a href="{{ route('property') }}" class="block hover:text-white">Property &amp; Development</a>
                        <a href="{{ route('community-projects') }}" class="block hover:text-white">Community Projects</a>
                        <a href="{{ route('services') }}" class="block font-semibold text-[#c9a24d] hover:text-white">View All Services →</a>
                    </div>
                </div>

                {{-- Portal column --}}
                <div>
                    <h4 class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Portal</h4>
                    <div class="mt-4 space-y-3 text-sm text-slate-300">
                        <p>Secure access for registered clients and investors. Contact our team for onboarding support.</p>
                        <a href="{{ route('login') }}" class="inline-flex rounded-full bg-[#c9a24d] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#d8b765]">Client Portal</a>
                        <div class="pt-1">
                            <a href="{{ route('investment') }}" class="block hover:text-white">Investment Information</a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Bottom bar --}}
            <div class="mt-12 border-t border-white/10 pt-6">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-sm text-slate-400">&copy; {{ date('Y') }} The Lylods Group. All rights reserved.</p>
                    <div class="flex flex-wrap gap-x-5 gap-y-2 text-sm text-slate-400">
                        <a href="{{ route('privacy-notice') }}" class="hover:text-white">Privacy Notice</a>
                        <a href="{{ route('cookie-notice') }}" class="hover:text-white">Cookie Notice</a>
                        <a href="{{ route('accessibility') }}" class="hover:text-white">Accessibility Statement</a>
                        <a href="{{ route('complaints') }}" class="hover:text-white">Complaints Process</a>
                        <a href="{{ route('terms') }}" class="hover:text-white">Terms of Use</a>
                    </div>
                </div>
                <p class="mt-3 text-xs text-slate-500">The Lylods Group is a professional services organisation registered in the United Kingdom.</p>
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

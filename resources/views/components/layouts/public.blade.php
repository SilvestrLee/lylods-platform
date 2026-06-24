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

    <header x-data="{ open: false, openMenu: null, mobileServices: false, scrolled: false }" @scroll.window="scrolled = window.scrollY > 8"
            :class="scrolled ? 'shadow-[0_2px_20px_rgba(7,23,47,0.08)]' : ''"
            class="sticky top-0 z-50 border-b border-[#e6e8ee] bg-white/95 backdrop-blur-xl transition-shadow duration-300">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="font-serif text-xl font-extrabold tracking-tight text-[#07172f]">
                The Lylods Group
            </a>

            {{-- Desktop navigation --}}
            <nav class="hidden items-center gap-1 lg:flex">

                <a href="{{ route('home') }}"
                   class="rounded-full px-4 py-2 text-sm font-semibold hover:bg-[#f7f3ea] hover:text-[#07172f] transition-colors duration-200 {{ request()->routeIs('home') ? 'text-[#07172f] bg-[#f7f3ea]' : 'text-[#172033]' }}">
                    Home
                </a>

                {{-- About dropdown --}}
                <div class="relative" @mouseenter="openMenu = 'about'" @mouseleave="openMenu = null">
                    <button class="inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-sm font-semibold text-[#172033] hover:bg-[#f7f3ea] hover:text-[#07172f]">
                        About
                        <svg class="h-3.5 w-3.5 transition-transform duration-150" :class="openMenu === 'about' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="openMenu === 'about'"
                         x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1"
                         class="absolute left-0 top-full mt-2 w-56 rounded-2xl border border-[#e6e8ee] bg-white p-2 shadow-xl" style="display:none;">
                        <a href="{{ route('about') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                            <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z"/></svg>
                            Company Overview
                        </a>
                        <a href="{{ route('about') }}#values" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                            <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/></svg>
                            Our Values
                        </a>
                        <a href="{{ route('about') }}#disciplines" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                            <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                            What We Do
                        </a>
                    </div>
                </div>

                {{-- Services mega dropdown --}}
                <div class="relative" @mouseenter="openMenu = 'services'" @mouseleave="openMenu = null">
                    <button class="inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-sm font-semibold text-[#172033] hover:bg-[#f7f3ea] hover:text-[#07172f]">
                        Services
                        <svg class="h-3.5 w-3.5 transition-transform duration-150" :class="openMenu === 'services' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="openMenu === 'services'"
                         x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1"
                         class="absolute left-0 top-full mt-2 w-[680px] rounded-2xl border border-[#e6e8ee] bg-white p-5 shadow-xl" style="display:none;">
                        <p class="mb-3 px-1 text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Our Service Disciplines</p>
                        <div class="grid grid-cols-[1fr_1fr_180px] gap-x-3">
                            {{-- Column 1 --}}
                            <div class="space-y-0.5">
                                <a href="{{ route('services') }}#engineering" class="flex items-start gap-2.5 rounded-xl px-3 py-2.5 hover:bg-[#f7f3ea]">
                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21"/></svg>
                                    <div><p class="text-sm font-semibold text-[#07172f]">Engineering &amp; Infrastructure</p><p class="text-xs text-[#667085]">Civil, structural &amp; operational advisory.</p></div>
                                </a>
                                <a href="{{ route('services') }}#technology" class="flex items-start gap-2.5 rounded-xl px-3 py-2.5 hover:bg-[#f7f3ea]">
                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z"/></svg>
                                    <div><p class="text-sm font-semibold text-[#07172f]">Technology &amp; Innovation</p><p class="text-xs text-[#667085]">Digital transformation &amp; tech strategy.</p></div>
                                </a>
                                <a href="{{ route('services') }}#project-management" class="flex items-start gap-2.5 rounded-xl px-3 py-2.5 hover:bg-[#f7f3ea]">
                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25Z"/></svg>
                                    <div><p class="text-sm font-semibold text-[#07172f]">Project Management</p><p class="text-xs text-[#667085]">End-to-end programme &amp; project delivery.</p></div>
                                </a>
                                <a href="{{ route('services') }}#training" class="flex items-start gap-2.5 rounded-xl px-3 py-2.5 hover:bg-[#f7f3ea]">
                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.627 48.627 0 0 1 12 20.904a48.627 48.627 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.57 50.57 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"/></svg>
                                    <div><p class="text-sm font-semibold text-[#07172f]">Training &amp; Capacity</p><p class="text-xs text-[#667085]">Professional training &amp; workforce upskilling.</p></div>
                                </a>
                            </div>
                            {{-- Column 2 --}}
                            <div class="space-y-0.5">
                                <a href="{{ route('services') }}#consulting" class="flex items-start gap-2.5 rounded-xl px-3 py-2.5 hover:bg-[#f7f3ea]">
                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"/></svg>
                                    <div><p class="text-sm font-semibold text-[#07172f]">Business Consulting</p><p class="text-xs text-[#667085]">Strategic advisory &amp; performance improvement.</p></div>
                                </a>
                                <a href="{{ route('services') }}#recruitment" class="flex items-start gap-2.5 rounded-xl px-3 py-2.5 hover:bg-[#f7f3ea]">
                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                                    <div><p class="text-sm font-semibold text-[#07172f]">Recruitment &amp; Workforce</p><p class="text-xs text-[#667085]">Specialist placement &amp; workforce augmentation.</p></div>
                                </a>
                                <a href="{{ route('services') }}#compliance" class="flex items-start gap-2.5 rounded-xl px-3 py-2.5 hover:bg-[#f7f3ea]">
                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/></svg>
                                    <div><p class="text-sm font-semibold text-[#07172f]">Compliance &amp; Governance</p><p class="text-xs text-[#667085]">Regulatory compliance &amp; information security.</p></div>
                                </a>
                                <a href="{{ route('services') }}#multidisciplinary" class="flex items-start gap-2.5 rounded-xl px-3 py-2.5 hover:bg-[#f7f3ea]">
                                    <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#123f8c]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                                    <div><p class="text-sm font-semibold text-[#07172f]">Multidisciplinary</p><p class="text-xs text-[#667085]">Integrated advisory across practice areas.</p></div>
                                </a>
                            </div>
                            {{-- Column 3: CTA sidebar --}}
                            <div class="flex flex-col rounded-2xl bg-[#07172f] p-4">
                                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Ready to discuss?</p>
                                <p class="mt-2 text-xs leading-5 text-slate-300">Our team works across all eight disciplines. Get in touch to discuss your requirements.</p>
                                <div class="mt-auto space-y-2 pt-4">
                                    <a href="{{ route('contact') }}" class="block rounded-full bg-[#c9a24d] px-4 py-2 text-center text-xs font-bold text-[#07172f] hover:bg-[#d8b765]">Get in Touch</a>
                                    <a href="{{ route('services') }}" class="block rounded-full border border-white/20 px-4 py-2 text-center text-xs font-bold text-white hover:bg-white/10">View All Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Investment dropdown --}}
                <div class="relative" @mouseenter="openMenu = 'investment'" @mouseleave="openMenu = null">
                    <button class="inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-sm font-semibold text-[#172033] hover:bg-[#f7f3ea] hover:text-[#07172f]">
                        Investment
                        <svg class="h-3.5 w-3.5 transition-transform duration-150" :class="openMenu === 'investment' ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="openMenu === 'investment'"
                         x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-1"
                         class="absolute left-0 top-full mt-2 w-56 rounded-2xl border border-[#e6e8ee] bg-white p-2 shadow-xl" style="display:none;">
                        <a href="{{ route('investment') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                            <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
                            Investment Overview
                        </a>
                        <a href="{{ route('login') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                            <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"/></svg>
                            Investor Portal
                        </a>
                        <a href="{{ route('contact') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                            <svg class="h-4 w-4 shrink-0 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                            Investment Enquiry
                        </a>
                    </div>
                </div>

                <a href="{{ route('contact') }}" class="rounded-full px-4 py-2 text-sm font-semibold hover:bg-[#f7f3ea] hover:text-[#07172f] transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-[#07172f] bg-[#f7f3ea]' : 'text-[#172033]' }}">
                    Contact
                </a>
            </nav>

            {{-- CTA + hamburger --}}
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                       class="hidden rounded-full bg-[#c9a24d] px-5 py-2.5 text-sm font-bold text-[#07172f] shadow-sm hover:bg-[#d8b765] lg:inline-flex">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="hidden rounded-full border border-[#c9a24d] px-5 py-2.5 text-sm font-bold text-[#c9a24d] hover:bg-[#c9a24d] hover:text-[#07172f] transition-all duration-300 lg:inline-flex">
                        Investor Login
                    </a>
                @endauth

                <button type="button" @click="open = !open"
                        class="inline-flex items-center justify-center rounded-xl border border-[#e6e8ee] p-2 text-[#07172f] lg:hidden" aria-label="Toggle navigation">
                    <svg x-show="!open" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16"/></svg>
                    <svg x-show="open" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display:none;"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        {{-- Mobile drawer --}}
        <div x-show="open" x-transition class="border-t border-[#e6e8ee] bg-white lg:hidden" style="display:none;">
            <div class="mx-auto flex max-w-7xl flex-col gap-0.5 px-6 py-4 text-sm font-semibold">
                <a href="{{ route('home') }}" class="rounded-xl px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">Home</a>
                <a href="{{ route('about') }}" class="rounded-xl px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">About</a>
                <div>
                    <button @click="mobileServices = !mobileServices" class="flex w-full items-center justify-between rounded-xl px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">
                        Services
                        <svg class="h-4 w-4 transition-transform duration-150" :class="mobileServices ? 'rotate-180' : ''" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="mobileServices" class="ml-3 mt-0.5 space-y-0.5 border-l border-[#e6e8ee] pl-3" style="display:none;">
                        <a href="{{ route('services') }}" class="block rounded-xl px-3 py-2.5 text-sm font-semibold text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">All Services</a>
                        <a href="{{ route('services') }}#engineering" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Engineering &amp; Infrastructure</a>
                        <a href="{{ route('services') }}#technology" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Technology &amp; Innovation</a>
                        <a href="{{ route('services') }}#project-management" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Project Management</a>
                        <a href="{{ route('services') }}#training" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Training &amp; Capacity</a>
                        <a href="{{ route('services') }}#consulting" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Business Consulting</a>
                        <a href="{{ route('services') }}#recruitment" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Recruitment &amp; Workforce</a>
                        <a href="{{ route('services') }}#compliance" class="block rounded-xl px-3 py-2.5 text-sm text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]">Compliance &amp; Governance</a>
                    </div>
                </div>
                <a href="{{ route('investment') }}" class="rounded-xl px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">Investment</a>
                <a href="{{ route('contact') }}" class="rounded-xl px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">Contact</a>
                <div class="mt-3 border-t border-[#e6e8ee] pt-3">
                    @auth
                        <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="block rounded-full bg-[#c9a24d] px-4 py-3 text-center font-bold text-[#07172f]">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block rounded-full border border-[#c9a24d] px-4 py-3 text-center font-bold text-[#c9a24d] hover:bg-[#c9a24d] hover:text-[#07172f] transition-all duration-300">Investor Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main>{{ $slot }}</main>

    <footer class="bg-[#07172f] text-white">
        <div class="mx-auto max-w-7xl px-6 py-16">
            <div class="grid gap-10 lg:grid-cols-[1.6fr_1fr_1fr_1fr]">
                <div>
                    <span class="font-serif text-xl font-bold text-white">The Lylods Group</span>
                    <p class="mt-4 max-w-xs text-sm leading-7 text-slate-300">
                        A multidisciplinary consulting and professional services organisation delivering engineering, technology, project management, and strategic advisory across key sectors.
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
                <div>
                    <h4 class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Services</h4>
                    <div class="mt-4 space-y-2.5 text-sm text-slate-300">
                        <a href="{{ route('services') }}#engineering" class="block hover:text-white">Engineering &amp; Infrastructure</a>
                        <a href="{{ route('services') }}#technology" class="block hover:text-white">Technology &amp; Innovation</a>
                        <a href="{{ route('services') }}#project-management" class="block hover:text-white">Project Management</a>
                        <a href="{{ route('services') }}#consulting" class="block hover:text-white">Business Consulting</a>
                        <a href="{{ route('services') }}" class="block font-semibold text-[#c9a24d] hover:text-white">View All Services →</a>
                    </div>
                </div>
                <div>
                    <h4 class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Company</h4>
                    <div class="mt-4 space-y-2.5 text-sm text-slate-300">
                        <a href="{{ route('about') }}" class="block hover:text-white">About Us</a>
                        <a href="{{ route('services') }}" class="block hover:text-white">Our Services</a>
                        <a href="{{ route('investment') }}" class="block hover:text-white">Investment</a>
                        <a href="{{ route('contact') }}" class="block hover:text-white">Contact</a>
                    </div>
                </div>
                <div>
                    <h4 class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Investor Access</h4>
                    <div class="mt-4 space-y-3 text-sm text-slate-300">
                        <p>For investment enquiries and investor account support, contact our team or log in to the investor portal.</p>
                        <a href="{{ route('login') }}" class="inline-flex rounded-full border border-[#c9a24d] px-5 py-2.5 text-sm font-bold text-[#c9a24d] hover:bg-[#c9a24d] hover:text-[#07172f] transition-all duration-300">Investor Login</a>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-white/10 pt-6">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-sm text-slate-400">&copy; {{ date('Y') }} The Lylods Group. All rights reserved.</p>
                    <div class="flex gap-6 text-sm text-slate-400">
                        <a href="#" class="hover:text-white">Privacy Policy</a>
                        <a href="#" class="hover:text-white">Terms of Use</a>
                    </div>
                </div>
                <p class="mt-3 text-xs text-slate-500">The Lylods Group is a professional services organisation registered in the United Kingdom. {{-- CMS: update with Companies House registration number when available --}}</p>
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

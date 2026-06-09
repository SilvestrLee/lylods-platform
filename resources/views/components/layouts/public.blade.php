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
    <header x-data="{ open: false }" class="sticky top-0 z-50 border-b border-[#e6e8ee] bg-white/90 backdrop-blur-xl">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">
            <a href="{{ route('home') }}" class="text-xl font-extrabold tracking-tight text-[#07172f]">
                The Lylods Group
            </a>

            <nav class="hidden items-center gap-8 text-sm font-semibold md:flex">
                <a href="{{ route('home') }}" class="text-[#172033] hover:text-[#123f8c]">Home</a>
                <a href="{{ route('about') }}" class="text-[#172033] hover:text-[#123f8c]">About</a>
                <a href="{{ route('services') }}" class="text-[#172033] hover:text-[#123f8c]">Services</a>
                <a href="{{ route('investment') }}" class="text-[#172033] hover:text-[#123f8c]">Investment</a>
                <a href="{{ route('contact') }}" class="text-[#172033] hover:text-[#123f8c]">Contact</a>
            </nav>

            <div class="hidden items-center gap-3 md:flex">
                @auth
                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                       class="inline-flex items-center rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#123f8c]">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-[#123f8c]">
                        Login
                    </a>
                @endauth
            </div>

            <button type="button"
                    class="inline-flex items-center justify-center rounded-lg border border-[#e6e8ee] p-2 text-[#07172f] md:hidden"
                    @click="open = !open"
                    aria-label="Toggle navigation">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7h16M4 12h16M4 17h16" />
                </svg>

                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div x-show="open"
             x-transition
             class="border-t border-[#e6e8ee] bg-white md:hidden"
             style="display: none;">
            <div class="mx-auto flex max-w-7xl flex-col gap-1 px-6 py-4 text-sm font-semibold">
                <a href="{{ route('home') }}" class="rounded-lg px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">Home</a>
                <a href="{{ route('about') }}" class="rounded-lg px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">About</a>
                <a href="{{ route('services') }}" class="rounded-lg px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">Services</a>
                <a href="{{ route('investment') }}" class="rounded-lg px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">Investment</a>
                <a href="{{ route('contact') }}" class="rounded-lg px-3 py-3 text-[#172033] hover:bg-[#f7f3ea]">Contact</a>

                @auth
                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                       class="mt-3 rounded-full bg-[#07172f] px-4 py-3 text-center font-semibold text-white">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="mt-3 rounded-full bg-[#07172f] px-4 py-3 text-center font-semibold text-white">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-[#07172f] text-white">
        <div class="mx-auto max-w-7xl px-6 py-14">
            <div class="grid gap-10 md:grid-cols-3">
                <div>
                    <h3 class="text-lg font-bold">The Lylods Group</h3>
                    <p class="mt-4 text-sm leading-6 text-slate-300">
                        A structured platform for public information, administration, and investor access.
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold text-[#c9a24d]">Quick Links</h4>
                    <div class="mt-4 flex flex-col gap-3 text-sm text-slate-300">
                        <a href="{{ route('about') }}" class="hover:text-white">About</a>
                        <a href="{{ route('services') }}" class="hover:text-white">Services</a>
                        <a href="{{ route('investment') }}" class="hover:text-white">Investment</a>
                        <a href="{{ route('contact') }}" class="hover:text-white">Contact</a>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold text-[#c9a24d]">Platform Access</h4>
                    <p class="mt-4 text-sm leading-6 text-slate-300">
                        Secure admin and investor dashboard access are included in the platform foundation.
                    </p>
                </div>
            </div>

            <div class="mt-10 border-t border-white/10 pt-6 text-sm text-slate-400">
                © {{ date('Y') }} The Lylods Group. All rights reserved.
            </div>
        </div>
    </footer>
</body>
</html>

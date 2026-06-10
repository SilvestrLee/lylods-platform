<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'The Lylods Group' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-900 antialiased">
    <header class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-xl font-bold tracking-tight">
                The Lylods Group
            </a>

            <nav class="hidden md:flex items-center gap-8 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-blue-700">Home</a>
                <a href="{{ route('about') }}" class="hover:text-blue-700">About</a>
                <a href="{{ route('services') }}" class="hover:text-blue-700">Services</a>
                <a href="{{ route('investment') }}" class="hover:text-blue-700">Investment</a>
                <a href="{{ route('contact') }}" class="hover:text-blue-700">Contact</a>
            </nav>

            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}"
                       class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white hover:bg-slate-700">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-slate-950 text-white">
        <div class="max-w-7xl mx-auto px-6 py-10">
            <div class="grid gap-8 md:grid-cols-3">
                <div>
                    <h3 class="text-lg font-bold">The Lylods Group</h3>
                    <p class="mt-3 text-sm text-slate-300">
                        A Laravel-based platform foundation for public information, administration, and investor access.
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold">Quick Links</h4>
                    <div class="mt-3 flex flex-col gap-2 text-sm text-slate-300">
                        <a href="{{ route('about') }}" class="hover:text-white">About</a>
                        <a href="{{ route('services') }}" class="hover:text-white">Services</a>
                        <a href="{{ route('investment') }}" class="hover:text-white">Investment</a>
                        <a href="{{ route('contact') }}" class="hover:text-white">Contact</a>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold">Platform Access</h4>
                    <p class="mt-3 text-sm text-slate-300">
                        Secure admin and investor dashboard access are part of the platform foundation.
                    </p>
                </div>
            </div>

            <div class="mt-8 border-t border-slate-800 pt-6 text-sm text-slate-400">
                &copy; {{ date('Y') }} The Lylods Group. All rights reserved.
            </div>
        </div>
    </footer>
</body>
</html>
@props([
    'noticeCount' => 0,
    'breadcrumbs' => null,
])

<div x-data="{ sidebarOpen: false }"
     @toggle-sidebar.window="sidebarOpen = !sidebarOpen"
     class="min-h-screen bg-[#f7f3ea]">

    {{-- Backdrop --}}
    <div x-show="sidebarOpen"
         x-transition:enter="transition-opacity duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="sidebarOpen = false"
         class="fixed inset-0 z-20 bg-black/40 lg:hidden"
         style="display: none;">
    </div>

    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:py-10">
        <div class="grid gap-8 lg:grid-cols-[280px_minmax(0,1fr)]">

            {{-- Sidebar --}}
            <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
                   class="fixed inset-y-0 left-0 z-30 flex w-72 flex-col overflow-y-auto bg-[#07172f] px-6 py-8 text-white shadow-xl transition-transform duration-200 ease-in-out lg:static lg:inset-auto lg:z-auto lg:w-auto lg:translate-x-0 lg:overflow-visible lg:rounded-[2rem] lg:py-6 lg:shadow-sm lg:transition-none lg:sticky lg:top-[5.5rem] lg:self-start">

                {{-- Mobile close --}}
                <div class="mb-6 flex items-center justify-between lg:hidden">
                    <span class="text-xs font-bold uppercase tracking-[0.25em] text-[#c9a24d]">The Lylods Group</span>
                    <button @click="sidebarOpen = false"
                            class="rounded-xl p-2 text-slate-300 hover:bg-white/10"
                            aria-label="Close menu">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <p class="hidden text-xs font-bold uppercase tracking-[0.25em] text-[#c9a24d] lg:block">
                    The Lylods Group
                </p>

                <h3 class="mt-3 text-xl font-bold">Investor Area</h3>

                <nav class="mt-8 flex-1 space-y-1 text-sm font-medium" aria-label="Investor navigation">

                    {{-- Overview --}}
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-2.5 transition {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}"
                       aria-current="{{ request()->routeIs('dashboard') ? 'page' : 'false' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/>
                        </svg>
                        Overview
                    </a>

                    {{-- Investments --}}
                    <a href="{{ route('dashboard') }}#investments"
                       class="flex items-center gap-3 rounded-2xl px-4 py-2.5 text-slate-300 transition hover:bg-white/10 hover:text-white">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/>
                        </svg>
                        Investments
                    </a>

                    {{-- Documents (coming soon) --}}
                    <span class="flex cursor-not-allowed items-center gap-3 rounded-2xl px-4 py-2.5 text-slate-500 opacity-60">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                        </svg>
                        Documents
                        <span class="ms-auto rounded-full bg-white/10 px-2 py-0.5 text-[10px] font-semibold text-slate-400">Soon</span>
                    </span>

                    {{-- Notices --}}
                    <a href="{{ route('dashboard.notices') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-2.5 transition {{ request()->routeIs('dashboard.notices*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a3 3 0 1 1-5.714 0"/>
                        </svg>
                        Notices
                        @if ($noticeCount > 0)
                            <span class="ms-auto rounded-full bg-[#c9a24d] px-2 py-0.5 text-[10px] font-bold text-[#07172f]">
                                {{ $noticeCount }}
                            </span>
                        @endif
                    </a>

                    {{-- Support (coming soon) --}}
                    <span class="flex cursor-not-allowed items-center gap-3 rounded-2xl px-4 py-2.5 text-slate-500 opacity-60">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V20.25a.75.75 0 0 0 1.28.53l3.58-3.58A48.458 48.458 0 0 0 11.25 17c2.115 0 4.198-.137 6.24-.402 1.608-.209 2.76-1.614 2.76-3.235V8.511Z"/>
                        </svg>
                        Support
                        <span class="ms-auto rounded-full bg-white/10 px-2 py-0.5 text-[10px] font-semibold text-slate-400">Soon</span>
                    </span>

                    {{-- Profile --}}
                    <a href="{{ route('profile.edit') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-2.5 transition {{ request()->routeIs('profile.edit') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                        </svg>
                        Profile
                    </a>
                </nav>

                {{-- User identity block --}}
                @auth
                @php
                    $investorInitials = collect(explode(' ', Auth::user()->name))
                        ->map(fn($p) => strtoupper(substr($p, 0, 1)))->take(2)->implode('');
                @endphp
                <div class="mt-8 flex items-center gap-3 rounded-2xl bg-white/10 px-4 py-3">
                    <span class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#c9a24d] text-sm font-bold text-[#07172f]">
                        {{ $investorInitials }}
                    </span>
                    <div class="min-w-0">
                        <p class="truncate text-sm font-semibold text-white">{{ Auth::user()->name }}</p>
                        <p class="truncate text-xs text-slate-400">Investor</p>
                    </div>
                </div>
                @endauth
            </aside>

            <main class="min-w-0 space-y-8">
                @if (isset($breadcrumbs) && $breadcrumbs->isNotEmpty())
                    <div class="px-1">{{ $breadcrumbs }}</div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>

    <x-dashboard-footer />
</div>

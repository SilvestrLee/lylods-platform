@props(['breadcrumbs' => null])

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
        <div class="grid gap-8 lg:grid-cols-[300px_minmax(0,1fr)]">

            {{-- Sidebar --}}
            <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
                   class="fixed inset-y-0 left-0 z-30 flex w-72 flex-col overflow-y-auto bg-[#07172f] px-6 py-8 text-white shadow-xl transition-transform duration-200 ease-in-out lg:static lg:inset-auto lg:z-auto lg:w-auto lg:translate-x-0 lg:overflow-visible lg:rounded-[2rem] lg:py-6 lg:shadow-sm lg:transition-none lg:sticky lg:top-[5.5rem] lg:self-start">

                {{-- Mobile close --}}
                <div class="mb-6 flex items-center justify-between lg:hidden">
                    <span class="text-xs font-bold uppercase tracking-[0.24em] text-[#c9a24d]">Admin Menu</span>
                    <button @click="sidebarOpen = false"
                            class="rounded-xl p-2 text-slate-300 hover:bg-white/10"
                            aria-label="Close menu">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <p class="hidden text-xs font-bold uppercase tracking-[0.24em] text-[#c9a24d] lg:block">
                    Admin Menu
                </p>

                <h3 class="mt-3 text-xl font-bold">Control Panel</h3>

                @php $draftCount = \App\Models\Notice::where('is_published', false)->count(); @endphp
                <nav class="mt-8 flex-1 space-y-1 text-sm font-medium" aria-label="Admin navigation">

                    {{-- Overview --}}
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-2.5 transition {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}"
                       aria-current="{{ request()->routeIs('admin.dashboard') ? 'page' : 'false' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/>
                        </svg>
                        Overview
                    </a>

                    {{-- Investment Records --}}
                    <a href="{{ route('admin.investments.index') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-2.5 transition {{ request()->routeIs('admin.investments.index') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/>
                        </svg>
                        Investment Records
                    </a>

                    {{-- Add Investment --}}
                    <a href="{{ route('admin.investments.create') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-2.5 transition {{ request()->routeIs('admin.investments.create') || request()->routeIs('admin.investments.edit') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                        Add Investment
                    </a>

                    {{-- Investment Plans --}}
                    <a href="{{ route('admin.investment-plans.index') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-2.5 transition {{ request()->routeIs('admin.investment-plans.*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/>
                        </svg>
                        Investment Plans
                    </a>

                    {{-- Investors --}}
                    <a href="{{ route('admin.investors.index') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-2.5 transition {{ request()->routeIs('admin.investors.*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
                        </svg>
                        Investors
                    </a>

                    {{-- Notices --}}
                    <a href="{{ route('admin.notices.index') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-2.5 transition {{ request()->routeIs('admin.notices.*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a3 3 0 1 1-5.714 0"/>
                        </svg>
                        Notices
                        @if ($draftCount > 0)
                            <span class="ms-auto rounded-full bg-[#c9a24d] px-2 py-0.5 text-[10px] font-bold text-[#07172f]">
                                {{ $draftCount }}
                            </span>
                        @endif
                    </a>

                    {{-- Documents (coming soon) --}}
                    <span class="flex cursor-not-allowed items-center gap-3 rounded-2xl px-4 py-2.5 text-slate-500 opacity-60">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                        </svg>
                        Documents
                        <span class="ms-auto rounded-full bg-white/10 px-2 py-0.5 text-[10px] font-semibold text-slate-400">Soon</span>
                    </span>

                    {{-- Profile Settings --}}
                    <a href="{{ route('profile.edit') }}"
                       class="flex items-center gap-3 rounded-2xl px-4 py-2.5 transition {{ request()->routeIs('profile.edit') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>
                        Profile Settings
                    </a>
                </nav>

                {{-- User identity block --}}
                @auth
                @php
                    $adminInitials = collect(explode(' ', Auth::user()->name))
                        ->map(fn($p) => strtoupper(substr($p, 0, 1)))->take(2)->implode('');
                @endphp
                <div class="mt-8 flex items-center gap-3 rounded-2xl bg-white/10 px-4 py-3">
                    <span class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#c9a24d] text-sm font-bold text-[#07172f]">
                        {{ $adminInitials }}
                    </span>
                    <div class="min-w-0">
                        <p class="truncate text-sm font-semibold text-white">{{ Auth::user()->name }}</p>
                        <p class="truncate text-xs text-slate-400">Administrator</p>
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

@props([
    'noticeCount' => 0,
])

<div x-data="{ sidebarOpen: false }" class="min-h-screen bg-[#f7f3ea]">

    {{-- Mobile top bar --}}
    <div class="flex items-center justify-between border-b border-[#e6e8ee] bg-white px-4 py-3 lg:hidden">
        <span class="font-serif text-base font-bold text-[#07172f]">Investor Portal</span>

        <button @click="sidebarOpen = true"
                class="rounded-xl p-2 text-[#07172f] hover:bg-[#f7f3ea]"
                aria-label="Open menu">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

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
                   class="fixed inset-y-0 left-0 z-30 w-72 overflow-y-auto bg-[#07172f] px-6 py-8 text-white shadow-xl transition-transform duration-200 ease-in-out lg:static lg:inset-auto lg:z-auto lg:w-auto lg:translate-x-0 lg:overflow-visible lg:rounded-[2rem] lg:py-6 lg:shadow-sm lg:transition-none lg:sticky lg:top-[112px] lg:self-start">

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

                <h3 class="mt-3 text-xl font-bold">
                    Investor Area
                </h3>

                <nav class="mt-8 space-y-2 text-sm font-medium">
                    <a href="{{ route('dashboard') }}"
                       class="flex items-center justify-between rounded-2xl px-4 py-3 {{ request()->routeIs('dashboard') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        <span>Overview</span>
                        @if (request()->routeIs('dashboard'))
                            <span class="text-[#c9a24d]">&bull;</span>
                        @endif
                    </a>

                    <a href="{{ route('dashboard') }}#investments"
                       class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                        Investments
                    </a>

                    <a href="#"
                       class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                        Documents
                    </a>

                    <a href="{{ route('dashboard.notices') }}"
                       class="flex items-center justify-between rounded-2xl px-4 py-3 {{ request()->routeIs('dashboard.notices*') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        <span>Notices</span>
                        <span class="rounded-full bg-white/10 px-2 py-0.5 text-xs text-[#c9a24d]">
                            {{ $noticeCount }}
                        </span>
                    </a>

                    <a href="#"
                       class="block rounded-2xl px-4 py-3 text-slate-300 hover:bg-white/10 hover:text-white">
                        Support
                    </a>

                    <a href="{{ route('profile.edit') }}"
                       class="block rounded-2xl px-4 py-3 {{ request()->routeIs('profile.edit') ? 'bg-white/10 text-white' : 'text-slate-300 hover:bg-white/10 hover:text-white' }}">
                        Profile
                    </a>
                </nav>

                <div class="mt-10 rounded-3xl bg-white/10 p-5">
                    <p class="text-sm font-semibold text-white">Need assistance?</p>
                    <p class="mt-2 text-sm leading-6 text-slate-300">
                        Contact the platform administrator for investor account support.
                    </p>
                </div>
            </aside>

            <main class="min-w-0 space-y-8">
                {{ $slot }}
            </main>
        </div>
    </div>

    <x-dashboard-footer />
</div>

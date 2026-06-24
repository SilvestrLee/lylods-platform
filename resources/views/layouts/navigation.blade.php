<nav x-data="{ open: false }" class="bg-white border-b border-[#e6e8ee]">
    @auth
        @php
            $user = Auth::user();

            $dashboardRoute = $user->role === 'admin'
                ? route('admin.dashboard')
                : route('dashboard');

            $dashboardActive = $user->role === 'admin'
                ? request()->routeIs('admin.dashboard')
                : request()->routeIs('dashboard');

            $notificationCount = 0;
            $notificationUrl = '#';

            if ($user->role === 'admin') {
                $notificationCount = \App\Models\Notice::where('is_published', false)->count();
                $notificationUrl = route('admin.notices.index');
            }

            if ($user->role === 'investor') {
                $notificationCount = \App\Models\Notice::where('is_published', true)->count();
                $notificationUrl = route('dashboard') . '#notices';
            }

            $initials = collect(explode(' ', $user->name))
                ->map(fn($part) => strtoupper(substr($part, 0, 1)))
                ->take(2)
                ->implode('');
        @endphp
    @endauth

    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">

            <!-- Left: Sidebar toggle (dashboard pages only) + Logo -->
            <div class="flex items-center gap-3">
                <!-- Sidebar toggle — only shown on dashboard pages that have a shell sidebar -->
                <button type="button"
                        @click="$dispatch('toggle-sidebar')"
                        class="lg:hidden -ml-1 inline-flex h-9 w-9 items-center justify-center rounded-lg text-[#667085] transition hover:bg-[#f7f3ea] hover:text-[#07172f] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]"
                        aria-label="Toggle sidebar">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/>
                    </svg>
                </button>

                <a href="{{ $dashboardRoute ?? route('dashboard') }}" class="shrink-0">
                    <x-application-logo class="block h-9 w-auto fill-current text-[#07172f]" />
                </a>
            </div>

            <!-- Centre: Search placeholder (desktop) -->
            <div class="hidden flex-1 max-w-sm lg:flex mx-8">
                <div class="relative w-full">
                    <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-[#98a2b3]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/>
                        </svg>
                    </span>
                    <input type="text"
                           disabled
                           placeholder="Search… (coming soon)"
                           title="Search coming soon"
                           class="w-full rounded-full border border-[#e6e8ee] bg-[#f7f9fc] py-2 pl-9 pr-4 text-sm text-[#07172f] placeholder:text-[#98a2b3] focus:outline-none cursor-not-allowed opacity-60">
                </div>
            </div>

            <!-- Right: Notifications + User dropdown -->
            <div class="hidden sm:flex sm:items-center sm:gap-3">
                @auth
                    <a href="{{ $notificationUrl }}"
                       class="relative inline-flex h-9 w-9 items-center justify-center rounded-full border border-[#e6e8ee] bg-white text-[#07172f] transition hover:bg-[#f7f3ea] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]"
                       aria-label="Notifications">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a3 3 0 1 1-5.714 0"/>
                        </svg>
                        @if ($notificationCount > 0)
                            <span class="absolute -right-1 -top-1 inline-flex min-h-[1.125rem] min-w-[1.125rem] items-center justify-center rounded-full bg-[#c9a24d] px-1 text-[10px] font-bold leading-none text-[#07172f] ring-2 ring-white">
                                {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                            </span>
                        @endif
                    </a>
                @endauth

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="group inline-flex items-center gap-2.5 rounded-full border border-[#e6e8ee] bg-white py-1.5 pl-1.5 pr-3.5 text-sm font-medium text-[#07172f] transition hover:bg-[#f7f3ea] focus:outline-none focus-visible:ring-2 focus-visible:ring-[#c9a24d]">
                            <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#07172f] text-xs font-bold text-[#c9a24d]">
                                {{ $initials ?? 'U' }}
                            </span>
                            <span class="max-w-[8rem] truncate">{{ Auth::user()->name }}</span>
                            <svg class="h-3.5 w-3.5 text-[#98a2b3] transition group-hover:text-[#07172f]" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile: notification + hamburger -->
            <div class="-me-2 flex items-center gap-2 sm:hidden">
                @auth
                    <a href="{{ $notificationUrl }}"
                       class="relative inline-flex h-9 w-9 items-center justify-center rounded-full border border-[#e6e8ee] bg-white text-[#07172f]"
                       aria-label="Notifications">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a3 3 0 1 1-5.714 0"/>
                        </svg>
                        @if ($notificationCount > 0)
                            <span class="absolute -right-1 -top-1 inline-flex min-h-[1.125rem] min-w-[1.125rem] items-center justify-center rounded-full bg-[#c9a24d] px-1 text-[10px] font-bold leading-none text-[#07172f] ring-2 ring-white">
                                {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                            </span>
                        @endif
                    </a>
                @endauth

                <button @click="open = ! open"
                        class="inline-flex items-center justify-center rounded-lg p-2 text-[#667085] transition hover:bg-[#f7f3ea] hover:text-[#07172f] focus:outline-none"
                        aria-label="Menu">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'block': !open}" class="block" stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/>
                        <path :class="{'hidden': !open, 'block': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden">
        <div class="space-y-1 pb-3 pt-2">
            <x-responsive-nav-link :href="$dashboardRoute" :active="$dashboardActive">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="$notificationUrl">
                {{ __('Notifications') }}
                @if ($notificationCount > 0)
                    <span class="ms-2 rounded-full bg-[#c9a24d] px-2 py-0.5 text-xs font-bold text-[#07172f]">
                        {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                    </span>
                @endif
            </x-responsive-nav-link>
        </div>

        <div class="border-t border-[#e6e8ee] pb-1 pt-4">
            <div class="flex items-center gap-3 px-4">
                <span class="inline-flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-[#07172f] text-sm font-bold text-[#c9a24d]">
                    {{ $initials ?? 'U' }}
                </span>
                <div>
                    <div class="text-sm font-semibold text-[#07172f]">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-[#667085]">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

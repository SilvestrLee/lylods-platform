@props(['crumbs' => []])

@if (count($crumbs))
@php
    $home = auth()->check() && auth()->user()->role === 'admin'
        ? route('admin.dashboard')
        : route('dashboard');
@endphp
<nav aria-label="Breadcrumb" class="flex items-center gap-1.5 text-xs font-medium">
    <a href="{{ $home }}"
       class="text-[#667085] transition-colors hover:text-[#07172f]">
        Home
    </a>

    @foreach ($crumbs as $crumb)
        <svg class="h-3 w-3 shrink-0 text-[#d0d5dd]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
        </svg>

        @if (!$loop->last && isset($crumb['url']))
            <a href="{{ $crumb['url'] }}" class="text-[#667085] transition-colors hover:text-[#07172f]">
                {{ $crumb['label'] }}
            </a>
        @else
            <span class="font-semibold text-[#07172f]">{{ $crumb['label'] }}</span>
        @endif
    @endforeach
</nav>
@endif

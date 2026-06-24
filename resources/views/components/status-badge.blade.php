@props(['status'])

@php
$map = [
    'active'    => 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200',
    'pending'   => 'bg-amber-50 text-amber-700 ring-1 ring-amber-200',
    'matured'   => 'bg-sky-50 text-sky-700 ring-1 ring-sky-200',
    'withdrawn' => 'bg-slate-100 text-slate-600 ring-1 ring-slate-200',
    'cancelled' => 'bg-red-50 text-red-600 ring-1 ring-red-200',
    'published' => 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-200',
    'draft'     => 'bg-slate-100 text-slate-600 ring-1 ring-slate-200',
    'inactive'  => 'bg-slate-100 text-slate-600 ring-1 ring-slate-200',
];
$classes = $map[strtolower($status ?? 'pending')] ?? 'bg-[#f7f3ea] text-[#07172f]';
@endphp

<span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold {{ $classes }}">
    {{ ucfirst($status ?? 'pending') }}
</span>

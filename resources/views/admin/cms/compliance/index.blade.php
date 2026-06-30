<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS — Footer</p>
            <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Compliance Pages</h2>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Footer'], ['label' => 'Compliance Pages']]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <h1 class="text-xl font-bold text-[#07172f]">Legal &amp; Compliance Pages</h1>
                <p class="mt-1 text-sm text-[#667085]">Edit content for Privacy Notice, Cookie Notice, Accessibility Statement, Complaints Process, and Terms of Use.</p>
            </div>

            <div class="divide-y divide-[#e6e8ee]">
                @forelse ($pages as $page)
                    <div class="flex items-center justify-between gap-4 px-6 py-5">
                        <div class="min-w-0 flex-1">
                            <p class="font-semibold text-[#07172f]">{{ $page->title }}</p>
                            <div class="mt-1 flex items-center gap-3">
                                <span class="text-xs text-[#667085]">/{{ $page->slug }}</span>
                                @if ($page->last_reviewed_at)
                                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[10px] font-semibold text-emerald-700 ring-1 ring-emerald-200">
                                        Reviewed {{ $page->last_reviewed_at->format('M Y') }}
                                    </span>
                                @else
                                    <span class="rounded-full bg-amber-50 px-2 py-0.5 text-[10px] font-semibold text-amber-700 ring-1 ring-amber-200">
                                        No review date
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="flex shrink-0 gap-2">
                            <a href="{{ route('admin.cms.compliance.edit', $page) }}"
                               class="rounded-full bg-[#07172f] px-4 py-1.5 text-xs font-semibold text-white hover:bg-[#123f8c]">
                                Edit
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-sm text-[#667085]">No compliance pages found. Run <code class="rounded bg-[#f7f3ea] px-1.5 py-0.5 font-mono text-xs">php artisan db:seed --class=CompliancePageSeeder</code> to initialise.</div>
                @endforelse
            </div>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

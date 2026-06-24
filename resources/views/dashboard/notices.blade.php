<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#c9a24d]">Investor Portal</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Notices</h2>
            </div>
            <div class="flex flex-wrap gap-2">
                <button onclick="window.print()"
                        class="inline-flex items-center gap-2 rounded-full border border-[#d0d5dd] bg-white px-5 py-2 text-sm font-semibold text-[#07172f] hover:bg-[#f7f3ea] print:hidden">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z"/>
                    </svg>
                    Print
                </button>
                <a href="{{ route('dashboard') }}"
                   class="inline-flex items-center gap-2 rounded-full border border-[#d0d5dd] bg-white px-5 py-2 text-sm font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                    </svg>
                    Back to Dashboard
                </a>
            </div>
        </div>
    </x-slot>

    <style>
        @media print {
            nav, aside, footer { display: none !important; }
            .bg-\[#f7f3ea\] { background: white !important; }
            .min-h-screen { min-height: auto !important; }
            article { box-shadow: none !important; border: 1px solid #e6e8ee !important; page-break-inside: avoid; }
        }
    </style>

    <x-user-dashboard-shell :notice-count="$notices->total()">
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'Notices']]" />
        </x-slot>

        <section class="rounded-[2rem] bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee]">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#123f8c]">Investor Notices</p>
                <h1 class="mt-2 font-serif text-3xl font-bold text-[#07172f]">Official Updates</h1>
                <p class="mt-3 max-w-2xl leading-7 text-[#667085]">
                    View official announcements, account updates, and platform notices from The Lylods Group.
                </p>
            </div>
        </section>

        <section class="space-y-5">
            @forelse ($notices as $notice)
                <article class="rounded-3xl bg-white p-8 shadow-sm ring-1 ring-[#e6e8ee] transition hover:ring-[#c9a24d]">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                        <h3 class="text-xl font-bold text-[#07172f]">{{ $notice->title }}</h3>
                        <time class="shrink-0 text-sm font-semibold text-[#c9a24d]">
                            {{ optional($notice->published_at)->format('M d, Y') }}
                        </time>
                    </div>
                    <div class="mt-4 leading-8 text-[#667085]">{{ $notice->body }}</div>
                </article>
            @empty
                <div class="rounded-3xl bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                    <x-empty-state icon="notices"
                                   heading="No notices yet"
                                   subtext="There are currently no published notices for your account. Check back later." />
                </div>
            @endforelse
        </section>

        @if ($notices->hasPages())
            <div>{{ $notices->links() }}</div>
        @endif

    </x-user-dashboard-shell>
</x-app-layout>

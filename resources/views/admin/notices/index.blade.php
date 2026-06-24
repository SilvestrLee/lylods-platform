<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Investor Notices</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Manage Notices</h2>
            </div>
            <a href="{{ route('admin.notices.create') }}"
               class="rounded-full bg-[#07172f] px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#123f8c]">
                Add Notice
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'Notices']]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="flex flex-col gap-4 border-b border-[#e6e8ee] p-6 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Notice Records</p>
                    <h1 class="mt-2 text-2xl font-bold text-[#07172f]">Investor Notice List</h1>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">Create and manage notices that can be published to investor dashboard users.</p>
                </div>
                <a href="{{ route('admin.notices.create') }}"
                   class="inline-flex shrink-0 rounded-full bg-[#c9a24d] px-5 py-3 text-sm font-bold text-[#07172f] hover:bg-[#d7b567]">
                    Create New Notice
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-[#e6e8ee] text-left text-sm">
                    <thead class="bg-[#f8fafc] text-[#667085]">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Notice</th>
                            <th class="px-6 py-4 font-semibold">Status</th>
                            <th class="px-6 py-4 font-semibold">Published</th>
                            <th class="px-6 py-4 font-semibold">Created By</th>
                            <th class="px-6 py-4 font-semibold">Action</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-[#e6e8ee] bg-white">
                        @forelse ($notices as $notice)
                            <tr class="transition hover:bg-[#f8fafc]">
                                <td class="px-6 py-5">
                                    <p class="font-bold text-[#07172f]">{{ $notice->title }}</p>
                                    <p class="mt-1 max-w-xl text-sm leading-6 text-[#667085]">
                                        {{ \Illuminate\Support\Str::limit($notice->body, 120) }}
                                    </p>
                                </td>
                                <td class="px-6 py-5">
                                    <x-status-badge :status="$notice->is_published ? 'published' : 'draft'" />
                                </td>
                                <td class="px-6 py-5 text-[#667085]">
                                    {{ $notice->published_at ? $notice->published_at->format('M d, Y') : '—' }}
                                </td>
                                <td class="px-6 py-5 text-[#667085]">
                                    {{ $notice->creator?->name ?? '—' }}
                                </td>
                                <td class="px-6 py-5">
                                    <a href="{{ route('admin.notices.edit', $notice) }}"
                                       class="rounded-full bg-[#07172f] px-4 py-2 text-xs font-bold text-white hover:bg-[#123f8c]">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <x-empty-state icon="notices"
                                                   heading="No notices yet"
                                                   subtext="Create your first notice to begin publishing updates to investor users."
                                                   :action-url="route('admin.notices.create')"
                                                   action-label="Add First Notice" />
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

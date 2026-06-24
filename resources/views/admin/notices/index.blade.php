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

        <div x-data="{ filter: 'all' }" class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">

            {{-- Header --}}
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

            {{-- Status filter tabs --}}
            <div class="flex flex-wrap gap-2 border-b border-[#e6e8ee] px-6 py-4">
                <button @click="filter = 'all'" :class="filter === 'all' ? 'bg-[#07172f] text-white' : 'bg-[#f7f9fc] text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]'" class="rounded-full px-4 py-1.5 text-xs font-semibold transition">All</button>
                <button @click="filter = 'published'" :class="filter === 'published' ? 'bg-emerald-600 text-white' : 'bg-[#f7f9fc] text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]'" class="rounded-full px-4 py-1.5 text-xs font-semibold transition">Published</button>
                <button @click="filter = 'draft'" :class="filter === 'draft' ? 'bg-slate-500 text-white' : 'bg-[#f7f9fc] text-[#667085] hover:bg-[#f7f3ea] hover:text-[#07172f]'" class="rounded-full px-4 py-1.5 text-xs font-semibold transition">Draft</button>
            </div>

            {{-- Mobile card view --}}
            <div class="divide-y divide-[#e6e8ee] sm:hidden">
                @forelse ($notices as $notice)
                    @php $noticeStatus = $notice->is_published ? 'published' : 'draft'; @endphp
                    <div x-show="filter === 'all' || filter === '{{ $noticeStatus }}'"
                         class="p-5 transition hover:bg-[#f8fafc]">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <p class="truncate font-bold text-[#07172f]">{{ $notice->title }}</p>
                                <p class="mt-1 line-clamp-2 text-xs leading-5 text-[#667085]">{{ \Illuminate\Support\Str::limit($notice->body, 80) }}</p>
                            </div>
                            <x-status-badge :status="$notice->is_published ? 'published' : 'draft'" />
                        </div>
                        <div class="mt-3 flex items-center justify-between gap-3">
                            <p class="text-xs text-[#667085]">{{ $notice->published_at ? $notice->published_at->format('M d, Y') : 'Draft — unpublished' }}</p>
                            <a href="{{ route('admin.notices.edit', $notice) }}"
                               class="rounded-full bg-[#07172f] px-4 py-2 text-xs font-bold text-white hover:bg-[#123f8c]">Edit</a>
                        </div>
                    </div>
                @empty
                    <div class="p-8">
                        <x-empty-state icon="notices"
                                       heading="No notices yet"
                                       subtext="Create your first notice to begin publishing updates to investor users."
                                       :action-url="route('admin.notices.create')"
                                       action-label="Add First Notice" />
                    </div>
                @endforelse
            </div>

            {{-- Desktop table --}}
            <div class="hidden overflow-x-auto sm:block">
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
                            @php $noticeStatus = $notice->is_published ? 'published' : 'draft'; @endphp
                            <tr x-show="filter === 'all' || filter === '{{ $noticeStatus }}'"
                                class="transition hover:bg-[#f8fafc]">
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

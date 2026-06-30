<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
            <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Page Content</h2>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Pages']]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">All Pages</p>
                <h1 class="mt-2 text-2xl font-bold text-[#07172f]">Website Pages</h1>
                <p class="mt-2 text-sm leading-6 text-[#667085]">Edit hero content and SEO metadata for each public page.</p>
            </div>

            <div class="hidden overflow-x-auto sm:block">
                <table class="min-w-full divide-y divide-[#e6e8ee] text-left text-sm">
                    <thead class="bg-[#f8fafc] text-[#667085]">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Page</th>
                            <th class="px-6 py-4 font-semibold">Slug</th>
                            <th class="px-6 py-4 font-semibold">Hero Title</th>
                            <th class="px-6 py-4 font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#e6e8ee] bg-white">
                        @foreach ($pages as $page)
                            <tr class="transition hover:bg-[#f8fafc]">
                                <td class="px-6 py-4 font-bold text-[#07172f]">{{ $page->title }}</td>
                                <td class="px-6 py-4 font-mono text-xs text-[#667085]">/{{ $page->slug }}</td>
                                <td class="px-6 py-4 text-[#667085]">{{ \Illuminate\Support\Str::limit($page->hero_title, 60) }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.cms.pages.edit', $page) }}"
                                       class="rounded-full bg-[#07172f] px-4 py-2 text-xs font-bold text-white hover:bg-[#123f8c]">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Mobile cards --}}
            <div class="divide-y divide-[#e6e8ee] sm:hidden">
                @foreach ($pages as $page)
                    <div class="p-5">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <p class="font-bold text-[#07172f]">{{ $page->title }}</p>
                                <p class="mt-0.5 font-mono text-xs text-[#667085]">/{{ $page->slug }}</p>
                                <p class="mt-1 text-sm text-[#667085]">{{ \Illuminate\Support\Str::limit($page->hero_title, 50) }}</p>
                            </div>
                            <a href="{{ route('admin.cms.pages.edit', $page) }}"
                               class="shrink-0 rounded-full bg-[#07172f] px-4 py-2 text-xs font-bold text-white hover:bg-[#123f8c]">
                                Edit
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

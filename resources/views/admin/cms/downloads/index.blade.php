<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Downloads</h2>
            </div>
            <a href="{{ route('admin.cms.downloads.create') }}"
               class="inline-flex items-center gap-2 rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-bold text-white hover:bg-[#123f8c]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                Add Download
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Downloads']]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">{{ session('success') }}</div>
        @endif

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">All Downloads</p>
                <p class="mt-1 text-sm text-[#667085]">{{ $downloads->count() }} {{ Str::plural('file', $downloads->count()) }}</p>
            </div>

            @if($downloads->isEmpty())
                <div class="p-10 text-center">
                    <p class="text-sm text-[#667085]">No downloads yet.</p>
                    <a href="{{ route('admin.cms.downloads.create') }}" class="mt-4 inline-flex rounded-full bg-[#c9a24d] px-5 py-2.5 text-sm font-bold text-[#07172f] hover:bg-[#d7b567]">Add First Download</a>
                </div>
            @else
                <div class="divide-y divide-[#e6e8ee]">
                    @foreach($downloads as $download)
                        <div class="flex items-center gap-4 px-6 py-4">
                            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl border border-[#e6e8ee] bg-[#f7f3ea]">
                                <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="truncate text-sm font-semibold text-[#07172f]">{{ $download->title }}</p>
                                <div class="mt-0.5 flex flex-wrap items-center gap-2">
                                    @if($download->category)
                                        <span class="rounded-full bg-[#f7f3ea] px-2 py-0.5 text-[10px] font-semibold text-[#c9a24d]">{{ $download->category }}</span>
                                    @endif
                                    @if($download->version)
                                        <span class="text-xs text-[#667085]">v{{ $download->version }}</span>
                                    @endif
                                    @if($download->published_date)
                                        <span class="text-xs text-[#667085]">{{ $download->published_date->format('d M Y') }}</span>
                                    @endif
                                    <span class="text-xs text-[#667085]">Order: {{ $download->display_order }}</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="rounded-full px-2.5 py-1 text-[10px] font-bold {{ $download->is_public ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $download->is_public ? 'Public' : 'Hidden' }}
                                </span>
                                @if($download->media)
                                    <a href="{{ $download->media->url() }}" target="_blank"
                                       class="rounded-full border border-[#e6e8ee] px-4 py-1.5 text-xs font-bold text-[#07172f] hover:bg-[#f7f3ea]">View File</a>
                                @endif
                                <a href="{{ route('admin.cms.downloads.edit', $download) }}"
                                   class="rounded-full border border-[#e6e8ee] px-4 py-1.5 text-xs font-bold text-[#07172f] hover:bg-[#f7f3ea]">Edit</a>
                                <form method="POST" action="{{ route('admin.cms.downloads.destroy', $download) }}"
                                      onsubmit="return confirm('Remove this download?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="rounded-full border border-red-100 px-4 py-1.5 text-xs font-bold text-red-600 hover:bg-red-50">Remove</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

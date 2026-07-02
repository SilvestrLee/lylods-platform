<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Media Library</h2>
            </div>
            <button onclick="document.getElementById('upload-panel').classList.toggle('hidden')"
                    class="inline-flex items-center gap-2 rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-bold text-white hover:bg-[#123f8c]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                Upload
            </button>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Media Library']]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="rounded-2xl bg-red-50 px-5 py-4 text-sm font-semibold text-red-800 ring-1 ring-red-200">
                {{ session('error') }}
            </div>
        @endif

        {{-- Upload panel (hidden by default) --}}
        <div id="upload-panel" class="hidden overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Upload</p>
                <h2 class="mt-2 text-xl font-bold text-[#07172f]">Add a File</h2>
            </div>
            <form method="POST" action="{{ route('admin.cms.media.store') }}" enctype="multipart/form-data" class="space-y-5 p-6">
                @csrf
                <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    <div class="lg:col-span-2">
                        <label class="block text-sm font-semibold text-[#07172f]">File <span class="text-red-500">*</span></label>
                        <input type="file" name="file" accept="image/*,.pdf,.svg,.doc,.docx,.zip"
                               class="mt-2 w-full text-sm text-[#07172f] file:mr-4 file:rounded-full file:border-0 file:bg-[#07172f] file:px-4 file:py-2 file:text-xs file:font-bold file:text-white hover:file:bg-[#123f8c] @error('file') border-red-400 @enderror">
                        <p class="mt-1.5 text-xs text-[#667085]">JPG, PNG, WebP, SVG, PDF, DOCX, ZIP — max 20 MB</p>
                        @error('file')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Category</label>
                        <select name="category" class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            <option value="uploads">General</option>
                            <option value="brand">Brand</option>
                            <option value="homepage">Homepage</option>
                            <option value="services">Services</option>
                            <option value="case-studies">Case Studies</option>
                            <option value="insights">Insights</option>
                            <option value="partners">Partners</option>
                            <option value="downloads">Downloads</option>
                            <option value="compliance">Compliance</option>
                            <option value="team">Team</option>
                            <option value="logos">Logos</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-[#07172f]">Alt Text <span class="text-xs font-normal text-[#667085]">(for images)</span></label>
                    <input type="text" name="alt_text" value="{{ old('alt_text') }}"
                           class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </div>
                <button type="submit"
                        class="inline-flex rounded-full bg-[#c9a24d] px-5 py-3 text-sm font-bold text-[#07172f] hover:bg-[#d7b567]">
                    Upload File
                </button>
            </form>
        </div>

        {{-- Search & filters --}}
        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <form method="GET" action="{{ route('admin.cms.media.index') }}" class="flex flex-wrap items-end gap-4 p-5">
                <div class="flex-1 min-w-[200px]">
                    <label class="block text-xs font-semibold uppercase tracking-[0.18em] text-[#667085]">Search</label>
                    <input type="text" name="search" value="{{ $filters['search'] ?? '' }}" placeholder="Filename, title, alt text…"
                           class="mt-1.5 w-full rounded-2xl border border-[#d0d5dd] px-4 py-2.5 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-[0.18em] text-[#667085]">Type</label>
                    <select name="type" class="mt-1.5 rounded-2xl border border-[#d0d5dd] px-4 py-2.5 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        <option value="">All Types</option>
                        <option value="images" @selected(($filters['type'] ?? '') === 'images')>Images</option>
                        <option value="documents" @selected(($filters['type'] ?? '') === 'documents')>Documents</option>
                        <option value="pdf" @selected(($filters['type'] ?? '') === 'pdf')>PDF</option>
                        <option value="svg" @selected(($filters['type'] ?? '') === 'svg')>SVG</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-[0.18em] text-[#667085]">Category</label>
                    <select name="category" class="mt-1.5 rounded-2xl border border-[#d0d5dd] px-4 py-2.5 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        <option value="">All Categories</option>
                        @foreach(['brand','homepage','services','case-studies','insights','partners','downloads','compliance','team','logos','uploads'] as $cat)
                            <option value="{{ $cat }}" @selected(($filters['category'] ?? '') === $cat)>{{ ucfirst(str_replace('-', ' ', $cat)) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex gap-2">
                    <button type="submit" class="rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-bold text-white hover:bg-[#123f8c]">Filter</button>
                    @if(array_filter($filters))
                        <a href="{{ route('admin.cms.media.index') }}" class="rounded-full border border-[#e6e8ee] px-5 py-2.5 text-sm font-bold text-[#667085] hover:bg-[#f7f3ea]">Clear</a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Media grid --}}
        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="flex items-center justify-between border-b border-[#e6e8ee] px-6 py-5">
                <div>
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Library</p>
                    <p class="mt-1 text-sm text-[#667085]">{{ $media->total() }} {{ Str::plural('file', $media->total()) }}</p>
                </div>
            </div>

            @if($media->isEmpty())
                <div class="p-10 text-center">
                    <p class="text-sm text-[#667085]">No files found. Use the Upload button to add your first file.</p>
                </div>
            @else
                <div class="grid grid-cols-2 gap-4 p-6 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                    @foreach ($media as $item)
                        <a href="{{ route('admin.cms.media.edit', $item) }}"
                           class="group relative overflow-hidden rounded-2xl border border-[#e6e8ee] bg-[#f8fafc] transition hover:border-[#c9a24d] hover:shadow-md">
                            @if($item->isImage())
                                <div class="relative h-32 overflow-hidden bg-[#f0ede6]">
                                    <img src="{{ $item->url() }}"
                                         alt="{{ $item->alt_text ?? $item->title }}"
                                         class="h-full w-full object-cover transition group-hover:scale-105">
                                </div>
                            @else
                                <div class="flex h-32 items-center justify-center bg-[#f7f3ea]">
                                    @if($item->extension === 'pdf')
                                        <svg class="h-10 w-10 text-red-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                                    @else
                                        <svg class="h-10 w-10 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                                    @endif
                                </div>
                            @endif

                            <div class="p-3">
                                <p class="truncate text-xs font-semibold text-[#07172f]">{{ $item->title }}</p>
                                <p class="mt-0.5 text-[10px] uppercase text-[#667085]">{{ $item->extension }} · {{ $item->humanFileSize() }}</p>
                                @if($item->width && $item->height)
                                    <p class="mt-0.5 text-[10px] text-[#667085]">{{ $item->width }}×{{ $item->height }}</p>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>

                <div class="border-t border-[#e6e8ee] px-6 py-4">
                    {{ $media->links() }}
                </div>
            @endif
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

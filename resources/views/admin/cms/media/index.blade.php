@php $viewMode = request()->query('view') === 'list' ? 'list' : 'grid'; @endphp
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
        @if ($errors->any())
            <div class="rounded-2xl bg-red-50 px-5 py-4 text-sm font-semibold text-red-800 ring-1 ring-red-200">
                <ul class="list-disc space-y-1 pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-[0.18em] text-[#667085]">Sort</label>
                    <select name="sort" class="mt-1.5 rounded-2xl border border-[#d0d5dd] px-4 py-2.5 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        <option value="newest" @selected(($filters['sort'] ?? 'newest') === 'newest')>Newest First</option>
                        <option value="oldest" @selected(($filters['sort'] ?? '') === 'oldest')>Oldest First</option>
                        <option value="title_asc" @selected(($filters['sort'] ?? '') === 'title_asc')>Title A–Z</option>
                        <option value="title_desc" @selected(($filters['sort'] ?? '') === 'title_desc')>Title Z–A</option>
                        <option value="size_desc" @selected(($filters['sort'] ?? '') === 'size_desc')>Largest First</option>
                        <option value="size_asc" @selected(($filters['sort'] ?? '') === 'size_asc')>Smallest First</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-[0.18em] text-[#667085]">Show</label>
                    <select name="quick" class="mt-1.5 rounded-2xl border border-[#d0d5dd] px-4 py-2.5 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        <option value="">All Files</option>
                        <option value="unused" @selected(($filters['quick'] ?? '') === 'unused')>Unused Only</option>
                        <option value="recent" @selected(($filters['quick'] ?? '') === 'recent')>Recently Uploaded (7 days)</option>
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
                <div class="flex gap-1 rounded-full border border-[#e6e8ee] p-1">
                    <a href="{{ request()->fullUrlWithQuery(['view' => 'grid']) }}"
                       aria-label="Grid view"
                       class="inline-flex h-8 w-8 items-center justify-center rounded-full transition {{ $viewMode === 'grid' ? 'bg-[#07172f] text-white' : 'text-[#667085] hover:bg-[#f7f3ea]' }}">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                    </a>
                    <a href="{{ request()->fullUrlWithQuery(['view' => 'list']) }}"
                       aria-label="List view"
                       class="inline-flex h-8 w-8 items-center justify-center rounded-full transition {{ $viewMode === 'list' ? 'bg-[#07172f] text-white' : 'text-[#667085] hover:bg-[#f7f3ea]' }}">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5"/></svg>
                    </a>
                </div>
            </div>

            <form method="POST" x-data="{ selected: [], bulkCategory: '', bulkVisibility: '' }">
                @csrf
                {{-- Bulk action toolbar --}}
                <div class="flex flex-wrap items-center gap-3 border-b border-[#e6e8ee] bg-[#f8fafc] px-6 py-3">
                    <label class="inline-flex items-center gap-2 text-xs font-semibold text-[#667085]">
                        <input type="checkbox"
                               class="h-4 w-4 rounded border-[#d0d5dd]"
                               @change="selected = $event.target.checked ? @json($media->pluck('id')) : []">
                        Select all on page
                    </label>

                    <span class="text-xs font-bold text-[#07172f]" x-text="selected.length + ' selected'"></span>

                    <button type="button" @click="selected = []"
                            class="text-xs font-semibold text-[#667085] underline hover:text-[#07172f]">
                        Clear
                    </button>

                    <div class="ml-auto flex flex-wrap items-center gap-2">
                        <select name="category" x-model="bulkCategory"
                                class="rounded-full border border-[#d0d5dd] px-3 py-1.5 text-xs text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            <option value="">Move to…</option>
                            @foreach(['brand','homepage','services','case-studies','insights','partners','downloads','compliance','team','logos','uploads'] as $cat)
                                <option value="{{ $cat }}">{{ ucfirst(str_replace('-', ' ', $cat)) }}</option>
                            @endforeach
                        </select>
                        <button type="submit" formaction="{{ route('admin.cms.media.bulk-category') }}" formmethod="POST"
                                :disabled="selected.length === 0 || bulkCategory === ''"
                                class="rounded-full bg-[#123f8c] px-4 py-1.5 text-xs font-bold text-white transition disabled:cursor-not-allowed disabled:opacity-40 hover:enabled:bg-[#0e336f]">
                            Move
                        </button>

                        <select name="is_public" x-model="bulkVisibility"
                                class="rounded-full border border-[#d0d5dd] px-3 py-1.5 text-xs text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            <option value="">Set visibility…</option>
                            <option value="1">Public</option>
                            <option value="0">Private</option>
                        </select>
                        <button type="submit" formaction="{{ route('admin.cms.media.bulk-visibility') }}" formmethod="POST"
                                :disabled="selected.length === 0 || bulkVisibility === ''"
                                class="rounded-full bg-[#123f8c] px-4 py-1.5 text-xs font-bold text-white transition disabled:cursor-not-allowed disabled:opacity-40 hover:enabled:bg-[#0e336f]">
                            Update
                        </button>

                        <button type="submit" formaction="{{ route('admin.cms.media.bulk-delete') }}" formmethod="POST"
                                :disabled="selected.length === 0"
                                @click="if(!confirm('Delete ' + selected.length + ' selected file(s)? Files currently in use will be skipped automatically.')) $event.preventDefault()"
                                class="rounded-full border border-red-200 px-4 py-1.5 text-xs font-bold text-red-600 transition disabled:cursor-not-allowed disabled:opacity-40 hover:enabled:bg-red-50">
                            Delete Selected
                        </button>
                    </div>
                </div>

            @if($media->isEmpty())
                <div class="p-10 text-center">
                    <p class="text-sm text-[#667085]">No files found. Use the Upload button to add your first file.</p>
                </div>
            @elseif($viewMode === 'list')
                <div class="divide-y divide-[#e6e8ee]">
                    @foreach ($media as $item)
                        <div class="flex items-center gap-4 px-6 py-3 transition hover:bg-[#f7f3ea]">
                            <input type="checkbox" name="ids[]" value="{{ $item->id }}" x-model="selected"
                                   class="h-4 w-4 shrink-0 rounded border-[#d0d5dd]" aria-label="Select {{ $item->title }}">
                            <a href="{{ route('admin.cms.media.edit', $item) }}" class="flex min-w-0 flex-1 items-center gap-4">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-[#f0ede6]">
                                    @include('admin.cms.media._thumb', ['item' => $item, 'class' => 'h-full w-full object-cover'])
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="truncate text-sm font-semibold text-[#07172f]">{{ $item->title }}</p>
                                    <p class="mt-0.5 text-xs text-[#667085]">
                                        {{ strtoupper($item->extension) }} · {{ $item->humanFileSize() }}
                                        @if($item->width && $item->height) · {{ $item->width }}×{{ $item->height }} @endif
                                    </p>
                                </div>
                            </a>
                            <span class="shrink-0 rounded-full bg-[#f7f3ea] px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide text-[#07172f]">
                                {{ $item->categoryLabel() }}
                            </span>
                            <span class="shrink-0 rounded-full px-2.5 py-1 text-[10px] font-bold uppercase tracking-wide {{ in_array($item->id, $usedIds) ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-200 text-slate-600' }}">
                                {{ in_array($item->id, $usedIds) ? 'Used' : 'Unused' }}
                            </span>
                        </div>
                    @endforeach
                </div>

                <div class="border-t border-[#e6e8ee] px-6 py-4">
                    {{ $media->links() }}
                </div>
            @else
                <div class="grid grid-cols-2 gap-4 p-6 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                    @foreach ($media as $item)
                        <div class="group relative overflow-hidden rounded-2xl border border-[#e6e8ee] bg-[#f8fafc] transition hover:border-[#c9a24d] hover:shadow-md">
                            <input type="checkbox" name="ids[]" value="{{ $item->id }}" x-model="selected"
                                   class="absolute left-2 top-2 z-20 h-4 w-4 rounded border-[#d0d5dd]" aria-label="Select {{ $item->title }}">
                            <span class="absolute right-2 top-2 z-10 rounded-full px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide {{ in_array($item->id, $usedIds) ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-200 text-slate-600' }}">
                                {{ in_array($item->id, $usedIds) ? 'Used' : 'Unused' }}
                            </span>
                            <a href="{{ route('admin.cms.media.edit', $item) }}">
                                <div class="relative flex h-32 items-center justify-center overflow-hidden bg-[#f0ede6]">
                                    @include('admin.cms.media._thumb', ['item' => $item, 'class' => 'h-full w-full object-cover transition group-hover:scale-105'])
                                </div>

                                <div class="p-3">
                                    <p class="truncate text-xs font-semibold text-[#07172f]">{{ $item->title }}</p>
                                    <p class="mt-0.5 text-[10px] uppercase text-[#667085]">{{ $item->extension }} · {{ $item->humanFileSize() }} · {{ $item->categoryLabel() }}</p>
                                    @if($item->width && $item->height)
                                        <p class="mt-0.5 text-[10px] text-[#667085]">{{ $item->width }}×{{ $item->height }}</p>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="border-t border-[#e6e8ee] px-6 py-4">
                    {{ $media->links() }}
                </div>
            @endif
            </form>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

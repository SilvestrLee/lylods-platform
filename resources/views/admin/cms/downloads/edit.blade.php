<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
            <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Edit Download</h2>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Downloads', 'url' => route('admin.cms.downloads.index')], ['label' => $download->title]]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">{{ session('success') }}</div>
        @endif

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Edit Download</p>
                <h3 class="mt-2 text-xl font-bold text-[#07172f]">{{ $download->title }}</h3>
            </div>
            <form method="POST" action="{{ route('admin.cms.downloads.update', $download) }}" enctype="multipart/form-data" class="space-y-5 p-6">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block text-sm font-semibold text-[#07172f]">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $download->title) }}" required
                           class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('title') border-red-400 @enderror">
                    @error('title')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#07172f]">Description</label>
                    <textarea name="description" rows="3"
                              class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('description', $download->description) }}</textarea>
                </div>

                <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Version</label>
                        <input type="text" name="version" value="{{ old('version', $download->version) }}"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Category</label>
                        <input type="text" name="category" value="{{ old('category', $download->category) }}"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Published Date</label>
                        <input type="date" name="published_date" value="{{ old('published_date', $download->published_date?->format('Y-m-d')) }}"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Display Order</label>
                        <input type="number" name="display_order" value="{{ old('display_order', $download->display_order) }}" min="0"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>
                </div>

                <label class="flex items-center gap-2 text-sm font-semibold text-[#07172f]">
                    <input type="hidden" name="is_public" value="0">
                    <input type="checkbox" name="is_public" value="1" {{ old('is_public', $download->is_public) ? 'checked' : '' }} class="rounded">
                    Public
                </label>

                <div>
                    <label class="block text-sm font-semibold text-[#07172f]">File</label>
                    @if($download->media)
                        <div class="mt-2 mb-3 flex items-center gap-3 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] p-3">
                            <span class="text-xs font-semibold text-[#07172f]">{{ $download->media->title }}</span>
                            <a href="{{ $download->media->url() }}" target="_blank" class="text-xs font-bold text-[#123f8c] hover:underline">View current file ↗</a>
                        </div>
                    @endif
                    <input type="file" name="file" accept=".pdf,.doc,.docx,.zip"
                           class="mt-2 w-full text-sm text-[#07172f] file:mr-4 file:rounded-full file:border-0 file:bg-[#07172f] file:px-4 file:py-2 file:text-xs file:font-bold file:text-white hover:file:bg-[#123f8c] @error('file') border-red-400 @enderror">
                    <p class="mt-1 text-xs text-[#667085]">Upload a new file to replace the current one.</p>
                    @error('file')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="rounded-full bg-[#c9a24d] px-6 py-3 text-sm font-bold text-[#07172f] hover:bg-[#d7b567]">Save Changes</button>
                    <a href="{{ route('admin.cms.downloads.index') }}" class="rounded-full border border-[#e6e8ee] px-6 py-3 text-sm font-bold text-[#667085] hover:bg-[#f7f3ea]">Cancel</a>
                </div>
            </form>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

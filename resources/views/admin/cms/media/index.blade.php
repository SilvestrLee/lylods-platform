<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
            <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Media Library</h2>
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

        {{-- Upload form --}}
        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Upload</p>
                <h2 class="mt-2 text-xl font-bold text-[#07172f]">Add a File</h2>
            </div>
            <form method="POST" action="{{ route('admin.cms.media.store') }}" enctype="multipart/form-data" class="space-y-5 p-6">
                @csrf
                <div class="grid gap-5 sm:grid-cols-3">
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-semibold text-[#07172f]">File <span class="text-red-500">*</span></label>
                        <input type="file" name="file" accept="image/*,.pdf,.svg"
                               class="mt-2 w-full text-sm text-[#07172f] file:mr-4 file:rounded-full file:border-0 file:bg-[#07172f] file:px-4 file:py-2 file:text-xs file:font-bold file:text-white hover:file:bg-[#123f8c] @error('file') border-red-400 @enderror">
                        <p class="mt-1.5 text-xs text-[#667085]">JPG, PNG, GIF, WebP, SVG, PDF — max 10 MB</p>
                        @error('file')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Title <span class="text-xs font-normal text-[#667085]">(optional)</span></label>
                        <input type="text" name="title" value="{{ old('title') }}"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
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

        {{-- Media grid --}}
        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Library</p>
                <h2 class="mt-2 text-xl font-bold text-[#07172f]">Uploaded Files</h2>
                <p class="mt-1 text-sm text-[#667085]">{{ $media->count() }} {{ Str::plural('file', $media->count()) }}</p>
            </div>

            @if($media->isEmpty())
                <div class="p-8 text-center">
                    <p class="text-sm text-[#667085]">No files uploaded yet. Use the form above to add your first file.</p>
                </div>
            @else
                <div class="grid grid-cols-2 gap-4 p-6 sm:grid-cols-3 lg:grid-cols-4">
                    @foreach ($media as $item)
                        <div class="group relative overflow-hidden rounded-2xl border border-[#e6e8ee] bg-[#f8fafc]">
                            @if(str_starts_with($item->mime_type, 'image/'))
                                <img src="{{ Storage::disk($item->disk)->url($item->path) }}"
                                     alt="{{ $item->alt_text ?? $item->title }}"
                                     class="h-32 w-full object-cover">
                            @else
                                <div class="flex h-32 items-center justify-center bg-[#f7f3ea]">
                                    <svg class="h-10 w-10 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                                    </svg>
                                </div>
                            @endif

                            <div class="p-3">
                                <p class="truncate text-xs font-semibold text-[#07172f]">{{ $item->title }}</p>
                                <p class="mt-0.5 text-[10px] text-[#667085]">{{ strtoupper(pathinfo($item->path, PATHINFO_EXTENSION)) }} · {{ number_format($item->file_size / 1024, 0) }} KB</p>

                                <div class="mt-2 flex items-center gap-2">
                                    <a href="{{ Storage::disk($item->disk)->url($item->path) }}"
                                       target="_blank"
                                       class="rounded-full bg-[#07172f] px-3 py-1.5 text-[10px] font-bold text-white hover:bg-[#123f8c]">
                                        View
                                    </a>
                                    <form method="POST" action="{{ route('admin.cms.media.destroy', $item) }}"
                                          onsubmit="return confirm('Delete this file? This cannot be undone.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="rounded-full border border-red-200 px-3 py-1.5 text-[10px] font-bold text-red-600 hover:bg-red-50">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

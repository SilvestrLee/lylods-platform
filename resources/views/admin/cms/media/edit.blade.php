<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.cms.media.index') }}" class="text-sm font-semibold text-[#667085] hover:text-[#07172f]">← Media Library</a>
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Edit Media</h2>
            </div>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Media Library', 'url' => route('admin.cms.media.index')], ['label' => $media->title]]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="rounded-2xl bg-red-50 px-5 py-4 text-sm font-semibold text-red-800 ring-1 ring-red-200">{{ session('error') }}</div>
        @endif

        <div class="grid gap-6 lg:grid-cols-[1fr_380px]">

            {{-- Metadata form --}}
            <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                <div class="border-b border-[#e6e8ee] p-6">
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Metadata</p>
                    <h3 class="mt-2 text-xl font-bold text-[#07172f]">Edit File Details</h3>
                </div>
                <form method="POST" action="{{ route('admin.cms.media.update', $media) }}" class="space-y-5 p-6">
                    @csrf
                    @method('PATCH')

                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $media->title) }}" required
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('title') border-red-400 @enderror">
                        @error('title')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Alt Text</label>
                        <input type="text" name="alt_text" value="{{ old('alt_text', $media->alt_text) }}"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]"
                               placeholder="Describe the image for screen readers">
                        @if(!$media->alt_text && $media->isImage())
                            <p class="mt-1 text-xs text-amber-600">⚠ Alt text is recommended for accessibility.</p>
                        @endif
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Caption</label>
                        <input type="text" name="caption" value="{{ old('caption', $media->caption) }}"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Description</label>
                        <textarea name="description" rows="3"
                                  class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('description', $media->description) }}</textarea>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Credit</label>
                            <input type="text" name="credit" value="{{ old('credit', $media->credit) }}"
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]"
                                   placeholder="Photographer / source">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Copyright</label>
                            <input type="text" name="copyright" value="{{ old('copyright', $media->copyright) }}"
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]"
                                   placeholder="© 2025 …">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Category</label>
                        <select name="category" class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            @foreach(['uploads','brand','homepage','services','case-studies','insights','partners','downloads','compliance','team','logos'] as $cat)
                                <option value="{{ $cat }}" @selected($media->category === $cat)>{{ ucfirst(str_replace('-', ' ', $cat)) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="inline-flex rounded-full bg-[#c9a24d] px-5 py-3 text-sm font-bold text-[#07172f] hover:bg-[#d7b567]">
                        Save Changes
                    </button>
                </form>
            </div>

            {{-- Sidebar: preview + file info + replace + delete --}}
            <div class="space-y-5">

                {{-- Preview --}}
                <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                    <div class="border-b border-[#e6e8ee] px-5 py-4">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#123f8c]">Preview</p>
                    </div>
                    @if($media->isImage())
                        <img src="{{ $media->url() }}" alt="{{ $media->alt_text ?? $media->title }}"
                             class="w-full object-contain" style="max-height:280px; background:#f0ede6">
                    @else
                        <div class="flex flex-col items-center justify-center gap-3 py-10">
                            <svg class="h-12 w-12 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                            <p class="text-sm font-semibold text-[#07172f]">{{ strtoupper($media->extension ?? '—') }}</p>
                        </div>
                    @endif
                    <div class="p-5">
                        <a href="{{ $media->url() }}" target="_blank"
                           class="inline-flex w-full items-center justify-center rounded-full border border-[#e6e8ee] px-4 py-2.5 text-sm font-bold text-[#07172f] hover:bg-[#f7f3ea]">
                            Open File ↗
                        </a>
                    </div>
                </div>

                {{-- File info --}}
                <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                    <div class="border-b border-[#e6e8ee] px-5 py-4">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#123f8c]">File Info</p>
                    </div>
                    <dl class="divide-y divide-[#e6e8ee] text-sm">
                        @php $rows = [
                            'Original Name' => $media->original_filename ?? $media->title,
                            'Type'          => $media->mime_type,
                            'Size'          => $media->humanFileSize(),
                            'Dimensions'    => ($media->width && $media->height) ? "{$media->width}×{$media->height}px" : null,
                            'Category'      => $media->category ? $media->categoryLabel() : null,
                            'Uploaded'      => $media->created_at->format('d M Y'),
                            'Variants'      => $media->variants ? implode(', ', array_keys($media->variants)) : 'None',
                        ]; @endphp
                        @foreach($rows as $label => $value)
                            @if($value)
                            <div class="grid grid-cols-[120px_1fr] gap-3 px-5 py-3">
                                <dt class="font-semibold text-[#667085]">{{ $label }}</dt>
                                <dd class="truncate text-[#07172f]">{{ $value }}</dd>
                            </div>
                            @endif
                        @endforeach
                    </dl>
                </div>

                {{-- Replace file --}}
                <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                    <div class="border-b border-[#e6e8ee] px-5 py-4">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#123f8c]">Replace File</p>
                        <p class="mt-1 text-xs text-[#667085]">All relationships remain intact after replacement.</p>
                    </div>
                    <form method="POST" action="{{ route('admin.cms.media.replace', $media) }}" enctype="multipart/form-data" class="p-5">
                        @csrf
                        <input type="file" name="file" accept="image/*,.pdf,.svg,.doc,.docx,.zip"
                               class="w-full text-sm text-[#07172f] file:mr-4 file:rounded-full file:border-0 file:bg-[#07172f] file:px-4 file:py-2 file:text-xs file:font-bold file:text-white hover:file:bg-[#123f8c]">
                        <button type="submit" class="mt-4 inline-flex rounded-full bg-[#123f8c] px-5 py-2.5 text-sm font-bold text-white hover:bg-[#0e336f]">
                            Replace File
                        </button>
                    </form>
                </div>

                {{-- Usage & delete --}}
                <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                    <div class="border-b border-[#e6e8ee] px-5 py-4">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#123f8c]">Usage</p>
                    </div>
                    <div class="p-5">
                        @if($usages->isEmpty())
                            <p class="text-sm text-[#667085]">Not used anywhere. Safe to delete.</p>
                            <form method="POST" action="{{ route('admin.cms.media.destroy', $media) }}"
                                  onsubmit="return confirm('Permanently delete this file?')" class="mt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex rounded-full border border-red-200 px-5 py-2.5 text-sm font-bold text-red-600 hover:bg-red-50">
                                    Delete File
                                </button>
                            </form>
                        @else
                            <p class="text-sm font-semibold text-[#07172f]">Used in:</p>
                            <ul class="mt-2 space-y-1">
                                @foreach($usages as $usage)
                                    <li class="flex items-center gap-2 text-sm text-[#667085]">
                                        <span class="h-1.5 w-1.5 rounded-full bg-[#c9a24d]"></span>
                                        {{ $usage['label'] }} ({{ $usage['count'] }})
                                    </li>
                                @endforeach
                            </ul>
                            <p class="mt-3 text-xs text-amber-700">Detach this file from all content before deleting.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

<x-admin-dashboard-shell>
    <div class="space-y-6">

        {{-- Status bar --}}
        <div class="flex items-center justify-between gap-4 rounded-[2rem] bg-white px-8 py-5 shadow-sm">
            <div class="flex items-center gap-4">
                <div>
                    <a href="{{ route('admin.cms.content.insights.index') }}"
                       class="inline-flex items-center gap-1.5 text-xs font-medium text-[#667085] hover:text-[#07172f]">
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                        </svg>
                        Insights
                    </a>
                    <h1 class="mt-0.5 text-lg font-bold text-[#07172f]">{{ $insight->title }}</h1>
                </div>
                <div>
                    @if ($insight->status === 'published')
                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-bold uppercase tracking-wider text-green-700">Published</span>
                    @elseif ($insight->status === 'archived')
                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-bold uppercase tracking-wider text-red-700">Archived</span>
                    @else
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold uppercase tracking-wider text-slate-600">Draft</span>
                    @endif
                </div>
            </div>
            <div class="flex items-center gap-3">
                @if ($insight->status !== 'published')
                    <form action="{{ route('admin.cms.content.insights.publish', $insight) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="rounded-full bg-green-600 px-5 py-2 text-xs font-bold text-white hover:bg-green-700">
                            Publish
                        </button>
                    </form>
                @endif
                @if ($insight->status === 'published')
                    <form action="{{ route('admin.cms.content.insights.archive', $insight) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="rounded-full border border-[#e6e8ee] px-5 py-2 text-xs font-bold text-[#667085] hover:border-red-300 hover:text-red-600">
                            Archive
                        </button>
                    </form>
                @endif
                @if ($insight->slug)
                    <a href="{{ url('/insights/' . $insight->slug) }}" target="_blank"
                       class="rounded-full border border-[#e6e8ee] px-5 py-2 text-xs font-bold text-[#667085] hover:border-[#07172f] hover:text-[#07172f]">
                        Preview ↗
                    </a>
                @endif
            </div>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-3 text-sm text-green-800">{{ session('success') }}</div>
        @endif

        <div class="rounded-[2rem] bg-white p-8 shadow-sm">
            @if ($errors->any())
                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-3 text-sm text-red-800">
                    <ul class="list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.cms.content.insights.update', $insight) }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')

                <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-5">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">Core Details</h2>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $insight->title) }}"
                               class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]"
                               required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">URL Slug</label>
                        <input type="text" name="slug" value="{{ old('slug', $insight->slug) }}"
                               class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                        <p class="mt-1 text-xs text-amber-600">Changing the slug will break any existing links to this insight.</p>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-3">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Category</label>
                            <input type="text" name="category" value="{{ old('category', $insight->category) }}"
                                   class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Author</label>
                            <input type="text" name="author" value="{{ old('author', $insight->author) }}"
                                   class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Reading Time (mins)</label>
                            <input type="number" name="reading_time" value="{{ old('reading_time', $insight->reading_time) }}" min="1"
                                   class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Excerpt</label>
                        <textarea name="excerpt" rows="3"
                                  class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('excerpt', $insight->excerpt) }}</textarea>
                    </div>
                </div>

                <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-5">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">Full Article Content</h2>
                    <div>
                        <textarea name="content" rows="20"
                                  class="w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d] font-mono">{{ old('content', $insight->content) }}</textarea>
                    </div>
                </div>

                <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-5">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">SEO</h2>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">SEO Title</label>
                        <input type="text" name="seo_title" value="{{ old('seo_title', $insight->seo_title) }}"
                               class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">SEO Description</label>
                        <textarea name="seo_description" rows="2"
                                  class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('seo_description', $insight->seo_description) }}</textarea>
                    </div>
                </div>

                <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-4">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">Options</h2>

                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="featured" value="1" {{ old('featured', $insight->featured) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-[#e6e8ee] text-[#c9a24d] focus:ring-[#c9a24d]">
                        <span class="text-sm font-medium text-[#07172f]">Featured</span>
                    </label>

                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="sitemap_include" value="1" {{ old('sitemap_include', $insight->sitemap_include) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-[#e6e8ee] text-[#c9a24d] focus:ring-[#c9a24d]">
                        <span class="text-sm font-medium text-[#07172f]">Include in sitemap</span>
                    </label>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            class="rounded-full bg-[#07172f] px-7 py-3 text-sm font-bold text-white transition hover:bg-[#0d2144]">
                        Save Changes
                    </button>
                    <a href="{{ route('admin.cms.content.insights.index') }}"
                       class="rounded-full border border-[#e6e8ee] px-7 py-3 text-sm font-bold text-[#667085] hover:border-[#07172f] hover:text-[#07172f]">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        <div class="rounded-[2rem] border border-red-200 bg-white p-8 shadow-sm">
            <h2 class="text-sm font-bold text-red-700">Delete Insight</h2>
            <p class="mt-1 text-xs text-[#667085]">This action soft-deletes the record.</p>
            <form action="{{ route('admin.cms.content.insights.destroy', $insight) }}" method="POST" class="mt-4"
                  onsubmit="return confirm('Delete this insight?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="rounded-full bg-red-600 px-5 py-2 text-xs font-bold text-white hover:bg-red-700">
                    Delete Insight
                </button>
            </form>
        </div>

    </div>
</x-admin-dashboard-shell>

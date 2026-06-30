<x-admin-dashboard-shell>
    <div class="rounded-[2rem] bg-white p-8 shadow-sm"
         x-data="{
             title: '',
             slug: '',
             slugEdited: false,
             syncSlug() {
                 if (!this.slugEdited) {
                     this.slug = this.title.toLowerCase()
                         .replace(/[^a-z0-9\s-]/g, '')
                         .trim()
                         .replace(/\s+/g, '-')
                         .replace(/-+/g, '-');
                 }
             }
         }">

        <div class="mb-8">
            <a href="{{ route('admin.cms.content.insights.index') }}"
               class="inline-flex items-center gap-2 text-sm font-medium text-[#667085] hover:text-[#07172f]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                </svg>
                Back to Insights
            </a>
        </div>

        <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
        <h1 class="mt-1 text-2xl font-bold text-[#07172f]">New Insight</h1>
        <p class="mt-1 text-sm text-[#667085]">Saved as draft. Publish from the edit screen.</p>

        @if ($errors->any())
            <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-3 text-sm text-red-800">
                <ul class="list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.cms.content.insights.store') }}" method="POST" class="mt-8 space-y-6">
            @csrf

            {{-- Core --}}
            <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-5">
                <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">Core Details</h2>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" x-model="title" x-on:input="syncSlug()"
                           value="{{ old('title') }}"
                           class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]"
                           required>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">URL Slug</label>
                    <input type="text" name="slug" x-model="slug" x-on:input="slugEdited = true"
                           value="{{ old('slug') }}"
                           placeholder="auto-generated from title"
                           class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                    <p class="mt-1 text-xs text-[#667085]">Leave blank to auto-generate. Becomes: /insights/your-slug</p>
                </div>

                <div class="grid gap-5 sm:grid-cols-3">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Category</label>
                        <input type="text" name="category" value="{{ old('category') }}"
                               placeholder="e.g. Business"
                               class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Author</label>
                        <input type="text" name="author" value="{{ old('author') }}"
                               class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Reading Time (mins)</label>
                        <input type="number" name="reading_time" value="{{ old('reading_time') }}" min="1"
                               class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Excerpt</label>
                    <textarea name="excerpt" rows="3"
                              placeholder="Short description for listing cards"
                              class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('excerpt') }}</textarea>
                </div>
            </div>

            {{-- Full content --}}
            <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-5">
                <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">Full Article Content</h2>
                <div>
                    <textarea name="content" rows="16"
                              placeholder="Full article body (plain text or HTML)"
                              class="w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d] font-mono">{{ old('content') }}</textarea>
                </div>
            </div>

            {{-- SEO --}}
            <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-5">
                <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">SEO</h2>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">SEO Title</label>
                    <input type="text" name="seo_title" value="{{ old('seo_title') }}"
                           class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">SEO Description</label>
                    <textarea name="seo_description" rows="2"
                              class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('seo_description') }}</textarea>
                </div>
            </div>

            {{-- Options --}}
            <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-4">
                <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">Options</h2>

                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}
                           class="h-4 w-4 rounded border-[#e6e8ee] text-[#c9a24d] focus:ring-[#c9a24d]">
                    <span class="text-sm font-medium text-[#07172f]">Featured</span>
                    <span class="text-xs text-[#667085]">— shown prominently on the insights page</span>
                </label>

                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="sitemap_include" value="1" checked
                           class="h-4 w-4 rounded border-[#e6e8ee] text-[#c9a24d] focus:ring-[#c9a24d]">
                    <span class="text-sm font-medium text-[#07172f]">Include in sitemap</span>
                </label>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="rounded-full bg-[#07172f] px-7 py-3 text-sm font-bold text-white transition hover:bg-[#0d2144]">
                    Save as Draft
                </button>
                <a href="{{ route('admin.cms.content.insights.index') }}"
                   class="rounded-full border border-[#e6e8ee] px-7 py-3 text-sm font-bold text-[#667085] hover:border-[#07172f] hover:text-[#07172f]">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-admin-dashboard-shell>

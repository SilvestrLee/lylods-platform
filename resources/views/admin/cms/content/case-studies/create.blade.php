<x-app-layout>
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
            <a href="{{ route('admin.cms.content.case-studies.index') }}"
               class="inline-flex items-center gap-2 text-sm font-medium text-[#667085] hover:text-[#07172f]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                </svg>
                Back to Case Studies
            </a>
        </div>

        <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
        <h1 class="mt-1 text-2xl font-bold text-[#07172f]">New Case Study</h1>
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

        <form action="{{ route('admin.cms.content.case-studies.store') }}" method="POST" class="mt-8 space-y-6">
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
                    <p class="mt-1 text-xs text-[#667085]">Leave blank to auto-generate. Becomes: /case-studies/your-slug</p>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Industry</label>
                    <input type="text" name="industry" value="{{ old('industry') }}"
                           placeholder="e.g. Business &amp; Technology"
                           class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Summary</label>
                    <textarea name="summary" rows="3"
                              placeholder="Short summary for listing cards"
                              class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('summary') }}</textarea>
                </div>
            </div>

            {{-- Content --}}
            <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-5">
                <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">Case Study Content</h2>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">The Challenge</label>
                    <textarea name="challenge" rows="4"
                              class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('challenge') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Our Role</label>
                    <textarea name="our_role" rows="4"
                              class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('our_role') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">The Outcome</label>
                    <textarea name="outcome" rows="4"
                              class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('outcome') }}</textarea>
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
                    <span class="text-xs text-[#667085]">— shown first on listings</span>
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
                <a href="{{ route('admin.cms.content.case-studies.index') }}"
                   class="rounded-full border border-[#e6e8ee] px-7 py-3 text-sm font-bold text-[#667085] hover:border-[#07172f] hover:text-[#07172f]">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-admin-dashboard-shell>
</x-app-layout>

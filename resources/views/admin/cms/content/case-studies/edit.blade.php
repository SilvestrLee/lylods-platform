<x-app-layout>
<x-admin-dashboard-shell>
    <div class="space-y-6">

        {{-- Status bar --}}
        <div class="flex items-center justify-between gap-4 rounded-[2rem] bg-white px-8 py-5 shadow-sm">
            <div class="flex items-center gap-4">
                <div>
                    <a href="{{ route('admin.cms.content.case-studies.index') }}"
                       class="inline-flex items-center gap-1.5 text-xs font-medium text-[#667085] hover:text-[#07172f]">
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                        </svg>
                        Case Studies
                    </a>
                    <h1 class="mt-0.5 text-lg font-bold text-[#07172f]">{{ $caseStudy->title }}</h1>
                </div>
                <div>
                    @if ($caseStudy->status === 'published')
                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-bold uppercase tracking-wider text-green-700">Published</span>
                    @elseif ($caseStudy->status === 'archived')
                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-bold uppercase tracking-wider text-red-700">Archived</span>
                    @else
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold uppercase tracking-wider text-slate-600">Draft</span>
                    @endif
                </div>
            </div>
            <div class="flex items-center gap-3">
                @if ($caseStudy->status !== 'published')
                    <form action="{{ route('admin.cms.content.case-studies.publish', $caseStudy) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="rounded-full bg-green-600 px-5 py-2 text-xs font-bold text-white hover:bg-green-700">
                            Publish
                        </button>
                    </form>
                @endif
                @if ($caseStudy->status === 'published')
                    <form action="{{ route('admin.cms.content.case-studies.archive', $caseStudy) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="rounded-full border border-[#e6e8ee] px-5 py-2 text-xs font-bold text-[#667085] hover:border-red-300 hover:text-red-600">
                            Archive
                        </button>
                    </form>
                @endif
                @if ($caseStudy->slug)
                    <a href="{{ url('/case-studies/' . $caseStudy->slug) }}" target="_blank"
                       class="rounded-full border border-[#e6e8ee] px-5 py-2 text-xs font-bold text-[#667085] hover:border-[#07172f] hover:text-[#07172f]">
                        Preview ↗
                    </a>
                @endif
            </div>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-3 text-sm text-green-800">{{ session('success') }}</div>
        @endif

        {{-- Main form --}}
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

            <form action="{{ route('admin.cms.content.case-studies.update', $caseStudy) }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                {{-- Media --}}
                <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-5">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">Featured Image</h2>
                    <x-admin.image-field
                        label="Featured Image"
                        helper="Shown as the thumbnail on case study listings and cross-links (e.g. the Industries page). Alt text is edited from the Media Library."
                        :media="$caseStudy->featuredMedia"
                        input-name="featured_media_file"
                        remove-name="remove_featured_media"
                    />
                </div>

                {{-- Core --}}
                <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-5">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">Core Details</h2>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $caseStudy->title) }}"
                               class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]"
                               required>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">URL Slug</label>
                        <input type="text" name="slug" value="{{ old('slug', $caseStudy->slug) }}"
                               class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                        <p class="mt-1 text-xs text-amber-600">Changing the slug will break any existing links to this case study.</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Industry</label>
                        <input type="text" name="industry" value="{{ old('industry', $caseStudy->industry) }}"
                               class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Summary</label>
                        <textarea name="summary" rows="3"
                                  class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('summary', $caseStudy->summary) }}</textarea>
                    </div>
                </div>

                {{-- Content --}}
                <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-5">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">Case Study Content</h2>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">The Challenge</label>
                        <textarea name="challenge" rows="4"
                                  class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('challenge', $caseStudy->challenge) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Our Role</label>
                        <textarea name="our_role" rows="4"
                                  class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('our_role', $caseStudy->our_role) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">The Outcome</label>
                        <textarea name="outcome" rows="4"
                                  class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('outcome', $caseStudy->outcome) }}</textarea>
                    </div>
                </div>

                {{-- SEO Settings --}}
                <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-5">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">SEO Settings</h2>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Meta Title</label>
                        <input type="text" name="seo_title" value="{{ old('seo_title', $caseStudy->seo_title) }}"
                               class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]"
                               placeholder="Defaults to case study title">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Meta Description</label>
                        <textarea name="seo_description" rows="2"
                                  class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]"
                                  placeholder="Defaults to summary if left blank">{{ old('seo_description', $caseStudy->seo_description) }}</textarea>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Canonical URL <span class="font-normal normal-case text-[#667085]">(blank = current URL)</span></label>
                            <input type="url" name="canonical_url" value="{{ old('canonical_url', $caseStudy->canonical_url) }}"
                                   placeholder="https://..."
                                   class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                            @error('canonical_url') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Robots</label>
                            <select name="robots"
                                    class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                                @foreach (['index,follow' => 'index, follow (default)', 'noindex,follow' => 'noindex, follow', 'index,nofollow' => 'index, nofollow', 'noindex,nofollow' => 'noindex, nofollow'] as $val => $label)
                                    <option value="{{ $val }}" {{ old('robots', $caseStudy->robots ?? 'index,follow') === $val ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Options --}}
                <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-4">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">Options</h2>

                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="featured" value="1" {{ old('featured', $caseStudy->featured) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-[#e6e8ee] text-[#c9a24d] focus:ring-[#c9a24d]">
                        <span class="text-sm font-medium text-[#07172f]">Featured</span>
                    </label>

                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="sitemap_include" value="1" {{ old('sitemap_include', $caseStudy->sitemap_include) ? 'checked' : '' }}
                               class="h-4 w-4 rounded border-[#e6e8ee] text-[#c9a24d] focus:ring-[#c9a24d]">
                        <span class="text-sm font-medium text-[#07172f]">Include in sitemap</span>
                    </label>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            class="rounded-full bg-[#07172f] px-7 py-3 text-sm font-bold text-white transition hover:bg-[#0d2144]">
                        Save Changes
                    </button>
                    <a href="{{ route('admin.cms.content.case-studies.index') }}"
                       class="rounded-full border border-[#e6e8ee] px-7 py-3 text-sm font-bold text-[#667085] hover:border-[#07172f] hover:text-[#07172f]">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        {{-- Delete --}}
        <div class="rounded-[2rem] border border-red-200 bg-white p-8 shadow-sm">
            <h2 class="text-sm font-bold text-red-700">Delete Case Study</h2>
            <p class="mt-1 text-xs text-[#667085]">This action soft-deletes the record. It will no longer appear on the public website.</p>
            <form action="{{ route('admin.cms.content.case-studies.destroy', $caseStudy) }}" method="POST" class="mt-4"
                  onsubmit="return confirm('Delete this case study? This can be reversed from the database.')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="rounded-full bg-red-600 px-5 py-2 text-xs font-bold text-white hover:bg-red-700">
                    Delete Case Study
                </button>
            </form>
        </div>

    </div>
</x-admin-dashboard-shell>
</x-app-layout>

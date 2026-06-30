<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Edit Page — {{ $page->title }}</h2>
            </div>
            <div class="flex items-center gap-3">
                @php
                    $slugMap = [
                        'home'              => '/',
                        'about'             => '/about',
                        'services'          => '/services',
                        'property'          => '/property',
                        'community-projects'=> '/community-projects',
                        'case-studies'      => '/case-studies',
                        'insights'          => '/insights',
                        'careers'           => '/careers',
                        'contact'           => '/contact',
                        'privacy-notice'    => '/privacy-notice',
                        'cookie-notice'     => '/cookie-notice',
                        'accessibility'     => '/accessibility',
                        'complaints'        => '/complaints',
                        'terms'             => '/terms',
                    ];
                    $previewUrl = url($slugMap[$page->slug] ?? '/' . $page->slug);
                @endphp
                <a href="{{ $previewUrl }}" target="_blank" rel="noopener noreferrer"
                   class="rounded-full border border-[#d0d5dd] px-5 py-2 text-sm font-semibold text-[#667085] hover:border-[#07172f] hover:text-[#07172f]">
                    View Live ↗
                </a>
                <a href="{{ route('admin.cms.pages.index') }}"
                   class="rounded-full border border-[#d0d5dd] px-5 py-2 text-sm font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                    ← All Pages
                </a>
            </div>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Pages', 'url' => route('admin.cms.pages.index')], ['label' => $page->title]]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.cms.pages.update', $page) }}">
            @csrf
            @method('PATCH')

            <div class="space-y-6">

                {{-- Hero Content --}}
                <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                    <div class="border-b border-[#e6e8ee] p-6">
                        <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">/{{ $page->slug }}</p>
                        <h1 class="mt-2 text-2xl font-bold text-[#07172f]">Hero Content</h1>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">The content displayed in the hero section at the top of this page.</p>
                    </div>

                    <div class="space-y-6 p-6">

                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Page Title <span class="text-red-500">*</span></label>
                            <input type="text" name="title" value="{{ old('title', $page->title) }}" required
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('title') border-red-400 @enderror">
                            <p class="mt-1.5 text-xs text-[#667085]">Internal reference name for this page.</p>
                            @error('title')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Hero Subtitle <span class="text-xs font-normal text-[#667085]">(gold label above the heading)</span></label>
                            <input type="text" name="hero_subtitle" value="{{ old('hero_subtitle', $page->hero_subtitle) }}"
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Hero Heading</label>
                            <textarea name="hero_title" rows="2"
                                      class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('hero_title', $page->hero_title) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Hero Description</label>
                            <textarea name="hero_description" rows="4"
                                      class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('hero_description', $page->hero_description) }}</textarea>
                        </div>

                        <div class="grid gap-6 sm:grid-cols-2">
                            <div>
                                <label class="block text-sm font-semibold text-[#07172f]">Primary CTA Label</label>
                                <input type="text" name="primary_cta_label" value="{{ old('primary_cta_label', $page->primary_cta_label) }}"
                                       placeholder="e.g. Discuss Your Project"
                                       class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-[#07172f]">Primary CTA URL</label>
                                <input type="text" name="primary_cta_url" value="{{ old('primary_cta_url', $page->primary_cta_url) }}"
                                       placeholder="e.g. /contact or #anchor"
                                       class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            </div>
                        </div>

                        <div class="grid gap-6 sm:grid-cols-2">
                            <div>
                                <label class="block text-sm font-semibold text-[#07172f]">Secondary CTA Label</label>
                                <input type="text" name="secondary_cta_label" value="{{ old('secondary_cta_label', $page->secondary_cta_label) }}"
                                       placeholder="e.g. Explore Our Services"
                                       class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-[#07172f]">Secondary CTA URL</label>
                                <input type="text" name="secondary_cta_url" value="{{ old('secondary_cta_url', $page->secondary_cta_url) }}"
                                       placeholder="e.g. /services"
                                       class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SEO --}}
                <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                    <div class="border-b border-[#e6e8ee] p-6">
                        <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">SEO</p>
                        <h2 class="mt-2 text-xl font-bold text-[#07172f]">Search Engine Metadata</h2>
                    </div>
                    <div class="space-y-6 p-6">
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Meta Title <span class="text-xs font-normal text-[#667085]">(overrides page title in search results)</span></label>
                            <input type="text" name="meta_title" value="{{ old('meta_title', $page->meta_title) }}"
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Meta Description</label>
                            <textarea name="meta_description" rows="3"
                                      class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('meta_description', $page->meta_description) }}</textarea>
                            <p class="mt-1.5 text-xs text-[#667085]">Recommended 120–160 characters.</p>
                        </div>

                        <div class="grid gap-6 sm:grid-cols-2">
                            <div>
                                <label class="block text-sm font-semibold text-[#07172f]">Canonical URL <span class="text-xs font-normal text-[#667085]">(leave blank to use current URL)</span></label>
                                <input type="url" name="canonical_url" value="{{ old('canonical_url', $page->canonical_url) }}"
                                       placeholder="https://example.com/page"
                                       class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                                @error('canonical_url') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-[#07172f]">Robots</label>
                                <select name="robots"
                                        class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                                    @foreach (['index,follow' => 'index, follow (default)', 'noindex,follow' => 'noindex, follow', 'index,nofollow' => 'index, nofollow', 'noindex,nofollow' => 'noindex, nofollow'] as $val => $label)
                                        <option value="{{ $val }}" {{ old('robots', $page->robots ?? 'index,follow') === $val ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center gap-6">
                            <label class="flex items-center gap-3">
                                <input type="hidden" name="sitemap_include" value="0">
                                <input type="checkbox" name="sitemap_include" value="1"
                                       {{ old('sitemap_include', $page->sitemap_include ?? true) ? 'checked' : '' }}
                                       class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                                <span class="text-sm font-semibold text-[#07172f]">Include in sitemap</span>
                            </label>
                            <label class="flex items-center gap-3">
                                <input type="hidden" name="is_published" value="0">
                                <input type="checkbox" id="is_published" name="is_published" value="1"
                                       {{ old('is_published', $page->is_published) ? 'checked' : '' }}
                                       class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                                <label for="is_published" class="text-sm font-semibold text-[#07172f]">Page is published</label>
                            </label>
                        </div>
                    </div>

                    <div class="border-t border-[#e6e8ee] bg-[#f8fafc] px-6 py-5">
                        <button type="submit"
                                class="inline-flex rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white shadow-sm hover:bg-[#123f8c]">
                            Save Changes
                        </button>
                    </div>
                </div>

            </div>
        </form>
    </x-admin-dashboard-shell>
</x-app-layout>

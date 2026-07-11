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

        <form method="POST" action="{{ route('admin.cms.pages.update', $page) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            @if ($page->slug === 'home')
                {{-- Enterprise structured editor: independently collapsible panels, one per homepage section. --}}
                <div class="space-y-6">
                    <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee] p-6">
                        <x-admin.field label="Page Title" required helper="Internal reference name for this page.">
                            <input type="text" name="title" value="{{ old('title', $page->title) }}" required
                                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('title') border-red-400 @enderror">
                            @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </x-admin.field>
                    </div>

                    @include('admin.cms.pages.partials.home.hero')
                    @include('admin.cms.pages.partials.home.statistics')
                    @include('admin.cms.pages.partials.home.services')
                    @include('admin.cms.pages.partials.home.industries')
                    @include('admin.cms.pages.partials.home.why-choose-us')
                    @include('admin.cms.pages.partials.home.engagement')
                    @include('admin.cms.pages.partials.home.discipline-strip')
                    @include('admin.cms.pages.partials.home.about-values')
                    @include('admin.cms.pages.partials.home.testimonials')
                    @include('admin.cms.pages.partials.home.partners')
                    @include('admin.cms.pages.partials.home.work-with-us')

                    <x-admin.panel subtitle="SEO" title="Search Engine Metadata">
                        @include('admin.cms.pages.partials.seo-fields')
                    </x-admin.panel>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="inline-flex rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white shadow-sm hover:bg-[#123f8c]">
                            Save Changes
                        </button>
                    </div>
                </div>
            @elseif ($page->slug === 'about')
                {{-- Enterprise structured editor: independently collapsible panels, one per About section. --}}
                <div class="space-y-6">
                    <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee] p-6">
                        <x-admin.field label="Page Title" required helper="Internal reference name for this page.">
                            <input type="text" name="title" value="{{ old('title', $page->title) }}" required
                                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('title') border-red-400 @enderror">
                            @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </x-admin.field>
                    </div>

                    @include('admin.cms.pages.partials.about.hero')
                    @include('admin.cms.pages.partials.about.intro')
                    @include('admin.cms.pages.partials.about.how-we-work')
                    @include('admin.cms.pages.partials.about.focus-areas')
                    @include('admin.cms.pages.partials.about.principles')
                    @include('admin.cms.pages.partials.about.audience')
                    @include('admin.cms.pages.partials.about.differentiators')
                    @include('admin.cms.pages.partials.about.cta')

                    <x-admin.panel subtitle="SEO" title="Search Engine Metadata">
                        @include('admin.cms.pages.partials.seo-fields')
                    </x-admin.panel>

                    <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee] p-6">
                        <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Managed Elsewhere</p>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Our People and Qualifications &amp; Accreditations are edited from their own CMS modules — content is shared with other pages, so it is not duplicated here.</p>
                        <div class="mt-4 flex flex-wrap gap-3">
                            <a href="{{ route('admin.cms.people.team.index') }}" class="rounded-full border border-[#d0d5dd] px-5 py-2 text-sm font-semibold text-[#07172f] hover:border-[#07172f]">Manage Team ↗</a>
                            <a href="{{ route('admin.cms.trust.index') }}" class="rounded-full border border-[#d0d5dd] px-5 py-2 text-sm font-semibold text-[#07172f] hover:border-[#07172f]">Manage Accreditations ↗</a>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="inline-flex rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white shadow-sm hover:bg-[#123f8c]">
                            Save Changes
                        </button>
                    </div>
                </div>
            @elseif ($page->slug === 'services')
                {{-- Enterprise structured editor: independently collapsible panels, one per Services section. --}}
                <div class="space-y-6">
                    <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee] p-6">
                        <x-admin.field label="Page Title" required helper="Internal reference name for this page.">
                            <input type="text" name="title" value="{{ old('title', $page->title) }}" required
                                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('title') border-red-400 @enderror">
                            @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </x-admin.field>
                    </div>

                    @include('admin.cms.pages.partials.services.hero')
                    @include('admin.cms.pages.partials.services.intro')
                    @include('admin.cms.pages.partials.services.why-us')
                    @include('admin.cms.pages.partials.services.how-we-work')
                    @include('admin.cms.pages.partials.services.cta')

                    <x-admin.panel subtitle="SEO" title="Search Engine Metadata">
                        @include('admin.cms.pages.partials.seo-fields')
                    </x-admin.panel>

                    <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee] p-6">
                        <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Managed Elsewhere</p>
                        <p class="mt-2 text-sm leading-6 text-[#667085]">The service catalogue (service areas and individual services) is edited from its own CMS module — content is shared with other pages, so it is not duplicated here.</p>
                        <div class="mt-4 flex flex-wrap gap-3">
                            <a href="{{ route('admin.cms.services.groups.index') }}" class="rounded-full border border-[#d0d5dd] px-5 py-2 text-sm font-semibold text-[#07172f] hover:border-[#07172f]">Manage Service Catalogue ↗</a>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="inline-flex rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white shadow-sm hover:bg-[#123f8c]">
                            Save Changes
                        </button>
                    </div>
                </div>
            @elseif ($page->slug === 'industries')
                {{-- Enterprise structured editor: independently collapsible panels, one per Industries section. --}}
                <div class="space-y-6">
                    <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee] p-6">
                        <x-admin.field label="Page Title" required helper="Internal reference name for this page.">
                            <input type="text" name="title" value="{{ old('title', $page->title) }}" required
                                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('title') border-red-400 @enderror">
                            @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </x-admin.field>
                    </div>

                    @include('admin.cms.pages.partials.industries.hero')
                    @include('admin.cms.pages.partials.industries.intro')
                    @include('admin.cms.pages.partials.industries.grid')
                    @include('admin.cms.pages.partials.industries.cta')

                    <x-admin.panel subtitle="SEO" title="Search Engine Metadata">
                        @include('admin.cms.pages.partials.seo-fields')
                    </x-admin.panel>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="inline-flex rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white shadow-sm hover:bg-[#123f8c]">
                            Save Changes
                        </button>
                    </div>
                </div>
            @elseif ($page->slug === 'property')
                {{-- Enterprise structured editor: independently collapsible panels, one per Property section. --}}
                <div class="space-y-6">
                    <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee] p-6">
                        <x-admin.field label="Page Title" required helper="Internal reference name for this page.">
                            <input type="text" name="title" value="{{ old('title', $page->title) }}" required
                                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('title') border-red-400 @enderror">
                            @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </x-admin.field>
                    </div>

                    @include('admin.cms.pages.partials.property.hero')
                    @include('admin.cms.pages.partials.property.support')
                    @include('admin.cms.pages.partials.property.context')
                    @include('admin.cms.pages.partials.property.audience')
                    @include('admin.cms.pages.partials.property.why-us')
                    @include('admin.cms.pages.partials.property.role')
                    @include('admin.cms.pages.partials.property.disclaimer')
                    @include('admin.cms.pages.partials.property.cta')

                    <x-admin.panel subtitle="SEO" title="Search Engine Metadata">
                        @include('admin.cms.pages.partials.seo-fields')
                    </x-admin.panel>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="inline-flex rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white shadow-sm hover:bg-[#123f8c]">
                            Save Changes
                        </button>
                    </div>
                </div>
            @elseif ($page->slug === 'community-projects')
                {{-- Enterprise structured editor: independently collapsible panels, one per Community Projects section. --}}
                <div class="space-y-6">
                    <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee] p-6">
                        <x-admin.field label="Page Title" required helper="Internal reference name for this page.">
                            <input type="text" name="title" value="{{ old('title', $page->title) }}" required
                                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('title') border-red-400 @enderror">
                            @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </x-admin.field>
                    </div>

                    @include('admin.cms.pages.partials.community-projects.hero')
                    @include('admin.cms.pages.partials.community-projects.support')
                    @include('admin.cms.pages.partials.community-projects.audience')
                    @include('admin.cms.pages.partials.community-projects.role')
                    @include('admin.cms.pages.partials.community-projects.how-we-work')
                    @include('admin.cms.pages.partials.community-projects.engagement')
                    @include('admin.cms.pages.partials.community-projects.cta')

                    <x-admin.panel subtitle="SEO" title="Search Engine Metadata">
                        @include('admin.cms.pages.partials.seo-fields')
                    </x-admin.panel>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="inline-flex rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white shadow-sm hover:bg-[#123f8c]">
                            Save Changes
                        </button>
                    </div>
                </div>
            @elseif ($page->slug === 'investment')
                {{-- Enterprise structured editor: independently collapsible panels, one per Investment section. --}}
                <div class="space-y-6">
                    <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee] p-6">
                        <x-admin.field label="Page Title" required helper="Internal reference name for this page.">
                            <input type="text" name="title" value="{{ old('title', $page->title) }}" required
                                   class="w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('title') border-red-400 @enderror">
                            @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </x-admin.field>
                    </div>

                    @include('admin.cms.pages.partials.investment.hero')
                    @include('admin.cms.pages.partials.investment.stats')
                    @include('admin.cms.pages.partials.investment.credibility')
                    @include('admin.cms.pages.partials.investment.approach')
                    @include('admin.cms.pages.partials.investment.why')
                    @include('admin.cms.pages.partials.investment.process')
                    @include('admin.cms.pages.partials.investment.cta')

                    <x-admin.panel subtitle="SEO" title="Search Engine Metadata">
                        @include('admin.cms.pages.partials.seo-fields')
                    </x-admin.panel>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="inline-flex rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white shadow-sm hover:bg-[#123f8c]">
                            Save Changes
                        </button>
                    </div>
                </div>
            @else
                {{-- Existing flat editing interface — unchanged for every non-homepage page. --}}
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

                            <div>
                                <label class="block text-sm font-semibold text-[#07172f]">Hero Background Image</label>
                                @if ($page->heroMedia)
                                    <div class="mt-2 mb-3 inline-flex items-center gap-3 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] p-3">
                                        <img src="{{ $page->heroMedia->url() }}" alt="" class="h-14 w-24 rounded-lg object-cover">
                                        <span class="text-xs text-[#667085]">Current background image</span>
                                        <label class="flex items-center gap-2 text-xs font-semibold text-red-600">
                                            <input type="checkbox" name="remove_hero_image" value="1" class="rounded">
                                            Remove
                                        </label>
                                    </div>
                                @else
                                    <p class="mt-2 mb-3 text-xs text-[#667085]">No hero image uploaded — the design's default background is used.</p>
                                @endif
                                <input type="file" name="hero_image_file" accept="image/*"
                                       class="mt-2 w-full text-sm text-[#07172f] file:mr-4 file:rounded-full file:border-0 file:bg-[#07172f] file:px-4 file:py-2 file:text-xs file:font-bold file:text-white hover:file:bg-[#123f8c]">
                                <p class="mt-1.5 text-xs text-[#667085]">Upload a new file to replace the current background image.</p>
                                @error('hero_image_file') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>
                    </div>

                    @include('admin.cms.pages.partials.seo')

                </div>
            @endif
        </form>
    </x-admin-dashboard-shell>
</x-app-layout>

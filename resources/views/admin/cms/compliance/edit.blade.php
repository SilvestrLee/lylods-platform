<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS — Compliance</p>
            <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">{{ $compliancePage->title }}</h2>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Compliance Pages', 'url' => route('admin.cms.compliance.index')], ['label' => $compliancePage->title]]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.cms.compliance.update', $compliancePage) }}" class="space-y-6">
            @csrf @method('PATCH')

            {{-- Meta --}}
            <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                <div class="border-b border-[#e6e8ee] p-6">
                    <h2 class="font-semibold text-[#07172f]">Page Details</h2>
                </div>
                <div class="space-y-5 p-6">
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Page Title</label>
                            <input type="text" name="title" value="{{ old('title', $compliancePage->title) }}"
                                   class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                            @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Last Reviewed</label>
                            <input type="date" name="last_reviewed_at"
                                   value="{{ old('last_reviewed_at', $compliancePage->last_reviewed_at?->format('Y-m-d')) }}"
                                   class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                            @error('last_reviewed_at') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Content --}}
            <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                <div class="border-b border-[#e6e8ee] p-6">
                    <h2 class="font-semibold text-[#07172f]">Page Content</h2>
                    <p class="mt-1 text-sm text-[#667085]">Enter HTML. Content renders directly on the public page. Use semantic tags: &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;a&gt;.</p>
                </div>
                <div class="p-6">
                    <textarea name="content" rows="24"
                              class="w-full rounded-xl border border-[#e6e8ee] px-4 py-3 font-mono text-xs leading-relaxed text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('content', $compliancePage->content) }}</textarea>
                    @error('content') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- SEO --}}
            <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                <div class="border-b border-[#e6e8ee] p-6">
                    <h2 class="font-semibold text-[#07172f]">SEO</h2>
                </div>
                <div class="space-y-5 p-6">
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Meta Title</label>
                        <input type="text" name="seo_title" value="{{ old('seo_title', $compliancePage->seo_title) }}"
                               class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                        @error('seo_title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Meta Description</label>
                        <textarea name="seo_description" rows="3"
                                  class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('seo_description', $compliancePage->seo_description) }}</textarea>
                        @error('seo_description') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                        class="rounded-full bg-[#07172f] px-6 py-2.5 text-sm font-bold text-white hover:bg-[#123f8c]">
                    Save Changes
                </button>
                <a href="{{ route('admin.cms.compliance.index') }}"
                   class="rounded-full px-6 py-2.5 text-sm font-semibold text-[#667085] hover:text-[#07172f]">
                    Cancel
                </a>
                <a href="/{{ $compliancePage->slug }}" target="_blank"
                   class="ml-auto rounded-full border border-[#e6e8ee] px-5 py-2.5 text-sm font-semibold text-[#667085] hover:border-[#07172f] hover:text-[#07172f]">
                    View Page →
                </a>
            </div>
        </form>
    </x-admin-dashboard-shell>
</x-app-layout>

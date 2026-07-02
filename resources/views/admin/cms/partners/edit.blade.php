<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
            <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Edit Partner</h2>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Partners', 'url' => route('admin.cms.partners.index')], ['label' => $partner->name]]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">{{ session('success') }}</div>
        @endif

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Edit Partner</p>
                <h3 class="mt-2 text-xl font-bold text-[#07172f]">{{ $partner->name }}</h3>
            </div>
            <form method="POST" action="{{ route('admin.cms.partners.update', $partner) }}" enctype="multipart/form-data" class="space-y-5 p-6">
                @csrf
                @method('PATCH')

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name', $partner->name) }}" required
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Website</label>
                        <input type="url" name="website" value="{{ old('website', $partner->website) }}"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>
                </div>

                <div class="grid gap-5 sm:grid-cols-3">
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Category</label>
                        <input type="text" name="category" value="{{ old('category', $partner->category) }}"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Display Order</label>
                        <input type="number" name="display_order" value="{{ old('display_order', $partner->display_order) }}" min="0"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>
                    <div class="flex flex-col gap-3 pt-8">
                        <label class="flex items-center gap-2 text-sm font-semibold text-[#07172f]">
                            <input type="hidden" name="is_visible" value="0">
                            <input type="checkbox" name="is_visible" value="1" {{ $partner->is_visible ? 'checked' : '' }} class="rounded">
                            Visible
                        </label>
                        <label class="flex items-center gap-2 text-sm font-semibold text-[#07172f]">
                            <input type="hidden" name="featured" value="0">
                            <input type="checkbox" name="featured" value="1" {{ $partner->featured ? 'checked' : '' }} class="rounded">
                            Featured
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#07172f]">Logo</label>
                    @if($partner->logo)
                        <div class="mt-2 mb-3 inline-flex items-center gap-3 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] p-3">
                            <img src="{{ $partner->logo->url() }}" alt="{{ $partner->name }}" class="h-10 w-20 object-contain">
                            <span class="text-xs text-[#667085]">Current logo</span>
                        </div>
                    @endif
                    <input type="file" name="logo_file" accept="image/*,.svg"
                           class="mt-2 w-full text-sm text-[#07172f] file:mr-4 file:rounded-full file:border-0 file:bg-[#07172f] file:px-4 file:py-2 file:text-xs file:font-bold file:text-white hover:file:bg-[#123f8c]">
                    <p class="mt-1 text-xs text-[#667085]">Upload a new file to replace the current logo.</p>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="rounded-full bg-[#c9a24d] px-6 py-3 text-sm font-bold text-[#07172f] hover:bg-[#d7b567]">Save Changes</button>
                    <a href="{{ route('admin.cms.partners.index') }}" class="rounded-full border border-[#e6e8ee] px-6 py-3 text-sm font-bold text-[#667085] hover:bg-[#f7f3ea]">Cancel</a>
                </div>
            </form>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Add Organisation</h2>
            </div>
            <a href="{{ route('admin.cms.trust.index') }}"
               class="rounded-full border border-[#d0d5dd] px-5 py-2 text-sm font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                ← All Organisations
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Organisations', 'url' => route('admin.cms.trust.index')], ['label' => 'Add']]" />
        </x-slot>

        <form method="POST" action="{{ route('admin.cms.trust.store') }}">
            @csrf

            <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                <div class="border-b border-[#e6e8ee] p-6">
                    <h1 class="text-xl font-bold text-[#07172f]">Organisation Details</h1>
                </div>

                <div class="space-y-6 p-6">

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('name') border-red-400 @enderror">
                            @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Type <span class="text-red-500">*</span></label>
                            <select name="type" required
                                    class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('type') border-red-400 @enderror">
                                <option value="">Select type...</option>
                                <option value="partner" {{ old('type') === 'partner' ? 'selected' : '' }}>Partner</option>
                                <option value="accreditation" {{ old('type') === 'accreditation' ? 'selected' : '' }}>Accreditation</option>
                                <option value="client" {{ old('type') === 'client' ? 'selected' : '' }}>Client</option>
                                <option value="association" {{ old('type') === 'association' ? 'selected' : '' }}>Association</option>
                                <option value="supplier" {{ old('type') === 'supplier' ? 'selected' : '' }}>Supplier</option>
                            </select>
                            @error('type')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Website URL</label>
                        <input type="url" name="website" value="{{ old('website') }}"
                               placeholder="https://..."
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Display Order</label>
                            <input type="number" name="display_order" value="{{ old('display_order', 0) }}" min="0"
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                            <p class="mt-1.5 text-xs text-[#667085]">Lower numbers appear first within each type.</p>
                        </div>
                        <div class="flex items-center gap-3 pt-9">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" id="is_active" name="is_active" value="1" checked
                                   class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                            <label for="is_active" class="text-sm font-semibold text-[#07172f]">Visible on website</label>
                        </div>
                    </div>

                    <div class="rounded-2xl bg-[#f7f3ea] p-4 text-sm text-[#667085]">
                        <strong class="text-[#07172f]">Note:</strong> Logo upload will be available via the Media Library in a future update. Only partners and accreditations are shown on the public website.
                    </div>

                </div>

                <div class="border-t border-[#e6e8ee] bg-[#f8fafc] px-6 py-5">
                    <button type="submit"
                            class="inline-flex rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white shadow-sm hover:bg-[#123f8c]">
                        Add Organisation
                    </button>
                </div>
            </div>
        </form>
    </x-admin-dashboard-shell>
</x-app-layout>

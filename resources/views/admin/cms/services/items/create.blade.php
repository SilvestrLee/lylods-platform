<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS · Services</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Add Service Item</h2>
            </div>
            <a href="{{ route('admin.cms.services.items.index', $serviceGroup) }}"
               class="rounded-full border border-[#d0d5dd] px-5 py-2 text-sm font-semibold text-[#07172f] hover:bg-[#f7f3ea]">
                ← Back to Items
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[
                ['label' => 'CMS'],
                ['label' => 'Service Groups', 'url' => route('admin.cms.services.groups.index')],
                ['label' => $serviceGroup->name, 'url' => route('admin.cms.services.items.index', $serviceGroup)],
                ['label' => 'Add Item'],
            ]" />
        </x-slot>

        <form method="POST" action="{{ route('admin.cms.services.items.store', $serviceGroup) }}" enctype="multipart/form-data">
            @csrf

            <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                <div class="border-b border-[#e6e8ee] p-6">
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">{{ $serviceGroup->name }}</p>
                    <h1 class="mt-2 text-xl font-bold text-[#07172f]">New Service Item</h1>
                </div>

                <div class="space-y-6 p-6">

                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title') }}" required
                               placeholder="e.g. Business consultancy"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('title') border-red-400 @enderror">
                        @error('title')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Summary <span class="text-xs font-normal text-[#667085]">(optional)</span></label>
                        <input type="text" name="summary" value="{{ old('summary') }}"
                               placeholder="Brief description, max 500 chars"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Display Order</label>
                            <input type="number" name="display_order" value="{{ old('display_order', 0) }}" min="0"
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        </div>
                        <div class="flex flex-col justify-end">
                            <div class="flex items-center gap-3 pb-3">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" id="is_active" name="is_active" value="1" checked
                                       class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                                <label for="is_active" class="text-sm font-semibold text-[#07172f]">Active (visible on public site)</label>
                            </div>
                        </div>
                    </div>

                    <x-admin.image-field
                        label="Thumbnail Image (optional)"
                        helper="Shown next to this service in the catalogue when set. JPG, PNG, WEBP · max 4 MB."
                        input-name="image_file"
                        remove-name="remove_image"
                    />

                </div>

                <div class="border-t border-[#e6e8ee] bg-[#f8fafc] px-6 py-5">
                    <button type="submit"
                            class="inline-flex rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white shadow-sm hover:bg-[#123f8c]">
                        Create Item
                    </button>
                </div>
            </div>
        </form>
    </x-admin-dashboard-shell>
</x-app-layout>

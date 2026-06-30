<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS — Footer</p>
            <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Edit Footer Link</h2>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Footer'], ['label' => 'Footer Links', 'url' => route('admin.cms.footer.links.index')], ['label' => $footerLink->label]]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <h1 class="text-xl font-bold text-[#07172f]">{{ $footerLink->label }}</h1>
            </div>
            <form method="POST" action="{{ route('admin.cms.footer.links.update', $footerLink) }}" class="space-y-6 p-6">
                @csrf @method('PATCH')

                <div class="grid gap-6 sm:grid-cols-2">
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Column Group</label>
                        <select name="group" class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] bg-white px-4 py-2.5 text-sm focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                            @foreach (['company' => 'Company', 'services' => 'Services', 'portal' => 'Portal'] as $val => $lbl)
                                <option value="{{ $val }}" {{ old('group', $footerLink->group) === $val ? 'selected' : '' }}>{{ $lbl }}</option>
                            @endforeach
                        </select>
                        @error('group') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Display Order</label>
                        <input type="number" name="display_order" min="0" value="{{ old('display_order', $footerLink->display_order) }}"
                               class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                        @error('display_order') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#07172f]">Label</label>
                    <input type="text" name="label" value="{{ old('label', $footerLink->label) }}"
                           class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                    @error('label') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#07172f]">URL</label>
                    <input type="text" name="url" value="{{ old('url', $footerLink->url) }}"
                           class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                    @error('url') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="flex items-center gap-3 border-t border-[#e6e8ee] pt-6">
                    <button type="submit"
                            class="rounded-full bg-[#07172f] px-6 py-2.5 text-sm font-bold text-white hover:bg-[#123f8c]">
                        Save Changes
                    </button>
                    <a href="{{ route('admin.cms.footer.links.index') }}"
                       class="rounded-full px-6 py-2.5 text-sm font-semibold text-[#667085] hover:text-[#07172f]">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

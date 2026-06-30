<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Site Settings</h2>
            </div>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Site Settings']]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.cms.site-settings.update') }}">
            @csrf
            @method('PATCH')

            <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
                <div class="border-b border-[#e6e8ee] p-6">
                    <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Identity</p>
                    <h1 class="mt-2 text-2xl font-bold text-[#07172f]">Site Settings</h1>
                    <p class="mt-2 text-sm leading-6 text-[#667085]">Site-wide settings applied across the public website.</p>
                </div>

                <div class="space-y-6 p-6">

                    {{-- Site Name --}}
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Site Name</label>
                        <input type="text" name="site_name" value="{{ old('site_name', $setting->site_name) }}"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('site_name') border-red-400 @enderror">
                        @error('site_name')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tagline --}}
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Tagline</label>
                        <input type="text" name="tagline" value="{{ old('tagline', $setting->tagline) }}"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>

                    <div class="border-t border-[#e6e8ee] pt-6">
                        <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Contact Information</p>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">
                        {{-- Primary Email --}}
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Primary Email</label>
                            <input type="email" name="primary_email" value="{{ old('primary_email', $setting->primary_email) }}"
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('primary_email') border-red-400 @enderror">
                            @error('primary_email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}"
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        </div>
                    </div>

                    {{-- Address --}}
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Office Address</label>
                        <textarea name="address" rows="3"
                                  class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('address', $setting->address) }}</textarea>
                    </div>

                    {{-- Office Hours --}}
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Office Hours</label>
                        <input type="text" name="office_hours" value="{{ old('office_hours', $setting->office_hours) }}"
                               placeholder="e.g. Monday – Friday, 9:00am – 5:00pm GMT"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>

                    <div class="border-t border-[#e6e8ee] pt-6">
                        <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Footer</p>
                    </div>

                    {{-- Footer Text --}}
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Footer Description</label>
                        <textarea name="footer_text" rows="3"
                                  class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('footer_text', $setting->footer_text) }}</textarea>
                    </div>

                    {{-- Copyright --}}
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Copyright Line</label>
                        <input type="text" name="copyright" value="{{ old('copyright', $setting->copyright) }}"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                    </div>

                    <div class="border-t border-[#e6e8ee] pt-6">
                        <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Default SEO</p>
                    </div>

                    {{-- Default Meta Title --}}
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Default Meta Title</label>
                        <input type="text" name="default_meta_title" value="{{ old('default_meta_title', $setting->default_meta_title) }}"
                               class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        <p class="mt-1.5 text-xs text-[#667085]">Used on pages without a specific meta title set.</p>
                    </div>

                    {{-- Default Meta Description --}}
                    <div>
                        <label class="block text-sm font-semibold text-[#07172f]">Default Meta Description</label>
                        <textarea name="default_meta_description" rows="3"
                                  class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">{{ old('default_meta_description', $setting->default_meta_description) }}</textarea>
                        <p class="mt-1.5 text-xs text-[#667085]">Used on pages without a specific meta description set.</p>
                    </div>

                </div>

                <div class="border-t border-[#e6e8ee] bg-[#f8fafc] px-6 py-5">
                    <button type="submit"
                            class="inline-flex rounded-full bg-[#07172f] px-6 py-3 text-sm font-bold text-white shadow-sm hover:bg-[#123f8c]">
                        Save Settings
                    </button>
                </div>
            </div>
        </form>
    </x-admin-dashboard-shell>
</x-app-layout>

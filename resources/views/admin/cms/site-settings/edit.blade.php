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

        <form method="POST" action="{{ route('admin.cms.site-settings.update') }}" enctype="multipart/form-data">
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

                    {{-- Brand Assets --}}
                    <div class="border-t border-[#e6e8ee] pt-6">
                        <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Brand Assets</p>
                        <p class="mt-1 text-xs text-[#667085]">Upload new files to replace the current asset. Existing assets remain if no new file is selected.</p>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">

                        {{-- Logo --}}
                        <div class="rounded-2xl border border-[#e6e8ee] p-5">
                            <p class="text-sm font-semibold text-[#07172f]">Site Logo</p>
                            <p class="mt-0.5 text-xs text-[#667085]">Used in the header and across the public site.</p>
                            @if ($setting->logo)
                                <div class="mt-3 flex h-16 items-center justify-center rounded-xl bg-[#f7f3ea] px-4">
                                    <img src="{{ $setting->logo->url() }}" alt="Current site logo" class="max-h-12 max-w-full object-contain">
                                </div>
                            @else
                                <div class="mt-3 flex h-16 items-center justify-center rounded-xl bg-[#f7f3ea]">
                                    <p class="text-xs text-[#667085]">No logo uploaded</p>
                                </div>
                            @endif
                            <input type="file" name="logo_file" accept=".jpg,.jpeg,.png,.webp,.svg"
                                   class="mt-3 block w-full text-xs text-[#667085] file:mr-3 file:rounded-full file:border-0 file:bg-[#07172f] file:px-4 file:py-2 file:text-xs file:font-bold file:text-white hover:file:bg-[#123f8c]">
                            @error('logo_file')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1.5 text-[10px] text-[#667085]">JPG, PNG, WEBP, SVG · max 2 MB</p>
                        </div>

                        {{-- Inverse Logo --}}
                        <div class="rounded-2xl border border-[#e6e8ee] p-5">
                            <p class="text-sm font-semibold text-[#07172f]">Inverse Logo</p>
                            <p class="mt-0.5 text-xs text-[#667085]">White or light version for use on dark backgrounds.</p>
                            @if ($setting->logoInverse)
                                <div class="mt-3 flex h-16 items-center justify-center rounded-xl bg-[#07172f] px-4">
                                    <img src="{{ $setting->logoInverse->url() }}" alt="Current inverse logo" class="max-h-12 max-w-full object-contain">
                                </div>
                            @else
                                <div class="mt-3 flex h-16 items-center justify-center rounded-xl bg-[#07172f]">
                                    <p class="text-xs text-slate-400">No inverse logo uploaded</p>
                                </div>
                            @endif
                            <input type="file" name="logo_inverse_file" accept=".jpg,.jpeg,.png,.webp,.svg"
                                   class="mt-3 block w-full text-xs text-[#667085] file:mr-3 file:rounded-full file:border-0 file:bg-[#07172f] file:px-4 file:py-2 file:text-xs file:font-bold file:text-white hover:file:bg-[#123f8c]">
                            @error('logo_inverse_file')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1.5 text-[10px] text-[#667085]">JPG, PNG, WEBP, SVG · max 2 MB</p>
                        </div>

                        {{-- Footer Logo --}}
                        <div class="rounded-2xl border border-[#e6e8ee] p-5">
                            <p class="text-sm font-semibold text-[#07172f]">Footer Logo</p>
                            <p class="mt-0.5 text-xs text-[#667085]">Shown in the site footer. Falls back to the site name if not set.</p>
                            @if ($setting->logoFooter)
                                <div class="mt-3 flex h-16 items-center justify-center rounded-xl bg-[#07172f] px-4">
                                    <img src="{{ $setting->logoFooter->url() }}" alt="Current footer logo" class="max-h-12 max-w-full object-contain">
                                </div>
                            @else
                                <div class="mt-3 flex h-16 items-center justify-center rounded-xl bg-[#07172f]">
                                    <p class="text-xs text-slate-400">No footer logo uploaded</p>
                                </div>
                            @endif
                            <input type="file" name="logo_footer_file" accept=".jpg,.jpeg,.png,.webp,.svg"
                                   class="mt-3 block w-full text-xs text-[#667085] file:mr-3 file:rounded-full file:border-0 file:bg-[#07172f] file:px-4 file:py-2 file:text-xs file:font-bold file:text-white hover:file:bg-[#123f8c]">
                            @error('logo_footer_file')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1.5 text-[10px] text-[#667085]">JPG, PNG, WEBP, SVG · max 2 MB</p>
                        </div>

                        {{-- Favicon --}}
                        <div class="rounded-2xl border border-[#e6e8ee] p-5">
                            <p class="text-sm font-semibold text-[#07172f]">Favicon</p>
                            <p class="mt-0.5 text-xs text-[#667085]">Browser tab icon. Best results with a square PNG or ICO.</p>
                            @if ($setting->favicon)
                                <div class="mt-3 flex h-16 items-center justify-center gap-3 rounded-xl bg-[#f7f3ea]">
                                    <img src="{{ $setting->favicon->url() }}" alt="Current favicon" class="h-8 w-8 object-contain">
                                    <span class="text-xs text-[#667085]">Current favicon</span>
                                </div>
                            @else
                                <div class="mt-3 flex h-16 items-center justify-center rounded-xl bg-[#f7f3ea]">
                                    <p class="text-xs text-[#667085]">No favicon uploaded</p>
                                </div>
                            @endif
                            <input type="file" name="favicon_file" accept=".ico,.png,.svg"
                                   class="mt-3 block w-full text-xs text-[#667085] file:mr-3 file:rounded-full file:border-0 file:bg-[#07172f] file:px-4 file:py-2 file:text-xs file:font-bold file:text-white hover:file:bg-[#123f8c]">
                            @error('favicon_file')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1.5 text-[10px] text-[#667085]">ICO, PNG, SVG · max 512 KB</p>
                        </div>

                        {{-- Default OG Image --}}
                        <div class="rounded-2xl border border-[#e6e8ee] p-5">
                            <p class="text-sm font-semibold text-[#07172f]">Default Open Graph Image</p>
                            <p class="mt-0.5 text-xs text-[#667085]">Fallback social share image when no page-specific image is set.</p>
                            @if ($setting->defaultOgImage)
                                <div class="mt-3 overflow-hidden rounded-xl">
                                    <img src="{{ $setting->defaultOgImage->url() }}" alt="Current OG image" class="h-16 w-full object-cover">
                                </div>
                            @else
                                <div class="mt-3 flex h-16 items-center justify-center rounded-xl bg-[#f7f3ea]">
                                    <p class="text-xs text-[#667085]">No OG image uploaded</p>
                                </div>
                            @endif
                            <input type="file" name="og_image_file" accept=".jpg,.jpeg,.png,.webp"
                                   class="mt-3 block w-full text-xs text-[#667085] file:mr-3 file:rounded-full file:border-0 file:bg-[#07172f] file:px-4 file:py-2 file:text-xs file:font-bold file:text-white hover:file:bg-[#123f8c]">
                            @error('og_image_file')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1.5 text-[10px] text-[#667085]">JPG, PNG, WEBP · max 4 MB · recommended 1200×630</p>
                        </div>

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

                        {{-- Alternative Phone --}}
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Alternative Phone</label>
                            <input type="text" name="alternative_phone" value="{{ old('alternative_phone', $setting->alternative_phone) }}"
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        </div>

                        {{-- Support Email --}}
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Support Email</label>
                            <input type="email" name="support_email" value="{{ old('support_email', $setting->support_email) }}"
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('support_email') border-red-400 @enderror">
                            @error('support_email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Enquiries Email --}}
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Enquiries Email</label>
                            <input type="email" name="enquiries_email" value="{{ old('enquiries_email', $setting->enquiries_email) }}"
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('enquiries_email') border-red-400 @enderror">
                            @error('enquiries_email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
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

                    {{-- Social Links --}}
                    <div class="border-t border-[#e6e8ee] pt-6">
                        <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">Social Links</p>
                        <p class="mt-1 text-xs text-[#667085]">Full URLs including https://</p>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2">
                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">LinkedIn</label>
                            <input type="url" name="linkedin" value="{{ old('linkedin', $setting->linkedin) }}"
                                   placeholder="https://linkedin.com/company/..."
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('linkedin') border-red-400 @enderror">
                            @error('linkedin')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Facebook</label>
                            <input type="url" name="facebook" value="{{ old('facebook', $setting->facebook) }}"
                                   placeholder="https://facebook.com/..."
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('facebook') border-red-400 @enderror">
                            @error('facebook')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">Instagram</label>
                            <input type="url" name="instagram" value="{{ old('instagram', $setting->instagram) }}"
                                   placeholder="https://instagram.com/..."
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('instagram') border-red-400 @enderror">
                            @error('instagram')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-[#07172f]">YouTube</label>
                            <input type="url" name="youtube" value="{{ old('youtube', $setting->youtube) }}"
                                   placeholder="https://youtube.com/..."
                                   class="mt-2 w-full rounded-2xl border border-[#d0d5dd] px-4 py-3 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c] @error('youtube') border-red-400 @enderror">
                            @error('youtube')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
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

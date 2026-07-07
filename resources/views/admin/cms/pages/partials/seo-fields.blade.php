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

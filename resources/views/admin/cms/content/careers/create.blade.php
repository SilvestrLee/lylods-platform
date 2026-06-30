<x-admin-dashboard-shell>
    <div class="rounded-[2rem] bg-white p-8 shadow-sm">

        <div class="mb-8">
            <a href="{{ route('admin.cms.content.careers.index') }}"
               class="inline-flex items-center gap-2 text-sm font-medium text-[#667085] hover:text-[#07172f]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                </svg>
                Back to Careers
            </a>
        </div>

        <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
        <h1 class="mt-1 text-2xl font-bold text-[#07172f]">New Career Opportunity</h1>
        <p class="mt-1 text-sm text-[#667085]">Saved as draft. Publish from the edit screen.</p>

        @if ($errors->any())
            <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-3 text-sm text-red-800">
                <ul class="list-inside list-disc space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.cms.content.careers.store') }}" method="POST" class="mt-8 space-y-6">
            @csrf

            <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-5">
                <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">Opportunity Details</h2>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}"
                           placeholder="e.g. Business Development Placement"
                           class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]"
                           required>
                </div>

                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Type <span class="text-red-500">*</span></label>
                        <select name="type"
                                class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                            @foreach (['full-time' => 'Full-time', 'part-time' => 'Part-time', 'contract' => 'Contract', 'placement' => 'Placement'] as $value => $label)
                                <option value="{{ $value }}" {{ old('type') === $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Location</label>
                        <input type="text" name="location" value="{{ old('location') }}"
                               placeholder="e.g. London (Hybrid)"
                               class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Closing Date</label>
                    <input type="date" name="closing_date" value="{{ old('closing_date') }}"
                           class="mt-1.5 rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Description</label>
                    <textarea name="description" rows="10"
                              placeholder="Full opportunity description"
                              class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="rounded-full bg-[#07172f] px-7 py-3 text-sm font-bold text-white transition hover:bg-[#0d2144]">
                    Save as Draft
                </button>
                <a href="{{ route('admin.cms.content.careers.index') }}"
                   class="rounded-full border border-[#e6e8ee] px-7 py-3 text-sm font-bold text-[#667085] hover:border-[#07172f] hover:text-[#07172f]">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-admin-dashboard-shell>

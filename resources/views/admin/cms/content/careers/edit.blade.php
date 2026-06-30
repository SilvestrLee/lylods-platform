<x-admin-dashboard-shell>
    <div class="space-y-6">

        {{-- Status bar --}}
        <div class="flex items-center justify-between gap-4 rounded-[2rem] bg-white px-8 py-5 shadow-sm">
            <div class="flex items-center gap-4">
                <div>
                    <a href="{{ route('admin.cms.content.careers.index') }}"
                       class="inline-flex items-center gap-1.5 text-xs font-medium text-[#667085] hover:text-[#07172f]">
                        <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
                        </svg>
                        Careers
                    </a>
                    <h1 class="mt-0.5 text-lg font-bold text-[#07172f]">{{ $career->title }}</h1>
                </div>
                <div>
                    @if ($career->status === 'published')
                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-bold uppercase tracking-wider text-green-700">Published</span>
                    @elseif ($career->status === 'archived')
                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-bold uppercase tracking-wider text-red-700">Archived</span>
                    @else
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold uppercase tracking-wider text-slate-600">Draft</span>
                    @endif
                </div>
            </div>
            <div class="flex items-center gap-3">
                @if ($career->status !== 'published')
                    <form action="{{ route('admin.cms.content.careers.publish', $career) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="rounded-full bg-green-600 px-5 py-2 text-xs font-bold text-white hover:bg-green-700">
                            Publish
                        </button>
                    </form>
                @endif
                @if ($career->status === 'published')
                    <form action="{{ route('admin.cms.content.careers.archive', $career) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="rounded-full border border-[#e6e8ee] px-5 py-2 text-xs font-bold text-[#667085] hover:border-red-300 hover:text-red-600">
                            Archive
                        </button>
                    </form>
                @endif
            </div>
        </div>

        @if (session('success'))
            <div class="rounded-2xl border border-green-200 bg-green-50 px-5 py-3 text-sm text-green-800">{{ session('success') }}</div>
        @endif

        <div class="rounded-[2rem] bg-white p-8 shadow-sm">
            @if ($errors->any())
                <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-3 text-sm text-red-800">
                    <ul class="list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.cms.content.careers.update', $career) }}" method="POST" class="space-y-6">
                @csrf
                @method('PATCH')

                <div class="rounded-2xl border border-[#e6e8ee] p-6 space-y-5">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-[#07172f]">Opportunity Details</h2>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $career->title) }}"
                               class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]"
                               required>
                    </div>

                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Type <span class="text-red-500">*</span></label>
                            <select name="type"
                                    class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                                @foreach (['full-time' => 'Full-time', 'part-time' => 'Part-time', 'contract' => 'Contract', 'placement' => 'Placement'] as $value => $label)
                                    <option value="{{ $value }}" {{ old('type', $career->type) === $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Location</label>
                            <input type="text" name="location" value="{{ old('location', $career->location) }}"
                                   class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Closing Date</label>
                        <input type="date" name="closing_date" value="{{ old('closing_date', $career->closing_date?->format('Y-m-d')) }}"
                               class="mt-1.5 rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-[#667085]">Description</label>
                        <textarea name="description" rows="12"
                                  class="mt-1.5 w-full rounded-xl border border-[#e6e8ee] px-4 py-2.5 text-sm text-[#07172f] focus:border-[#c9a24d] focus:outline-none focus:ring-1 focus:ring-[#c9a24d]">{{ old('description', $career->description) }}</textarea>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            class="rounded-full bg-[#07172f] px-7 py-3 text-sm font-bold text-white transition hover:bg-[#0d2144]">
                        Save Changes
                    </button>
                    <a href="{{ route('admin.cms.content.careers.index') }}"
                       class="rounded-full border border-[#e6e8ee] px-7 py-3 text-sm font-bold text-[#667085] hover:border-[#07172f] hover:text-[#07172f]">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        <div class="rounded-[2rem] border border-red-200 bg-white p-8 shadow-sm">
            <h2 class="text-sm font-bold text-red-700">Delete Opportunity</h2>
            <p class="mt-1 text-xs text-[#667085]">This action soft-deletes the record.</p>
            <form action="{{ route('admin.cms.content.careers.destroy', $career) }}" method="POST" class="mt-4"
                  onsubmit="return confirm('Delete this career opportunity?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="rounded-full bg-red-600 px-5 py-2 text-xs font-bold text-white hover:bg-red-700">
                    Delete Opportunity
                </button>
            </form>
        </div>

    </div>
</x-admin-dashboard-shell>

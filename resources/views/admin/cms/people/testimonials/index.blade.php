<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS — People</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Testimonials</h2>
            </div>
            <a href="{{ route('admin.cms.people.testimonials.create') }}"
               class="inline-flex items-center gap-2 rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-bold text-white hover:bg-[#123f8c]">
                + Add Testimonial
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'People'], ['label' => 'Testimonials']]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <h1 class="text-xl font-bold text-[#07172f]">All Testimonials</h1>
                <p class="mt-1 text-sm text-[#667085]">Manage client testimonials displayed on the home page. Featured testimonials appear first.</p>
            </div>

            <div class="divide-y divide-[#e6e8ee]">
                @forelse ($testimonials as $testimonial)
                    <div class="flex items-center justify-between gap-4 px-6 py-5">
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-3">
                                @if ($testimonial->featured)
                                    <span class="rounded-full bg-[#c9a24d]/10 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide text-[#c9a24d]">Featured</span>
                                @endif
                                <p class="truncate font-semibold text-[#07172f]">{{ $testimonial->client_name }}</p>
                                @if ($testimonial->organisation)
                                    <span class="shrink-0 text-xs text-[#667085]">{{ $testimonial->organisation }}</span>
                                @endif
                                @if (!$testimonial->is_active)
                                    <span class="rounded-full bg-red-50 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wide text-red-600 ring-1 ring-red-200">Hidden</span>
                                @endif
                            </div>
                            <p class="mt-1.5 max-w-xl truncate pl-0 text-xs text-[#667085]">{{ $testimonial->quote }}</p>
                        </div>
                        <div class="flex shrink-0 gap-2">
                            <a href="{{ route('admin.cms.people.testimonials.edit', $testimonial) }}"
                               class="rounded-full bg-[#07172f] px-4 py-1.5 text-xs font-semibold text-white hover:bg-[#123f8c]">
                                Edit
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-sm text-[#667085]">
                        No testimonials yet.
                        <a href="{{ route('admin.cms.people.testimonials.create') }}" class="font-semibold text-[#123f8c] hover:underline">Add the first testimonial.</a>
                    </div>
                @endforelse
            </div>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

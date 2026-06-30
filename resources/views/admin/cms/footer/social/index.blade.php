<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS — Footer</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Social Links</h2>
            </div>
            <a href="{{ route('admin.cms.footer.social.create') }}"
               class="inline-flex items-center gap-2 rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-bold text-white hover:bg-[#123f8c]">
                + Add Platform
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Footer'], ['label' => 'Social Links']]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <h1 class="text-xl font-bold text-[#07172f]">Social Profiles</h1>
                <p class="mt-1 text-sm text-[#667085]">Social icons displayed in the footer. Order controls display sequence.</p>
            </div>

            <div class="divide-y divide-[#e6e8ee]">
                @forelse ($links as $link)
                    <div class="flex items-center justify-between gap-4 px-6 py-4">
                        <div class="min-w-0 flex-1 flex items-center gap-3">
                            <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#07172f] text-[10px] font-bold text-[#c9a24d]">
                                {{ str_pad($link->display_order, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <p class="font-semibold text-[#07172f] capitalize">{{ $link->platform }}</p>
                            <span class="text-xs text-[#667085] truncate">{{ $link->url }}</span>
                        </div>
                        <div class="flex shrink-0 gap-2">
                            <a href="{{ route('admin.cms.footer.social.edit', $link) }}"
                               class="rounded-full bg-[#07172f] px-4 py-1.5 text-xs font-semibold text-white hover:bg-[#123f8c]">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.cms.footer.social.destroy', $link) }}"
                                  onsubmit="return confirm('Remove this social link?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                        class="rounded-full bg-red-50 px-4 py-1.5 text-xs font-semibold text-red-600 ring-1 ring-red-200 hover:bg-red-100">
                                    Remove
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="px-6 py-10 text-center text-sm text-[#667085]">
                        No social links yet.
                        <a href="{{ route('admin.cms.footer.social.create') }}" class="font-semibold text-[#123f8c] hover:underline">Add one.</a>
                    </div>
                @endforelse
            </div>
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
                <h2 class="mt-1 font-serif text-2xl font-bold text-[#07172f]">Partners</h2>
            </div>
            <a href="{{ route('admin.cms.partners.create') }}"
               class="inline-flex items-center gap-2 rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-bold text-white hover:bg-[#123f8c]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
                Add Partner
            </a>
        </div>
    </x-slot>

    <x-admin-dashboard-shell>
        <x-slot name="breadcrumbs">
            <x-breadcrumbs :crumbs="[['label' => 'CMS'], ['label' => 'Partners']]" />
        </x-slot>

        @if (session('success'))
            <div class="rounded-2xl bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800 ring-1 ring-emerald-200">{{ session('success') }}</div>
        @endif

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-[#e6e8ee]">
            <div class="border-b border-[#e6e8ee] p-6">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-[#123f8c]">All Partners</p>
                <p class="mt-1 text-sm text-[#667085]">{{ $partners->count() }} {{ Str::plural('partner', $partners->count()) }}</p>
            </div>

            @if($partners->isEmpty())
                <div class="p-10 text-center">
                    <p class="text-sm text-[#667085]">No partners yet.</p>
                    <a href="{{ route('admin.cms.partners.create') }}" class="mt-4 inline-flex rounded-full bg-[#c9a24d] px-5 py-2.5 text-sm font-bold text-[#07172f] hover:bg-[#d7b567]">Add First Partner</a>
                </div>
            @else
                <div class="divide-y divide-[#e6e8ee]">
                    @foreach($partners as $partner)
                        <div class="flex items-center gap-4 px-6 py-4">
                            <div class="h-12 w-16 flex-shrink-0 overflow-hidden rounded-xl border border-[#e6e8ee] bg-[#f7f3ea]">
                                @if($partner->logo)
                                    <img src="{{ $partner->logo->url() }}" alt="{{ $partner->name }}" class="h-full w-full object-contain p-1">
                                @else
                                    <div class="flex h-full items-center justify-center">
                                        <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z"/></svg>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="truncate text-sm font-semibold text-[#07172f]">{{ $partner->name }}</p>
                                <div class="mt-0.5 flex flex-wrap items-center gap-2">
                                    @if($partner->category)
                                        <span class="rounded-full bg-[#f7f3ea] px-2 py-0.5 text-[10px] font-semibold text-[#c9a24d]">{{ $partner->category }}</span>
                                    @endif
                                    <span class="text-xs text-[#667085]">Order: {{ $partner->display_order }}</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="rounded-full px-2.5 py-1 text-[10px] font-bold {{ $partner->is_visible ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $partner->is_visible ? 'Visible' : 'Hidden' }}
                                </span>
                                @if($partner->featured)
                                    <span class="rounded-full bg-[#c9a24d]/15 px-2.5 py-1 text-[10px] font-bold text-[#c9a24d]">Featured</span>
                                @endif
                                <a href="{{ route('admin.cms.partners.edit', $partner) }}"
                                   class="rounded-full border border-[#e6e8ee] px-4 py-1.5 text-xs font-bold text-[#07172f] hover:bg-[#f7f3ea]">Edit</a>
                                <form method="POST" action="{{ route('admin.cms.partners.destroy', $partner) }}"
                                      onsubmit="return confirm('Remove this partner?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="rounded-full border border-red-100 px-4 py-1.5 text-xs font-bold text-red-600 hover:bg-red-50">Remove</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </x-admin-dashboard-shell>
</x-app-layout>

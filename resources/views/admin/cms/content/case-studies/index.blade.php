<x-admin-dashboard-shell>
    <div class="rounded-[2rem] bg-white p-8 shadow-sm">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#c9a24d]">Website CMS</p>
                <h1 class="mt-1 text-2xl font-bold text-[#07172f]">Case Studies</h1>
            </div>
            <a href="{{ route('admin.cms.content.case-studies.create') }}"
               class="inline-flex items-center gap-2 rounded-full bg-[#07172f] px-5 py-2.5 text-sm font-bold text-white transition hover:bg-[#0d2144]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Add Case Study
            </a>
        </div>

        @if (session('success'))
            <div class="mt-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-3 text-sm text-green-800">{{ session('success') }}</div>
        @endif

        <div class="mt-8 overflow-hidden rounded-2xl border border-[#e6e8ee]">
            <table class="w-full text-sm">
                <thead class="bg-[#f7f3ea]">
                    <tr>
                        <th class="px-5 py-3.5 text-left text-xs font-bold uppercase tracking-wider text-[#667085]">Title</th>
                        <th class="hidden px-5 py-3.5 text-left text-xs font-bold uppercase tracking-wider text-[#667085] md:table-cell">Industry</th>
                        <th class="px-5 py-3.5 text-left text-xs font-bold uppercase tracking-wider text-[#667085]">Status</th>
                        <th class="hidden px-5 py-3.5 text-left text-xs font-bold uppercase tracking-wider text-[#667085] lg:table-cell">Published</th>
                        <th class="px-5 py-3.5"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e6e8ee]">
                    @forelse ($caseStudies as $cs)
                        <tr class="hover:bg-[#f7f3ea]/60">
                            <td class="px-5 py-4 font-medium text-[#07172f]">
                                {{ $cs->title }}
                                @if ($cs->featured)
                                    <span class="ml-2 rounded-full bg-[#c9a24d]/20 px-2 py-0.5 text-[10px] font-bold uppercase tracking-wider text-[#07172f]">Featured</span>
                                @endif
                            </td>
                            <td class="hidden px-5 py-4 text-[#667085] md:table-cell">{{ $cs->industry ?? '—' }}</td>
                            <td class="px-5 py-4">
                                @if ($cs->status === 'published')
                                    <span class="rounded-full bg-green-100 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-green-700">Published</span>
                                @elseif ($cs->status === 'archived')
                                    <span class="rounded-full bg-red-100 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-red-700">Archived</span>
                                @else
                                    <span class="rounded-full bg-slate-100 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-slate-600">Draft</span>
                                @endif
                            </td>
                            <td class="hidden px-5 py-4 text-[#667085] lg:table-cell">{{ $cs->published_at?->format('d M Y') ?? '—' }}</td>
                            <td class="px-5 py-4 text-right">
                                <a href="{{ route('admin.cms.content.case-studies.edit', $cs) }}"
                                   class="rounded-xl bg-[#07172f] px-3.5 py-1.5 text-xs font-bold text-white hover:bg-[#0d2144]">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-12 text-center text-sm text-[#667085]">No case studies yet. Add your first above.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-dashboard-shell>

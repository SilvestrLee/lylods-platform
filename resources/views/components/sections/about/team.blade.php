@props([
    'eyebrow' => 'Our People',
    'heading' => 'The team behind the work.',
    'description' => 'Our people bring experience across business, technology, compliance, property and community development.',
    'members' => [],
])

<section class="bg-white">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <div class="tlg-reveal max-w-2xl">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">{{ $eyebrow }}</p>
            @endif
            @if ($heading)
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">{{ $heading }}</h2>
            @endif
            @if ($description)
                <p class="mt-5 text-lg leading-8 text-[#667085]">{{ $description }}</p>
            @endif
        </div>
        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @if ($members->isNotEmpty())
                @foreach ($members as $member)
                    <div class="tlg-reveal rounded-[2rem] border border-[#e6e8ee] bg-[#f7f3ea] p-8 text-center">
                        <div class="mx-auto flex h-20 w-20 items-center justify-center overflow-hidden rounded-full bg-[#07172f]">
                            @if ($member->photo)
                                <img src="{{ $member->photo->url() }}" alt="{{ $member->name }}" loading="lazy" decoding="async" class="h-full w-full object-cover">
                            @else
                                <svg class="h-10 w-10 text-white/40" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0"/></svg>
                            @endif
                        </div>
                        <p class="mt-5 font-bold text-[#07172f]">{{ $member->name }}</p>
                        @if ($member->role)
                            <p class="mt-1 text-xs font-semibold uppercase tracking-[0.15em] text-[#c9a24d]">{{ $member->role }}</p>
                        @endif
                        @if ($member->bio)
                            <p class="mt-3 text-sm leading-6 text-[#667085]">{{ $member->bio }}</p>
                        @endif
                        @if ($member->linkedin)
                            <a href="{{ $member->linkedin }}" target="_blank" rel="noopener" class="mt-4 inline-flex items-center gap-1.5 text-xs font-semibold text-[#123f8c] hover:text-[#07172f]">LinkedIn ↗</a>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="tlg-reveal tlg-d1 rounded-[2rem] border border-[#e6e8ee] bg-[#f7f3ea] p-8 text-center">
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#07172f]">
                        <svg class="h-10 w-10 text-white/40" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0"/></svg>
                    </div>
                    <p class="mt-5 font-bold text-[#07172f]">Team Member</p>
                    <p class="mt-1 text-xs font-semibold uppercase tracking-[0.15em] text-[#c9a24d]">Role / Discipline</p>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">A brief professional profile will appear here, outlining experience, areas of expertise and sector background.</p>
                </div>
                <div class="tlg-reveal tlg-d2 rounded-[2rem] border border-[#e6e8ee] bg-[#f7f3ea] p-8 text-center">
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#123f8c]">
                        <svg class="h-10 w-10 text-white/40" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0"/></svg>
                    </div>
                    <p class="mt-5 font-bold text-[#07172f]">Team Member</p>
                    <p class="mt-1 text-xs font-semibold uppercase tracking-[0.15em] text-[#c9a24d]">Role / Discipline</p>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">A brief professional profile will appear here, outlining experience, areas of expertise and sector background.</p>
                </div>
                <div class="tlg-reveal tlg-d3 rounded-[2rem] border border-[#e6e8ee] bg-[#f7f3ea] p-8 text-center">
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-[#c9a24d]">
                        <svg class="h-10 w-10 text-[#07172f]/40" fill="none" stroke="currentColor" stroke-width="1.25" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0"/></svg>
                    </div>
                    <p class="mt-5 font-bold text-[#07172f]">Team Member</p>
                    <p class="mt-1 text-xs font-semibold uppercase tracking-[0.15em] text-[#c9a24d]">Role / Discipline</p>
                    <p class="mt-3 text-sm leading-6 text-[#667085]">A brief professional profile will appear here, outlining experience, areas of expertise and sector background.</p>
                </div>
                <div class="tlg-reveal tlg-d4 flex flex-col items-center justify-center rounded-[2rem] bg-[#07172f] p-8 text-center">
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-white/10">
                        <svg class="h-7 w-7 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"/></svg>
                    </div>
                    <p class="mt-4 font-bold text-white">Full Team</p>
                    <p class="mt-2 text-sm leading-6 text-slate-400">Additional profiles will be added as they are prepared for publication.</p>
                </div>
            @endif
        </div>
    </div>
</section>

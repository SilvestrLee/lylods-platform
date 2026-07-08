@props([
    'introEyebrow' => 'Service Catalogue',
    'introHeading' => null,
    'introBody' => null,
    'serviceGroups' => [],
])

<section id="service-areas" class="bg-[#f7f3ea]">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <x-sections.services.intro
            :eyebrow="$introEyebrow"
            :heading="$introHeading"
            :body="$introBody"
        />

        <div class="mt-14 space-y-6">

            @foreach ($serviceGroups as $group)
            @php
                $areaNumber = str_pad($loop->iteration, 2, '0', STR_PAD_LEFT);
                $panelGradients = [
                    'bg-gradient-to-br from-[#07172f] via-[#123f8c] to-[#07172f]',
                    'bg-gradient-to-br from-[#07172f] via-[#0d2d5e] to-[#123f8c]',
                    'bg-gradient-to-br from-[#051220] via-[#07172f] to-[#0a1f42]',
                    'bg-gradient-to-br from-[#07172f] via-[#0e243d] to-[#1a3a5c]',
                    'bg-gradient-to-br from-[#07172f] via-[#102a50] to-[#07172f]',
                ];
                $panelGradient = $panelGradients[$loop->index % count($panelGradients)];
            @endphp
            <div id="{{ $group->slug }}" class="tlg-reveal scroll-mt-24 overflow-hidden rounded-[2rem] border border-[#e6e8ee] bg-white shadow-sm transition-all duration-300 hover:border-[#c9a24d] hover:shadow-lg">
                <div class="lg:grid lg:grid-cols-[300px_1fr]">
                    <div class="relative hidden min-h-[280px] items-center justify-center overflow-hidden {{ $panelGradient }} lg:flex">
                        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 65% 35%, #c9a24d 0%, transparent 55%)" aria-hidden="true"></div>
                        <svg class="h-20 w-20 text-white/15" fill="none" stroke="currentColor" stroke-width="0.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12"/></svg>
                    </div>
                    <div class="p-10">
                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                                <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12"/></svg>
                            </div>
                            <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#c9a24d]">Service Area {{ $areaNumber }}</p>
                        </div>
                        <h2 class="mt-4 font-serif text-2xl font-bold text-[#07172f]">{{ $group->name }}</h2>
                        @if($group->description)
                        <p class="mt-4 max-w-2xl leading-7 text-[#667085]">{{ $group->description }}</p>
                        @endif
                        @if($group->activeServices->isNotEmpty())
                        <div class="mt-7 grid grid-cols-2 gap-2 border-t border-[#e6e8ee] pt-7 sm:grid-cols-4">
                            @foreach($group->activeServices as $serviceItem)
                            <div class="flex items-center gap-2 text-sm text-[#667085]">
                                <span class="h-1.5 w-1.5 shrink-0 rounded-full bg-[#c9a24d]"></span>{{ $serviceItem->title }}
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <a href="{{ route('contact') }}" class="mt-7 inline-flex items-center gap-2 rounded-full border border-[#07172f] px-5 py-2.5 text-sm font-bold text-[#07172f] transition-all duration-300 hover:bg-[#07172f] hover:text-white">
                            Explore {{ $group->name }}
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

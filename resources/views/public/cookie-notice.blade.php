<x-layouts.public
    :title="$page->meta_title ?? 'Cookie Notice — The Lylods Group'"
    :description="$page->meta_description">

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-[#07172f] text-white">
        <div class="relative mx-auto max-w-[1440px] px-6 py-24">
            <div class="tlg-reveal max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[0.28em] text-[#c9a24d]">{{ $page->hero_subtitle }}</p>
                <h1 class="mt-6 font-serif text-4xl font-bold leading-tight tracking-tight md:text-5xl">{{ $page->hero_title }}</h1>
                <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-200">{{ $page->hero_description }}</p>
            </div>
        </div>
        <div class="absolute inset-0 -z-10 opacity-10" style="background-image: radial-gradient(circle at 80% 20%, #c9a24d 0%, transparent 50%), radial-gradient(circle at 20% 80%, #123f8c 0%, transparent 50%)"></div>
    </section>

    {{-- Content --}}
    <section class="bg-white">
        <div class="mx-auto max-w-[1440px] px-6 py-20">
            <div class="mx-auto max-w-3xl">

                @if ($compliancePage?->last_reviewed_at)
                <div class="tlg-reveal mb-10 rounded-[2rem] border border-[#e6e8ee] bg-[#f7f3ea] px-8 py-6">
                    <p class="text-sm font-semibold text-[#07172f]">Last reviewed: {{ $compliancePage->last_reviewed_at->format('F Y') }}</p>
                </div>
                @endif

                @if ($compliancePage?->content)
                <div class="tlg-reveal space-y-10 text-[#667085]">
                    {!! $compliancePage->content !!}
                </div>
                @endif

            </div>
        </div>
    </section>

</x-layouts.public>

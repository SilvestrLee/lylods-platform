@props([
    'eyebrow' => 'Professional Standards',
    'heading' => 'Qualifications & Accreditations',
    'accreditations' => [],
])

<section class="border-t border-[#e6e8ee] bg-[#f7f3ea]">
    <div class="mx-auto max-w-[1440px] px-6 py-12">
        <div class="tlg-reveal">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    @if ($eyebrow)
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#667085]">{{ $eyebrow }}</p>
                    @endif
                    @if ($heading)
                        <h2 class="mt-2 font-serif text-3xl font-bold text-[#07172f]">{{ $heading }}</h2>
                    @endif
                    @if ($accreditations->isEmpty())
                        <p class="mt-2 text-sm leading-6 text-[#667085]">Professional qualifications and accreditations held by our team will be listed here once verified for publication.</p>
                    @endif
                </div>
            </div>
            <div class="mt-6 flex flex-wrap items-center gap-4">
                @if ($accreditations->isNotEmpty())
                    @foreach ($accreditations as $accreditation)
                        @if ($accreditation->logo)
                            <div class="flex h-16 w-40 items-center justify-center rounded-2xl border border-[#e6e8ee] bg-white shadow-sm px-4">
                                <img src="{{ $accreditation->logo->url() }}" alt="{{ $accreditation->name }}" class="max-h-10 max-w-full object-contain">
                            </div>
                        @else
                            <div class="flex h-16 w-40 items-center justify-center rounded-2xl border border-[#e6e8ee] bg-white shadow-sm px-3 text-center">
                                <span class="text-xs font-semibold text-[#07172f]">{{ $accreditation->name }}</span>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="flex h-16 w-40 items-center justify-center rounded-2xl border border-dashed border-[#d0d5dd] bg-white shadow-sm"><span class="text-xs font-semibold text-[#b0b7c3]">Qualification / Badge</span></div>
                    <div class="flex h-16 w-40 items-center justify-center rounded-2xl border border-dashed border-[#d0d5dd] bg-white shadow-sm"><span class="text-xs font-semibold text-[#b0b7c3]">Qualification / Badge</span></div>
                    <div class="flex h-16 w-40 items-center justify-center rounded-2xl border border-dashed border-[#d0d5dd] bg-white shadow-sm"><span class="text-xs font-semibold text-[#b0b7c3]">Qualification / Badge</span></div>
                    <div class="flex h-16 w-40 items-center justify-center rounded-2xl border border-dashed border-[#d0d5dd] bg-white shadow-sm"><span class="text-xs font-semibold text-[#b0b7c3]">Qualification / Badge</span></div>
                @endif
            </div>
        </div>
    </div>
</section>

@props([
    'eyebrow' => null,
    'organisations' => null,
    'emptyDescription' => null,
    'placeholderCount' => 5,
])

<section class="border-t border-[#e6e8ee] bg-white">
    <div class="mx-auto max-w-[1440px] px-6 py-12">
        <div class="tlg-reveal text-center">
            @if ($eyebrow)
                <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#667085]">{{ $eyebrow }}</p>
            @endif
            <div class="mt-6 flex flex-wrap items-center justify-center gap-4">
                @if ($organisations->isNotEmpty())
                    @foreach ($organisations as $org)
                        <x-partners.logo :logo="$org->logo" :name="$org->name" />
                    @endforeach
                @else
                    @for ($i = 0; $i < $placeholderCount; $i++)
                        <x-partners.logo />
                    @endfor
                @endif
            </div>
            @if ($organisations->isEmpty() && $emptyDescription)
                <p class="mt-5 text-xs text-[#667085]">{{ $emptyDescription }}</p>
            @endif
        </div>
    </div>
</section>

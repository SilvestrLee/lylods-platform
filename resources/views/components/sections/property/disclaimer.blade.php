{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Property

Future Enterprise Section Candidate:
Rich Text Block

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'heading' => null,
    'body' => null,
])

@php
    $heading = $heading ?? 'Important Notice';
    $body = $body ?? 'The Lylods Group supports the coordination, packaging and practical development of property opportunities. Where specialist regulated, legal, surveying, planning, architectural, finance or tax advice is required, we work with or introduce clients to appropriately qualified independent professionals.';
@endphp

<section class="bg-[#f7f3ea]">
    <div class="mx-auto max-w-[1440px] px-6 py-14">
        <div class="tlg-reveal rounded-[2rem] border border-[#e6e8ee] bg-white px-8 py-10 shadow-sm">
            <div class="flex items-start gap-5">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                    <svg class="h-6 w-6 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/></svg>
                </div>
                <div>
                    @if ($heading)
                        <p class="text-sm font-bold uppercase tracking-[0.2em] text-[#c9a24d]">{{ $heading }}</p>
                    @endif
                    @if ($body)
                        <p class="mt-3 max-w-4xl leading-8 text-[#667085]">{{ $body }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

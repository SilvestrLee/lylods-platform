{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Contact

Future Enterprise Section Candidate:
Feature List

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'eyebrow' => null,
    'heading' => null,
    'body' => null,
    'generalLabel' => null,
    'generalDescription' => null,
    'generalValue' => null,
    'officeLabel' => null,
    'officeDescription' => null,
    'officeValue' => null,
    'hoursLabel' => null,
    'hoursValue' => null,
    'image' => null,
    'imageAlt' => null,
    'investorEyebrow' => null,
    'investorHeading' => null,
    'investorBody' => null,
    'investorCtaLabel' => null,
])

@php
    $eyebrow = $eyebrow ?? 'Contact Information';
    $heading = $heading ?? 'Reach our team directly.';
    $body = $body ?? 'Use the form to send an enquiry or contact us using the details below. We aim to respond to all enquiries within two business days.';

    $generalLabel = $generalLabel ?? 'General Enquiries';
    $generalDescription = $generalDescription ?? 'For business, services, and general company information.';
    $generalValue = $generalValue ?? 'enquiries@lylodsgroup.com';

    $officeLabel = $officeLabel ?? 'Office';
    $officeDescription = $officeDescription ?? 'Office address available upon request.';
    $officeValue = $officeValue ?? 'United Kingdom';

    $hoursLabel = $hoursLabel ?? 'Business Hours';
    $hoursValue = $hoursValue ?? 'Monday – Friday, 9:00am – 5:00pm GMT';

    $image = $image ?? asset('images/placeholders/community-placeholder.svg');
    $imageAlt = $imageAlt ?: 'Professional client consultation and support';

    $investorEyebrow = $investorEyebrow ?? 'Investor Access';
    $investorHeading = $investorHeading ?? 'Existing investors';
    $investorBody = $investorBody ?? 'Log in to the investor portal for dashboard access, records, and official notices.';
    $investorCtaLabel = $investorCtaLabel ?? 'Investor Login';
@endphp

<div class="tlg-reveal">
    @if ($eyebrow)
        <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">{{ $eyebrow }}</p>
    @endif
    @if ($heading)
        <h2 class="mt-4 font-serif text-3xl font-bold text-[#07172f]">{{ $heading }}</h2>
    @endif
    @if ($body)
        <p class="mt-4 leading-7 text-[#667085]">{{ $body }}</p>
    @endif

    <div class="mt-8 space-y-4">
        <div class="flex items-start gap-4 rounded-2xl border border-[#e6e8ee] bg-white p-6">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#07172f]">
                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ \App\Support\HeroIconRegistry::path('envelope') }}"/></svg>
            </div>
            <div>
                @if ($generalLabel)
                    <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#c9a24d]">{{ $generalLabel }}</p>
                @endif
                <p class="mt-1 font-semibold text-[#07172f]">{{ $generalValue }}</p>
                @if ($generalDescription)
                    <p class="mt-1 text-sm text-[#667085]">{{ $generalDescription }}</p>
                @endif
            </div>
        </div>

        <div class="flex items-start gap-4 rounded-2xl border border-[#e6e8ee] bg-white p-6">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#123f8c]">
                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ \App\Support\HeroIconRegistry::path('map-pin') }}"/></svg>
            </div>
            <div>
                @if ($officeLabel)
                    <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#c9a24d]">{{ $officeLabel }}</p>
                @endif
                <p class="mt-1 font-semibold text-[#07172f]">{{ $officeValue }}</p>
                @if ($officeDescription)
                    <p class="mt-1 text-sm text-[#667085]">{{ $officeDescription }}</p>
                @endif
            </div>
        </div>

        <div class="flex items-start gap-4 rounded-2xl border border-[#e6e8ee] bg-white p-6">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#c9a24d]">
                <svg class="h-5 w-5 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
            </div>
            <div>
                @if ($hoursLabel)
                    <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#c9a24d]">{{ $hoursLabel }}</p>
                @endif
                <p class="mt-1 font-semibold text-[#07172f]">{{ $hoursValue }}</p>
            </div>
        </div>

        <div class="relative overflow-hidden rounded-2xl shadow-md">
            <img src="{{ $image }}" alt="{{ $imageAlt }}" loading="lazy" decoding="async" class="h-44 w-full object-cover object-center">
            <div class="absolute inset-0 bg-gradient-to-t from-[#07172f]/50 to-transparent"></div>
        </div>

        <div class="rounded-2xl bg-[#07172f] p-6 text-white">
            <div class="flex items-start gap-4">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#c9a24d]">
                    <svg class="h-5 w-5 text-[#07172f]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ \App\Support\HeroIconRegistry::path('lock-closed') }}"/></svg>
                </div>
                <div>
                    @if ($investorEyebrow)
                        <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#c9a24d]">{{ $investorEyebrow }}</p>
                    @endif
                    @if ($investorHeading)
                        <p class="mt-1 font-semibold">{{ $investorHeading }}</p>
                    @endif
                    @if ($investorBody)
                        <p class="mt-1 text-sm text-slate-300">{{ $investorBody }}</p>
                    @endif
                </div>
            </div>
            <a href="{{ route('login') }}" class="mt-4 inline-flex rounded-full bg-[#c9a24d] px-5 py-2.5 text-sm font-bold text-[#07172f] hover:bg-[#d8b765]">{{ $investorCtaLabel }}</a>
        </div>
    </div>
</div>

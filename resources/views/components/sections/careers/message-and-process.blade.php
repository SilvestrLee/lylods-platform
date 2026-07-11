{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Careers

Future Enterprise Section Candidate:
Process Steps

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'messageEyebrow' => null,
    'messageHeading' => null,
    'messageBody' => null,
    'noticeBody' => null,
    'howEyebrow' => null,
    'howHeading' => null,
    'steps' => [],
])

@php
    $messageEyebrow = $messageEyebrow ?? 'What to Tell Us';
    $messageHeading = $messageHeading ?? 'Help us understand how you can contribute.';
    $messageBody = $messageBody ?? 'Tell us about your experience, the role or placement you are interested in, and how your skills could contribute to our work.';
    $noticeBody = $noticeBody ?? 'Submitting your details does not guarantee employment, placement or project engagement. It helps us understand your interests and contact you where a suitable opportunity or pathway may be available.';

    $howEyebrow = $howEyebrow ?? 'How It Works';
    $howHeading = $howHeading ?? 'Simple steps to connect.';

    $steps = count($steps) ? $steps : [
        ['title' => 'Share your interest', 'description' => 'Use our contact form to reach out, selecting the recruitment or placement option.'],
        ['title' => 'Tell us about your skills and experience', 'description' => 'Give us a clear picture of your background, what you are looking for, and how you think you can contribute.'],
        ['title' => 'We review suitable opportunities or pathways', 'description' => 'We review your details against current and anticipated needs across our service areas and network.'],
        ['title' => 'We contact you if there is a relevant next step', 'description' => 'If a suitable opportunity or pathway becomes available that matches your profile, we will be in touch directly.'],
    ];
@endphp

<section class="bg-[#f7f3ea]">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <div class="grid gap-16 lg:grid-cols-2 lg:items-start">

            <div class="tlg-reveal">
                @if ($messageEyebrow)
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $messageEyebrow }}</p>
                @endif
                @if ($messageHeading)
                    <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">{{ $messageHeading }}</h2>
                @endif
                @if ($messageBody)
                    <div class="mt-8 rounded-[2rem] border border-[#e6e8ee] bg-white p-8 shadow-sm">
                        <div class="flex items-start gap-5">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#07172f]">
                                <svg class="h-5 w-5 text-[#c9a24d]" fill="none" stroke="currentColor" stroke-width="1.75" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="{{ \App\Support\HeroIconRegistry::path('chat-bubble') }}"/></svg>
                            </div>
                            <p class="leading-7 text-[#667085]">{{ $messageBody }}</p>
                        </div>
                    </div>
                @endif
                @if ($noticeBody)
                    <div class="mt-6 rounded-[2rem] border border-amber-200 bg-amber-50 p-6">
                        <p class="text-sm leading-6 text-amber-900">{{ $noticeBody }}</p>
                    </div>
                @endif
            </div>

            <div class="tlg-reveal tlg-d1">
                @if ($howEyebrow)
                    <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $howEyebrow }}</p>
                @endif
                @if ($howHeading)
                    <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">{{ $howHeading }}</h2>
                @endif
                <div class="mt-8 space-y-4">
                    @foreach ($steps as $index => $step)
                        @php $isLast = $index === count($steps) - 1; @endphp
                        <div class="flex items-start gap-5 rounded-2xl border border-[#e6e8ee] bg-white p-6 shadow-sm">
                            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full text-sm font-bold {{ $isLast ? 'bg-[#c9a24d] text-[#07172f]' : 'bg-[#07172f] text-[#c9a24d]' }}">{{ $index + 1 }}</div>
                            <div>
                                @if ($step['title'] ?? null)
                                    <p class="font-bold text-[#07172f]">{{ $step['title'] }}</p>
                                @endif
                                @if ($step['description'] ?? null)
                                    <p class="mt-1 text-sm leading-6 text-[#667085]">{{ $step['description'] }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

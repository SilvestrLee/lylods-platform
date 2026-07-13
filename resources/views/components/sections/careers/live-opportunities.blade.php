{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Careers

Renders real, published CareerOpportunity records
(app/Models/CareerOpportunity.php via CareerService::published()).
Not CMS-editable page content — same non-CMS data-listing pattern
as Industries' Case Studies/Insights cross-links.

Future Enterprise Section Candidate:
Feature Grid

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'opportunities' => [],
])

<section class="bg-white">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <div class="tlg-reveal max-w-3xl">
            <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#123f8c]">Current Openings</p>
            <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">Live opportunities with The Lylods Group.</h2>
        </div>

        @if (count($opportunities))
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($opportunities as $index => $opportunity)
                    <div class="tlg-reveal{{ $index % 3 ? ' tlg-d'.($index % 3) : '' }} flex flex-col rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] p-7 shadow-sm">
                        <div class="flex flex-wrap items-center gap-2">
                            @if ($opportunity['type'] ?? null)
                                <span class="rounded-full bg-[#07172f] px-3 py-1 text-xs font-bold uppercase tracking-[0.1em] text-[#c9a24d]">{{ $opportunity['type'] }}</span>
                            @endif
                            @if ($opportunity['location'] ?? null)
                                <span class="text-xs font-semibold text-[#667085]">{{ $opportunity['location'] }}</span>
                            @endif
                        </div>
                        <h3 class="mt-4 font-serif text-xl font-bold text-[#07172f]">{{ $opportunity['title'] }}</h3>
                        @if ($opportunity['description'] ?? null)
                            <p class="mt-3 flex-1 text-sm leading-7 text-[#667085]">{{ \Illuminate\Support\Str::limit($opportunity['description'], 140) }}</p>
                        @endif
                        @if ($opportunity['closingDate'] ?? null)
                            <p class="mt-5 text-xs font-semibold uppercase tracking-[0.1em] text-[#123f8c]">Closes {{ $opportunity['closingDate'] }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="tlg-reveal mt-12 rounded-2xl border border-dashed border-[#d0d5dd] bg-[#f7f3ea] p-10 text-center">
                <p class="text-sm leading-6 text-[#667085]">There are no live openings at the moment. Please check back soon, or use the form below to register your interest for future opportunities.</p>
            </div>
        @endif
    </div>
</section>

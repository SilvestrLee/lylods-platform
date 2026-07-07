@props([
    'eyebrow' => null,
    'heading' => null,
    'emptyDescription' => null,
    'testimonials' => null,
])

<section class="bg-[#f7f3ea]">
    <div class="mx-auto max-w-[1440px] px-6 py-20">
        <div class="tlg-reveal max-w-2xl">
            @if ($eyebrow)
                <p class="text-sm font-bold uppercase tracking-[0.25em] text-[#c9a24d]">{{ $eyebrow }}</p>
            @endif
            @if ($heading)
                <h2 class="mt-4 font-serif text-4xl font-bold text-[#07172f] lg:text-[2.4rem]">{{ $heading }}</h2>
            @endif
            @if ($testimonials->isEmpty() && $emptyDescription)
                <p class="mt-5 text-lg leading-8 text-[#667085]">{{ $emptyDescription }}</p>
            @endif
        </div>
        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @if ($testimonials->isNotEmpty())
                @foreach ($testimonials->take(3) as $testimonial)
                    @php $dark = $loop->last && $loop->index % 3 === 2; @endphp
                    <x-testimonials.card
                        :quote="$testimonial->quote"
                        :name="$testimonial->client_name"
                        :meta="collect([$testimonial->organisation, $testimonial->role])->filter()->implode(' · ')"
                        :dark="$dark"
                    />
                @endforeach
            @else
                <x-testimonials.card
                    quote="Feedback from business consulting, technology, training, and compliance engagements will appear here once collected and approved."
                    name="Client Name"
                    meta="Organisation · Business & Technology"
                    :dark="false"
                    :stagger="1"
                />
                <x-testimonials.card
                    quote="Testimonials from property, compliance, and community project engagements will be published here when available."
                    name="Client Name"
                    meta="Organisation · Property & Development"
                    :dark="false"
                    :stagger="2"
                />
                <x-testimonials.card
                    quote="We welcome feedback from all clients. If you have worked with The Lylods Group and would like to share your experience, please contact us."
                    :dark="true"
                    cta-label="Share Your Feedback"
                    :cta-url="route('contact')"
                    :stagger="3"
                />
            @endif
        </div>
    </div>
</section>

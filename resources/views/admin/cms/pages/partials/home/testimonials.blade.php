<x-admin.panel subtitle="Client Feedback" title="Testimonials">
    <p class="text-sm text-[#667085]">
        Content is managed under
        <a href="{{ route('admin.cms.people.testimonials.index') }}" class="font-semibold text-[#123f8c] underline">Manage Testimonials</a>.
        Use the controls below to choose which testimonials are featured on the homepage and in what order.
    </p>

    @if ($testimonials->isEmpty())
        <p class="rounded-2xl border border-dashed border-[#d0d5dd] p-6 text-center text-sm text-[#667085]">
            No testimonials yet. Add one from Manage Testimonials to feature it here.
        </p>
    @else
        <div class="divide-y divide-[#e6e8ee] rounded-2xl border border-[#e6e8ee]">
            @foreach ($testimonials as $testimonial)
                <div class="flex flex-col gap-3 p-4 sm:flex-row sm:items-center sm:justify-between">
                    <div class="min-w-0 flex-1">
                        <p class="truncate text-sm font-semibold text-[#07172f]">{{ $testimonial->client_name }}</p>
                        <p class="truncate text-xs text-[#667085]">{{ $testimonial->role }}{{ $testimonial->organisation ? ' · ' . $testimonial->organisation : '' }}</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                            <input type="checkbox" name="testimonials[{{ $testimonial->id }}][featured]" value="1"
                                   {{ old("testimonials.{$testimonial->id}.featured", $testimonial->featured) ? 'checked' : '' }}
                                   class="h-4 w-4 rounded border-gray-300 text-[#123f8c] focus:ring-[#123f8c]">
                            Featured on Homepage
                        </label>
                        <label class="flex items-center gap-2 text-xs font-semibold text-[#07172f]">
                            Order
                            <input type="number" min="0" name="testimonials[{{ $testimonial->id }}][display_order]"
                                   value="{{ old("testimonials.{$testimonial->id}.display_order", $testimonial->display_order) }}"
                                   class="w-16 rounded-lg border border-[#d0d5dd] px-2 py-1 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-admin.panel>

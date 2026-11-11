<x-app-layout>
<x-admin-dashboard-shell>
    <div class="rounded-[2rem] bg-white p-7 shadow-sm">
        <p class="text-xs font-bold uppercase tracking-wider text-[#c9a24d]">Website CMS</p>
        <h1 class="mt-2 text-2xl font-bold text-[#07172f]">Public Image Slots</h1>
        <p class="mt-3 text-sm text-[#667085]">Choose a photograph for each public-facing image panel. Existing CMS article and case-study featured images take priority over these fallback images.</p>
        <details class="mt-5 rounded-2xl border border-[#e6e8ee] p-4">
            <summary class="cursor-pointer text-sm font-bold text-[#123f8c]">View available photographs and their media IDs</summary>
            <div class="mt-4 grid gap-3 grid-cols-2 sm:grid-cols-3 lg:grid-cols-4">
                @foreach($media as $photo)
                    <div class="overflow-hidden rounded-xl border border-[#e6e8ee] bg-[#f7f3ea]">
                        <img src="{{ $photo->url() }}" alt="{{ $photo->alt_text ?: $photo->title }}" class="h-24 w-full object-cover" loading="lazy" decoding="async">
                        <div class="p-2 text-[11px] text-[#07172f]">
                            <strong>Media #{{ $photo->id }}</strong>
                            <p class="mt-1 truncate" title="{{ $photo->title }}">{{ $photo->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </details>
        @if(session('success'))
            <p class="mt-4 rounded-xl bg-green-50 p-3 text-sm text-green-800">{{ session('success') }}</p>
        @endif
        @foreach($slots as $pool => $items)
            <h2 class="mt-9 mb-4 text-lg font-bold text-[#07172f]">{{ ucfirst($pool) }} images</h2>
            <div class="grid gap-5 md:grid-cols-2">
                @foreach($items as $slot)
                <form method="POST" action="{{ route('admin.cms.image-slots.update', $slot) }}" class="rounded-2xl border border-[#e6e8ee] p-4">
                    @csrf
                    @method('PATCH')
                    <p class="font-semibold text-[#07172f]">{{ $slot->label }}</p>
                    <p class="mt-1 text-xs text-[#667085]">{{ $slot->key }}</p>
                    @if($slot->media)
                        <img src="{{ $slot->media->url() }}" alt="Current image for {{ $slot->label }}" loading="lazy" class="mt-3 h-32 w-full rounded-lg object-cover">
                    @endif
                    <label for="slot-{{ $slot->id }}" class="mt-3 block text-xs font-semibold">Choose CMS photograph</label>
                    <select id="slot-{{ $slot->id }}" name="media_id" class="mt-2 w-full rounded-xl border border-[#d0d5dd] px-3 py-2 text-sm">
                        <option value="">No image (retain visual fallback)</option>
                        @foreach($media as $photo)
                            <option value="{{ $photo->id }}" @selected((int) $slot->media_id === $photo->id)>{{ $photo->title }} — #{{ $photo->id }} ({{ $photo->path }})</option>
                        @endforeach
                    </select>
                    @error('media_id') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                    <button class="mt-3 rounded-xl bg-[#07172f] px-4 py-2 text-sm font-bold text-white hover:bg-[#123f8c]" type="submit">Save image</button>
                </form>
                @endforeach
            </div>
        @endforeach
    </div>
</x-admin-dashboard-shell>
</x-app-layout>

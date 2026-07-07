@props([
    'label',
    'helper' => null,
    'media' => null,
    'inputName',
    'removeName',
    'altName' => null,
    'altValue' => null,
])

<div>
    <label class="block text-sm font-semibold text-[#07172f]">{{ $label }}</label>

    @if ($media)
        <div class="mt-2 mb-3 inline-flex items-center gap-3 rounded-2xl border border-[#e6e8ee] bg-[#f7f3ea] p-3">
            <img src="{{ $media->url() }}" alt="" class="h-14 w-24 rounded-lg object-cover">
            <span class="text-xs text-[#667085]">{{ $media->original_filename ?? 'Current image' }}</span>
            <label class="flex items-center gap-2 text-xs font-semibold text-red-600">
                <input type="checkbox" name="{{ $removeName }}" value="1" class="rounded">
                Remove
            </label>
        </div>
    @else
        <p class="mt-2 mb-3 text-xs text-[#667085]">No image uploaded — the design's default image is used.</p>
    @endif

    <input type="file" name="{{ $inputName }}" accept="image/*"
           class="mt-2 w-full text-sm text-[#07172f] file:mr-4 file:rounded-full file:border-0 file:bg-[#07172f] file:px-4 file:py-2 file:text-xs file:font-bold file:text-white hover:file:bg-[#123f8c]">
    <p class="mt-1.5 text-xs text-[#667085]">{{ $helper ?? 'Upload a new file to replace the current image.' }}</p>

    @if ($altName)
        <div class="mt-3">
            <label class="block text-xs font-semibold text-[#07172f]">Alt Text</label>
            <input type="text" name="{{ $altName }}" value="{{ old($altName, $altValue) }}"
                   class="mt-1 w-full rounded-2xl border border-[#d0d5dd] px-4 py-2.5 text-sm text-[#07172f] shadow-sm focus:border-[#123f8c] focus:outline-none focus:ring-1 focus:ring-[#123f8c]">
        </div>
    @endif

    @error($inputName) <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
</div>

@props(['label', 'helper' => null, 'error' => null, 'required' => false])

<div>
    <label class="block text-sm font-semibold text-[#07172f]">
        {{ $label }} @if ($required) <span class="text-red-500">*</span> @endif
    </label>
    <div class="mt-2">
        {{ $slot }}
    </div>
    @if ($helper)
        <p class="mt-1.5 text-xs text-[#667085]">{{ $helper }}</p>
    @endif
    @if ($error)
        <p class="mt-1 text-xs text-red-600">{{ $error }}</p>
    @endif
</div>

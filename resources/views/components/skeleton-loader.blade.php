@props(['type' => 'card', 'rows' => 3])

@if ($type === 'card')
    <div class="animate-pulse rounded-2xl border border-[#e6e8ee] bg-white p-6">
        <div class="flex items-start justify-between">
            <div class="space-y-2">
                <div class="h-3.5 w-28 rounded-full bg-[#f0f2f5]"></div>
                <div class="h-7 w-20 rounded-lg bg-[#e6e8ee]"></div>
            </div>
            <div class="h-10 w-10 rounded-xl bg-[#f0f2f5]"></div>
        </div>
        <div class="mt-4 h-3 w-36 rounded-full bg-[#f0f2f5]"></div>
    </div>

@elseif ($type === 'table-row')
    @for ($i = 0; $i < $rows; $i++)
        <tr class="animate-pulse border-b border-[#f0f2f5]">
            <td class="px-5 py-4"><div class="h-3.5 w-32 rounded-full bg-[#f0f2f5]"></div></td>
            <td class="px-5 py-4"><div class="h-3.5 w-24 rounded-full bg-[#f0f2f5]"></div></td>
            <td class="px-5 py-4"><div class="h-3.5 w-20 rounded-full bg-[#f0f2f5]"></div></td>
            <td class="px-5 py-4"><div class="h-3.5 w-16 rounded-full bg-[#f0f2f5]"></div></td>
            <td class="px-5 py-4"><div class="h-5 w-16 rounded-full bg-[#f0f2f5]"></div></td>
            <td class="px-5 py-4"><div class="h-3.5 w-12 rounded-full bg-[#f0f2f5]"></div></td>
        </tr>
    @endfor

@elseif ($type === 'text')
    <div class="animate-pulse space-y-2.5">
        <div class="h-3.5 w-full rounded-full bg-[#f0f2f5]"></div>
        <div class="h-3.5 w-4/5 rounded-full bg-[#f0f2f5]"></div>
        <div class="h-3.5 w-3/5 rounded-full bg-[#f0f2f5]"></div>
    </div>

@elseif ($type === 'form')
    <div class="animate-pulse space-y-5">
        @for ($i = 0; $i < $rows; $i++)
            <div class="space-y-1.5">
                <div class="h-3 w-24 rounded-full bg-[#f0f2f5]"></div>
                <div class="h-10 w-full rounded-xl bg-[#f0f2f5]"></div>
            </div>
        @endfor
        <div class="h-10 w-32 rounded-full bg-[#e6e8ee]"></div>
    </div>
@endif

{{-- ----------------------------------------------------
Enterprise CMS v1

Page:
Investment

Future Enterprise Section Candidate:
Statistics

Shared extraction deferred until CMS v2.

Do not refactor during v1.
---------------------------------------------------- --}}
@props([
    'stats' => [],
])

@php
    $stats = count($stats) ? $stats : [
        ['label' => 'Portal Type', 'value' => 'Dedicated Portal', 'caption' => 'Investor-only platform'],
        ['label' => 'Access Model', 'value' => 'Secure Login', 'caption' => 'Role-restricted & encrypted'],
        ['label' => 'Communications', 'value' => 'Official Notices', 'caption' => 'Formal investor updates'],
        ['label' => 'Oversight', 'value' => 'Professionally Managed', 'caption' => 'Administrator-controlled'],
    ];
@endphp

<div class="border-t border-white/10 bg-[#07172f]">
    <div class="mx-auto max-w-7xl px-6 py-8">
        <dl class="grid grid-cols-2 gap-x-6 gap-y-8 sm:grid-cols-4 text-center">
            @foreach ($stats as $index => $stat)
                <div class="tlg-reveal tlg-d{{ $index + 1 }}">
                    @if ($stat['label'] ?? null)
                        <dt class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#c9a24d]">{{ $stat['label'] }}</dt>
                    @endif
                    @if ($stat['value'] ?? null)
                        <dd class="mt-2 font-serif text-xl font-bold leading-tight text-white">{{ $stat['value'] }}</dd>
                    @endif
                    @if ($stat['caption'] ?? null)
                        <dd class="mt-1 text-xs text-slate-400">{{ $stat['caption'] }}</dd>
                    @endif
                </div>
            @endforeach
        </dl>
    </div>
</div>

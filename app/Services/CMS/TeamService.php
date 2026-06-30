<?php

namespace App\Services\CMS;

use App\Models\TeamMember;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class TeamService
{
    private const TTL = 1800;
    private const CACHE_KEY = 'cms.team_members';

    public function active(): Collection
    {
        return Cache::remember(self::CACHE_KEY, self::TTL, fn () =>
            TeamMember::with(['photo'])
                ->where('is_active', true)
                ->orderBy('display_order')
                ->orderBy('name')
                ->get()
        );
    }

    public function flush(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}

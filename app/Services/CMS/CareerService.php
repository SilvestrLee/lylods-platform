<?php

namespace App\Services\CMS;

use App\Models\CareerOpportunity;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class CareerService
{
    private const TTL = 1800;
    private const KEY = 'cms.careers';

    public function published(): Collection
    {
        return Cache::remember(self::KEY, self::TTL, fn () =>
            CareerOpportunity::where('status', 'published')
                ->orderBy('closing_date')
                ->orderBy('title')
                ->get()
        );
    }

    public function flush(): void
    {
        Cache::forget(self::KEY);
    }
}

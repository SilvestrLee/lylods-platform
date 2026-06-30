<?php

namespace App\Services\CMS;

use App\Models\Testimonial;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class TestimonialService
{
    private const TTL = 1800;
    private const CACHE_KEY = 'cms.testimonials';

    public function featured(): Collection
    {
        return Cache::remember(self::CACHE_KEY, self::TTL, fn () =>
            Testimonial::with(['companyLogo', 'photo'])
                ->where('is_active', true)
                ->orderByDesc('featured')
                ->orderBy('display_order')
                ->get()
        );
    }

    public function flush(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}

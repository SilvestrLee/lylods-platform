<?php

namespace App\Services\CMS;

use App\Models\Insight;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class InsightService
{
    private const TTL = 900;
    private const KEY_LIST = 'cms.insights';

    public function published(): Collection
    {
        return Cache::remember(self::KEY_LIST, self::TTL, fn () =>
            Insight::with(['featuredMedia'])
                ->where('status', 'published')
                ->orderByDesc('featured')
                ->orderByDesc('published_at')
                ->get()
        );
    }

    public function findBySlug(string $slug): ?Insight
    {
        return Cache::remember("cms.insight.{$slug}", self::TTL, fn () =>
            Insight::with(['featuredMedia'])
                ->where('slug', $slug)
                ->where('status', 'published')
                ->first()
        );
    }

    public function flush(?string $slug = null): void
    {
        Cache::forget(self::KEY_LIST);
        if ($slug) {
            Cache::forget("cms.insight.{$slug}");
        }
    }
}

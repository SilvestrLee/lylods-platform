<?php

namespace App\Services\CMS;

use App\Models\CaseStudy;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class CaseStudyService
{
    private const TTL = 1800;
    private const KEY_LIST = 'cms.case_studies';

    public function published(): Collection
    {
        return Cache::remember(self::KEY_LIST, self::TTL, fn () =>
            CaseStudy::with(['featuredMedia'])
                ->where('status', 'published')
                ->orderByDesc('featured')
                ->orderByDesc('published_at')
                ->get()
        );
    }

    public function findBySlug(string $slug): ?CaseStudy
    {
        return Cache::remember("cms.case_study.{$slug}", self::TTL, fn () =>
            CaseStudy::with(['featuredMedia'])
                ->where('slug', $slug)
                ->where('status', 'published')
                ->first()
        );
    }

    public function flush(?string $slug = null): void
    {
        Cache::forget(self::KEY_LIST);
        if ($slug) {
            Cache::forget("cms.case_study.{$slug}");
        }
    }
}

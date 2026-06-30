<?php

namespace App\Services\CMS;

use App\Models\CompliancePage;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CompliancePageService
{
    public function forSlug(string $slug): ?CompliancePage
    {
        return Cache::rememberForever("cms.compliance.{$slug}", fn () =>
            CompliancePage::where('slug', $slug)->first()
        );
    }

    public function all(): Collection
    {
        return CompliancePage::orderBy('title')->get();
    }

    public function flush(string $slug): void
    {
        Cache::forget("cms.compliance.{$slug}");
    }
}

<?php

namespace App\Services\CMS;

use App\Models\Organisation;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class OrganisationService
{
    private const TTL = 1800;

    public function byType(string $type): Collection
    {
        return Cache::remember("cms.organisations.{$type}", self::TTL, fn () =>
            Organisation::with(['logo'])
                ->where('type', $type)
                ->where('is_active', true)
                ->orderBy('display_order')
                ->orderBy('name')
                ->get()
        );
    }

    public function forHome(): Collection
    {
        return Cache::remember('cms.organisations.home', self::TTL, fn () =>
            Organisation::with(['logo'])
                ->whereIn('type', ['partner', 'accreditation'])
                ->where('is_active', true)
                ->orderBy('display_order')
                ->orderBy('name')
                ->get()
        );
    }

    public function flush(?string $type = null): void
    {
        Cache::forget('cms.organisations.home');
        if ($type) {
            Cache::forget("cms.organisations.{$type}");
        } else {
            foreach (['client', 'partner', 'association', 'accreditation', 'supplier'] as $t) {
                Cache::forget("cms.organisations.{$t}");
            }
        }
    }
}

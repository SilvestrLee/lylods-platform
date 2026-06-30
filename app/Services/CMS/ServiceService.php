<?php

namespace App\Services\CMS;

use App\Models\Service;
use App\Models\ServiceGroup;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ServiceService
{
    private const TTL = 1800;
    private const CACHE_KEY = 'cms.service_groups';

    public function allGroups(): Collection
    {
        return Cache::remember(self::CACHE_KEY, self::TTL, fn () =>
            ServiceGroup::with(['activeServices'])
                ->where('is_active', true)
                ->orderBy('display_order')
                ->get()
        );
    }

    public function groupBySlug(string $slug): ServiceGroup
    {
        return Cache::remember("cms.service_group.{$slug}", self::TTL, fn () =>
            ServiceGroup::with(['activeServices'])
                ->where('slug', $slug)
                ->firstOrFail()
        );
    }

    public function update(ServiceGroup $group, array $data): ServiceGroup
    {
        $group->update($data);
        $this->flush($group->slug);
        return $group->fresh();
    }

    public function updateService(Service $service, array $data): Service
    {
        $service->update($data);
        $this->flush($service->group?->slug);
        return $service->fresh();
    }

    public function flush(?string $groupSlug = null): void
    {
        Cache::forget(self::CACHE_KEY);
        if ($groupSlug) {
            Cache::forget("cms.service_group.{$groupSlug}");
        }
    }
}

<?php

namespace App\Services\CMS;

use App\Models\Partner;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class PartnerService
{
    private const CACHE_KEY = 'cms.partners';
    private const CACHE_TTL = 900;

    public function all(): Collection
    {
        return Partner::with('logo')->orderBy('display_order')->get();
    }

    public function visible(): Collection
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, fn () =>
            Partner::with('logo')
                ->where('is_visible', true)
                ->orderBy('display_order')
                ->get()
        );
    }

    public function featured(): Collection
    {
        return $this->visible()->where('featured', true);
    }

    public function store(array $data): Partner
    {
        $partner = Partner::create($data);
        $this->flush();

        return $partner;
    }

    public function update(Partner $partner, array $data): Partner
    {
        $partner->update($data);
        $this->flush();

        return $partner->fresh('logo');
    }

    public function delete(Partner $partner): void
    {
        $partner->delete();
        $this->flush();
    }

    public function flush(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}

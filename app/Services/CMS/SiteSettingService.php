<?php

namespace App\Services\CMS;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;

class SiteSettingService
{
    private const CACHE_KEY = 'cms.site_settings';

    public function current(): SiteSetting
    {
        return Cache::rememberForever(self::CACHE_KEY, function () {
            return SiteSetting::with([
                'logo',
                'logoInverse',
                'logoFooter',
                'favicon',
                'defaultOgImage',
            ])->firstOrFail();
        });
    }

    public function update(SiteSetting $setting, array $data): SiteSetting
    {
        $setting->update($data);
        $this->flush();

        return $setting->fresh([
            'logo',
            'logoInverse',
            'logoFooter',
            'favicon',
            'defaultOgImage',
        ]);
    }

    public function flush(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}

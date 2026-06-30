<?php

namespace App\Services\CMS;

use App\Models\FooterLink;
use App\Models\SocialLink;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class FooterService
{
    public function linksByGroup(): Collection
    {
        return Cache::rememberForever('cms.footer_links', fn () =>
            FooterLink::orderBy('display_order')->get()->groupBy('group')
        );
    }

    public function socialLinks(): Collection
    {
        return Cache::rememberForever('cms.social_links', fn () =>
            SocialLink::orderBy('display_order')->get()
        );
    }

    public function flushLinks(): void
    {
        Cache::forget('cms.footer_links');
    }

    public function flushSocialLinks(): void
    {
        Cache::forget('cms.social_links');
    }
}

<?php

namespace App\Services\CMS;

use App\Models\Page;
use Illuminate\Support\Facades\Cache;

class PageService
{
    private const TTL = 1800; // 30 minutes

    public function forSlug(string $slug): Page
    {
        return Cache::remember("cms.page.{$slug}", self::TTL, function () use ($slug) {
            return Page::with([
                    'heroMedia',
                    'ogMedia',
                    'aboutMedia',
                    'heroCards.image',
                    'heroCards.icons',
                    'statistics',
                    'serviceCards.image',
                    'industries',
                    'whyChooseUsCards',
                    'engagementSteps',
                    'aboutValues',
                    'aboutPageIntroMedia',
                    'aboutHowWeWorkSteps',
                    'aboutFocusAreas',
                    'aboutPrinciples',
                    'aboutAudienceTags',
                    'aboutDifferentiators',
                    'servicesWhyUsCards',
                    'servicesHowWorkSteps',
                    'industryCards.image',
                    'propertyContextMedia',
                    'propertySupportCards',
                    'propertyAudienceCards',
                    'propertyWhyUsCards',
                    'propertyRoleSteps',
                    'propertyNetworkTags',
                    'communityAudienceMedia',
                    'communityRoleMedia',
                    'communitySupportCards',
                    'communityAudienceTags',
                    'communityRoleSteps',
                    'communityHowWorkSteps',
                    'communityEngagementCards.image',
                ])
                ->where('slug', $slug)
                ->firstOrFail();
        });
    }

    public function homepage(): Page
    {
        return $this->forSlug('home');
    }

    public function all()
    {
        return Page::orderBy('slug')->get();
    }

    public function update(Page $page, array $data): Page
    {
        $page->update($data);
        $this->flush($page->slug);

        return $page->fresh(['heroMedia', 'ogMedia']);
    }

    public function flush(string $slug): void
    {
        Cache::forget("cms.page.{$slug}");
    }
}

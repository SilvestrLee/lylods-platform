<?php

namespace App\Services\CMS;

use App\Models\CaseStudy;
use App\Models\Insight;
use App\Models\Page;
use Illuminate\Support\Facades\Cache;

class SitemapService
{
    private const CACHE_KEY = 'cms.sitemap';
    private const CACHE_TTL = 1800; // 30 minutes

    private const SLUG_MAP = [
        'home'               => '/',
        'about'              => '/about',
        'services'           => '/services',
        'investment'         => '/investment',
        'property'           => '/property',
        'community-projects' => '/community-projects',
        'case-studies'       => '/case-studies',
        'insights'           => '/insights',
        'careers'            => '/careers',
        'contact'            => '/contact',
        'privacy'            => '/privacy',
        'privacy-notice'     => '/privacy-notice',
        'cookie-notice'      => '/cookie-notice',
        'accessibility'      => '/accessibility',
        'complaints'         => '/complaints',
        'terms'              => '/terms',
    ];

    private const SLUG_CHANGEFREQ = [
        'home'               => 'weekly',
        'about'              => 'monthly',
        'services'           => 'weekly',
        'investment'         => 'monthly',
        'property'           => 'weekly',
        'community-projects' => 'monthly',
        'case-studies'       => 'monthly',
        'insights'           => 'weekly',
        'careers'            => 'weekly',
        'contact'            => 'monthly',
        'privacy'            => 'monthly',
        'privacy-notice'     => 'monthly',
        'cookie-notice'      => 'monthly',
        'accessibility'      => 'monthly',
        'complaints'         => 'monthly',
        'terms'              => 'monthly',
    ];

    private const SLUG_PRIORITY = [
        'home'               => '1.0',
        'services'           => '0.9',
        'contact'            => '0.9',
        'about'              => '0.8',
        'investment'         => '0.8',
        'property'           => '0.8',
        'community-projects' => '0.8',
        'case-studies'       => '0.8',
        'insights'           => '0.8',
        'careers'            => '0.7',
        'privacy'            => '0.3',
        'privacy-notice'     => '0.3',
        'cookie-notice'      => '0.3',
        'accessibility'      => '0.3',
        'complaints'         => '0.3',
        'terms'              => '0.3',
    ];

    public function entries(): array
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, fn () => $this->build());
    }

    public function flush(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    private function build(): array
    {
        $entries = [];

        $this->addPages($entries);
        $this->addCaseStudies($entries);
        $this->addInsights($entries);

        return $entries;
    }

    private function addPages(array &$entries): void
    {
        $pages = Page::select(['slug', 'updated_at'])
            ->where('is_published', true)
            ->where('sitemap_include', true)
            ->orderBy('slug')
            ->get();

        foreach ($pages as $page) {
            $path = self::SLUG_MAP[$page->slug] ?? ('/' . $page->slug);

            $entries[] = [
                'loc'        => $this->url($path),
                'lastmod'    => $page->updated_at->format('Y-m-d'),
                'changefreq' => self::SLUG_CHANGEFREQ[$page->slug] ?? 'monthly',
                'priority'   => self::SLUG_PRIORITY[$page->slug] ?? '0.5',
            ];
        }
    }

    private function addCaseStudies(array &$entries): void
    {
        $items = CaseStudy::select(['slug', 'updated_at'])
            ->where('status', 'published')
            ->where('sitemap_include', true)
            ->orderByDesc('updated_at')
            ->get();

        foreach ($items as $cs) {
            $entries[] = [
                'loc'        => $this->url('/case-studies/' . $cs->slug),
                'lastmod'    => $cs->updated_at->format('Y-m-d'),
                'changefreq' => 'monthly',
                'priority'   => '0.6',
            ];
        }
    }

    private function addInsights(array &$entries): void
    {
        $items = Insight::select(['slug', 'updated_at'])
            ->where('status', 'published')
            ->where('sitemap_include', true)
            ->orderByDesc('updated_at')
            ->get();

        foreach ($items as $insight) {
            $entries[] = [
                'loc'        => $this->url('/insights/' . $insight->slug),
                'lastmod'    => $insight->updated_at->format('Y-m-d'),
                'changefreq' => 'weekly',
                'priority'   => '0.6',
            ];
        }
    }

    private function url(string $path): string
    {
        $base = rtrim(config('app.url') ?: request()->getSchemeAndHttpHost(), '/');

        return $base . '/' . ltrim($path, '/');
    }
}

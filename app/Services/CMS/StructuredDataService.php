<?php

namespace App\Services\CMS;

use App\Models\CaseStudy;
use App\Models\Insight;
use App\Models\SiteSetting;
use Illuminate\Support\Collection;

class StructuredDataService
{
    public function buildJson(
        ?SiteSetting $setting,
        Collection $socialLinks,
        string $title,
        ?string $description,
        string $canonicalUrl,
        array $context = []
    ): ?string {
        $orgSchema = $this->organization($setting, $socialLinks);

        $schemas = array_values(array_filter([
            $orgSchema,
            $this->website($setting),
            $this->webpage($title, $description, $canonicalUrl),
            $this->breadcrumbList($canonicalUrl, $title),
            $this->contextualSchema($context, $orgSchema ?? []),
        ]));

        if (empty($schemas)) {
            return null;
        }

        return json_encode(
            ['@context' => 'https://schema.org', '@graph' => $schemas],
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
        );
    }

    private function organization(?SiteSetting $setting, Collection $socialLinks): ?array
    {
        if (! $setting) {
            return null;
        }

        $schema = [
            '@type' => 'Organization',
            'name'  => $setting->site_name,
            'url'   => $this->baseUrl(),
        ];

        if ($setting->logo) {
            $logoUrl = $this->absoluteUrl($setting->logo->url());
            if ($this->isUsableImageUrl($logoUrl)) {
                $schema['logo'] = ['@type' => 'ImageObject', 'url' => $logoUrl];
            }
        }

        if (filled($setting->primary_email)) {
            $schema['email'] = $setting->primary_email;
        }

        if (filled($setting->phone)) {
            $schema['telephone'] = $setting->phone;
        }

        if (filled($setting->address)) {
            $schema['address'] = ['@type' => 'PostalAddress', 'streetAddress' => $setting->address];
        }

        $sameAs = $socialLinks->filter(fn ($l) => filled($l->url))->pluck('url')->values()->all();
        if (! empty($sameAs)) {
            $schema['sameAs'] = $sameAs;
        }

        return $schema;
    }

    private function website(?SiteSetting $setting): ?array
    {
        if (! $setting) {
            return null;
        }

        return [
            '@type' => 'WebSite',
            'name'  => $setting->site_name,
            'url'   => $this->baseUrl(),
        ];
    }

    private function webpage(string $title, ?string $description, string $url): array
    {
        $schema = [
            '@type'    => 'WebPage',
            'name'     => $title,
            'url'      => $url,
            'isPartOf' => ['@id' => $this->baseUrl()],
        ];

        if (filled($description)) {
            $schema['description'] = $description;
        }

        return $schema;
    }

    private function breadcrumbList(string $url, string $title): array
    {
        $base      = $this->baseUrl();
        $routeName = request()->route()?->getName();

        $items = [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $base . '/'],
        ];

        if ($routeName === 'insight') {
            $items[] = ['@type' => 'ListItem', 'position' => 2, 'name' => 'Insights', 'item' => $base . '/insights'];
            $items[] = ['@type' => 'ListItem', 'position' => 3, 'name' => $title, 'item' => $url];
        } elseif ($routeName === 'case-study') {
            $items[] = ['@type' => 'ListItem', 'position' => 2, 'name' => 'Case Studies', 'item' => $base . '/case-studies'];
            $items[] = ['@type' => 'ListItem', 'position' => 3, 'name' => $title, 'item' => $url];
        } elseif ($routeName !== 'home') {
            $items[] = ['@type' => 'ListItem', 'position' => 2, 'name' => $title, 'item' => $url];
        }

        return ['@type' => 'BreadcrumbList', 'itemListElement' => $items];
    }

    private function contextualSchema(array $context, array $orgSchema): ?array
    {
        $type  = $context['type'] ?? null;
        $model = $context['model'] ?? null;

        if ($type === 'article' && $model instanceof Insight) {
            return $this->article($model, $orgSchema);
        }

        if ($type === 'creative_work' && $model instanceof CaseStudy) {
            return $this->creativeWork($model, $orgSchema);
        }

        return null;
    }

    private function article(Insight $insight, array $orgSchema): array
    {
        $schema = [
            '@type'            => 'Article',
            'headline'         => $insight->title,
            'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => request()->url()],
            'datePublished'    => ($insight->published_at ?? $insight->created_at)->toIso8601String(),
            'dateModified'     => $insight->updated_at->toIso8601String(),
            'author'           => [
                '@type' => 'Person',
                'name'  => filled($insight->author) ? $insight->author : 'The Lylods Group',
            ],
        ];

        if (filled($insight->excerpt)) {
            $schema['description'] = $insight->excerpt;
        }

        if ($insight->featuredMedia) {
            $imageUrl = $this->absoluteUrl($insight->featuredMedia->url());
            if ($this->isUsableImageUrl($imageUrl)) {
                $schema['image'] = ['@type' => 'ImageObject', 'url' => $imageUrl];
            }
        }

        if (! empty($orgSchema)) {
            $schema['publisher'] = $orgSchema;
        }

        return $schema;
    }

    private function creativeWork(CaseStudy $caseStudy, array $orgSchema): array
    {
        $schema = [
            '@type'            => 'CreativeWork',
            'name'             => $caseStudy->title,
            'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => request()->url()],
            'dateModified'     => $caseStudy->updated_at->toIso8601String(),
        ];

        if (filled($caseStudy->summary)) {
            $schema['description'] = $caseStudy->summary;
        }

        if ($caseStudy->featuredMedia) {
            $imageUrl = $this->absoluteUrl($caseStudy->featuredMedia->url());
            if ($this->isUsableImageUrl($imageUrl)) {
                $schema['image'] = ['@type' => 'ImageObject', 'url' => $imageUrl];
            }
        }

        if (! empty($orgSchema)) {
            $schema['publisher'] = $orgSchema;
        }

        return $schema;
    }

    private function isUsableImageUrl(string $url): bool
    {
        return filled($url)
            && str_starts_with($url, 'http')
            && ! str_contains($url, 'localhost')
            && ! str_contains($url, '127.0.0.1');
    }

    private function absoluteUrl(string $url): string
    {
        if (str_starts_with($url, 'http')) {
            return $url;
        }

        return rtrim($this->baseUrl(), '/') . '/' . ltrim($url, '/');
    }

    private function baseUrl(): string
    {
        return rtrim(config('app.url') ?: request()->getSchemeAndHttpHost(), '/');
    }
}

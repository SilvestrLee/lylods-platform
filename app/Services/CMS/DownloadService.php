<?php

namespace App\Services\CMS;

use App\Models\Download;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class DownloadService
{
    private const CACHE_KEY = 'cms.downloads';
    private const CACHE_TTL = 900;

    public function all(): Collection
    {
        return Download::with('media')->orderBy('display_order')->orderByDesc('created_at')->get();
    }

    public function public(): Collection
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, fn () =>
            Download::with('media')
                ->where('is_public', true)
                ->orderBy('display_order')
                ->orderByDesc('published_date')
                ->get()
        );
    }

    public function store(array $data): Download
    {
        $download = Download::create($data);
        $this->flush();

        return $download;
    }

    public function update(Download $download, array $data): Download
    {
        $download->update($data);
        $this->flush();

        return $download->fresh('media');
    }

    public function delete(Download $download): void
    {
        $download->delete();
        $this->flush();
    }

    public function flush(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}

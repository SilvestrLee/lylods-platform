<?php

namespace App\Observers;

use App\Models\Media;
use App\Services\CMS\MediaService;

class MediaObserver
{
    public function __construct(private MediaService $service) {}

    /**
     * Defense-in-depth: block deletion of media still referenced elsewhere,
     * even if the caller bypassed AdminMediaController's own usage check.
     */
    public function deleting(Media $media): bool
    {
        return $this->service->usageCount($media) === 0;
    }

    public function saved(Media $media): void
    {
        $this->service->flush();
    }

    public function deleted(Media $media): void
    {
        $this->service->flush();
    }
}

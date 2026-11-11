<?php

namespace App\Console\Commands;

use App\Models\Media;
use App\Models\PublicImageSlot;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/** Explicit opt-in: register proposed photographic assignments without replacing existing ones. */
class FillPublicImageSlots extends Command
{
    protected $signature = 'media:fill-public-slots {--apply : Apply the previewed assignments}';
    protected $description = 'Dry-run contextual public image slots against existing CMS media';

    public function handle(): int
    {
        $pools = [];
        foreach (['pages', 'services'] as $pool) {
            $pools[$pool] = Media::query()
                ->where('is_public', true)
                ->where('directory', 'cms/' . $pool)
                ->where('mime_type', 'like', 'image/%')
                ->orderBy('id')
                ->get()
                ->filter(fn (Media $media) => Storage::disk($media->disk)->exists($media->path))
                ->values();
        }

        if ($pools['pages']->isEmpty() || $pools['services']->isEmpty()) {
            $this->error('Missing registered, accessible page or service media. No changes were made.');
            return self::FAILURE;
        }

        $this->warn('Automatic choices are provisional; verify contextual relevance in Admin → CMS Image Slots.');
        $this->line('Mode: ' . ($this->option('apply') ? 'APPLY' : 'DRY RUN'));
        $this->line('Available: ' . $pools['pages']->count() . ' page photos, ' . $pools['services']->count() . ' service photos');
        $cursors = ['pages' => 0, 'services' => 0];
        $pending = [];

        foreach (PublicImageSlot::orderBy('id')->get() as $slot) {
            if ($slot->media_id !== null) {
                continue; // Never override deliberate CMS selections.
            }
            $pool = $slot->pool;
            $photo = $pools[$pool][$cursors[$pool] % $pools[$pool]->count()];
            $cursors[$pool]++;
            $pending[] = ['id' => $slot->id, 'key' => $slot->key, 'label' => $slot->label,
                'media_id' => $photo->id, 'path' => $photo->path];
        }

        $this->table(['Slot', 'Media ID', 'Path'], array_map(
            fn ($row) => [$row['key'], $row['media_id'], $row['path']], $pending
        ));

        if (!$this->option('apply')) {
            $this->info(count($pending) . ' missing slot assignments identified; no changes made.');
            return self::SUCCESS;
        }

        DB::transaction(function () use ($pending) {
            foreach ($pending as $row) {
                PublicImageSlot::whereKey($row['id'])->whereNull('media_id')
                    ->update(['media_id' => $row['media_id']]);
            }
        });

        $this->info(count($pending) . ' image slots assigned. Review photos in the CMS.');
        return self::SUCCESS;
    }
}

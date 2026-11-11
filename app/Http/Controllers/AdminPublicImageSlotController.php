<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\PublicImageSlot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class AdminPublicImageSlotController extends Controller
{
    public function index(): View
    {
        $slots = PublicImageSlot::with('media')->orderBy('id')->get()->groupBy('pool');
        $media = Media::query()->where('is_public', true)
            ->where('mime_type', 'like', 'image/%')->orderByDesc('id')->get();

        return view('admin.cms.public-image-slots.index', compact('slots', 'media'));
    }

    public function update(Request $request, PublicImageSlot $imageSlot): RedirectResponse
    {
        $validated = $request->validate([
            'media_id' => ['nullable', 'integer', 'exists:media,id'],
        ]);

        $id = $validated['media_id'] ?? null;
        if ($id !== null) {
            $media = Media::findOrFail($id);
            abort_unless($media->is_public && $media->isImage() && Storage::disk($media->disk)->exists($media->path), 422, 'Select an accessible public image.');
        }

        $imageSlot->update(['media_id' => $id]);

        return back()->with('success', 'Image assignment saved.');
    }
}

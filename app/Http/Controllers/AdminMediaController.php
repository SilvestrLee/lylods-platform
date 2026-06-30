<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Services\CMS\MediaService;
use Illuminate\Http\Request;

class AdminMediaController extends Controller
{
    public function __construct(private MediaService $service) {}

    public function index()
    {
        $media = $this->service->all();
        return view('admin.cms.media.index', compact('media'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file'     => 'required|file|mimes:jpg,jpeg,png,gif,webp,svg,pdf|max:10240',
            'title'    => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255',
        ]);

        $media = $this->service->store(
            $request->file('file'),
            'uploads',
            auth()->id()
        );

        $updates = array_filter([
            'title'    => $request->input('title'),
            'alt_text' => $request->input('alt_text'),
        ]);

        if ($updates) {
            $media->update($updates);
        }

        return redirect()->route('admin.cms.media.index')
            ->with('success', 'File uploaded successfully.');
    }

    public function destroy(Media $media)
    {
        $this->service->delete($media);

        return redirect()->route('admin.cms.media.index')
            ->with('success', 'File deleted.');
    }
}

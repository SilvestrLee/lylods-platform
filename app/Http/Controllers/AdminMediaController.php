<?php

namespace App\Http\Controllers;

use App\Http\Resources\MediaResource;
use App\Models\Media;
use App\Rules\NotCorruptImage;
use App\Rules\SafeSvg;
use App\Services\CMS\MediaService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminMediaController extends Controller
{
    private const CATEGORIES = [
        'uploads', 'brand', 'homepage', 'services', 'case-studies',
        'insights', 'partners', 'downloads', 'compliance', 'team', 'logos',
    ];

    public function __construct(private MediaService $service) {}

    public function index(Request $request)
    {
        $filters = $request->only(['search', 'type', 'category', 'sort', 'quick']);
        $media   = $this->service->paginated($filters, 40);
        $usedIds = $this->service->usedMediaIds($media->pluck('id')->all());

        if (($filters['sort'] ?? 'newest') === 'newest') {
            unset($filters['sort']);
        }

        return view('admin.cms.media.index', compact('media', 'filters', 'usedIds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file'     => ['required', 'file', 'mimes:jpg,jpeg,png,gif,webp,svg,pdf,docx,doc,zip', 'max:20480', new SafeSvg(), new NotCorruptImage()],
            'title'    => 'nullable|string|max:255',
            'alt_text' => 'nullable|string|max:255',
            'category' => ['nullable', 'string', Rule::in(self::CATEGORIES)],
        ]);

        $media = $this->service->store(
            $request->file('file'),
            $request->input('category', 'uploads'),
            auth()->id()
        );

        $updates = array_filter([
            'title'    => $request->input('title'),
            'alt_text' => $request->input('alt_text'),
        ]);

        if ($updates) {
            $media->update($updates);
        }

        if ($request->expectsJson()) {
            return MediaResource::make($media)->response();
        }

        return redirect()->route('admin.cms.media.index')
            ->with('success', 'File uploaded successfully.');
    }

    public function edit(Media $media)
    {
        $usages = $this->service->usages($media);

        return view('admin.cms.media.edit', compact('media', 'usages'));
    }

    public function update(Request $request, Media $media)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'alt_text'    => 'nullable|string|max:255',
            'caption'     => 'nullable|string|max:1000',
            'description' => 'nullable|string|max:2000',
            'credit'      => 'nullable|string|max:255',
            'copyright'   => 'nullable|string|max:255',
            'category'    => ['nullable', 'string', Rule::in(self::CATEGORIES)],
        ]);

        $this->service->update($media, $request->only([
            'title', 'alt_text', 'caption', 'description', 'credit', 'copyright', 'category',
        ]), auth()->id());

        return redirect()->route('admin.cms.media.edit', $media)
            ->with('success', 'Media updated.');
    }

    public function replace(Request $request, Media $media)
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:jpg,jpeg,png,gif,webp,svg,pdf,docx,doc,zip', 'max:20480', new SafeSvg(), new NotCorruptImage()],
        ]);

        $this->service->replace($media, $request->file('file'), auth()->id());

        return redirect()->route('admin.cms.media.edit', $media)
            ->with('success', 'File replaced. All relationships remain intact.');
    }

    public function destroy(Media $media)
    {
        if ($this->service->usageCount($media) > 0) {
            return redirect()->route('admin.cms.media.edit', $media)
                ->with('error', 'This file is in use. Detach it from all content before deleting.');
        }

        $this->service->delete($media);

        return redirect()->route('admin.cms.media.index')
            ->with('success', 'File deleted.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Services\CMS\DownloadService;
use App\Services\CMS\MediaService;
use Illuminate\Http\Request;

class AdminDownloadController extends Controller
{
    public function __construct(
        private DownloadService $service,
        private MediaService $media,
    ) {}

    public function index()
    {
        $downloads = $this->service->all();

        return view('admin.cms.downloads.index', compact('downloads'));
    }

    public function create()
    {
        return view('admin.cms.downloads.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string|max:2000',
            'version'        => 'nullable|string|max:50',
            'category'       => 'nullable|string|max:100',
            'published_date' => 'nullable|date',
            'display_order'  => 'nullable|integer|min:0',
            'is_public'      => 'boolean',
            'file'           => 'nullable|file|mimes:pdf,docx,doc,zip|max:20480',
        ]);

        if ($request->hasFile('file')) {
            $uploaded       = $this->media->store($request->file('file'), 'downloads', auth()->id());
            $data['media_id'] = $uploaded->id;
        }
        unset($data['file']);

        $data['created_by'] = auth()->id();
        $this->service->store($data);

        return redirect()->route('admin.cms.downloads.index')
            ->with('success', 'Download added.');
    }

    public function edit(Download $download)
    {
        return view('admin.cms.downloads.edit', compact('download'));
    }

    public function update(Request $request, Download $download)
    {
        $data = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string|max:2000',
            'version'        => 'nullable|string|max:50',
            'category'       => 'nullable|string|max:100',
            'published_date' => 'nullable|date',
            'display_order'  => 'nullable|integer|min:0',
            'is_public'      => 'boolean',
            'file'           => 'nullable|file|mimes:pdf,docx,doc,zip|max:20480',
        ]);

        if ($request->hasFile('file')) {
            $uploaded       = $this->media->store($request->file('file'), 'downloads', auth()->id());
            $data['media_id'] = $uploaded->id;
        }
        unset($data['file']);

        $data['updated_by'] = auth()->id();
        $this->service->update($download, $data);

        return redirect()->route('admin.cms.downloads.edit', $download)
            ->with('success', 'Download updated.');
    }

    public function destroy(Download $download)
    {
        $this->service->delete($download);

        return redirect()->route('admin.cms.downloads.index')
            ->with('success', 'Download removed.');
    }
}

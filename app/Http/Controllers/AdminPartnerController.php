<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Services\CMS\MediaService;
use App\Services\CMS\PartnerService;
use Illuminate\Http\Request;

class AdminPartnerController extends Controller
{
    public function __construct(
        private PartnerService $service,
        private MediaService $media,
    ) {}

    public function index()
    {
        $partners = $this->service->all();

        return view('admin.cms.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.cms.partners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'website'       => 'nullable|url|max:255',
            'category'      => 'nullable|string|max:100',
            'display_order' => 'nullable|integer|min:0',
            'is_visible'    => 'boolean',
            'featured'      => 'boolean',
            'logo_file'     => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        if ($request->hasFile('logo_file')) {
            $logo = $this->media->store($request->file('logo_file'), 'partners', auth()->id());
            $data['logo_media_id'] = $logo->id;
        }
        unset($data['logo_file']);

        $data['created_by'] = auth()->id();
        $this->service->store($data);

        return redirect()->route('admin.cms.partners.index')
            ->with('success', 'Partner added.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.cms.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:255',
            'website'       => 'nullable|url|max:255',
            'category'      => 'nullable|string|max:100',
            'display_order' => 'nullable|integer|min:0',
            'is_visible'    => 'boolean',
            'featured'      => 'boolean',
            'logo_file'     => 'nullable|file|mimes:jpg,jpeg,png,webp,svg|max:2048',
        ]);

        if ($request->hasFile('logo_file')) {
            $logo = $this->media->store($request->file('logo_file'), 'partners', auth()->id());
            $data['logo_media_id'] = $logo->id;
        }
        unset($data['logo_file']);

        $data['updated_by'] = auth()->id();
        $this->service->update($partner, $data);

        return redirect()->route('admin.cms.partners.edit', $partner)
            ->with('success', 'Partner updated.');
    }

    public function destroy(Partner $partner)
    {
        $this->service->delete($partner);

        return redirect()->route('admin.cms.partners.index')
            ->with('success', 'Partner removed.');
    }
}

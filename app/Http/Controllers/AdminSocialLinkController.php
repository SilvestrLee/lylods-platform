<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use App\Services\CMS\FooterService;
use Illuminate\Http\Request;

class AdminSocialLinkController extends Controller
{
    public function __construct(private FooterService $footerService) {}

    public function index()
    {
        $links = SocialLink::orderBy('display_order')->get();
        return view('admin.cms.footer.social.index', compact('links'));
    }

    public function create()
    {
        return view('admin.cms.footer.social.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'platform'      => ['required', 'string', 'max:50'],
            'url'           => ['required', 'string', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;

        SocialLink::create($data);
        $this->footerService->flushSocialLinks();

        return redirect()->route('admin.cms.footer.social.index')->with('success', 'Social link added.');
    }

    public function edit(SocialLink $socialLink)
    {
        return view('admin.cms.footer.social.edit', compact('socialLink'));
    }

    public function update(Request $request, SocialLink $socialLink)
    {
        $data = $request->validate([
            'platform'      => ['required', 'string', 'max:50'],
            'url'           => ['required', 'string', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;

        $socialLink->update($data);
        $this->footerService->flushSocialLinks();

        return redirect()->route('admin.cms.footer.social.index')->with('success', 'Social link updated.');
    }

    public function destroy(SocialLink $socialLink)
    {
        $socialLink->delete();
        $this->footerService->flushSocialLinks();

        return redirect()->route('admin.cms.footer.social.index')->with('success', 'Social link removed.');
    }
}

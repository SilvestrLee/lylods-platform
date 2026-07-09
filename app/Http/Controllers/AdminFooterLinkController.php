<?php

namespace App\Http\Controllers;

use App\Models\FooterLink;
use App\Services\CMS\FooterService;
use Illuminate\Http\Request;

class AdminFooterLinkController extends Controller
{
    public function __construct(private FooterService $footerService) {}

    public function index()
    {
        $links = FooterLink::orderBy('group')->orderBy('display_order')->get()->groupBy('group');
        return view('admin.cms.footer.links.index', compact('links'));
    }

    public function create()
    {
        return view('admin.cms.footer.links.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'group'         => ['required', 'string', 'in:company,services,industries,portal'],
            'label'         => ['required', 'string', 'max:255'],
            'url'           => ['required', 'string', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;

        FooterLink::create($data);
        $this->footerService->flushLinks();

        return redirect()->route('admin.cms.footer.links.index')->with('success', 'Footer link added.');
    }

    public function edit(FooterLink $footerLink)
    {
        return view('admin.cms.footer.links.edit', compact('footerLink'));
    }

    public function update(Request $request, FooterLink $footerLink)
    {
        $data = $request->validate([
            'group'         => ['required', 'string', 'in:company,services,industries,portal'],
            'label'         => ['required', 'string', 'max:255'],
            'url'           => ['required', 'string', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;

        $footerLink->update($data);
        $this->footerService->flushLinks();

        return redirect()->route('admin.cms.footer.links.index')->with('success', 'Footer link updated.');
    }

    public function destroy(FooterLink $footerLink)
    {
        $footerLink->delete();
        $this->footerService->flushLinks();

        return redirect()->route('admin.cms.footer.links.index')->with('success', 'Footer link removed.');
    }
}

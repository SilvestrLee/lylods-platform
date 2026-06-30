<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Services\CMS\PageService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPageController extends Controller
{
    public function __construct(private PageService $service) {}

    public function index()
    {
        $pages = $this->service->all();
        return view('admin.cms.pages.index', compact('pages'));
    }

    public function edit(Page $page)
    {
        return view('admin.cms.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $data = $request->validate([
            'title'               => 'required|string|max:255',
            'hero_title'          => 'nullable|string|max:500',
            'hero_subtitle'       => 'nullable|string|max:255',
            'hero_description'    => 'nullable|string|max:2000',
            'primary_cta_label'   => 'nullable|string|max:100',
            'primary_cta_url'     => 'nullable|string|max:500',
            'secondary_cta_label' => 'nullable|string|max:100',
            'secondary_cta_url'   => 'nullable|string|max:500',
            'meta_title'          => 'nullable|string|max:255',
            'meta_description'    => 'nullable|string|max:500',
            'canonical_url'       => 'nullable|url|max:500',
            'robots'              => ['nullable', Rule::in(['index,follow', 'noindex,follow', 'index,nofollow', 'noindex,nofollow'])],
            'sitemap_include'     => 'nullable|boolean',
            'is_published'        => 'nullable|boolean',
        ]);

        $data['is_published']    = $request->boolean('is_published');
        $data['sitemap_include'] = $request->boolean('sitemap_include');
        $data['updated_by']      = auth()->id();

        $this->service->update($page, $data);

        return redirect()->route('admin.cms.pages.edit', $page)
            ->with('success', 'Page content updated.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use App\Services\CMS\CaseStudyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminCaseStudyController extends Controller
{
    public function __construct(private CaseStudyService $caseStudyService) {}

    public function index()
    {
        $caseStudies = CaseStudy::orderByDesc('created_at')->get();
        return view('admin.cms.content.case-studies.index', compact('caseStudies'));
    }

    public function create()
    {
        return view('admin.cms.content.case-studies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'           => ['required', 'string', 'max:255'],
            'slug'            => ['nullable', 'string', 'max:255'],
            'industry'        => ['nullable', 'string', 'max:255'],
            'challenge'       => ['nullable', 'string'],
            'our_role'        => ['nullable', 'string'],
            'outcome'         => ['nullable', 'string'],
            'summary'         => ['nullable', 'string'],
            'seo_title'       => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
        ]);

        $base = Str::slug(filled($data['slug']) ? $data['slug'] : $data['title']);
        $slug = $base;
        $count = 1;
        while (CaseStudy::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $count++;
        }

        $data['slug']            = $slug;
        $data['featured']        = $request->boolean('featured');
        $data['sitemap_include'] = $request->boolean('sitemap_include', true);
        $data['status']          = 'draft';
        $data['created_by']      = Auth::id();
        $data['updated_by']      = Auth::id();

        CaseStudy::create($data);
        $this->caseStudyService->flush();

        return redirect()->route('admin.cms.content.case-studies.index')
            ->with('success', 'Case study created as draft.');
    }

    public function edit(CaseStudy $caseStudy)
    {
        return view('admin.cms.content.case-studies.edit', compact('caseStudy'));
    }

    public function update(Request $request, CaseStudy $caseStudy)
    {
        $data = $request->validate([
            'title'           => ['required', 'string', 'max:255'],
            'slug'            => ['nullable', 'string', 'max:255'],
            'industry'        => ['nullable', 'string', 'max:255'],
            'challenge'       => ['nullable', 'string'],
            'our_role'        => ['nullable', 'string'],
            'outcome'         => ['nullable', 'string'],
            'summary'         => ['nullable', 'string'],
            'seo_title'       => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
        ]);

        $oldSlug = $caseStudy->slug;

        if (filled($data['slug'])) {
            $newSlug = Str::slug($data['slug']);
            if ($newSlug !== $caseStudy->slug) {
                $base  = $newSlug;
                $count = 1;
                while (CaseStudy::where('slug', $newSlug)->where('id', '!=', $caseStudy->id)->exists()) {
                    $newSlug = $base . '-' . $count++;
                }
                $data['slug'] = $newSlug;
            } else {
                $data['slug'] = $caseStudy->slug;
            }
        } else {
            $data['slug'] = $caseStudy->slug;
        }

        $data['featured']        = $request->boolean('featured');
        $data['sitemap_include'] = $request->boolean('sitemap_include', true);
        $data['updated_by']      = Auth::id();

        $caseStudy->update($data);
        $this->caseStudyService->flush($oldSlug);
        if ($oldSlug !== $caseStudy->slug) {
            $this->caseStudyService->flush($caseStudy->slug);
        }

        return redirect()->route('admin.cms.content.case-studies.edit', $caseStudy)
            ->with('success', 'Case study updated.');
    }

    public function publish(CaseStudy $caseStudy)
    {
        $caseStudy->status     = 'published';
        $caseStudy->published_at ??= now();
        $caseStudy->updated_by = Auth::id();
        $caseStudy->save();

        $this->caseStudyService->flush($caseStudy->slug);

        return back()->with('success', 'Case study published.');
    }

    public function archive(CaseStudy $caseStudy)
    {
        $caseStudy->status     = 'archived';
        $caseStudy->updated_by = Auth::id();
        $caseStudy->save();

        $this->caseStudyService->flush($caseStudy->slug);

        return back()->with('success', 'Case study archived.');
    }

    public function destroy(CaseStudy $caseStudy)
    {
        $slug = $caseStudy->slug;
        $caseStudy->delete();
        $this->caseStudyService->flush($slug);

        return redirect()->route('admin.cms.content.case-studies.index')
            ->with('success', 'Case study deleted.');
    }
}

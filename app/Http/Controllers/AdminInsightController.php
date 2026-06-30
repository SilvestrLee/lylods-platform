<?php

namespace App\Http\Controllers;

use App\Models\Insight;
use App\Services\CMS\InsightService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminInsightController extends Controller
{
    public function __construct(private InsightService $insightService) {}

    public function index()
    {
        $insights = Insight::orderByDesc('created_at')->get();
        return view('admin.cms.content.insights.index', compact('insights'));
    }

    public function create()
    {
        return view('admin.cms.content.insights.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'           => ['required', 'string', 'max:255'],
            'slug'            => ['nullable', 'string', 'max:255'],
            'excerpt'         => ['nullable', 'string'],
            'content'         => ['nullable', 'string'],
            'author'          => ['nullable', 'string', 'max:255'],
            'reading_time'    => ['nullable', 'integer', 'min:1'],
            'category'        => ['nullable', 'string', 'max:255'],
            'seo_title'       => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
        ]);

        $base  = Str::slug(filled($data['slug']) ? $data['slug'] : $data['title']);
        $slug  = $base;
        $count = 1;
        while (Insight::where('slug', $slug)->exists()) {
            $slug = $base . '-' . $count++;
        }

        $data['slug']            = $slug;
        $data['featured']        = $request->boolean('featured');
        $data['sitemap_include'] = $request->boolean('sitemap_include', true);
        $data['status']          = 'draft';
        $data['created_by']      = Auth::id();
        $data['updated_by']      = Auth::id();

        Insight::create($data);
        $this->insightService->flush();

        return redirect()->route('admin.cms.content.insights.index')
            ->with('success', 'Insight created as draft.');
    }

    public function edit(Insight $insight)
    {
        return view('admin.cms.content.insights.edit', compact('insight'));
    }

    public function update(Request $request, Insight $insight)
    {
        $data = $request->validate([
            'title'           => ['required', 'string', 'max:255'],
            'slug'            => ['nullable', 'string', 'max:255'],
            'excerpt'         => ['nullable', 'string'],
            'content'         => ['nullable', 'string'],
            'author'          => ['nullable', 'string', 'max:255'],
            'reading_time'    => ['nullable', 'integer', 'min:1'],
            'category'        => ['nullable', 'string', 'max:255'],
            'seo_title'       => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
        ]);

        $oldSlug = $insight->slug;

        if (filled($data['slug'])) {
            $newSlug = Str::slug($data['slug']);
            if ($newSlug !== $insight->slug) {
                $base  = $newSlug;
                $count = 1;
                while (Insight::where('slug', $newSlug)->where('id', '!=', $insight->id)->exists()) {
                    $newSlug = $base . '-' . $count++;
                }
                $data['slug'] = $newSlug;
            } else {
                $data['slug'] = $insight->slug;
            }
        } else {
            $data['slug'] = $insight->slug;
        }

        $data['featured']        = $request->boolean('featured');
        $data['sitemap_include'] = $request->boolean('sitemap_include', true);
        $data['updated_by']      = Auth::id();

        $insight->update($data);
        $this->insightService->flush($oldSlug);
        if ($oldSlug !== $insight->slug) {
            $this->insightService->flush($insight->slug);
        }

        return redirect()->route('admin.cms.content.insights.edit', $insight)
            ->with('success', 'Insight updated.');
    }

    public function publish(Insight $insight)
    {
        $insight->status     = 'published';
        $insight->published_at ??= now();
        $insight->updated_by = Auth::id();
        $insight->save();

        $this->insightService->flush($insight->slug);

        return back()->with('success', 'Insight published.');
    }

    public function archive(Insight $insight)
    {
        $insight->status     = 'archived';
        $insight->updated_by = Auth::id();
        $insight->save();

        $this->insightService->flush($insight->slug);

        return back()->with('success', 'Insight archived.');
    }

    public function destroy(Insight $insight)
    {
        $slug = $insight->slug;
        $insight->delete();
        $this->insightService->flush($slug);

        return redirect()->route('admin.cms.content.insights.index')
            ->with('success', 'Insight deleted.');
    }
}

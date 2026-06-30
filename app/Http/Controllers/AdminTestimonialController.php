<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use App\Services\CMS\TestimonialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTestimonialController extends Controller
{
    public function __construct(private TestimonialService $testimonialService) {}

    public function index()
    {
        $testimonials = Testimonial::orderByDesc('featured')->orderBy('display_order')->get();
        return view('admin.cms.people.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.cms.people.testimonials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'quote'        => ['required', 'string'],
            'client_name'  => ['required', 'string', 'max:255'],
            'role'         => ['nullable', 'string', 'max:255'],
            'organisation' => ['nullable', 'string', 'max:255'],
            'display_order'=> ['nullable', 'integer', 'min:0'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['featured']    = $request->boolean('featured');
        $data['is_active']   = $request->boolean('is_active');
        $data['created_by']  = Auth::id();
        $data['updated_by']  = Auth::id();

        Testimonial::create($data);
        $this->testimonialService->flush();

        return redirect()->route('admin.cms.people.testimonials.index')->with('success', 'Testimonial added.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.cms.people.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'quote'        => ['required', 'string'],
            'client_name'  => ['required', 'string', 'max:255'],
            'role'         => ['nullable', 'string', 'max:255'],
            'organisation' => ['nullable', 'string', 'max:255'],
            'display_order'=> ['nullable', 'integer', 'min:0'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['featured']   = $request->boolean('featured');
        $data['is_active']  = $request->boolean('is_active');
        $data['updated_by'] = Auth::id();

        $testimonial->update($data);
        $this->testimonialService->flush();

        return redirect()->route('admin.cms.people.testimonials.index')->with('success', 'Testimonial updated.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        $this->testimonialService->flush();

        return redirect()->route('admin.cms.people.testimonials.index')->with('success', 'Testimonial removed.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CareerOpportunity;
use App\Services\CMS\CareerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCareerController extends Controller
{
    public function __construct(private CareerService $careerService) {}

    public function index()
    {
        $careers = CareerOpportunity::orderByDesc('created_at')->get();
        return view('admin.cms.content.careers.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.cms.content.careers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'location'     => ['nullable', 'string', 'max:255'],
            'type'         => ['required', 'in:full-time,part-time,contract,placement'],
            'description'  => ['nullable', 'string'],
            'closing_date' => ['nullable', 'date'],
        ]);

        $data['status']     = 'draft';
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();

        CareerOpportunity::create($data);
        $this->careerService->flush();

        return redirect()->route('admin.cms.content.careers.index')
            ->with('success', 'Career opportunity created as draft.');
    }

    public function edit(CareerOpportunity $careerOpportunity)
    {
        return view('admin.cms.content.careers.edit', ['career' => $careerOpportunity]);
    }

    public function update(Request $request, CareerOpportunity $careerOpportunity)
    {
        $data = $request->validate([
            'title'        => ['required', 'string', 'max:255'],
            'location'     => ['nullable', 'string', 'max:255'],
            'type'         => ['required', 'in:full-time,part-time,contract,placement'],
            'description'  => ['nullable', 'string'],
            'closing_date' => ['nullable', 'date'],
        ]);

        $data['updated_by'] = Auth::id();
        $careerOpportunity->update($data);
        $this->careerService->flush();

        return redirect()->route('admin.cms.content.careers.edit', $careerOpportunity)
            ->with('success', 'Career opportunity updated.');
    }

    public function publish(CareerOpportunity $careerOpportunity)
    {
        $careerOpportunity->status     = 'published';
        $careerOpportunity->updated_by = Auth::id();
        $careerOpportunity->save();
        $this->careerService->flush();

        return back()->with('success', 'Career opportunity published.');
    }

    public function archive(CareerOpportunity $careerOpportunity)
    {
        $careerOpportunity->status     = 'archived';
        $careerOpportunity->updated_by = Auth::id();
        $careerOpportunity->save();
        $this->careerService->flush();

        return back()->with('success', 'Career opportunity archived.');
    }

    public function destroy(CareerOpportunity $careerOpportunity)
    {
        $careerOpportunity->delete();
        $this->careerService->flush();

        return redirect()->route('admin.cms.content.careers.index')
            ->with('success', 'Career opportunity deleted.');
    }
}

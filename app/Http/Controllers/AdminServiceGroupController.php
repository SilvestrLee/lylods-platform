<?php

namespace App\Http\Controllers;

use App\Models\ServiceGroup;
use App\Services\CMS\ServiceService;
use Illuminate\Http\Request;

class AdminServiceGroupController extends Controller
{
    public function __construct(private ServiceService $serviceService) {}

    public function index()
    {
        $groups = ServiceGroup::withCount('services')->orderBy('display_order')->get();
        return view('admin.cms.services.groups.index', compact('groups'));
    }

    public function edit(ServiceGroup $serviceGroup)
    {
        return view('admin.cms.services.groups.edit', ['group' => $serviceGroup]);
    }

    public function update(Request $request, ServiceGroup $serviceGroup)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'description'   => ['nullable', 'string'],
            'display_order' => ['nullable', 'integer'],
            'is_active'     => ['nullable', 'boolean'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');
        $data['updated_by'] = auth()->id();

        $this->serviceService->update($serviceGroup, $data);

        return redirect()->route('admin.cms.services.groups.index')
            ->with('success', "Service group updated.");
    }
}

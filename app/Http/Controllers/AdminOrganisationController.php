<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use App\Services\CMS\OrganisationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrganisationController extends Controller
{
    public function __construct(private OrganisationService $organisationService) {}

    public function index()
    {
        $organisations = Organisation::orderBy('type')->orderBy('display_order')->orderBy('name')->get();
        return view('admin.cms.trust.index', compact('organisations'));
    }

    public function create()
    {
        return view('admin.cms.trust.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'website'       => ['nullable', 'url', 'max:255'],
            'type'          => ['required', 'string', 'in:client,partner,association,accreditation,supplier'],
            'display_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['is_active']  = $request->boolean('is_active');
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();

        Organisation::create($data);
        $this->organisationService->flush($data['type']);

        return redirect()->route('admin.cms.trust.index')->with('success', 'Organisation added.');
    }

    public function edit(Organisation $organisation)
    {
        return view('admin.cms.trust.edit', compact('organisation'));
    }

    public function update(Request $request, Organisation $organisation)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'website'       => ['nullable', 'url', 'max:255'],
            'type'          => ['required', 'string', 'in:client,partner,association,accreditation,supplier'],
            'display_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['is_active']  = $request->boolean('is_active');
        $data['updated_by'] = Auth::id();

        $organisation->update($data);
        $this->organisationService->flush();

        return redirect()->route('admin.cms.trust.index')->with('success', 'Organisation updated.');
    }

    public function destroy(Organisation $organisation)
    {
        $organisation->delete();
        $this->organisationService->flush($organisation->type);

        return redirect()->route('admin.cms.trust.index')->with('success', 'Organisation removed.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CompliancePage;
use App\Services\CMS\CompliancePageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCompliancePageController extends Controller
{
    public function __construct(private CompliancePageService $compliancePageService) {}

    public function index()
    {
        $pages = $this->compliancePageService->all();
        return view('admin.cms.compliance.index', compact('pages'));
    }

    public function edit(CompliancePage $compliancePage)
    {
        return view('admin.cms.compliance.edit', compact('compliancePage'));
    }

    public function update(Request $request, CompliancePage $compliancePage)
    {
        $data = $request->validate([
            'title'            => ['required', 'string', 'max:255'],
            'content'          => ['nullable', 'string'],
            'seo_title'        => ['nullable', 'string', 'max:255'],
            'seo_description'  => ['nullable', 'string', 'max:500'],
            'last_reviewed_at' => ['nullable', 'date'],
        ]);

        $data['updated_by'] = Auth::id();

        $compliancePage->update($data);
        $this->compliancePageService->flush($compliancePage->slug);

        return redirect()->route('admin.cms.compliance.edit', $compliancePage)->with('success', 'Compliance page updated.');
    }
}

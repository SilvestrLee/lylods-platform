<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Services\CMS\TeamService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTeamMemberController extends Controller
{
    public function __construct(private TeamService $teamService) {}

    public function index()
    {
        $members = TeamMember::orderBy('display_order')->orderBy('name')->get();
        return view('admin.cms.people.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.cms.people.team.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'role'          => ['nullable', 'string', 'max:255'],
            'bio'           => ['nullable', 'string'],
            'expertise'     => ['nullable', 'string', 'max:255'],
            'email'         => ['nullable', 'email', 'max:255'],
            'linkedin'      => ['nullable', 'url', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['is_active']  = $request->boolean('is_active');
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();

        TeamMember::create($data);
        $this->teamService->flush();

        return redirect()->route('admin.cms.people.team.index')->with('success', 'Team member added.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.cms.people.team.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'role'          => ['nullable', 'string', 'max:255'],
            'bio'           => ['nullable', 'string'],
            'expertise'     => ['nullable', 'string', 'max:255'],
            'email'         => ['nullable', 'email', 'max:255'],
            'linkedin'      => ['nullable', 'url', 'max:255'],
            'display_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['is_active']  = $request->boolean('is_active');
        $data['updated_by'] = Auth::id();

        $teamMember->update($data);
        $this->teamService->flush();

        return redirect()->route('admin.cms.people.team.index')->with('success', 'Team member updated.');
    }

    public function destroy(TeamMember $teamMember)
    {
        $teamMember->delete();
        $this->teamService->flush();

        return redirect()->route('admin.cms.people.team.index')->with('success', 'Team member removed.');
    }
}

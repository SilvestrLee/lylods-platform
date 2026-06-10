<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminInvestorController extends Controller
{
    public function index()
    {
        $investors = User::where('role', 'investor')
            ->withCount('investments')
            ->orderBy('name')
            ->get();

        return view('admin.investors.index', [
            'investors' => $investors,
        ]);
    }

    public function create()
    {
        return view('admin.investors.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateInvestor($request);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'investor',
        ]);

        return redirect()
            ->route('admin.investors.index')
            ->with('success', 'Investor account created successfully.');
    }

    public function edit(User $investor)
    {
        abort_unless($investor->role === 'investor', 404);

        return view('admin.investors.edit', [
            'investor' => $investor,
        ]);
    }

    public function update(Request $request, User $investor)
    {
        abort_unless($investor->role === 'investor', 404);

        $validated = $this->validateInvestor($request, $investor);

        $investor->name = $validated['name'];
        $investor->email = $validated['email'];

        if (! empty($validated['password'])) {
            $investor->password = Hash::make($validated['password']);
        }

        $investor->role = 'investor';
        $investor->save();

        return redirect()
            ->route('admin.investors.index')
            ->with('success', 'Investor account updated successfully.');
    }

    private function validateInvestor(Request $request, ?User $investor = null): array
    {
        $passwordRules = $investor
            ? ['nullable', 'string', 'min:8', 'confirmed']
            : ['required', 'string', 'min:8', 'confirmed'];

        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($investor?->id),
            ],
            'password' => $passwordRules,
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\InvestmentPlan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminInvestmentController extends Controller
{
    public function index()
    {
        $investments = Investment::with(['user', 'investmentPlan'])
            ->latest()
            ->get();

        return view('admin.investments.index', [
            'investments' => $investments,
        ]);
    }

    public function create()
    {
        $investors = User::where('role', 'investor')
            ->orderBy('name')
            ->get();

        $plans = InvestmentPlan::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('admin.investments.create', [
            'investors' => $investors,
            'plans' => $plans,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateInvestment($request);

        Investment::create($validated);

        return redirect()
            ->route('admin.investments.index')
            ->with('success', 'Investment record created successfully.');
    }

    public function edit(Investment $investment)
    {
        $investors = User::where('role', 'investor')
            ->orderBy('name')
            ->get();

        $plans = InvestmentPlan::query()
            ->where('is_active', true)
            ->when($investment->investment_plan_id, function ($query) use ($investment) {
                $query->orWhere('id', $investment->investment_plan_id);
            })
            ->orderBy('name')
            ->get();

        return view('admin.investments.edit', [
            'investment' => $investment,
            'investors' => $investors,
            'plans' => $plans,
        ]);
    }

    public function update(Request $request, Investment $investment)
    {
        $validated = $this->validateInvestment($request);

        $investment->update($validated);

        return redirect()
            ->route('admin.investments.index')
            ->with('success', 'Investment record updated successfully.');
    }

    private function validateInvestment(Request $request): array
    {
        return $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'investment_plan_id' => ['nullable', 'exists:investment_plans,id'],
            'amount' => ['required', 'numeric', 'min:0'],
            'expected_return' => ['nullable', 'numeric', 'min:0'],
            'status' => ['required', 'in:pending,active,matured,withdrawn,cancelled'],
            'start_date' => ['nullable', 'date'],
            'maturity_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'notes' => ['nullable', 'string'],
        ]);
    }
}
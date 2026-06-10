<?php

namespace App\Http\Controllers;

use App\Models\InvestmentPlan;
use Illuminate\Http\Request;

class AdminInvestmentPlanController extends Controller
{
    public function index()
    {
        $plans = InvestmentPlan::latest()->get();

        return view('admin.investment-plans.index', [
            'plans' => $plans,
        ]);
    }

    public function create()
    {
        return view('admin.investment-plans.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateInvestmentPlan($request);

        $validated['is_active'] = $request->boolean('is_active');

        InvestmentPlan::create($validated);

        return redirect()
            ->route('admin.investment-plans.index')
            ->with('success', 'Investment plan created successfully.');
    }

    public function edit(InvestmentPlan $investmentPlan)
    {
        return view('admin.investment-plans.edit', [
            'plan' => $investmentPlan,
        ]);
    }

    public function update(Request $request, InvestmentPlan $investmentPlan)
    {
        $validated = $this->validateInvestmentPlan($request);

        $validated['is_active'] = $request->boolean('is_active');

        $investmentPlan->update($validated);

        return redirect()
            ->route('admin.investment-plans.index')
            ->with('success', 'Investment plan updated successfully.');
    }

    private function validateInvestmentPlan(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'minimum_amount' => ['required', 'numeric', 'min:0'],
            'expected_return_rate' => ['nullable', 'numeric', 'min:0'],
            'duration' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
        ]);
    }
}
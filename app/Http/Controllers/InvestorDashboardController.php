<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestorDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $investments = $user->investments()
            ->with('investmentPlan')
            ->latest()
            ->get();

        $totalInvestment = $investments->sum('amount');

        $activeInvestments = $investments
            ->where('status', 'active')
            ->count();

        $expectedReturns = $investments->sum('expected_return');

        return view('dashboard.index', [
            'investments' => $investments,
            'totalInvestment' => $totalInvestment,
            'activeInvestments' => $activeInvestments,
            'expectedReturns' => $expectedReturns,
        ]);
    }
}

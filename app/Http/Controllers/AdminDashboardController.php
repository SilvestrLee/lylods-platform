<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\InvestmentPlan;
use App\Models\Notice;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalInvestors = User::where('role', 'investor')->count();

        $totalInvestmentPlans = InvestmentPlan::count();

        $activeInvestmentPlans = InvestmentPlan::where('is_active', true)->count();

        $totalInvestments = Investment::count();

        $activeInvestments = Investment::where('status', 'active')->count();

        $totalPortfolioValue = Investment::sum('amount');

        $expectedReturns = Investment::sum('expected_return');

        $publishedNotices = Notice::where('is_published', true)->count();

        $recentInvestments = Investment::with(['user', 'investmentPlan'])
            ->latest()
            ->take(5)
            ->get();

        $recentNotices = Notice::with('creator')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalInvestors',
            'totalInvestmentPlans',
            'activeInvestmentPlans',
            'totalInvestments',
            'activeInvestments',
            'totalPortfolioValue',
            'expectedReturns',
            'publishedNotices',
            'recentInvestments',
            'recentNotices'
        ));
    }
}
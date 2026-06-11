<?php

namespace App\Http\Controllers;

use App\Models\Notice;

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
        $activeInvestments = $investments->where('status', 'active')->count();
        $expectedReturns = $investments->sum('expected_return');

        $notices = Notice::where('is_published', true)
            ->latest('published_at')
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'investments',
            'totalInvestment',
            'activeInvestments',
            'expectedReturns',
            'notices'
        ));
    }

    public function notices()
    {
        $notices = Notice::where('is_published', true)
            ->latest('published_at')
            ->paginate(10);

        return view('dashboard.notices', compact('notices'));
    }
}
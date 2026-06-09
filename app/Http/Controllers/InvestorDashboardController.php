<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestorDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvestorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        if ($request->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($request->user()->role !== 'investor') {
            abort(403);
        }

        return $next($request);
    }
}
<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminInvestmentController;
use App\Http\Controllers\AdminInvestmentPlanController;
use App\Http\Controllers\AdminInvestorController;
use App\Http\Controllers\InvestorDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicPageController::class, 'home'])->name('home');
Route::get('/about', [PublicPageController::class, 'about'])->name('about');
Route::get('/services', [PublicPageController::class, 'services'])->name('services');
Route::get('/investment', [PublicPageController::class, 'investment'])->name('investment');
Route::get('/contact', [PublicPageController::class, 'contact'])->name('contact');

Route::middleware(['auth', 'investor'])->group(function () {
    Route::get('/dashboard', [InvestorDashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::get('/investments', [AdminInvestmentController::class, 'index'])->name('investments.index');
        Route::get('/investments/create', [AdminInvestmentController::class, 'create'])->name('investments.create');
        Route::post('/investments', [AdminInvestmentController::class, 'store'])->name('investments.store');
        Route::get('/investments/{investment}/edit', [AdminInvestmentController::class, 'edit'])->name('investments.edit');
        Route::patch('/investments/{investment}', [AdminInvestmentController::class, 'update'])->name('investments.update');

        Route::get('/investment-plans', [AdminInvestmentPlanController::class, 'index'])->name('investment-plans.index');
        Route::get('/investment-plans/create', [AdminInvestmentPlanController::class, 'create'])->name('investment-plans.create');
        Route::post('/investment-plans', [AdminInvestmentPlanController::class, 'store'])->name('investment-plans.store');
        Route::get('/investment-plans/{investmentPlan}/edit', [AdminInvestmentPlanController::class, 'edit'])->name('investment-plans.edit');
        Route::patch('/investment-plans/{investmentPlan}', [AdminInvestmentPlanController::class, 'update'])->name('investment-plans.update');

        Route::get('/investors', [AdminInvestorController::class, 'index'])->name('investors.index');
        Route::get('/investors/create', [AdminInvestorController::class, 'create'])->name('investors.create');
        Route::post('/investors', [AdminInvestorController::class, 'store'])->name('investors.store');
        Route::get('/investors/{investor}/edit', [AdminInvestorController::class, 'edit'])->name('investors.edit');
        Route::patch('/investors/{investor}', [AdminInvestorController::class, 'update'])->name('investors.update');
    });

require __DIR__.'/auth.php';
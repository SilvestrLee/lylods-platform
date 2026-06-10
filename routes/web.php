<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminInvestmentController;
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
    });

require __DIR__.'/auth.php';
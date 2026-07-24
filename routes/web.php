<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ExpenseController;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('expenses', ExpenseController::class)
     ->middleware(['auth']);
     
Route::resource('budgets', BudgetController::class)
     ->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

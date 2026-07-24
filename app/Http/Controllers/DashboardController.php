<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();


        // Total Budget
        $totalBudget = $user->budgets()
                            ->sum('amount');


        // Total Expense
        $totalExpense = $user->expenses()
                             ->sum('amount');


        // Remaining
        $remaining = $totalBudget - $totalExpense;



        // Category wise expenses

        $categoryExpenses = $user->expenses()
            ->with('category')
            ->selectRaw('category_id, SUM(amount) as total')
            ->groupBy('category_id')
            ->get();

$categorySummary = $user->categories()
    ->with([
        'budgets',
        'expenses'
    ])
    ->get()
    ->map(function($category){

        $budget = $category->budgets->sum('amount');

        $expense = $category->expenses->sum('amount');

        return [
            'name' => $category->name,
            'budget' => $budget,
            'expense' => $expense,
            'remaining' => $budget - $expense
        ];

    })
    ->filter(function($category){

        return $category['budget'] > 0;

    });

        // Recent expenses

        $recentExpenses = $user->expenses()
            ->with('category')
            ->latest()
            ->take(5)
            ->get();



        return view('dashboard', compact(
            'totalBudget',
            'totalExpense',
            'remaining',
            'categoryExpenses',
            'categorySummary',
            'recentExpenses'
        ));
    }
}
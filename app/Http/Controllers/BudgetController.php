<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Category;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        $budgets = auth()->user()
                         ->budgets()
                         ->with('category')
                         ->latest()
                         ->get();

        return view('budgets.index', compact('budgets'));
    }


    public function create()
    {
        $categories = auth()->user()
                            ->categories()
                            ->get();

        return view('budgets.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ]);


        auth()->user()
              ->budgets()
              ->create([
                  'category_id' => $request->category_id,
                  'amount' => $request->amount,
                  'start_date' => $request->start_date,
                  'end_date' => $request->end_date,
              ]);


        return redirect()
                ->route('budgets.index')
                ->with('success','Budget created successfully');
    }


    public function destroy(Budget $budget)
    {
        $budget->delete();

        return redirect()
                ->route('budgets.index')
                ->with('success','Budget deleted successfully');
    }
}
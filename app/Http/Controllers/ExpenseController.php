<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use App\Models\Budget;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    public function index()
    {
        $expenses = auth()->user()
                          ->expenses()
                          ->with(['category','budget'])
                          ->latest()
                          ->get();

        return view('expenses.index', compact('expenses'));
    }


    public function create()
    {
        $categories = auth()->user()
                            ->categories()
                            ->get();


        $budgets = auth()->user()
                         ->budgets()
                         ->get();


        return view('expenses.create',
            compact('categories','budgets')
        );
    }



    public function store(Request $request)
    {

        $request->validate([

            'category_id'=>'required|exists:categories,id',

            'budget_id'=>'nullable|exists:budgets,id',

            'amount'=>'required|numeric|min:1',

            'expense_date'=>'required|date',

            'description'=>'nullable|string'

        ]);


        auth()->user()
              ->expenses()
              ->create([

                'category_id'=>$request->category_id,

                'budget_id'=>$request->budget_id,

                'amount'=>$request->amount,

                'expense_date'=>$request->expense_date,

                'description'=>$request->description

              ]);



        return redirect()
                ->route('expenses.index')
                ->with('success','Expense added successfully');

    }



    public function destroy(Expense $expense)
    {

        $expense->delete();


        return redirect()
                ->route('expenses.index')
                ->with('success','Expense deleted');

    }
    public function edit(Expense $expense)
{
    $categories = auth()->user()
                        ->categories()
                        ->get();

    $budgets = auth()->user()
                     ->budgets()
                     ->get();


    return view('expenses.edit',
        compact('expense','categories','budgets')
    );
}
public function update(Request $request, Expense $expense)
{
    $request->validate([
        'category_id'=>'required|exists:categories,id',
        'budget_id'=>'nullable|exists:budgets,id',
        'amount'=>'required|numeric|min:1',
        'expense_date'=>'required|date'
    ]);


    $expense->update([
        'category_id'=>$request->category_id,
        'budget_id'=>$request->budget_id,
        'amount'=>$request->amount,
        'expense_date'=>$request->expense_date,
        'description'=>$request->description
    ]);


    return redirect()
        ->route('expenses.index')
        ->with('success','Expense updated successfully');
}

}
<x-app-layout>

<x-slot name="header">

<h2 class="font-semibold text-xl">
Dashboard
</h2>

</x-slot>



<div class="py-12">


<div class="max-w-7xl mx-auto">


<!-- Summary Cards -->

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">


<div class="bg-white shadow rounded-lg p-6">

<p class="text-gray-500">
Total Budget
</p>

<h2 class="text-3xl font-bold text-blue-600">
₹{{ number_format($totalBudget,2) }}
</h2>

</div>



<div class="bg-white shadow rounded-lg p-6">

<p class="text-gray-500">
Total Expense
</p>

<h2 class="text-3xl font-bold text-red-600">
₹{{ number_format($totalExpense,2) }}
</h2>

</div>




<div class="bg-white shadow rounded-lg p-6">

<p class="text-gray-500">
Remaining
</p>

<h2 class="text-3xl font-bold text-green-600">
₹{{ number_format($remaining,2) }}
</h2>

</div>


</div>




<!-- Category Expenses -->


<div class="mt-8 bg-white shadow rounded-lg p-6">


<h3 class="text-xl font-bold mb-4">
Category Spending
</h3>



@forelse($categoryExpenses as $category)


<div class="flex justify-between border-b py-3">


<span>
{{ $category->category->name }}
</span>


<span class="font-bold">
₹{{ number_format($category->total,2) }}
</span>


</div>



@empty

<p>
No expenses yet
</p>

@endforelse



</div>

<!-- Category Summary -->

<div class="mt-8 bg-white shadow rounded-lg p-6">


<h3 class="text-xl font-bold mb-4">
Category Wise Balance
</h3>



@forelse($categorySummary as $category)


<div class="border-b py-4">


<div class="flex justify-between">

<h4 class="font-semibold">
{{ $category['name'] }}
</h4>


<span class="text-green-600 font-bold">

₹{{ number_format($category['remaining'],2) }}

</span>


</div>



<div class="grid grid-cols-3 gap-4 mt-3 text-sm">


<div>

<p class="text-gray-500">
Budget
</p>

<p class="font-bold">
₹{{ number_format($category['budget'],2) }}
</p>

</div>



<div>

<p class="text-gray-500">
Spent
</p>

<p class="font-bold text-red-600">
₹{{ number_format($category['expense'],2) }}
</p>

</div>



<div>

<p class="text-gray-500">
Remaining
</p>

<p class="font-bold text-green-600">
₹{{ number_format($category['remaining'],2) }}
</p>

</div>


</div>


</div>


@empty

<p>
No category data available
</p>

@endforelse


</div>



<!-- Recent Expenses -->


<div class="mt-8 bg-white shadow rounded-lg p-6">


<h3 class="text-xl font-bold mb-4">
Recent Expenses
</h3>



@forelse($recentExpenses as $expense)


<div class="flex justify-between border-b py-3">


<div>

<p class="font-semibold">
{{ $expense->category->name }}
</p>


<p class="text-sm text-gray-500">
{{ $expense->expense_date }}
</p>


</div>



<div class="font-bold">

₹{{ $expense->amount }}

</div>


</div>



@empty

<p>
No transactions yet
</p>

@endforelse



</div>


</div>

</div>


</x-app-layout>
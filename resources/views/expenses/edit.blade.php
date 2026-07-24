<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl">
        Edit Expense
    </h2>
</x-slot>


<div class="py-12">

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">


<form method="POST" action="{{ route('expenses.update',$expense) }}">

@csrf
@method('PUT')


<label>
Category
</label>


<select name="category_id"
class="border w-full p-2 rounded">


@foreach($categories as $category)

<option 
value="{{ $category->id }}"
@if($expense->category_id == $category->id)
selected
@endif
>

{{ $category->name }}

</option>

@endforeach


</select>



<label class="block mt-4">
Budget
</label>


<select name="budget_id"
class="border w-full p-2 rounded">


<option value="">
No Budget
</option>


@foreach($budgets as $budget)

<option 
value="{{ $budget->id }}"

@if($expense->budget_id == $budget->id)
selected
@endif
>

{{ $budget->category->name }}
-
₹{{ $budget->amount }}

</option>


@endforeach


</select>




<label class="block mt-4">
Amount
</label>


<input 
type="number"
name="amount"
value="{{ $expense->amount }}"
class="border w-full p-2 rounded">





<label class="block mt-4">
Expense Date
</label>


<input 
type="date"
name="expense_date"
value="{{ $expense->expense_date }}"
class="border w-full p-2 rounded">





<label class="block mt-4">
Description
</label>


<textarea
name="description"
class="border w-full p-2 rounded">{{ $expense->description }}</textarea>




<button
type="submit"
class="mt-8 bg-blue-600 hover:bg-blue-700 text-black px-6 py-3 rounded-lg shadow">

Update Expense

</button>


</form>


</div>

</div>


</x-app-layout>
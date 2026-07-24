<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl">
        Budgets
    </h2>
</x-slot>


<div class="py-12">

<div class="max-w-7xl mx-auto">

<a href="{{ route('budgets.create') }}"
class="bg-blue-600 text-black px-4 py-2 rounded">

Add Budget

</a>


<div class="mt-6 bg-white p-6 rounded shadow">


@forelse($budgets as $budget)

<div class="border-b py-4">

<h3 class="font-bold">
{{ $budget->category->name }}
</h3>


<p>
Limit:
₹{{ $budget->amount }}
</p>


<p>
{{ $budget->start_date }} 
-
{{ $budget->end_date }}
</p>


<form method="POST"
action="{{ route('budgets.destroy',$budget) }}">

@csrf
@method('DELETE')

<button class="text-red-600 mt-2">
Delete
</button>

</form>


</div>


@empty

<p>
No budgets created yet.
</p>


@endforelse


</div>

</div>

</div>


</x-app-layout>
<x-app-layout>

<x-slot name="header">

<h2 class="font-semibold text-xl">
Expenses
</h2>

</x-slot>


<div class="py-12">


<div class="max-w-7xl mx-auto">


<a href="{{route('expenses.create')}}"
class="bg-blue-600 text-black px-5 py-2 rounded-lg">

+ Add Expense

</a>



<div class="mt-6 bg-white shadow rounded p-6">


@forelse($expenses as $expense)


<div class="border-b py-4">


<h3 class="font-bold">

{{$expense->category->name}}

</h3>


<p>
Amount:
₹{{$expense->amount}}
</p>


<p>
Date:
{{$expense->expense_date}}
</p>


<p>
{{$expense->description}}
</p>

 <div style="margin-top:15px; margin-left:-17px;"><a href="{{ route('expenses.edit', $expense) }}"
           class="bg-yellow-600 text-black px-4 py-2 rounded">
            Edit
        </a></div>
<form method="POST"
action="{{route('expenses.destroy',$expense)}}">

@csrf
@method('DELETE')


<button class="text-red-600 mt-2">
Delete
</button>


</form>


</div>


@empty

<p>
No expenses found
</p>


@endforelse


</div>


</div>


</div>


</x-app-layout>
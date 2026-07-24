<x-app-layout>

<x-slot name="header">
<h2 class="font-semibold text-xl">
Add Budget
</h2>
</x-slot>


<div class="py-12">

<div class="max-w-xl mx-auto bg-white p-6 shadow rounded">


<form method="POST" action="{{ route('budgets.store') }}">

@csrf


<label>
Category
</label>

<select name="category_id"
class="border w-full p-2">

<option>Select Category</option>

@foreach($categories as $category)

<option value="{{ $category->id }}">
{{ $category->name }}
</option>

@endforeach

</select>



<label class="block mt-4">
Amount
</label>

<input 
type="number"
name="amount"
class="border w-full p-2">



<label class="block mt-4">
Start Date
</label>

<input 
type="date"
name="start_date"
class="border w-full p-2">



<label class="block mt-4">
End Date
</label>

<input 
type="date"
name="end_date"
class="border w-full p-2">



<button
    type="submit"
    style="margin-top:20px;"
    class="mt-8 inline-flex items-center justify-center gap-2
           px-6 py-3
           bg-green-600
           text-black
           font-semibold
           text-sm
           rounded-lg
           shadow-md
           hover:bg-green-700
           hover:shadow-lg
           focus:outline-none
           focus:ring-2
           focus:ring-green-500
           focus:ring-offset-2
           transition duration-200">

    ✓ Save Budget

</button>

</form>


</div>

</div>

</x-app-layout>
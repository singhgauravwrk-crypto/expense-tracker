<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl">
        Edit Category
    </h2>
</x-slot>


<div class="py-12">

<div class="max-w-xl mx-auto bg-white p-6 shadow rounded">


<form method="POST" action="{{ route('categories.update',$category) }}">

@csrf
@method('PUT')


<input 
type="text"
name="name"
value="{{ $category->name }}"
class="border rounded w-full p-2"
>


<button 
class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">

Update

</button>


</form>


</div>

</div>

</x-app-layout>
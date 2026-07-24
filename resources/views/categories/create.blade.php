<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl">
        Add Category
    </h2>
</x-slot>


<div class="py-12">

<div class="max-w-xl mx-auto bg-white p-6 shadow rounded">


<form method="POST" action="{{ route('categories.store') }}">

@csrf


<label class="block mb-2">
    Category Name
</label>


<input 
    type="text"
    name="name"
    class="border rounded w-full p-2"
>


@error('name')
<p class="text-red-500">
{{ $message }}
</p>
@enderror


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

    ✓ Save Category

</button>


</form>


</div>

</div>

</x-app-layout>
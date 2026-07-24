<x-app-layout>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800">
        Categories
    </h2>
</x-slot>


<div class="py-12">

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="mb-5">
        <a href="{{ route('categories.create') }}"
           class="bg-blue-600 text-black px-4 py-2 rounded">
            Add Category
        </a>
    </div>


    <div class="bg-white shadow rounded p-6">

        @if(session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif


        @forelse($categories as $category)

            <div class="flex justify-between border-b py-3">

                <span>
                    {{ $category->name }}
                </span>


                <div>

                    <a href="{{ route('categories.edit',$category) }}"
                       class="text-blue-600 mr-3">
                        Edit
                    </a>


                    <form action="{{ route('categories.destroy',$category) }}"
                          method="POST"
                          class="inline">

                        @csrf
                        @method('DELETE')

                        <button class="text-red-600">
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        @empty

            <p class="text-gray-500">
                No categories found.
            </p>

        @endforelse


    </div>

</div>

</div>

</x-app-layout>
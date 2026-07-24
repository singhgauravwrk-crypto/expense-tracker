<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-gray-500">
                        Total Expenses
                    </h3>
                    <p class="text-3xl font-bold">
                        ₹0
                    </p>
                </div>


                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-gray-500">
                        This Month
                    </h3>
                    <p class="text-3xl font-bold">
                        ₹0
                    </p>
                </div>


                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-gray-500">
                        Categories
                    </h3>
                    <p class="text-3xl font-bold">
                        0
                    </p>
                </div>

            </div>


            <div class="mt-8 bg-white p-6 rounded shadow">

                <h3 class="text-xl font-semibold mb-4">
                    Recent Expenses
                </h3>

                <p class="text-gray-500">
                    No expenses added yet.
                </p>

            </div>


        </div>

    </div>

</x-app-layout>
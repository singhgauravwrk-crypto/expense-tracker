<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
   @if(session('budgetExceeded'))

<div id="budgetModal"
     class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

    <div class="bg-white rounded-xl shadow-xl p-6 w-full max-w-md">

        <div class="flex items-center gap-2 mb-4">
            <span class="text-3xl">⚠️</span>
            <h2 class="text-2xl font-bold text-red-600">
                Budget Exceeded
            </h2>
        </div>

        <div class="space-y-2 text-gray-700">

            <p>
                <strong>Category:</strong>
                {{ session('budgetExceeded.category') }}
            </p>

            <p>
                <strong>Budget:</strong>
                ₹{{ number_format(session('budgetExceeded.budget'),2) }}
            </p>

            <p>
                <strong>Total Spent:</strong>
                ₹{{ number_format(session('budgetExceeded.spent'),2) }}
            </p>

            <p class="text-red-600 font-semibold text-lg">
                Over Budget by
                ₹{{ number_format(session('budgetExceeded.exceeded'),2) }}
            </p>

        </div>

        <button
            onclick="document.getElementById('budgetModal').style.display='none'"
            class="mt-6 w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-lg transition duration-200">

            Close

        </button>

    </div>

</div>

@endif

</body>
</html>

@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900 px-4">
        <div class="max-w-md w-full text-center space-y-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                Welcome to the Reservation System ✈️
            </h1>
            <p class="text-gray-600 dark:text-gray-300">
                Track your flights, assignments, and performance all in one place.
            </p>

            <div class="grid grid-cols-1 gap-6">
                <a href="{{ route('login') }}"
                   class="block px-6 py-4 bg-blue-600 text-white rounded-lg text-lg font-medium hover:bg-blue-700 transition duration-200">
                    I already have an account
                </a>

                <a href="{{ route('request-user.form') }}"
                   class="block px-6 py-4 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-lg text-lg font-medium hover:bg-gray-300 dark:hover:bg-gray-600 transition duration-200">
                    Create an account
                </a>
            </div>
        </div>
    </div>
@endsection

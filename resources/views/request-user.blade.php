@extends('layouts.app')

@section('content')
    <div class="py-6 px-4 max-w-xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
            Account Request
        </h2>

        <form method="POST" action="{{ route('request-user.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                <input type="text" name="name"
                    class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                <input type="email" name="email"
                    class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password</label>
                <input type="password" name="password"
                    class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white"
                    required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white"
                    required>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-200">
                    Submit Request
                </button>

                <a href="{{ url('/') }}"
                    class="px-4 py-2 rounded border border-gray-400 bg-gray-400/10 text-white text-center hover:bg-gray-500/20 transition duration-200">
                    Back to Homepage
                </a>
            </div>
        </form>
    </div>
@endsection

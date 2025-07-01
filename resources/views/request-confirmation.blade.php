@extends('layouts.app')

@section('content')
    <div class="py-16 px-4 text-center">
        <h2 class="text-2xl font-bold text-green-700 dark:text-green-400 mb-4">
            ✅ Request submitted successfully!
        </h2>
        <p class="text-gray-700 dark:text-gray-300">
            Your account request has been sent to the administrator for review and approval.
        </p>

        <div class="mt-8">
            <a href="{{ url('/') }}"
               class="inline-block px-4 py-2 rounded border border-gray-400 bg-gray-400/10 text-white hover:bg-gray-500/20 transition duration-200">
                Back to Homepage
            </a>
        </div>
    </div>
@endsection



@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mt-10 mb-8">
    Reservation Search Result
</h2>

<div class="max-w-3xl mx-auto">
    @if ($reservation)
        <div class="border border-blue-400 p-6 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 shadow-sm">
            <h3 class="text-lg font-semibold mb-2">Reservation #{{ $reservation->id }}</h3>
            <p><strong>Client:</strong> {{ $reservation->user->name ?? '—' }}</p>
            <p><strong>Jet:</strong> {{ $reservation->jet->model ?? '—' }}</p>
            <p><strong>Route:</strong> {{ $reservation->origin }} → {{ $reservation->destination }}</p>
            <p><strong>Departure:</strong> {{ $reservation->departure_date }}</p>
            <p><strong>Status:</strong> {{ ucfirst($reservation->status) }}</p>

            @if (in_array($reservation->status, ['assigned', 'in_progress']))
                <form method="POST" action="{{ route('pilot.reservations.updateStatus', $reservation->id) }}" class="mt-4">
                    @csrf
                    @method('PATCH')

                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                        {{ $reservation->status === 'assigned' ? 'Start' : 'Finish' }}
                    </button>
                </form>
            @endif
        </div>
    @else
        <div class="text-center text-gray-600 dark:text-gray-300">
            <p class="mb-4">No reservation found with that ID.</p>
            <a href="{{ route('pilot.dashboard') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                ← Back to Dashboard
            </a>
        </div>
    @endif
</div>
@endsection

@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mt-10 mb-8" style="margin-top: 2rem;">
    All My Reservations
</h2>

<div class="max-w-5xl mx-auto space-y-4 px-4">
    @forelse ($reservations as $res)
        <div class="border border-gray-300 dark:border-gray-700 p-5 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 shadow">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-lg font-semibold">
                    ✈️ Reservation #{{ $res->id }} — {{ ucfirst($res->status) }}
                </h3>
                <span class="text-sm text-gray-600 dark:text-gray-300">
                    Departure: {{ $res->departure_date }}
                </span>
            </div>
            <p><strong>Client:</strong> {{ $res->user->name ?? '—' }}</p>
            <p><strong>Jet:</strong> {{ $res->jet->model ?? '—' }}</p>
            <p><strong>Route:</strong> {{ $res->origin }} → {{ $res->destination }}</p>

            @if (in_array($res->status, ['assigned', 'in_progress']))
                <form method="POST" action="{{ route('pilot.reservations.updateStatus', $res->id) }}" class="mt-3">
                    @csrf
                    @method('PATCH')
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                        {{ $res->status === 'assigned' ? 'Start' : 'Finish' }}
                    </button>
                </form>
            @endif
        </div>
    @empty
        <p class="text-center text-gray-600 dark:text-gray-300">You don’t have any reservations yet.</p>
    @endforelse
</div>
@endsection

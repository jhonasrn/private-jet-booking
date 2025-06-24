@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mt-10 mb-8">
    Reservations Assigned to Me
</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
    {{-- Assigned reservations --}}
    <div>
        <h3 class="text-lg font-semibold text-gray-700 dark:text-white mb-3">🕒 Assigned</h3>

        @forelse ($assignedReservations as $res)
            <div class="border p-4 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 mb-4">
                <strong>Client:</strong> {{ $res->user->name ?? '—' }}<br>
                <strong>Route:</strong> {{ $res->origin }} → {{ $res->destination }}<br>
                <strong>Departure:</strong> {{ $res->departure_date }}<br>
                <strong>Status:</strong> {{ ucfirst($res->status) }}

                <form method="POST" action="{{ route('pilot.reservations.updateStatus', $res->id) }}" class="mt-3">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                        Start
                    </button>
                </form>
            </div>
        @empty
            <p class="text-sm text-gray-500 dark:text-gray-400">No assigned reservations.</p>
        @endforelse
    </div>

    {{-- In-progress reservations --}}
    <div>
        <h3 class="text-lg font-semibold text-gray-700 dark:text-white mb-3">🚀 In Progress</h3>

        @forelse ($inProgressReservations as $res)
            <div class="border border-green-400 p-4 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100 mb-4">
                <strong>Client:</strong> {{ $res->user->name ?? '—' }}<br>
                <strong>Route:</strong> {{ $res->origin }} → {{ $res->destination }}<br>
                <strong>Departure:</strong> {{ $res->departure_date }}<br>
                <strong>Status:</strong> {{ ucfirst($res->status) }}

                <form method="POST" action="{{ route('pilot.reservations.updateStatus', $res->id) }}" class="mt-3">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                        Finish
                    </button>
                </form>
            </div>
        @empty
            <p class="text-sm text-gray-500 dark:text-gray-400">No flights currently in progress.</p>
        @endforelse
    </div>
</div>

<div class="mt-10 text-center">
    <a href="{{ route('pilot.reservations.completed') }}"
       class="text-white hover:underline">
        View completed reservations →
    </a>
</div>
@endsection

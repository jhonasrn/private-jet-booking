@extends('layouts.app')

@section('content')
<h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">My Assigned Reservations</h2>

@if ($activeReservations->isEmpty())
    <p class="text-gray-600 dark:text-gray-300 mt-4">No reservations assigned yet.</p>
@else
    <ul class="mt-4 space-y-2">
        @foreach ($activeReservations as $res)
            <li class="border p-4 rounded-md bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-100">
                <strong>Client:</strong> {{ $res->user->name ?? '—' }}<br>
                <strong>Route:</strong> {{ $res->origin }} → {{ $res->destination }}<br>
                <strong>Departure:</strong> {{ $res->departure_date }}<br>
                <strong>Status:</strong> {{ ucfirst($res->status) }}

                @if (in_array($res->status, ['assigned', 'in_progress']))
                    <form method="POST" action="{{ route('pilot.reservations.updateStatus', $res->id) }}" class="mt-3">
                        @csrf
                        @method('PATCH')

                        @if ($res->status === 'assigned')
                            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
                                Start
                            </button>
                        @elseif ($res->status === 'in_progress')
                            <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded">
                                Finish
                            </button>
                        @endif
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
@endif

<div class="mt-6">
    <a href="{{ route('pilot.reservations.completed') }}"
       class="text-blue-700 dark:text-blue-400 hover:underline">
        View completed reservations →
    </a>
</div>

@endsection

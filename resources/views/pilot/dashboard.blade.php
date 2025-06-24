@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-100 mt-10 mb-8" style="margin-top: 20px;">
    Reservations Assigned to Me
</h2>

{{-- Área de busca e botão "Ver todas" --}}
<div class="max-w-4xl mx-auto flex flex-col sm:flex-row sm:items-center sm:justify-between mt-6 mb-8 gap-4">
    {{-- Busca por ID --}}
    <form method="GET" action="{{ route('pilot.reservations.search') }}" class="flex flex-1 max-w-md">
        <input
            type="text"
            name="reservation_id"
            placeholder="Search reservation by ID"
            class="w-full px-4 py-2 rounded-l-md border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-800 dark:text-white"
            required
        >
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-md">
            Search
        </button>
    </form>

    {{-- Botão para listar todas as reservas --}}
    <a href="{{ route('pilot.reservations.index') }}"
       class="inline-block bg-gray-700 hover:bg-gray-800 text-white font-semibold px-4 py-2 rounded text-center">
        View All Reservations
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
    {{-- Assigned reservations --}}
    <div>
        <h3 class="text-lg font-semibold text-gray-700 dark:text-white mb-3">🕒 Assigned waiting to start</h3>

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
@endsection

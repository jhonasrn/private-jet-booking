<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                Client Dashboard
            </h2>
            <a href="{{ route('client.reservations.create') }}"
               class="inline-flex items-center px-4 py-2 text-sm font-medium bg-blue-600 text-white rounded hover:bg-blue-700">
                + New Reservation
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 space-y-8">

            {{-- Search reservation by ID --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                <form method="GET" action="{{ route('client.reservations.create') }}"> {{-- placeholder action --}}
                    <label for="reservation_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Search Reservation by ID
                    </label>
                    <div class="flex mt-2 gap-2">
                        <input type="text" name="reservation_id" id="reservation_id"
                               class="flex-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white"
                               placeholder="Enter reservation ID...">
                        <button type="submit" @click.stop
                                class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Search
                        </button>
                    </div>
                </form>
            </div>

            {{-- List of reservations --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Your Reservations</h3>

                @if ($reservations->isEmpty())
                    <p class="text-sm text-gray-500 dark:text-gray-300">You haven’t made any reservations yet.</p>
                @else
                    <div class="space-y-4">
                        @foreach ($reservations as $reservation)
                            <div class="p-4 border border-gray-300 dark:border-gray-700 rounded">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <div class="font-bold text-gray-800 dark:text-white">
                                            {{ $reservation->jet->model }} ({{ $reservation->jet->manufacturer }})
                                        </div>
                                        <div class="text-sm text-gray-600 dark:text-gray-300">
                                            {{ $reservation->origin }} → {{ $reservation->destination }}<br>
                                            Departure: {{ $reservation->departure_date }}<br>
                                            Arrival: {{ $reservation->arrival_date }}
                                        </div>
                                    </div>
                                    <span class="text-xs uppercase px-3 py-1 rounded
                                        @if ($reservation->status === 'pending') bg-yellow-400 text-yellow-900
                                        @elseif ($reservation->status === 'confirmed') bg-green-500 text-white
                                        @elseif ($reservation->status === 'cancelled') bg-red-500 text-white
                                        @else bg-gray-500 text-white @endif">
                                        {{ $reservation->status }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

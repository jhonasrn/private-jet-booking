<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                Admin Dashboard
            </h2>
            <a href="{{ route('admin.reservations.all') }}"
               class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 text-sm">
                View All Reservations
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto px-4 space-y-6">

            @if (session('success'))
                <div class="dark:bg-green-800 text-gray-900 dark:text-white rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 p-6 shadow rounded">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                    Pending Reservations
                </h3>

                @if ($pendingReservations->isEmpty())
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        There are no pending reservations to assign.
                    </p>
                @else
                    <div class="space-y-4">
                        @foreach ($pendingReservations as $reservation)
                            <div class="p-4 border border-gray-200 dark:border-gray-700 rounded">
                                <div class="flex justify-between items-center flex-wrap gap-4">
                                    <div>
                                        <div class="font-bold text-gray-800 dark:text-white">
                                            {{ $reservation->jet->model ?? '—' }} |
                                            {{ $reservation->origin }} → {{ $reservation->destination }}
                                        </div>
                                        <div class="text-sm text-gray-600 dark:text-gray-300">
                                            {{ $reservation->departure_date }} → {{ $reservation->arrival_date }}
                                        </div>
                                        <div class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                            Requested by: {{ $reservation->user->name ?? '—' }}
                                        </div>
                                    </div>

                                    <form method="POST"
                                          action="{{ route('admin.reservations.assign', $reservation->id) }}"
                                          class="flex items-center gap-2">
                                        @csrf
                                        @method('PUT')

                                        <select name="pilot_id"
                                                class="rounded border-gray-300 dark:bg-gray-700 dark:text-white"
                                                required>
                                            <option value="">-- select pilot --</option>
                                            @foreach($pilots as $pilot)
                                                <option value="{{ $pilot->id }}">{{ $pilot->name }}</option>
                                            @endforeach
                                        </select>

                                        <button type="submit"
                                                class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                                            Assign
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-admin-layout>

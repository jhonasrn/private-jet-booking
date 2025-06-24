<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            New Reservation
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto">
            <form action="{{ route('client.reservations.store') }}" method="POST"
                  class="bg-white dark:bg-gray-800 shadow rounded p-6 space-y-4">
                @csrf

                <div>
                    <label for="jet_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Select Jet
                    </label>
                    <select name="jet_id" id="jet_id" required
                            class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white">
                        <option value="">-- choose a jet --</option>
                        @foreach($jets as $jet)
                            <option value="{{ $jet->id }}">{{ $jet->model }} ({{ $jet->manufacturer }})</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="origin" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Origin
                    </label>
                    <input type="text" name="origin" id="origin" required
                           class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white" />
                </div>

                <div>
                    <label for="destination" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Destination
                    </label>
                    <input type="text" name="destination" id="destination" required
                           class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white" />
                </div>

                <div>
                    <label for="departure_date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Departure Date
                    </label>
                    <input type="date" name="departure_date" id="departure_date" required
                           class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white" />
                </div>

                <div>
                    <label for="arrival_date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                        Arrival Date
                    </label>
                    <input type="date" name="arrival_date" id="arrival_date" required
                           class="w-full mt-1 rounded border-gray-300 dark:bg-gray-700 dark:text-white" />
                </div>

                <div class="flex justify-end gap-3 pt-2">
                    <a href="{{ route('client.dashboard') }}"
                       class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Confirm Reservation
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

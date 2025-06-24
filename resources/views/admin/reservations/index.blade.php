<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Todas as Reservas
        </h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto px-4 text-gray-800 dark:text-white space-y-4">
        @forelse ($reservations as $reservation)
            <div class="p-4 bg-white dark:bg-gray-800 rounded shadow border border-gray-300 dark:border-gray-700">
                <div class="font-bold text-lg">
                    ✈️ {{ $reservation->jet->model }} — {{ $reservation->origin }} → {{ $reservation->destination }}
                </div>
                <div class="text-sm text-gray-600 dark:text-gray-300">
                    Saída: {{ $reservation->departure_date }} | Chegada: {{ $reservation->arrival_date }}<br>
                    Cliente: {{ $reservation->user->name }}<br>
                    Piloto: {{ $reservation->pilot ? $reservation->pilot->name : '🕵️‍♂️ Não atribuído' }}<br>
                    Status: <span class="uppercase font-semibold">{{ $reservation->status }}</span>
                </div>
            </div>
        @empty
            <p class="text-sm text-gray-500 dark:text-gray-400">Nenhuma reserva registrada ainda.</p>
        @endforelse
    </div>
</x-admin-layout>

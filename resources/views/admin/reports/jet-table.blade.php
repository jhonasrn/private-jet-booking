<div>
    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Total by Jet Model 🛩️</h3>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-md">
            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Jet Model</th>
                    <th class="px-4 py-2 text-left">Total Reservations</th>
                </tr>
            </thead>
            <tbody class="text-gray-800 dark:text-gray-100">
                @forelse ($jetTotals as $row)
                    <tr class="border-t border-gray-300 dark:border-gray-600">
                        <td class="px-4 py-2">{{ $row->jet_model }}</td>
                        <td class="px-4 py-2 font-semibold">{{ $row->total }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center px-4 py-6 text-gray-500 dark:text-gray-400">
                            No jet reservation data found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Lista de Usuários
        </h2>
        <a href="{{ route('admin.users.create') }}"
           class="ml-auto px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            + Novo Usuário
        </a>
    </x-slot>

    <div class="py-6 px-4">
        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 dark:bg-gray-700 text-left">
                    <th class="p-2">Nome</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Papel</th>
                    <th class="p-2">Criado em</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b dark:border-gray-600">
                        <td class="p-2">{{ $user->name }}</td>
                        <td class="p-2">{{ $user->email }}</td>
                        <td class="p-2 capitalize">{{ $user->role }}</td>
                        <td class="p-2">{{ $user->created_at->format('d/m/Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-4 text-center text-gray-500">Nenhum usuário encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Criar Novo Usuário
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-xl mx-auto">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nome</label>
                <input type="text" name="name" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                <input type="email" name="email" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Senha</label>
                <input type="password" name="password" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Confirme a Senha</label>
                <input type="password" name="password_confirmation" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Papel</label>
                <select name="role" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
                    <option value="">Selecione...</option>
                    <option value="admin">Admin</option>
                    <option value="pilot">Piloto</option>
                    <option value="client">Cliente</option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Criar Usuário
            </button>
        </form>
    </div>
</x-app-layout>

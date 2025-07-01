<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Create New User
        </h2>
    </x-slot>

    <div class="py-6 px-4 max-w-xl mx-auto">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                <input type="text" name="name" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                <input type="email" name="email" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Password</label>
                <input type="password" name="password" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Role</label>
                <select name="role" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-white" required>
                    <option value="">Select...</option>
                    <option value="admin">Admin</option>
                    <option value="pilot">Pilot</option>
                    <option value="client">Client</option>
                </select>
            </div>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Create User
            </button>
        </form>
    </div>
</x-app-layout>

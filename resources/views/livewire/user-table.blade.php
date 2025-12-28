<div class="overflow-x-auto rounded-lg shadow-md">
    <table class="min-w-full border-collapse table-auto text-sm text-gray-700 dark:text-gray-200">
        <thead class="bg-gray-100 dark:bg-gray-900 uppercase text-gray-600 dark:text-gray-300 tracking-wider">
            <tr>
                <th class="px-4 py-3 text-left border-b border-gray-300 dark:border-gray-700">ID</th>
                <th class="px-4 py-3 text-left border-b border-gray-300 dark:border-gray-700">Name</th>
                <th class="px-4 py-3 text-left border-b border-gray-300 dark:border-gray-700">Email</th>
                <th class="px-4 py-3 text-left border-b border-gray-300 dark:border-gray-700">Created At</th>
                <th class="px-4 py-3 text-center border-b border-gray-300 dark:border-gray-700"></th>
            </tr>
        </thead>

        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($users as $user)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                    <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $user->id }}</td>
                    <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $user->name }}</td>
                    <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $user->email }}</td>
                    <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                        {{ $user->created_at->format('d/m/Y H:i:s') }}
                    </td>
                    <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-center">
                        <div class="relative inline-block text-left">
                            <x-dropdown class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 shadow-lg rounded-md ring-1 ring-black ring-opacity-5">
                                <x-dropdown.item label="View" icon="eye" wire:click="view({{ $user->id }})" />
                                <x-dropdown.item label="Edit" icon="pencil" wire:click="edit({{ $user->id }})" />
                                <x-dropdown.item label="Delete" icon="trash" wire:click="delete({{ $user->id }})" />
                            </x-dropdown>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                    <td colspan="5" class="px-4 py-2 border-b border-gray-200 dark:border-gray-700 text-center font-semibold">
                        Nenhum usuário encontrado.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginação -->
    <div class="mt-1 mb-1 p-1">
        {{ $users->links() }}
    </div>
</div>

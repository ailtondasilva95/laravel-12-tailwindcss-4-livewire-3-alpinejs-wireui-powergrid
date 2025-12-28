<div class="overflow-x-auto rounded-2xl shadow-2xs border border-gray-200 dark:border-gray-700">
    <table class="w-full table-auto text-sm">
        <thead class="border-b bg-gray-100 dark:bg-gray-800">
            <tr class="text-left">
                <th class="px-4 py-2 font-semibold">ID</th>
                <th class="px-4 py-2 font-semibold">Nome</th>
                <th class="px-4 py-2 font-semibold">Email</th>
                <th class="px-4 py-2 font-semibold whitespace-nowrap">Criado em</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr class="border-b hover:bg-gray-100 dark:hover:text-black">
                    <td class="px-4 py-2">{{ $user->id }}</td>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2">{{ $user->created_at->format('d/m/Y H:i:s') }}</td>
                    <td class="px-4 py-2 text-center">
                        <x-dropdown>
                            <x-dropdown.item label="Ver" icon="eye" wire:click="view({{ $user }})" />

                            <x-dropdown.item label="Editar" icon="pencil" wire:click="edit({{ $user }})" />

                            <x-dropdown.item label="Apagar" icon="trash" wire:click="delete({{ $user }})" />
                        </x-dropdown>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-4 text-center font-medium">
                        Nenhum usuário encontrado.
                    </td>
                </tr>
            @endforelse
        </tbody>
        <tfoot>
            @if ($users->hasPages())
                <tr>
                    <td colspan="5" class="p-2 bg-gray-100 dark:bg-gray-800">
                        {{ $users->links() }}
                    </td>
                </tr>
            @endif
        </tfoot>
    </table>
</div>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Usuários
        </h2>
        <div class="mt-4">
            <a href="{{ route('usuarios.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Cadastrar Novo Usuário
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="w-full px-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Função</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($usuarios as $usuario)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->tipo }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $usuario->email }}</td>
                                    {{-- Ações para ver, editar e excluir --}}
                                    <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                        <!-- <a href="{{ route('usuarios.show', $usuario->id) }}" class="text-green-600 hover:text-green-900">Ver</a> -->
                                        <a href="{{ route('usuarios.edit', $usuario->id)     }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Tem certeza que deseja excluir este usuário?')">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-6 py-4 text-center">Nenhum usuário encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Usuário
            </h2>
            <a href="{{ route('usuarios.index') }}" class="inline-block bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300">
            Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700">Nome</label>
                        <input type="text" name="name" value="{{ old('name', $usuario->name) }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">Tipo</label>
                        <select name="tipo" class="w-full border rounded px-3 py-2" required>
                            <option value="administrador" {{ $usuario->tipo == 'administrador' ? 'selected' : '' }}>Administrador</option>
                            <option value="recepcionista" {{ $usuario->tipo == 'recepcionista' ? 'selected' : '' }}>Recepcionista</option>
                            <option value="medico" {{ $usuario->tipo == 'medico' ? 'selected' : '' }}>Médico</option>
                            <!-- <option value="paciente" {{ $usuario->tipo == 'paciente' ? 'selected' : '' }}>Paciente</option> -->
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700">E-mail</label>
                        <input type="email" name="email" value="{{ old('email', $usuario->email) }}" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Senha (deixe em branco para não alterar)</label>
                        <input type="password" name="password" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
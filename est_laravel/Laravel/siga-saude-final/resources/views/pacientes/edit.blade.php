<x-app-layout> 
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Editar Pacientes') }}
            </h2>
            <a href="{{ route('pacientes.index') }}" class="inline-block bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                Voltar
            </a>
        </div>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Atualize as informações dos pacientes abaixo.') }}
        </p>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-6">
                <form method="POST" action="{{ route('pacientes.update', $pacientes->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome</label>
                        <input type="text" id="nome" name="nome" value="{{ old('nome', $pacientes->nome) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                    </div>
                    <div class="mb-4">
                        <label for="cpf" class="block text-sm font-medium text-gray-700 dark:text-gray-300">CPF</label>
                        <input type="text" id="cpf" name="cpf" value="{{ old('cpf', $pacientes->cpf) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                    </div>
                    <div class="mb-4">
                        <label for="data_nascimento" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de Nascimento</label>
                        <input type="date" id="data_nascimento" name="data_nascimento" value="{{ old('data_nascimento', $pacientes->data_nascimento) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                    </div>
                    <div class="mb-4">
                        <label for="telefone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefone</label>
                        <input type="text" id="telefone" name="telefone" value="{{ old('telefone', $pacientes->telefone) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                    </div>
                    <div class="mb-4">
                        <label for="endereco" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Endereço</label>
                        <input type="text" id="endereco" name="endereco" value="{{ old('endereco', $pacientes->endereco) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            {{ __('Salvar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
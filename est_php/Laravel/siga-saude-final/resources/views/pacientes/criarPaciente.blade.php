<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Criar Paciente') }}
    </h2>
    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Preencha as informações abaixo para criar um novo paciente.') }}
    </p>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="p-6">
                <form method="POST" action="{{ route('pacientes.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome</label>
                        <input type="text" id="nome" name="nome" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                    </div>
                    <div class="mb-4">
                        <label for="cpf" class="block text-sm font-medium text-gray-700 dark:text-gray-300">CPF</label>
                        <input type="text" id="cpf" name="cpf" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                    </div>
                    <div class="mb-4">
                        <label for="data_nascimento" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Data de Nascimento</label>
                        <input type="date" id="data_nascimento" name="data_nascimento" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                    </div>
                    <div class="mb-4">
                    <div class="mb-4">
                        <label for="telefone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Telefone</label>
                        <input type="text" id="telefone" name="telefone" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">

                    </div>
                    <div class="mb-4">
                        <label for="endereco" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Endereço</label>
                        <input type="text" id="endereco" name="endereco" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600">
                    </div>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-black rounded-md hover:bg-green-700">Criar Paciente</button>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>
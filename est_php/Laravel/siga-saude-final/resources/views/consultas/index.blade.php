<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Lista de Consultas') }}
    </h2>
        <div class="mt-4">
            <a href="{{ route('consultas.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Cadastrar Nova Consulta
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200">
                    @if($consultas->isEmpty())
                        <div class="p-4 mb-4 rounded bg-blue-100 text-blue-800">
                            Não tem nenhuma consulta agendada.
                        </div>
                    @else
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paciente</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Médico</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($consultas as $consulta)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $consulta->paciente->nome }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $consulta->medico->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($consulta->data_consulta)->format('d/m/Y H:i') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $consulta->status }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ route('consultas.show', $consulta->id) }}" class="text-blue-600 hover:text-blue-900">Ver Detalhes</a>
                                            <a href="{{ route('consultas.edit', $consulta->id) }}" class="text-yellow-600 hover:text-yellow-900">Editar</a>
                                            <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Tem certeza que deseja excluir esta consulta?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <x-slot name="footer">
        <div class="py-4">
            <button href="{{ route('consultas.criar') }}">
                Agendar Nova Consulta
            </button>
        </div>
    </x-slot>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Consultas') }}
        </h2>
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
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($consultas as $consulta)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $consulta->paciente->nome }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $consulta->medico->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $consulta->data_consulta }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $consulta->status }}</td>
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
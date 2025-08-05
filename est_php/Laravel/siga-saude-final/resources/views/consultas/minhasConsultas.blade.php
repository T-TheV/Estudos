<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Minhas Consultas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6">
                    @if($consultas->isEmpty())
                        <p class="text-gray-500">Você não tem consultas agendadas.</p>
                    @else
                        <ul>
                            @foreach($consultas as $consulta)
                                @if($consulta->data_consulta >= now()->startOfDay() && $consulta->data_consulta <= now()->addDays(7))
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paciente</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data da Consulta</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $consulta->paciente->nome }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $consulta->data_consulta }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $consulta->status }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <a href="{{ route('consultas.show', $consulta->id) }}" class="text-blue-600 hover:text-blue-900">Ver Detalhes</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
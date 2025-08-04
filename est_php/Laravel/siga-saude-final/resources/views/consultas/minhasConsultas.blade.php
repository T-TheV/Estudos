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
                                <li class="border-b border-gray-200 py-4">
                                    <h3 class="font-semibold">{{ $consulta->paciente->nome }}</h3>
                                    <p class="text-gray-600">{{ $consulta->data_consulta }}</p>
                                    <p class="text-gray-600">{{ $consulta->status }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
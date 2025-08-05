<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Consulta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('consultas.update', $consulta->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Paciente -->
                        <div class="mb-4">
                            <label for="paciente_id" class="block text-sm font-medium text-gray-700">Paciente</label>
                            <select name="paciente_id" id="paciente_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}" {{ $consulta->paciente_id == $paciente->id ? 'selected' : '' }}>
                                        {{ $paciente->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Médico -->
                        <div class="mb-4">
                            <label for="medico_id" class="block text-sm font-medium text-gray-700">Médico</label>
                            <select name="medico_id" id="medico_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                @foreach($medicos as $medico)
                                    <option value="{{ $medico->id }}" {{ $consulta->medico_id == $medico->id ? 'selected' : '' }}>
                                        {{ $medico->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Data e Hora -->
                        <div class="mb-4">
                            <label for="data_consulta" class="block text-sm font-medium text-gray-700">Data e Hora</label>
                            <input type="datetime-local" name="data_consulta" id="data_consulta" 
                                   value="{{ \Carbon\Carbon::parse($consulta->data_consulta)->format('Y-m-d\TH:i') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                                <option value="agendada" {{ $consulta->status == 'agendada' ? 'selected' : '' }}>Agendada</option>
                                <option value="realizada" {{ $consulta->status == 'realizada' ? 'selected' : '' }}>Realizada</option>
                                <option value="cancelada" {{ $consulta->status == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                            </select>
                        </div>



                        <div class="flex items-center justify-between">
                            <a href="{{ route('consultas.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Cancelar
                            </a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Atualizar Consulta
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
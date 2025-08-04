<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Criar Agendamento de Consulta') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded shadow p-6">
            <form method="POST" action="{{ route('consultas.store') }}">
                @csrf

                <!-- Paciente -->
                <div class="mb-4">
                    <label for="paciente_id" class="block text-gray-700 dark:text-gray-200 mb-2">Paciente</label>
                    <select name="paciente_id" id="paciente_id" class="w-full border-gray-300 rounded">
                        <option value="">Selecione um paciente</option>
                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                        @endforeach
                    </select>
                    @error('paciente_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Médico -->
                <div class="mb-4">
                    <label for="medico_id" class="block text-gray-700 dark:text-gray-200 mb-2">Médico</label>
                    <select name="medico_id" id="medico_id" class="w-full border-gray-300 rounded">
                        <option value="">Selecione um médico</option>
                        @foreach($medicos as $medico)
                            <option value="{{ $medico->id }}">{{ $medico->name }}</option>
                        @endforeach
                    </select>
                    @error('medico_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Data e Hora -->
                <div class="mb-4">
                    <label for="data_consulta" class="block text-gray-700 dark:text-gray-200 mb-2">Data e Hora</label>
                    <input type="datetime-local" name="data_consulta" id="data_consulta" class="w-full border-gray-300 rounded" value="{{ old('data_consulta') }}">
                    @error('data_consulta')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
                        Agendar Consulta
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

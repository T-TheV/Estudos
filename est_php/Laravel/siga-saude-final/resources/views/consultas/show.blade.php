<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-6">Detalhes da Consulta</h2>
                    
                    <!-- Informações da Consulta -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="font-semibold text-lg mb-3">Informações Gerais</h3>
                            <p><strong>Paciente:</strong> {{ $consulta->paciente->nome }}</p>
                            <p><strong>Médico:</strong> {{ $consulta->medico->name }}</p>
                            <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($consulta->data_consulta)->format('d/m/Y H:i') }}</p>
                            <p><strong>Status:</strong> 
                                <span class="px-2 py-1 rounded text-sm 
                                    {{ $consulta->status === 'realizada' ? 'bg-green-100 text-green-800' : 
                                       ($consulta->status === 'agendada' ? 'bg-yellow-100 text-yellow-800' : 
                                        'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($consulta->status) }}
                                </span>
                            </p>
                            <br>
                                <a href="{{ route('consultas.edit', $consulta->id) }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition-colors">
                                    Editar Consulta
                                </a>
                    
                        </div>
                    </div>

                    <!-- Observações da Consulta -->
                    @if($consulta->status !== 'cancelada')
                        <div class="bg-blue-50 p-6 rounded-lg mb-6">
                            <h3 class="font-semibold text-lg mb-4">Observações da Consulta</h3>
                            
                            <!-- Exibir observações existentes -->
                            @if($consulta->notas_consulta)
                                <div class="mb-6">
                                    <h4 class="font-medium text-gray-700 mb-2">Observações Atuais:</h4>
                                    <div class="bg-white p-4 rounded border">
                                        <p class="text-gray-700 whitespace-pre-line">{{ $consulta->notas_consulta }}</p>
                                        <small class="text-gray-500 mt-2 block">
                                            Última atualização: {{ $consulta->updated_at->format('d/m/Y H:i') }}
                                        </small>
                                    </div>
                                </div>
                            @endif

                            <!-- Formulário para adicionar/editar -->
                            @if($consulta->status === 'realizada' || auth()->user()->tipo === 'medico')
                                <form action="{{ route('consultas.update', $consulta->id) }}" method="POST" class="space-y-4">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div>
                                        <label for="notas_consulta" class="block text-sm font-medium text-gray-700 mb-2">
                                            {{ $consulta->notas_consulta ? 'Editar Observações' : 'Adicionar Observações' }}
                                        </label>
                                        <textarea 
                                            id="notas_consulta" 
                                            name="notas_consulta" 
                                            rows="5" 
                                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                            placeholder="Digite as observações da consulta..."></textarea>
                                        @error('notas_consulta')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <button 
                                        type="submit" 
                                        class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition-colors">
                                        {{ $consulta->notas_consulta ? 'Atualizar' : 'Salvar' }} Observações
                                    </button>
                                </form>
                            @else
                                <div class="bg-yellow-50 border border-yellow-200 rounded-md p-4">
                                    <p class="text-yellow-800">
                                        As observações podem ser adicionadas apenas após a realização da consulta ou por médicos.
                                    </p>
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- Botões de Ação -->
                    <div class="flex space-x-4">
                        <a href="{{ route('consultas.index') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded transition-colors">
                            Voltar
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <div class="max-w-2xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Detalhes do Paciente</h1>
        <div class="bg-white shadow rounded p-6">
            <p><strong>Nome:</strong> {{ $paciente->nome }}</p>
            <p><strong>CPF:</strong> {{ $paciente->cpf }}</p>
            <p><strong>Data de Nascimento:</strong> {{ $paciente->data_nascimento }}</p>
            <p><strong>Telefone:</strong> {{ $paciente->telefone }}</p>
            <p><strong>Endereço:</strong> {{ $paciente->endereco }}</p>
            <!-- Adicione outros campos conforme necessário -->
        </div>
        <a href="{{ route('pacientes.index') }}" class="text-blue-500 mt-4 inline-block">Voltar</a>
    </div>
</x-app-layout>
<h1>Detalhes do Paciente</h1>
<p>Nome: {{ $paciente->nome }}</p>
<p>CPF: {{ $paciente->cpf }}</p>
<p>Data de nascimento: {{ $paciente->data_nascimento }}</p>
<p>Telefone: {{ $paciente->telefone }}</p>

<h3>Consultas Agendadas:</h3>
<ul>
    @forelse($paciente->consultas as $consulta)
        <li>
            Consulta em {{ $consulta->data_consulta }} - Status: {{ $consulta->status }}
        </li>
    @empty
        <p>Nenhuma consulta agendada para este paciente.</p>
    @endforelse
</ul>
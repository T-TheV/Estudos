<form action="{{ route('consultas.store') }}" method="POST">
    @csrf
    <h1>Agendar Consulta</h1>
    <label for="paciente_id">Paciente:</label>
    <input type="text" name="paciente_id" id="paciente_id" required>

    <label for="data">Data:</label>
    <input type="date" name="data" id="data" required>

    <label for="hora">Hora:</label>
    <input type="time" name="hora" id="hora" required>

    <button type="submit">Agendar Consulta</button>
</form>
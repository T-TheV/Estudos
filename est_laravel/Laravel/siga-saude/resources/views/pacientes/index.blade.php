@extends('layouts.app')

@section('titulo', 'Lista de Pacientes')

@if (session('success'))
    <x-alert type="sucesso">
        {{ session('success') }}
    </x-alert>
@endif

<h2>Lista de Pacientes</h2>
<ul>
    @foreach ($pacientes as $paciente)
    <li>{{ $paciente['nome'] }}</li>
    <a href="{{ route('pacientes.show', ['paciente' => $paciente->id]) }}">Ver Detalhes</a>
    @endforeach
</ul>

<!-- <x-alert type="sucesso">
    O paciente foi cadastrado com sucesso!
</x-alert> -->

<!-- <x-alert type="erro">
    Não foi possível encontrar o prontuário do paciente.
</x-alert> -->
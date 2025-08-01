@extends('layouts.app')
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
@section('content')
<form action="{{ route('pacientes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="nome" value="{{ old('nome') ?? '' }}" placeholder="Nome do Paciente"><br><br>
    @error('nome')
    <span class="text-danger">{{ $message }}</span><br><br>
    @enderror
    <input type="file" name="foto_perfil"><br><br>
    @error('foto_perfil')
    <span class="text-danger">{{ $message }}</span><br><br>
    @enderror
    <input type="text" name="cpf" value="{{ old('cpf') ?? '' }}" placeholder="CPF do Paciente"><br><br>
    @error('cpf')
    <span class="text-danger">{{ $message }}</span><br><br>
@enderror
    <input type="date" name="data_nascimento" value="{{ old('data_nascimento') ?? '' }}" placeholder="Data de Nascimento"><br><br>
    @error('data_nascimento')
    <span class="text-danger">{{ $message }}</span><br><br>
@enderror
    <button type="submit">Cadastrar</button>
</form>
@endsection
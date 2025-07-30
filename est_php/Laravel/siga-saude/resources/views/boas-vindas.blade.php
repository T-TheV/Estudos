@extends('layouts.app')

@section('titulo', 'Página Inicial')

@section('content')
    <h1>Bem-vindo ao Siga Saúde</h1>
    @if($logado)
        <p>Bem vindo usuário!</p>
    @else
        <p>Você não está logado.</p>
    @endif
    <p>Este é um sistema de gerenciamento de saúde.</p>
<p>Forma segura (escapa HTML): {{ $dado }}</p>
<br>
<p>Forma não segura (interpreta HTML): {!! $dado !!}</p>

<p>Lista de Procedimentos:</p>
<ul>
    @forelse($procedimentos as $p)
    @if($loop->first)

        <li style='color: blue;'>{{ $loop->iteration }}. {{ $p }}</li>
    @else
        <li>{{ $loop->iteration }}. {{ $p }}</li>
    @endif
    @empty
        <p>Nenhum procedimento cadastrado.</p>
    @endforelse
</ul>

@endsection
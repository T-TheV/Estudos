@extends('layouts.app')

@section('titulo', 'Alertas')

<div>
    @foreach ($alerta as $item)
        <x-alert type="{{ $item['tipo'] }}">{{ $item['mensagem'] }}</x-alert>
    @endforeach
</div>

@extends('layouts.app')

@section('titulo', 'Alertas')

<div>
        <x-alert type="sucesso" >Operação realizada com sucesso!</x-alert>
        <x-alert type="erro">Ocorreu um erro ao processar sua solicitação.</x-alert>
</div>

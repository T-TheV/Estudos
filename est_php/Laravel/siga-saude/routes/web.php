<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $dado = "<strong>Importante!</strong>";
    $procedimentos = ['Consulta', 'Exame', 'Cirurgia'];
    return view('boas-vindas',[
        'logado' => true,
        'dado' => $dado,
        'procedimentos' => $procedimentos
    ]);
});

Route::get('/home', function () {
    return redirect('/');
});

Route::get('/ola-mundo', function () {
    return 'Meu primeiro teste de rota no Laravel!';
});

Route::get('/pacientes', function () {
    $pacientes = [
        ['nome' => 'João da Silva'],
        ['nome' => 'Maria Oliveira'],
        ['nome' => 'Carlos Pereira']
    ];
    return view('pacientes', ['pacientes' => $pacientes]);
})->name('pacientes.index');

Route::get('/pacientes/{id}', function ($id) {
    return "Detalhes do paciente com ID: $id";
});

Route::get('/api/pacientes', function () {
    return [
        ['id' => 1, 'nome' => 'Maria Souza'],
        ['id' => 2, 'nome' => 'Carlos Pereira']
    ];
});
Route::get('/pesquisar/{termo?}', function ($termo = null) {
    if (is_null($termo)) {
        return "Digite um termo para pesquisar.";
    }
    return "Resultados da pesquisa para: $termo";
}); 

Route::prefix('agendamentos')->group(function() {
    Route::get('/', function () {
        return 'Lista de Agendamentos';
    });
    Route::get('/novo', function() {
        return 'Formulário para Novo Agendamento';
    });
});


route::get('/alerta', function () {
    $alerta = [
        ['tipo' => 'sucesso', 'mensagem' => 'Operação realizada com sucesso!'],
        ['tipo' => 'erro', 'mensagem' => 'Ocorreu um erro ao processar sua solicitação.']
    ];
    return view('alerta', ['alerta' => $alerta]);
})->name('alerta.index');
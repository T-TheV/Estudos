<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\DashboardController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');


Route::get('/home', function () {
    return redirect('/');
});

Route::get('/ola-mundo', function () {
    return 'Meu primeiro teste de rota no Laravel!';
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

Route::prefix('agendamentos')->group(function () {
    Route::get('/', function () {
        return 'Lista de Agendamentos';
    });
    Route::get('/novo', function () {
        return 'Formulário para Novo Agendamento';
    });
});


route::get('/alerta', function () {
    return view('alerta');
})->name('alerta.index');


route::resource('consultas', ConsultaController::class);

route::get('/contato', [ContatoController::class, 'index'])->name('contato.index');

Route::get('/teste-pacientes', function () {
    $pacientes = App\Models\Paciente::withCount('consultas')->get();

    foreach ($pacientes as $paciente) {
        echo $paciente->nome . ' - ' . $paciente->consultas_count . ' consultas<br>';
    }
});


Route::resource('pacientes', PacienteController::class);

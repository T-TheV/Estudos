<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Middleware\ChecarPapel;
use App\Services\RelatorioService;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //
     Route::resource('pacientes', PacienteController::class);
    Route::resource('consultas', ConsultaController::class);
    // Coloque aqui qualquer outra rota que precise de login
});


Route::get('/admin/painel', function () {
    return 'Bem-vindo ao Painel do Administrador!';
})->middleware([ChecarPapel::class.':admin'])->name('admin.painel');

//Vamos supor que apenas administradores podem criar, editar ou deletar outros usuários. Proteja o CRUD de usuários com o seu novo middleware.

Route::middleware(['auth', ChecarPapel::class . ':admin'])->group(function () {
    // Protege todas as rotas do CRUD de usuários
    Route::resource('usuarios', \App\Http\Controllers\Auth\RegisteredUserController::class);
});


Route::get('/relatorio', [\App\Http\Controllers\DashboardController::class, 'gerarRelatorio'])
    ->middleware(['auth', ChecarPapel::class . ':admin'])
    ->name('relatorio');





require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Middleware\ChecarPapel;


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
});

// Rotas protegidas para administradores
Route::middleware(['auth', ChecarPapel::class . ':administrador'])->group(function () {
    // Exemplo: CRUD de usuários
    Route::resource('usuarios', UsuarioController::class);
    // Outras rotas de admin...
});

// Rotas protegidas para recepcionistas e admins
Route::middleware(['auth', ChecarPapel::class . ':administrador,recepcionista'])->group(function () {
    // Exemplo: CRUD de pacientes
    Route::get('/pacientes/criarPaciente', [App\Http\Controllers\PacienteController::class, 'create'])->name('pacientes.criar');
    Route::post('/pacientes', [App\Http\Controllers\PacienteController::class, 'store'])->name('pacientes.store');
    // Exemplo: CRUD de consultas
    Route::get('/consultas/criarConsulta', [App\Http\Controllers\ConsultaController::class, 'create'])->name('consultas.criar');
    Route::post('/consultas', [App\Http\Controllers\ConsultaController::class, 'store'])->name('consultas.store');
    // Outras rotas de recepcionista...
});

// Rotas protegidas para médicos
Route::middleware(['auth', ChecarPapel::class . ':medico'])->group(function () {
    // Exemplo: painel do médico
    Route::get('/minhas-consultas', [App\Http\Controllers\ConsultaController::class, 'minhasConsultas'])->name('consultas.medico');
    // Outras rotas de médico...
});


// Rotas para qualquer usuário autenticado
Route::middleware('auth')->group(function () {
    Route::resource('consultas', ConsultaController::class);
    Route::resource('pacientes', PacienteController::class);

    Route::get('/consultas/{id}', [App\Http\Controllers\ConsultaController::class, 'show'])->name('consultas.show');
});

require __DIR__.'/auth.php';

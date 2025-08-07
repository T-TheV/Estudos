<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PacienteController;
use App\Http\Controllers\Api\ConsultaController;
use App\Http\Controllers\Api\UsuarioController;

Route::prefix('v1')->group(function () {
    // Rotas de autenticação
    Route::post('/login', [AuthController::class, 'login'])->name('api.login');

    // Rotas protegidas por autenticação
    Route::middleware('auth:sanctum')->group(function () {
        // Auth
        Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
        Route::get('/me', [AuthController::class, 'me'])->name('api.me');
        
        // Pacientes (todos os usuários autenticados)
        Route::apiResource('pacientes', PacienteController::class)->names([
            'index' => 'api.pacientes.index',
            'store' => 'api.pacientes.store',
            'show' => 'api.pacientes.show',
            'update' => 'api.pacientes.update',
            'destroy' => 'api.pacientes.destroy',
        ]);
        
        // Consultas (todos os usuários autenticados)
        Route::apiResource('consultas', ConsultaController::class)->names([
            'index' => 'api.consultas.index',
            'store' => 'api.consultas.store',
            'show' => 'api.consultas.show',
            'update' => 'api.consultas.update',
            'destroy' => 'api.consultas.destroy',
        ]);
        
        // Rotas específicas por papel
        Route::group(['middleware' => 'papel:medico'], function () {
            Route::get('/medico/consultas', [ConsultaController::class, 'minhasConsultas'])->name('api.medico.consultas');
        });
        
        Route::group(['middleware' => 'papel:administrador'], function () {
            Route::apiResource('admin/usuarios', UsuarioController::class)->names([
                'index' => 'api.admin.usuarios.index',
                'store' => 'api.admin.usuarios.store',
                'show' => 'api.admin.usuarios.show',
                'update' => 'api.admin.usuarios.update',
                'destroy' => 'api.admin.usuarios.destroy',
            ]);
        });
    });
});

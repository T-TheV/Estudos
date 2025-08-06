<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PacienteController;

Route::prefix('v1')->group(function () {
    // Rotas de autenticação
    Route::post('/login', [AuthController::class, 'login'])->name('api.login');

    // Rotas protegidas por autenticação
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('pacientes', PacienteController::class)->names([
            'index' => 'api.pacientes.index',
            'store' => 'api.pacientes.store',
            'show' => 'api.pacientes.show',
            'update' => 'api.pacientes.update',
            'destroy' => 'api.pacientes.destroy',
        ]);
        // Outras rotas protegidas virão aqui...
    });
});

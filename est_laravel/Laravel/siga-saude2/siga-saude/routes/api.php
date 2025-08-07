<?php
use Illuminate\Support\Facades\Route;
use App\Models\Paciente;
use Illuminate\Http\Request;

use App\Http\Resources\PacienteResource;
Route::get('/pacientes', function () {
return PacienteResource::collection(Paciente::all());
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
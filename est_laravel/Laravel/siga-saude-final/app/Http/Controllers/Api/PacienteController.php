<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Http\Resources\PacienteResource;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::withCount('consultasPaciente')->paginate(15);
        return PacienteResource::collection($pacientes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePacienteRequest $request)
    {
        $paciente = Paciente::create($request->validated());
        
        return response()->json([
            'success' => true,
            'message' => 'Paciente criado com sucesso',
            'data' => new PacienteResource($paciente)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        $paciente->loadCount('consultasPaciente');
        
        return response()->json([
            'success' => true,
            'data' => new PacienteResource($paciente)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        $paciente->update($request->validated());
        
        return response()->json([
            'success' => true,
            'message' => 'Paciente atualizado com sucesso',
            'data' => new PacienteResource($paciente)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Paciente excluído com sucesso'
        ]);
    }
}

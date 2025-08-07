<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use App\Http\Resources\ConsultaResource;
use App\Http\Requests\StoreConsultaRequest;
use App\Http\Requests\UpdateConsultaRequest;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultas = Consulta::with(['paciente', 'medico'])
                            ->withCount('observacoes')
                            ->paginate(15);
        
        return ConsultaResource::collection($consultas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsultaRequest $request)
    {
        $consulta = Consulta::create($request->validated());
        $consulta->load(['paciente', 'medico']);
        
        return response()->json([
            'success' => true,
            'message' => 'Consulta criada com sucesso',
            'data' => new ConsultaResource($consulta)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Consulta $consulta)
    {
        $consulta->load(['paciente', 'medico']);
        
        return response()->json([
            'success' => true,
            'data' => new ConsultaResource($consulta)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsultaRequest $request, Consulta $consulta)
    {
        $consulta->update($request->validated());
        $consulta->load(['paciente', 'medico']);
        
        return response()->json([
            'success' => true,
            'message' => 'Consulta atualizada com sucesso',
            'data' => new ConsultaResource($consulta)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consulta $consulta)
    {
        $consulta->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Consulta excluída com sucesso'
        ]);
    }

    public function minhasConsultas()
    {
        $consultas = Consulta::where('medico_id', auth()->id())
    ()                        ->with(['paciente'])
                            ->paginate(15);
        
        return ConsultaResource::collection($consultas);
    }
}

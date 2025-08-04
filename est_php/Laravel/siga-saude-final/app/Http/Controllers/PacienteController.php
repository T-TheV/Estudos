<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = \App\Models\Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pacientes.criarPaciente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação e criação do paciente
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:pacientes,cpf',
            'telefone' => 'nullable|string|max:15',
            'data_nascimento' => 'required|date',
            'endereco' => 'nullable|string|max:255',
        ]);

        \App\Models\Paciente::create($validatedData);

        return redirect()->route('pacientes.index')->with('success', 'Paciente criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

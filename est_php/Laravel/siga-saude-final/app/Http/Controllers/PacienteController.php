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
        return view('pacientes.show', ['paciente' => \App\Models\Paciente::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)

    {
        $pacientes = \App\Models\Paciente::findOrFail($id);
        // Aqui você pode buscar os dados do paciente pelo ID e passar para a view
        return view('pacientes.edit', compact('pacientes'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação e atualização do paciente
        $paciente = \App\Models\Paciente::findOrFail($id);
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|unique:pacientes,cpf,' . $paciente->id,
            'telefone' => 'nullable|string|max:15',
            'data_nascimento' => 'required|date',
            'endereco' => 'nullable|string|max:255',
        ]);
        $paciente->update($validatedData);

        return redirect()->route('pacientes.index')->with('success', 'Paciente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $paciente = \App\Models\Paciente::findOrFail($id);
        $paciente->delete();

        return redirect()->route('pacientes.index')->with('success', 'Paciente removido com sucesso!');
    }
}

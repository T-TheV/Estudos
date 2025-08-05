<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultas = Consulta::with(['paciente', 'medico'])
                            ->orderBy('data_consulta', 'desc')
                            ->paginate(10);
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('consultas.criarConsulta', [
            'pacientes' => \App\Models\Paciente::all(),
            'medicos' => \App\Models\User::where('tipo', 'medico')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'paciente_id' => 'required|exists:pacientes,id',
        'medico_id' => [
            'required',
            'exists:users,id',
            function ($attribute, $value, $fail) {
                $user = \App\Models\User::find($value);
                if (!$user || $user->tipo !== 'medico') {
                    $fail('O usuário selecionado não é um médico válido.');
                }
            },
        ],
        'data_consulta' => 'required|date',
        'status' => 'nullable|string',
        'notas_consulta' => 'nullable|string',
        ]);

        Consulta::create($validated);

        return redirect()->route('consultas.index')->with('success', 'Consulta agendada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $consulta = Consulta::with(['paciente', 'medico'])->findOrFail($id);
        return view('consultas.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('consultas.edit', [
            'consulta' => Consulta::findOrFail($id),
            'pacientes' => \App\Models\Paciente::all(),
            'medicos' => \App\Models\User::where('tipo', 'medico')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consulta $consulta)
    {
        $validated = $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:users,id',
            'data_consulta' => 'required|date',
            'status' => 'required|in:agendada,realizada,cancelada',
            'notas_consulta' => 'nullable|string',
        ]);

        $consulta->update($validated);

        return redirect()->route('consultas.show', $consulta->id)
                       ->with('success', 'Consulta atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function minhasConsultas()
    {
        $consultas = Consulta::where('medico_id', auth()->id())->with('paciente')->get();
        return view('consultas.minhasConsultas', compact('consultas'));
    }

    

    public function minhasConsultasPaciente()
    {
        $consultasPaciente = \App\Models\Consulta::paciente(Auth::id());
        return view('pacientes.index', compact('consultasPaciente'));
    }
}

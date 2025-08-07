<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Http\Requests\StorePacienteRequest;
use Illuminate\Contracts\Cache\Store;

class PacienteController extends Controller
{
    public function index(){
    $pacientes = Paciente::with('consultas')->get();
    return view('pacientes.index', ['pacientes' => $pacientes]);
}
    public function show($id){
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.show', ['paciente' => $paciente]);

    }
    public function store(StorePacienteRequest $request)
{
    $dados = $request->validated();
    //dd($dados); // Para testar
    Paciente::create($dados);
    return redirect()->route('pacientes.index')->with('success', 'Paciente cadastrado com sucesso!');
    //
    if ($request->hasFile('foto_perfil') && $request->file('foto_perfil')->isValid()) {
    // Salva o arquivo no disco 'public' dentro de uma pasta 'fotos_pacientes'
    // e retorna o caminho do arquivo salvo.
    $caminho = $request->file('foto_perfil')->store('fotos_pacientes', 'public');
    
    // dd($caminho); // Descomente para ver o caminho gerado

    //salva o caminho da foto no banco de dados
    $dados['caminho_foto'] = $caminho;
    }

}
public function create()
{
    return view('pacientes.create');
}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Importe no topo


class DashboardController extends Controller
{
    public function index()
    {
        $usuario = Auth::user(); // Pega o objeto User completo
        $nomeUsuario = $usuario->name;
        return view('dashboard', ['nomeDoUsuario' => $nomeUsuario]);
    }

    // Exemplo de injeção de dependência
    public function gerarRelatorio(\App\Services\RelatorioService $servicoDeRelatorio)
    {
        $relatorio = $servicoDeRelatorio->gerarRelatorioSimples();
        dd($relatorio);
    }
}

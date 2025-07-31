<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dado = "<strong>Importante!</strong>";
        $procedimentos = ['Consulta', 'Exame', 'Cirurgia'];
        return view('boas-vindas', [
            'logado' => true,
            'dado' => $dado,
            'procedimentos' => $procedimentos
        ]);
    }
}

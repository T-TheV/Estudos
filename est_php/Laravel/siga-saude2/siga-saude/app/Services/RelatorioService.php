<?php

namespace App\Services;

class RelatorioService
{
    public function gerarRelatorioSimples()
    {
        // implementação do relatório simples
        return ['exemplo' => 'dados'];
    }

    public function gerarRelatorio(RelatorioService $servicoDeRelatorio)
    {
        $relatorio = $servicoDeRelatorio->gerarRelatorioSimples();
        dd($relatorio);
    }
}
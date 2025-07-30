<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * A propriedade pública que guardará o tipo do alerta.
     * Pode ser 'sucesso', 'erro', 'aviso', ou 'info'.
     *
     * Por ser PÚBLICA, o Laravel a tornará magicamente
     * disponível como uma variável $type na nossa view.
     */
    public string $type;

    /**
     * Outra propriedade pública para customizar a classe CSS base.
     */
    public string $baseClass = 'alert';


    /**
     * O construtor é o portão de entrada para os dados.
     * O que for passado como atributo na tag <x-alert> será recebido aqui.
     * Definimos um valor padrão 'info' caso nenhum tipo seja fornecido.
     */
    public function __construct(string $type = 'info')
    {
        $this->type = $type;
    }

    /**
     * Este método é o que renderiza a view do componente.
     * Por padrão, ele já aponta para a view com o mesmo nome em
     * resources/views/components/.
     */
    public function render(): View
    {
        return view('components.alert');
    }
}
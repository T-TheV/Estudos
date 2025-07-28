<?php

class Medicamento {
    public $nome;
    public $laboratorio;
    public $preco;

    public function __construct($nome, $laboratorio, $preco) {
        $this->nome = $nome;
        $this->laboratorio = $laboratorio;
        $this->preco = $preco;
    }

    public function exibirInfo() {
        echo "Nome: " . $this->nome . "<br>";
        echo "Laboratório: " . $this->laboratorio . "<br>";
        echo "Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
    }
}
$medicamento1 = new Medicamento('Torsilax', 'Neo Química', 25.50);
$medicamento1->exibirInfo();

<?php

class Medicamento{
    public $nome;
    public $laboratorio;
    public $preco;

    public function exibirInfo() {
        echo "Nome: " . $this->nome . "<br>";
        echo "Laboratório: " . $this->laboratorio . "<br>";
        echo "Preço: R$ " . number_format($this->preco, 2, ',', '.') . "<br>";
    }
}
$medicamento1 = new Medicamento();
$medicamento1->nome = "Medicamento A";
$medicamento1->laboratorio = "Laboratório A";
$medicamento1->preco = 10.0;

$medicamento1->exibirInfo();
// echo "Nome: " . $medicamento1->nome . "<br>";
// echo "Laboratório: " . $medicamento1->laboratorio . "<br>";
// echo "Preço: R$ " . number_format($medicamento1->preco, 2, ',', '.') . "<br>";
// var_dump($medicamento1);


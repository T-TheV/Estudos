<?php

class Medicamento{
    public $nome;
    public $laboratorio;
    public $preco;


}
$medicamento1 = new Medicamento();
$medicamento1->nome = "Medicamento A";
$medicamento1->laboratorio = "Laboratório A";
$medicamento1->preco = 10.0;

echo "Nome: " . $medicamento1->nome . "<br>";
echo "Laboratório: " . $medicamento1->laboratorio . "<br>";
echo "Preço: R$ " . number_format($medicamento1->preco, 2, ',', '.') . "<br>";
// var_dump($medicamento1);


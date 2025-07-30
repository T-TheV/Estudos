<?php

class Pessoa {
    public $nome;
    public $cpf;

    public function exibirInfo(){
        echo "Nome: " . $this->nome . "<br>";
        echo "CPF: " . $this->cpf . "<br>";
    }
}

class Paciente extends Pessoa {
    public $cartao_sus;

    public function __construct($nome, $cpf, $cartao_sus) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->cartao_sus = $cartao_sus;
    }
    public function exibirInfo()
    {
        parent::exibirInfo();
        echo "Cartão SUS: " . $this->cartao_sus . "<br>";
    }
}

$paciente1 = new Paciente('João da Silva', '123.456.789-00', '987654321');
$paciente1->exibirInfo();
// echo "CPF: " . $paciente1->cpf . "<br>";
// echo "Cartão SUS: " . $paciente1->cartao_sus . "<br>";
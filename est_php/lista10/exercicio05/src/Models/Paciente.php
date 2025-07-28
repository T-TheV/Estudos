<?php
namespace App\Models;

class Paciente {
    private $nome;
    private $idade;
    private $email;
    
    public function __construct($nome, $idade, $email = null) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;
        
        echo "Paciente criado: {$this->nome}, {$this->idade} anos<br>";
    }
    
    public function getNome() {
        return $this->nome;
    }
    
    public function getIdade() {
        return $this->idade;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function exibirInfo() {
        echo "Nome: {$this->nome}, Idade: {$this->idade} anos";
        if ($this->email) {
            echo ", Email: {$this->email}";
        }
        echo "<br>";
    }
}
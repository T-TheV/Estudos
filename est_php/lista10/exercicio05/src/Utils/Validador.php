<?php
namespace App\Utils;

class Validador {
    
    public function validarEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    
    public function validarIdade($idade) {
        return is_numeric($idade) && $idade > 0 && $idade <= 120;
    }
    
    public function validarNome($nome) {
        return !empty($nome) && strlen($nome) >= 2;
    }
    
    public function validarPaciente($nome, $idade, $email = null) {
        $erros = [];
        
        if (!$this->validarNome($nome)) {
            $erros[] = "Nome inválido";
        }
        
        if (!$this->validarIdade($idade)) {
            $erros[] = "Idade inválida";
        }
        
        if ($email && !$this->validarEmail($email)) {
            $erros[] = "Email inválido";
        }
        
        return empty($erros) ? true : $erros;
    }
    
    public function __construct() {
        echo "Validador inicializado<br>";
    }
}
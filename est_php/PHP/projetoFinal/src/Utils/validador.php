<?php
namespace App\Utils;

class Validador {
    public static function validarEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function validarSenha($senha) {
        return strlen($senha) >= 6;
    }

    public static function validarNome($nome) {
        return !empty($nome) && strlen($nome) >= 2;
    }

    public static function validarPaciente($nome, $idade, $email = null) {
        $erros = [];

        if (!self::validarNome($nome)) {
            $erros[] = "Nome inválido";
        }

        if (!is_numeric($idade) || $idade <= 0 || $idade > 120) {
            $erros[] = "Idade inválida";
        }

        if ($email && !self::validarEmail($email)) {
            $erros[] = "Email inválido";
        }

        return empty($erros) ? true : $erros;
    }

    public function __construct() {
        echo "Validador inicializado<br>";
    }
}
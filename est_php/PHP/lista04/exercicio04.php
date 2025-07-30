<?php

$paciente = [
    "nome" => 'João Silva',
    "idade" => 35,
    "email" => 'joao.silva@email.com',
    "cpf" => '123.456.789-00'
];

// Para verificar se está correto:
print_r($paciente);

// Ou exibir campos específicos:
// echo "Nome: " . $paciente['nome'] . "\n";
// echo "Idade: " . $paciente['idade'] . "\n";
// echo "Email: " . $paciente['email'] . "\n";
// echo "CPF: " . $paciente['cpf'] . "\n";

?>
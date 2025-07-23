<?php

$paciente = [
    "nome" => 'João Silva',
    "idade" => 35,
    "email" => 'joao.silva@email.com',
    "cpf" => '123.456.789-00'
];

foreach ($paciente as $chave => $valor) {
    // Exibe a chave com a primeira letra maiúscula usando ucfirst(), seguida do valor.    
    echo ucfirst($chave) . ": " . $valor . "<br>";
}
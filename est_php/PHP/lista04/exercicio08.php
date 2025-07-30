<?php

$lista_pacientes = [
    $crianca = [
        "nome" => "Ana",
        "idade" => 10,
        "email" => '',
        "cpf" => ''
    ],
    $adulto = [
        "nome" => "Carlos",
        "idade" => 30,
        "email" => '',
        "cpf" => ''
    ],
    $idoso = [
        "nome" => "Maria",
        "idade" => 70,
        "email" => 'maria@email.com',
        "cpf" => '987.654.321-00'
    ]
];

echo $adulto['nome'] . '<br>' . $idoso['email'];

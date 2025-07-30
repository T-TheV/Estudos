<?php

$usuario_correto = "admin";
$senha_correta = "12345";

$usuario_digitado = "admin";
$senha_digitada = "12";

if ($usuario_digitado != $usuario_correto || $senha_digitada != $senha_correta) {
    echo "Usuário ou senha incorretos.\n";
} else {
    echo "Login realizado com sucesso!\n";
}
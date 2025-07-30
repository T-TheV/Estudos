<?php
// filepath: c:\xampp\htdocs\estudos\projetoFinal\src\Utils\verificar_login.php

session_start();

// Verificar se está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: ../../login.php');
    exit;
}

// Verificar timeout (30 minutos)
$timeout = 30 * 60;
if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time']) > $timeout) {
    session_destroy();
    header('Location: ../../login.php?msg=timeout');
    exit;
}

// Atualizar tempo da sessão
$_SESSION['login_time'] = time();
?>
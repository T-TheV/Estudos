<?php
// filepath: c:\xampp\htdocs\estudos\projetoFinal\logout.php

session_start();

// Destruir sessão
$_SESSION = array();
session_destroy();

// Redirecionar com mensagem
header('Location: login.php?msg=desconectado');
exit;
?>
<?php
// filepath: c:\xampp\htdocs\estudos\projetoFinal\index.php

session_start();

// Se já está logado, redireciona
if (isset($_SESSION['usuario'])) {
    header('Location: src/Views/listar_pacientes.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Pacientes - UBS</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container-center">
        <div class="welcome-card">
            <h1>Sistema de Gestão de Pacientes</h1>
            <p>Sistema para gerenciamento de pacientes da UBS</p>
            
            <div class="actions">
                <a href="login.php" class="btn btn-primary">
                    Fazer Login
                </a>
            </div>
    
        </div>
    </div>
</body>
</html>
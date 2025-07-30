<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Paciente</title>
</head>
<body>
    <?php
// filepath: c:\xampp\htdocs\estudos\projetoFinal\src\Views\listar_pacientes.php

// ✅ CORRIGIDO: Verificar login primeiro
require_once '../Utils/verificar_login.php';

// ✅ CORRIGIDO: Caminho correto para conexão
require_once '../Utils/Conexao.php';
?>

<?php

if (!$conexao_sucesso || $pdo === null) {
    echo '<div class="alert alert-error">Erro de conexão com banco de dados.</div>';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        // Prepara a consulta SQL
        $stmt = $pdo->prepare("DELETE FROM pacientes WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        
        // Executa a consulta
        if ($stmt->execute()) {
            echo '<div class="alert alert-success">Paciente excluído com sucesso!</div>';
        } else {
            echo '<div class="alert alert-error">Erro ao excluir paciente.</div>';
        }
    } catch (PDOException $e) {
        echo '<div class="alert alert-error">Erro: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
}?>
<button><a href="listar_pacientes.php">Voltar</a></button>
</body>
</html>
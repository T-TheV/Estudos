<?php
// filepath: c:\xampp\htdocs\estudos\projetoFinal\src\Views\listar_pacientes.php

// ✅ CORRIGIDO: Verificar login primeiro
require_once '../Utils/verificar_login.php';

// ✅ CORRIGIDO: Caminho correto para conexão
require_once '../Utils/Conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Consultas</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <header class="page-header">
            <h1>Lista de Consultas</h1>
            <div class="user-info">
                <span>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</span>
                <a href="../../logout.php" class="btn btn-secondary">Sair</a>
            </div>
        </header>
        
        <div class="actions">
            <a href="cadastrarConsulta.php" class="btn btn-primary">Cadastrar Consulta</a>
        </div>
        
        <?php
        if (!$conexao_sucesso || $pdo === null) {
            echo '<div class="alert alert-error">Erro de conexão com banco de dados.</div>';
            exit;
        }
        
        try {
            $sql = "SELECT * FROM consultas ORDER BY data_consulta DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $consultas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $sqlpaciente = "SELECT * FROM pacientes ORDER BY nome ASC";
            $stmtpaciente = $pdo->prepare($sqlpaciente);
            $stmtpaciente->execute();
            $pacientes = $stmtpaciente->fetchAll(PDO::FETCH_ASSOC);

            if (count($consultas) > 0) {
                echo '<div class="alert alert-success">Encontrados ' . count($consultas) . ' consulta(s)</div>';

                echo '<div class="table-container">';
                echo '<table class="table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th><th>ID Paciente</th><th>Nome Paciente</th><th>Data Consulta</th><th>Status</th><th>Ações</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                foreach ($pacientes as $paciente) {
                    $nomePaciente = htmlspecialchars($paciente['nome']);
                }
                foreach ($consultas as $consulta) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($consulta['id']) . '</td>';
                    echo '<td>' . htmlspecialchars($consulta['id_paciente']) . '</td>';
                    echo '<td>' . htmlspecialchars($nomePaciente) . '</td>';
                    echo '<td>' . date('d/m/Y', strtotime($consulta['data_consulta'])) . '</td>';
                    echo '<td>' . htmlspecialchars($consulta['status']) . '</td>';
                    // echo '<td>' . date('d/m/Y H:i', strtotime($paciente['data_cadastro'])) . '</td>';
                    echo '<td class="actions">';
                    echo '<a href="editarConsulta.php?id=' . $consulta['id'] . '" class="btn btn-sm btn-warning">Editar</a>';
                    echo '<a href="deletarConsulta.php?id=' . $consulta['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Tem certeza?\')">Excluir</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                
            } else {
                echo '<div class="alert alert-info">';
                echo '<p>Nenhuma consulta encontrada.</p>';
                echo '<p><a href="cadastrarConsulta.php" class="btn btn-primary">Cadastrar primeira consulta</a></p>';
                echo '</div>';
            }
            
        } catch(PDOException $e) {
            echo '<div class="alert alert-error">Erro: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
        ?>
    </div>
</body>
</html>
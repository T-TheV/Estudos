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
    <title>Lista de Pacientes</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <div class="container">
        <header class="page-header">
            <h1>Lista de Pacientes</h1>
            <div class="user-info">
                <span>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</span>
                <a href="../../logout.php" class="btn btn-secondary">Sair</a>
            </div>
        </header>
        
        <div class="actions">
            <a href="cadastrarPaciente.php" class="btn btn-primary">Cadastrar Paciente</a>
            <a href="cadastrarProfissional.php" class="btn btn-secondary">Cadastrar Profissional</a>
            <a href="listarConsultas.php" class="btn btn-secondary">Listar Consultas</a>
        </div>
        
        <?php
        if (!$conexao_sucesso || $pdo === null) {
            echo '<div class="alert alert-error">Erro de conexão com banco de dados.</div>';
            exit;
        }
        
        try {
            $sql = "SELECT * FROM pacientes ORDER BY nome ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (count($pacientes) > 0) {
                echo '<div class="alert alert-success">Encontrados ' . count($pacientes) . ' paciente(s)</div>';
                
                echo '<div class="table-container">';
                echo '<table class="table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th><th>Nome</th><th>Cpf</th><th>Data Nasc.</th><th>Ações</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                
                foreach ($pacientes as $paciente) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($paciente['id']) . '</td>';
                    echo '<td>' . htmlspecialchars($paciente['nome']) . '</td>';
                    echo '<td>' . htmlspecialchars($paciente['cpf']) . '</td>';
                    echo '<td>' . date('d/m/Y', strtotime($paciente['data_nascimento'])) . '</td>';
                    // echo '<td>' . date('d/m/Y H:i', strtotime($paciente['data_cadastro'])) . '</td>';
                    echo '<td class="actions">';
                    echo '<a href="editarPaciente.php?id=' . $paciente['id'] . '" class="btn btn-sm btn-warning">✏️ Editar</a>';
                    echo '<a href="deletarPaciente.php?id=' . $paciente['id'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Tem certeza?\')">🗑️ Excluir</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                
                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                
            } else {
                echo '<div class="alert alert-info">';
                echo '<p>Nenhum paciente encontrado.</p>';
                echo '<p><a href="cadastrarPaciente.php" class="btn btn-primary">Cadastrar primeiro paciente</a></p>';
                echo '</div>';
            }
            
        } catch(PDOException $e) {
            echo '<div class="alert alert-error">Erro: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
        ?>
    </div>
</body>
</html>
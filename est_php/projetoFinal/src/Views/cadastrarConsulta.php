<?php
// filepath: c:\xampp\htdocs\estudos\projetoFinal\src\Views\listar_pacientes.php

// ✅ CORRIGIDO: Verificar login primeiro
require_once '../Utils/verificar_login.php';

// ✅ CORRIGIDO: Caminho correto para conexão
require_once '../Utils/Conexao.php';
?>

<?php

// Verifica se a conexão foi estabelecida
if (!$conexao_sucesso || $pdo === null) {
    die("Erro: Não foi possível conectar ao banco de dados. Verifique a conexão.");
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $id_paciente = $_POST['id_paciente'];
    $data_consulta = $_POST['data_consulta'];
    $status = $_POST['status'];
    try {
        // Prepara a consulta SQL
        $stmt = $pdo->prepare("INSERT INTO consultas (id_paciente, data_consulta, status) VALUES (:id_paciente, :data_consulta, :status)");

        // Associa os valores aos placeholders
        $stmt->bindValue(':id_paciente', $id_paciente);
        $stmt->bindValue(':data_consulta', $data_consulta);
        $stmt->bindValue(':status', $status);

        // Executa a consulta
        $stmt->execute();
        
        // Exibe mensagem de sucesso
        echo "<p>Consulta inserida com sucesso!</p>";
        echo "<p>ID da nova consulta: " . $pdo->lastInsertId() . "</p>";

    } catch (PDOException $e) {
        echo "<p>Erro ao inserir consulta: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Consulta</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h1>Cadastro de Consulta</h1>
    <form method="POST" action="">
        <label for="id_paciente">ID Paciente:</label><br>
        <input type="number" id="id_paciente" name="id_paciente" required><br><br>

        <label for="data_consulta">Data da Consulta:</label><br>
        <input type="date" id="data_consulta" name="data_consulta" required><br><br>

        <label for="status">Status:</label><br>
        <select id="status" name="status" required>
            <option value="agendada">Agendada</option>
            <option value="realizada">Realizada</option>
            <option value="cancelada">Cancelada</option>
        </select><br><br>

        <button type="submit">Cadastrar Consulta</button>
    </form>
    <button><a href="listarConsultas.php">Voltar</a></button>
</body>
</html>
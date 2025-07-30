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
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    try {
        // Prepara a consulta SQL
        $stmt = $pdo->prepare("INSERT INTO pacientes (nome, telefone, cpf, data_nascimento) VALUES (:nome, :telefone, :cpf, :data_nasc)");

        // Associa os valores aos placeholders
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':cpf', $cpf);
        $stmt->bindValue(':data_nasc', $data_nascimento);
        $stmt->bindValue(':telefone', $telefone);

        // Executa a consulta
        $stmt->execute();
        
        // Exibe mensagem de sucesso
        echo "<p>Paciente inserido com sucesso!</p>";
        echo "<p>ID do novo paciente: " . $pdo->lastInsertId() . "</p>";
        
    } catch (PDOException $e) {
        echo "<p>Erro ao inserir paciente: " . $e->getMessage() . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Paciente</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h1>Cadastro de Paciente</h1>
    
    <form method="POST" action="">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="cpf">CPF:</label><br>
        <input type="text" id="cpf" name="cpf" required><br><br>

        <label for="telefone">Telefone:</label><br>
        <input type="text" id="telefone" name="telefone" required><br><br>

        <label for="data_nascimento">Data de Nascimento:</label><br>
        <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>
        
        <button type="submit">Cadastrar Paciente</button>
    </form>
    <button><a href="listar_pacientes.php">Voltar</a></button>
</body>
</html>
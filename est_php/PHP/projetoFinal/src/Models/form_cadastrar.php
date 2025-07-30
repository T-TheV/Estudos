<?php
// Inclui o arquivo de conexão
require_once '../Utils/Conexao.php';

// Verifica se a conexão foi estabelecida
if (!$conexao_sucesso || $pdo === null) {
    die("Erro: Não foi possível conectar ao banco de dados. Verifique a conexão.");
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];
    
    try {
        // Prepara a consulta SQL
        $stmt = $pdo->prepare("INSERT INTO pacientes (nome, email, data_nascimento) VALUES (:nome, :email, :data_nasc)");
        
        // Associa os valores aos placeholders
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':data_nasc', $data_nascimento);
        
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
</head>
<body>
    <h1>Cadastro de Paciente</h1>
    
    <form method="POST" action="">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="data_nascimento">Data de Nascimento:</label><br>
        <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>
        
        <button type="submit">Cadastrar Paciente</button>
    </form>
</body>
</html>
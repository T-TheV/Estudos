<?php
require_once 'conexao.php'; // Inclui o arquivo de conexão
// Processa as alterações se for POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($pdo === null) {
        echo '<div class="error">Erro: Não foi possível conectar ao banco de dados.</div>';
        exit;
    }
    
    try {
        // Recebe os dados do formulário
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $data_nascimento = $_POST['data_nascimento'];
        
        // SQL para atualizar
        $sql = "UPDATE pacientes SET nome = :nome, email = :email, data_nascimento = :data_nascimento WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':data_nascimento', $data_nascimento, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            echo '<div class="success">Paciente atualizado com sucesso!</div>';
            echo '<p><a href="listar_pacientes.php">← Voltar à lista</a></p>';
            echo '<p><a href="form_editar.php?id=' . $id . '">← Editar novamente</a></p>';
        } else {
            echo '<div class="error">Erro ao atualizar paciente.</div>';
        }
        
    } catch(PDOException $e) {
        echo '<div class="error">Erro: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
    
    // Para aqui se foi POST
    exit;
}
?>
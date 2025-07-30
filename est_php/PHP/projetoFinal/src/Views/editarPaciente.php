<?php
// filepath: c:\xampp\htdocs\estudos\projetoFinal\src\Views\editarPaciente.php

// ✅ CORRIGIDO: Verificar login primeiro
require_once '../Utils/verificar_login.php';

// ✅ CORRIGIDO: Caminho correto para conexão
require_once '../Utils/Conexao.php';

// Verifica se a conexão foi estabelecida
if (!$conexao_sucesso || $pdo === null) {
    die("Erro: Não foi possível conectar ao banco de dados. Verifique a conexão.");
}

// Processa o formulário se foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    try {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $data_nascimento = $_POST['data_nascimento'];
        $cpf = $_POST['cpf'];

        $sql = "UPDATE pacientes SET nome = :nome, cpf = :cpf, data_nascimento = :data_nascimento WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':cpf', $cpf, PDO::PARAM_STR);
        $stmt->bindValue(':data_nascimento', $data_nascimento, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            echo '<div class="success">Paciente atualizado com sucesso!</div>';
        } else {
            echo '<div class="error">Erro ao atualizar paciente.</div>';
        }
    } catch (PDOException $e) {
        echo '<div class="error">Erro ao atualizar paciente: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Paciente</title>
</head>
<body>

<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        try {
            $sql = "SELECT * FROM pacientes WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            
            // Executa a consulta
            $stmt->execute();
            
            // Obtém o paciente
            $paciente = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($paciente) {
                echo '<div class="success">Paciente encontrado: ' . htmlspecialchars($paciente['nome']) . ' Edite os dados abaixo: ' . '</div>';
                ?>
                <form action="" method="post">
                     <!-- Campo hidden para enviar o ID -->
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($paciente['id']); ?>">
                            
                            <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" 
                                       id="nome" 
                                       name="nome" 
                                       value="<?php echo htmlspecialchars($paciente['nome']); ?>" 
                                       required>
                            </div>
                            
                            <div class="form-group">
                                <label for="cpf">CPF:</label>
                                <input type="text" 
                                       id="cpf" 
                                       name="cpf" 
                                       value="<?php echo htmlspecialchars($paciente['cpf']); ?>" 
                                       required>
                            </div>
                            
                            <div class="form-group">
                                <label for="data_nascimento">Data de Nascimento:</label>
                                <input type="date" 
                                       id="data_nascimento" 
                                       name="data_nascimento" 
                                       value="<?php echo htmlspecialchars($paciente['data_nascimento']); ?>" 
                                       required>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit">Salvar Alterações</button>
                                <a href="listar_pacientes.php">
                                    Cancelar
                                </a>
                            </div>
                        </form>
                        <?php
            } else {
                echo '<div class="error">Paciente não encontrado.</div>';
            }
        } catch (PDOException $e) {
            echo '<div class="error">Erro ao buscar paciente: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    } else {
        // Se não foi passado ID, mostra mensagem explicativa
        echo '<div class="error">';
        echo '<p>ID do paciente não foi fornecido!</p>';
        echo '<p>Para editar um paciente, acesse: <code>editarPaciente.php?id=1</code></p>';
        echo '</div>';
    }
?>

</body>
</html>
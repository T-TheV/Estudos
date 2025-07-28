<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
</head>
<body>
    <form action="form_editar.php" method="get">
        <label for="id">ID do Paciente:</label>
        <input type="text" id="id" name="id" required>
        <button type="submit">Buscar</button>
    </form>
    <?php
    require_once 'conexao.php';
    if ($pdo === null) {
        echo '<div class="error">Erro: Não foi possível conectar ao banco de dados.</div>';
        exit;
    }
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
                echo '<div class="success">Paciente encontrado! Edite os dados abaixo: </div>';
                ?>
                <!-- Formulário de edição com dados preenchidos -->
                        <form action="atualizar_paciente.php" method="POST">
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
                                <label for="email">Email:</label>
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       value="<?php echo htmlspecialchars($paciente['email']); ?>" 
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
        echo '<p>Para editar um paciente, acesse: <code>form_editar.php?id=1</code></p>';
        echo '</div>';
    }
        ?>
</body>
</html>

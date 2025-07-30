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
        $id_paciente = $_POST['id_paciente'];
        $data_consulta = $_POST['data_consulta'];
        $status = $_POST['status'];

        $sql = "UPDATE consultas SET id_paciente = :id_paciente, data_consulta = :data_consulta, status = :status WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':id_paciente', $id_paciente, PDO::PARAM_INT);
        $stmt->bindValue(':data_consulta', $data_consulta, PDO::PARAM_STR);
        $stmt->bindValue(':status', $status, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo '<div class="success">Consulta atualizada com sucesso!</div>';
        } else {
            echo '<div class="error">Erro ao atualizar consulta.</div>';
        }
    } catch (PDOException $e) {
        echo '<div class="error">Erro ao atualizar consulta: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Consulta</title>
</head>
<body>

<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        try {
            $sql = "SELECT * FROM consultas WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            
            // Executa a consulta
            $stmt->execute();
            
            // Obtém o paciente
            $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
            $sqlpaciente = "SELECT * FROM pacientes ORDER BY nome ASC";
            $stmtpaciente = $pdo->prepare($sqlpaciente);
            $stmtpaciente->execute();
            $pacientes = $stmtpaciente->fetchAll(PDO::FETCH_ASSOC);

            foreach ($pacientes as $paciente) {
                if ($consulta['id_paciente'] == $paciente['id']) {
                    $pacienteSelecionado = $paciente;
                    break;
                }
            }
            if ($consulta) {
                //echo '<div class="success">Consulta encontrada: ' . htmlspecialchars($consulta['id']) . ' Edite os dados abaixo: ' . '</div>';
                ?>
                <form action="" method="post">
                     <!-- Campo hidden para enviar o ID -->
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($consulta['id']); ?>">
                            
                            <div class="form-group">
                                <label for="id_consulta">ID Consulta:</label>
                                <input type="number" id="id_consulta" name="id_consulta" value="<?php echo htmlspecialchars($consulta['id']); ?>" readonly > <br><br>
                                <label for="id_paciente">ID Paciente:</label>
                                <input type="number" id="id_paciente" name="id_paciente" value="<?php echo htmlspecialchars($consulta['id_paciente']); ?>" readonly > <br><br>
                                <label for="nome_paciente">Nome Paciente:</label>
                                <input type="text" id="nome_paciente" name="nome_paciente" value="<?php echo htmlspecialchars($pacienteSelecionado['nome']); ?>" readonly > <br><br>
                            
                                <label for="data_consulta">Data da Consulta:</label>
                            <input type="date" id="data_consulta" name="data_consulta"
                            value="<?php echo htmlspecialchars($consulta['data_consulta']); ?>" required><br>

                            <label for="status">Status:</label>
                            <select id="status" name="status" required>
                                <option value="agendada" <?php echo ($consulta['status'] === 'agendada') ? 'selected' : ''; ?>>Agendada</option>
                                <option value="realizada" <?php echo ($consulta['status'] === 'realizada') ? 'selected' : ''; ?>>Realizada</option>
                                <option value="cancelada" <?php echo ($consulta['status'] === 'cancelada') ? 'selected' : ''; ?>>Cancelada</option>
                            </select>
                            <div class="form-group">
                                <button type="submit">Salvar Alterações</button>
                                <a href="listarConsultas.php">
                                    Voltar
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Paciente</title>
</head>
<body>
    <form action="deletar_paciente.php" method="GET">
        <label for="id">ID do Paciente:</label>
        <input type="text" id="id" name="id" required>
        <button type="submit">Deletar</button>
    </form>
    <?php
    require_once 'conexao.php';
    if ($pdo === null) {
        echo '<div class="error">Erro: Não foi possível conectar ao banco de dados.</div>';
        exit;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        try {
            $sql = "DELETE FROM pacientes WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                echo '<div class="success">Paciente deletado com sucesso!</div>';
            } else {
                echo '<div class="error">Erro ao deletar paciente.</div>';
            }
        } catch (PDOException $e) {
            echo '<div class="error">Erro: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    }
    ?>
</body>
</html>
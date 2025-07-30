<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Paciente</title>
</head>
<body>
    <div class='container'>
        <h1>Busca por paciente</h1>
        <?php
        require_once 'conexao.php';

        if ($pdo === null){
            echo '<div class="error">Erro: Não foi possível conectar ao banco de dados.</div>';
            exit;
        }
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
        try{
            $sql = "SELECT * FROM pacientes WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            // Executa a consulta
            $stmt->execute();
            
            // Obtém todos os resultados como array associativo
            $pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($pacientes) > 0) {
                echo '<div class="success">Encontrados ' . count($pacientes) . ' paciente(s) cadastrado(s)</div>';
                
                echo '<table>';
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Nome</th>';
                echo '<th>Email</th>';
                echo '<th>Data de Nascimento</th>';
                echo '<th>Data de Cadastro</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                
                // Loop foreach para exibir cada paciente
                foreach ($pacientes as $paciente) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($paciente['id']) . '</td>';
                    echo '<td>' . htmlspecialchars($paciente['nome']) . '</td>';
                    echo '<td>' . htmlspecialchars($paciente['email']) . '</td>';
                    echo '<td>' . htmlspecialchars($paciente['data_nascimento']) . '</td>';
                    echo '<td>' . htmlspecialchars($paciente['data_cadastro']) . '</td>';
                    echo '</tr>';
                }
                
                echo '</tbody>';
                echo '</table>';
                
            } else {
                echo '<div class="no-data">';
                echo '<p>📋 Nenhum paciente encontrado no banco de dados.</p>';
                echo '<p>Que tal cadastrar o primeiro paciente?</p>';
                echo '</div>';
            }
        }
        catch(PDOException $e) {
            echo '<div class="error">';
            echo 'Erro ao buscar paciente: ' . htmlspecialchars($e->getMessage());
            echo '</div>';
        
        }
        } else {
            echo '<div class="error">ID do paciente não foi fornecido.</div>';
        }
?>

    </div>
</body>
</html>
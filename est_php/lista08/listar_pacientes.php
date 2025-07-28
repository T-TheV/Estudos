<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pacientes</title>
</head>
<body>
    <div class="container">
        <h1>Lista de Pacientes Cadastrados</h1>
        
        <?php
        // Inclui o arquivo de conexão com o banco
        require_once 'conexao.php';
        
        // Verifica se a conexão foi estabelecida
        if ($pdo === null) {
            echo '<div class="error">Erro: Não foi possível conectar ao banco de dados.</div>';
            exit;
        }
        
        try {
            // SQL para buscar todos os pacientes ordenados por nome
            $sql = "SELECT * FROM pacientes ORDER BY nome ASC";
            
            // Prepara a consulta
            $stmt = $pdo->prepare($sql);
            
            // Executa a consulta
            $stmt->execute();
            
            // Obtém todos os resultados como array associativo
            $pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Verifica se existem pacientes cadastrados
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
                    echo '<td>' . '<button><a href="form_editar.php?id=' . $paciente['id'] . '">Editar</a></button>' . '</td>';
                    echo '<td>' . '<button><a href="deletar_paciente.php?id=' . $paciente['id'] . '">Excluir</a></button>' . '</td>';
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
            
        } catch(PDOException $e) {
            echo '<div class="error">';
            echo 'Erro ao buscar pacientes: ' . htmlspecialchars($e->getMessage());
            echo '</div>';
        }
        ?>
        
        <div>
            <a href="form_cadastro.html" class="btn">Cadastrar Novo Paciente</a>
        </div>
    </div>
</body>
</html>
<?php
require_once __DIR__ . '/conexao.php';
require_once __DIR__ . '/Paciente.php'; // Nova classe compatível

class PacienteCRUD {
    private $pdo = null;
    
    public function __construct(PDO $conexao) {
        $this->pdo = $conexao;
    }
    
    public function listarTodos(){
        $sql = "SELECT * FROM pacientes ORDER BY nome ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function buscarPorId($id) {
        $sql = "SELECT * FROM pacientes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function deletar($id) {
        $sql = "DELETE FROM pacientes WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function inserir(Paciente $paciente) {
        $sql = "INSERT INTO pacientes (nome, email, data_nascimento) VALUES (:nome, :email, :data_nascimento)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $paciente->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $paciente->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':data_nascimento', $paciente->getDataNascimento(), PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    public function atualizar(Paciente $paciente, $id) {
        $sql = "UPDATE pacientes SET nome = :nome, email = :email, data_nascimento = :data_nascimento WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $paciente->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $paciente->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':data_nascimento', $paciente->getDataNascimento(), PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

// EXEMPLO DE USO:
if ($conexao_sucesso && $pdo) {
    echo "<h2>Sistema de Gerenciamento de Pacientes</h2>";
    
    try {
        // Criar instância do CRUD
        $pacienteCRUD = new PacienteCRUD($pdo);
        
        // Criar novo paciente
        $novoPaciente = new Paciente(
            'Maria Silva', 
            'maria@email.com', 
            '1985-03-15',
            '123456789'
        );
        
        // Inserir paciente
        if ($pacienteCRUD->inserir($novoPaciente)) {
            echo "Paciente inserido com sucesso!<br><br>";
        }
        
        // Listar todos os pacientes
        echo "<h3>Lista de Pacientes:</h3>";
        $pacientes = $pacienteCRUD->listarTodos();
        
        if (count($pacientes) > 0) {
            echo "<table border='1' cellpadding='10'>";
            echo "<tr><th>ID</th><th>Nome</th><th>Email</th><th>Data Nascimento</th></tr>";
            
            foreach ($pacientes as $p) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($p['id']) . "</td>";
                echo "<td>" . htmlspecialchars($p['nome']) . "</td>";
                echo "<td>" . htmlspecialchars($p['email']) . "</td>";
                echo "<td>" . htmlspecialchars($p['data_nascimento']) . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "<p>Nenhum paciente encontrado.</p>";
        }
        
        // Buscar paciente por ID
        if (count($pacientes) > 0) {
            $primeiroId = $pacientes[0]['id'];
            echo "<h3>Buscar Paciente ID {$primeiroId}:</h3>";
            $pacienteEncontrado = $pacienteCRUD->buscarPorId($primeiroId);
            
            if ($pacienteEncontrado) {
                echo "<p><strong>Nome:</strong> " . htmlspecialchars($pacienteEncontrado['nome']) . "</p>";
                echo "<p><strong>Email:</strong> " . htmlspecialchars($pacienteEncontrado['email']) . "</p>";
            }
        }
        
    } catch (Exception $e) {
        echo "<div style='color: red;'>Erro: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
    
} else {
    echo "<div style='color: red;'>Erro de conexão com banco de dados.</div>";
}
?>
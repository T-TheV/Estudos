<?php
// Definindo as credenciais de conexão com o banco de dados
require_once __DIR__ . '/vendor/autoload.php'; // Carrega o autoloader do Composer

use Dotenv\Dotenv;
// Carrega as variáveis de ambiente do arquivo .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Pega as credenciais das variáveis de ambiente
$servername = $_ENV['DB_HOST'] ?? 'localhost';      // localhost
$username = $_ENV['DB_USER'] ?? 'root';        // root
$password = $_ENV['DB_PASS'] ?? '';        // (vazio)
$dbname = $_ENV['DB_NAME'] ?? 'db_estudos_php';          // db_estudos_php
$charset = $_ENV['DB_CHARSET'] ?? 'utf8mb4';      // utf8mb4

// Variáveis para controlar o resultado da conexão
$conexao_sucesso = false;
$mensagem_erro = '';
$pdo = null;

try {
    // Criando uma nova conexão PDO com MySQL
    // DSN (Data Source Name) especifica o driver, host e nome do banco
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=$charset";
    
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    
    $conexao_sucesso = true;
    
} catch(PDOException $e) {
    // Captura e armazena o erro de conexão
    $mensagem_erro = $e->getMessage();
}
?>

<!-- <!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Conexão - Banco de Dados</title>
</head>
<body>
    <h1>🔗 Teste de Conexão com Banco de Dados</h1>
    
    <?php if ($conexao_sucesso): ?>
        <h3> Conexão estabelecida com sucesso!</h3>
        <p>A conexão com o banco de dados foi realizada sem problemas.</p>
        
        <h4> Informações da Conexão:</h4>
        <table>
            <tr>
                <th>Parâmetro</th>
                <th>Valor</th>
            </tr>
            <tr>
                <td>Servidor</td>
                <td><?php echo htmlspecialchars($servername); ?></td>
            </tr>
            <tr>
                <td>Banco de Dados</td>
                <td><?php echo htmlspecialchars($dbname); ?></td>
            </tr>
            <tr>
                <td>Usuário</td>
                <td><?php echo htmlspecialchars($username); ?></td>
            </tr>
            <tr>
                <td>Charset</td>
                <td><?php echo htmlspecialchars($charset); ?></td>
            </tr>
            <tr>
                <td>Driver PDO</td>
                <td>MySQL</td>
            </tr>
        </table>
        
    <?php else: ?>
        <h3> Falha na conexão!</h3>
        <p>Não foi possível conectar ao banco de dados.</p>
        <p><strong>Erro:</strong> <?php echo htmlspecialchars($mensagem_erro); ?></p>
        
        <h4>🔧 Possíveis soluções:</h4>
        <ul>
            <li>Verifique se o XAMPP está rodando</li>
            <li>Confirme se o MySQL está ativo</li>
            <li>Verifique as credenciais no arquivo .env</li>
            <li>Certifique-se que o banco '<?php echo htmlspecialchars($dbname); ?>' existe</li>
            <li>Verifique as permissões do usuário</li>
        </ul>
    <?php endif; ?>
    
    <h4> Configurações utilizadas:</h4>
    <p><strong>DSN:</strong> <?php echo htmlspecialchars($dsn); ?></p>
    <p><strong>Data/Hora do teste:</strong> <?php echo date('d/m/Y H:i:s'); ?></p>
    
    <button onclick="location.reload()"> Testar Novamente</button>
</body>
</html> -->

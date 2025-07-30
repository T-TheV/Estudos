<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

// Pega as credenciais das variáveis de ambiente
$servername = $_ENV['DB_HOST'] ?? 'localhost';      // localhost
$username = $_ENV['DB_USER'] ?? 'root';               // root
$password = $_ENV['DB_PASS'] ?? '';                    // ''
$dbname = $_ENV['DB_NAME'] ?? 'db_estudos_php';        // db_estudos_php
$charset = $_ENV['DB_CHARSET'] ?? 'utf8mb4';          // utf8mb4

$conexao_sucesso = false;
$mensagem_erro = '';
$pdo = null;

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=$charset", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexao_sucesso = true;
} catch (PDOException $e) {
    $mensagem_erro = 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
}

// Exibe mensagem de erro se a conexão falhar
if (!$conexao_sucesso) {
    echo '<div class="error">Erro: ' . htmlspecialchars($mensagem_erro) . '</div>';
    exit;
}

<?php

require_once 'conexao.php';
$request_method = $_SERVER['REQUEST_METHOD'];

if ($pdo === null) {
    echo '<div class="error">Erro: Não foi possível conectar ao banco de dados.</div>';
    exit;
}

$sql = "SELECT COUNT(*) FROM pacientes";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$count = $stmt->fetchColumn();
if ($count === false) {
    echo '<div class="error">Erro ao contar pacientes.</div>';
} else {
    echo "<div class='success'>Total de pacientes: $count</div>";
}

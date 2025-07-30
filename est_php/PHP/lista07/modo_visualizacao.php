<?php
// Processa a escolha do modo se vier via GET
if (isset($_GET['modo'])) {
    $modo_escolhido = $_GET['modo'];

    // Valida se é um modo válido
    if ($modo_escolhido == 'claro' || $modo_escolhido == 'escuro') {
        // Define cookie que dura 30 dias
        $duracao = time() + (30 * 24 * 60 * 60); // 30 dias em segundos
        setcookie('modo_visualizacao', $modo_escolhido, $duracao, '/');

        // Redireciona para evitar reprocessamento
        header('Location: modo_visualizacao.php');
        exit;
    }
}

// Lê o modo atual do cookie (padrão = claro)
$modo_atual = $_COOKIE['modo_visualizacao'] ?? 'claro';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (isset($_COOKIE['modo_visualizacao'])): ?>
    <div>
        <?php echo htmlspecialchars('Seu modo de visualização preferido é o ' . $_COOKIE['modo_visualizacao']); ?>
    </div>
    <?php endif; ?>
    <a href="?modo=claro">🌞 Modo Claro</a>
    <a href="?modo=escuro">🌙 Modo Escuro</a>
</body>

</html>
<?php
// 1. ✅ Iniciar a sessão
session_start();

// 2. ✅ Verificar se a variável $_SESSION['usuario'] existe
if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
    // 3. ✅ Se existir, exibir mensagem de boas-vindas
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Área Restrita</title>
    </head>
    <body>
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
        <p>Esta é uma área restrita do sistema.</p>
        <a href="logout.php">Sair</a>
    </body>
    </html>
    <?php
} else {
    // 4. ✅ Se não existir, redirecionar para login com mensagem de erro
    header('Location: login.php?erro=acesso_negado');
    exit;
}
?>
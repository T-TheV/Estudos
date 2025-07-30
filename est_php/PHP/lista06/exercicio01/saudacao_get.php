<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saudação</title>
</head>
<body>
    <h1>Página de Saudação</h1>
    
    <?php
    // Verifica se o nome foi enviado via GET
    if (isset($_GET['nome']) && !empty($_GET['nome'])) {
        $nome = $_GET['nome'];
        echo "<h2>Bem-vindo(a), " . htmlspecialchars($nome) . "!</h2>";
    } else {
        echo "<p>Nenhum nome foi informado.</p>";
    }
    ?>
    
    <a href="form_get.php">Voltar ao formulário</a>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saudação</title>
</head>

<body>
    <h1>Página de Saudação</h1>
    <?php
    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = $_POST['nome'];
        echo "<h2>Bem-vindo(a), " . htmlspecialchars($nome) . "!</h2>";
    } else {
        echo "<p>Nenhum nome foi informado.</p>";
    }
    ?>
</body>

</html>
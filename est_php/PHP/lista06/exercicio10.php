<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <label for="usuario">Digite o seu usuário:</label>
        <input type="text" name="usuario" id="usuario" required>
        <br>
        <label for="senha">Digite a sua senha:</label>
        <input type="password" name="senha" id="senha" required>
        <button type="submit">Logar</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['usuario']) && isset($_POST['senha'])) {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {
                echo 'Dados recebidos ' . htmlspecialchars($usuario) . ' e ' . htmlspecialchars($senha);
            } else {
                echo 'Por favor, preencha todos os campos.';
            }
        } else {
            echo 'Erro ao identificar os parâmetros.';
        }
    }
    else{

    }
    ?>
</body>

</html>
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
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            if ($usuario === 'admin' && $senha === '1234') {
                $_SESSION['usuario'] = 'admin';
                header('Location: pagina_restrita.php');
                exit;
            }
        }
    }
    if (isset($_GET['msg']) && $_GET['msg'] == 'desconectado') {
        $sucesso = "Você foi desconectado com sucesso!";
    }


    ?>
        <?php if($sucesso): ?>
        <div>
             <?php echo htmlspecialchars($sucesso); ?>
        </div>
    <?php endif; ?>

</body>

</html>
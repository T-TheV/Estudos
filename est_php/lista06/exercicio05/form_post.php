<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login_post.php" method="post">
        <label for="usuario">Digite o seu usuário:</label>
        <input type="text" name="usuario" id="usuario" required>
        <br>
        <label for="senha">Digite a sua senha:</label>
        <input type="password" name="senha" id="senha" required>
        <button type="submit">Logar</button>
    </form>
</body>
</html>
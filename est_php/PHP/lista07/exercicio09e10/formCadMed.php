<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action="CadMed_post.php" method="post">
        <label for="cadastro">Cadastro de Medicamentos:</label>
        <br>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <br>
        <label for="laboratorio">Laboratório:</label>
        <input type="text" name="laboratorio" id="laboratorio" required>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
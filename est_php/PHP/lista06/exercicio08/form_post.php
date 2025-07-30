<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="cadastro_post.php" method='post'>
        <label for="nome">Digite o seu nome: </label>
        <br>
        <input type="text" name="nome" id="nome">
        <br>
        <label for="sangue">Escolha o seu tipo sanguineo</label>
        <br>
        <select name="tipo_sanguineo" id="tipo_sanguineo">
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O+</option>
        </select>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
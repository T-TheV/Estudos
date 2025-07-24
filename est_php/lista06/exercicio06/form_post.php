<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="inscricao_post.php" method="post">
        <label for="nome">Digite seu nome:</label><br>
        <input type="text" id="nome" name="nome" required><br>
        <label for="interesses">Escolha suas áreas de interesse:</label><br>
        <input type="checkbox" id="nutricao" name="interesses[]" value="Nutrição">
        <label for="nutricao">Nutrição</label>
        <input type='checkbox' id='cardiologia' name='interesses[]' value='Cardiologia'>
        <label for="cardiologia">Cardiologia</label>
        <input type="checkbox" id="fisioterapia" name="interesses[]" value='Fisioterapia'>
        <label for="fisioterapia">Fisioterapia</label>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="agendamento_post.php" method="post">
        <label for="agendamento">Escolha o período da consulta:</label>
        <input type="radio" name="agendamento[]" id="manha" value='Manhã'>
        <label for="manha">Manhã</label>
        <input type="radio" name="agendamento[]" id="tarde" value='Tarde'>
        <label for="tarde">Tarde</label>
        <input type="radio" name="agendamento[]" id="noite" value='Noite'>
        <label for="noite">Noite</label>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>
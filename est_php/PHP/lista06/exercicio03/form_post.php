<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="calculadora_post.php" method="post">
    <label for="calculo">Digite os números:<br></label>
    <input type="number" id="num1" name="num1" required>
    <input type="number" id="num2" name="num2" required>
    <input type="radio" name="operacao" id="operacao" value="soma">
    <label for="soma">Soma</label><br>
    <input type="radio" name="operacao" id="operacao" value="subtracao">
    <label for="subtracao">Subtracao</label><br>
    <input type="radio" name="operacao" id="operacao" value="divisao">
    <label for="divisao">Divisão</label><br>
    <input type="radio" name="operacao" id="operacao" value="multiplicacao">
    <label for="multiplicacao">Multiplicação</label><br>
    <button type="submit">Enviar</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        $nome = $_POST['nome'];
        echo 'O nome digitado foi: ' . $nome;
        if(isset($_POST['tipo_sanguineo']) && !empty($_POST['tipo_sanguineo'])){
            $tipo_sanguineo = $_POST['tipo_sanguineo'];
            echo 'O tipo escolhido foi: ' . $tipo_sanguineo . '.';
        }
    }
    ?>

</body>
</html>
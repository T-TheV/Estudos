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
        echo '<h1>Bem-vindo(a), ' . htmlspecialchars($nome) . '!</h1>';
        if(isset($_POST['interesses']) && !empty($_POST['interesses'])){
            $interesses = $_POST['interesses'];
            echo '<h1>Seus interesses: ' . htmlspecialchars(implode(", ", $interesses)) . '</h1>';
        } else {
            echo '<h1>Nenhum interesse foi informado.</h1>';
        }
    } else {
        echo '<h1>Nenhum nome foi informado.</h1>';
    }
    ?>

</body>
</html>
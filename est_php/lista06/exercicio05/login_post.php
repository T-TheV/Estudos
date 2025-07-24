<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_POST['usuario']) && isset($_POST['senha'])){
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        if (!empty($_POST['usuario']) && !empty($_POST['senha'])){
            echo 'Dados recebidos ' . $usuario . ' e ' . $senha;
        }
        else{
            echo 'Por favor, preencha todos os campos.';
        }
    }
    else{
        echo 'Erro ao identificar os parâmetros.';
    }
    ?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['agendamento']) && !empty($_POST['agendamento'])){
        $periodo = $_POST['agendamento'];
        echo 'O periodo escolhido foi: ' . htmlspecialchars(implode(',' , $periodo)) . '.';
    }
    else{
        echo 'Nenhum período passado.';
    }
    ?>

</body>
</html>
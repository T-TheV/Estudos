<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if(isset($_POST['comentario']) && !empty($_POST['comentario'])){
        $comentario = $_POST['comentario'];
        echo 'echo sem htmlspecialchars' . $comentario . '<br>';
        
        echo 'com' . htmlspecialchars($comentario);
    }
    else{
        echo 'Nenhum comentário passado.';
    }
    ?>


</body>

</html>
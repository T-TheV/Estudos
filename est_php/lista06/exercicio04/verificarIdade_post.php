<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_POST['idade']) && !empty($_POST['idade'])){
       $anoAtual = date('Y');
       $nascimentoUsuario = $_POST['idade'];
        $calculo = $anoAtual - $nascimentoUsuario;
         if($calculo > 18){
            echo "Maior de Idade";
        }
        else{
            echo "Menor de Idade";
        }
    }
    ?>
</body>
</html>
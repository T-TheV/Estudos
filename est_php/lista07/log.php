<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $logTxt = "log.txt";
    $f = fopen($logTxt, "a") or die("Não foi possível abrir este arquivo.");
    $fr = fopen($logTxt, "r") or die("Não foi possível abrir este arquivo.");
    fwrite($f, date('Y-m-d H:i:s') . "\n") or die ("Erro ao escrever no arquivo.");
    $dados = fread($fr, filesize($logTxt)) or die("Erro na leitura.");
    //fclose($f);
    ?>
    <?php if($dados): ?>
        <div>
             <?php echo htmlspecialchars($dados); ?>
        </div>
    <?php endif; ?>
    
    <pre>

    </pre>
</body>
</html>
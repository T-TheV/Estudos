<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $contadorTxt = 'contador.txt';
    function lerArquivo($contadorTxt)
    {
        if (!file_exists($contadorTxt)) {
            $f = fopen($contadorTxt, 'w');
            if ($f) {
                fwrite($f, 0);
                fclose($f);
            }
        }
        if (file_exists($contadorTxt)) {
            $fr = fopen($contadorTxt, 'r');
            if ($fr) {
                $dados = fread($fr, filesize($contadorTxt));
                fclose($fr);
                return (int)$dados;
            } else {
                die("Não foi possível abrir o arquivo.");
            }
        } else {
            die("Arquivo não encontrado.");
        }
    }
    function salvarContador($contadorTxt, $contador)
    {
        $f = fopen($contadorTxt, 'w');
        if ($f) {
            fwrite($f, $contador); // Salva só o número
            fclose($f);
            return true;
        }
        return false;
    }
    $contador = lerArquivo($contadorTxt);

    // 2. Incrementa em 1
    $contador++;

    // 3. Salva o novo valor
    salvarContador($contadorTxt, $contador);
    $sucesso = salvarContador($contadorTxt, $contador);

    if ($sucesso) {
        echo "<h1>Contador de Visitas</h1>";
        echo "<p><strong>Esta página foi visitada $contador vezes.</strong></p>";
    } else {
        echo "Erro ao salvar contador!";
    }

    ?>
</body>

</html>
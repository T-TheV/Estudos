<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>Calculadora</h1>
    <?php
 if (isset($_POST['num1']) && isset($_POST['num2']) && isset($_POST['operacao'])) {
        
        $num1 = (float) $_POST['num1'];
        $num2 = (float) $_POST['num2'];
        $operacao = $_POST['operacao'];
        $resultado = 0;
        $simbolo = '';
        
        // Executa a operação escolhida
        switch ($operacao) {
            case 'soma':
                $resultado = $num1 + $num2;
                $simbolo = '+';
                break;
                
            case 'subtracao':
                $resultado = $num1 - $num2;
                $simbolo = '-';
                break;
                
            case 'multiplicacao':
                $resultado = $num1 * $num2;
                $simbolo = '×';
                break;
                
            case 'divisao':
                if ($num2 != 0) {
                    $resultado = $num1 / $num2;
                    $simbolo = '÷';
                } else {
                    echo "<p>❌ Erro: Divisão por zero não é permitida!</p>";
                    echo "<a href='form_calculadora.php'>Voltar à calculadora</a>";
                    exit;
                }
                break;
                
            default:
                echo "<p>❌ Operação inválida!</p>";
                echo "<a href='form_calculadora.php'>Voltar à calculadora</a>";
                exit;
        }
        
        // Exibe o resultado
        echo "<h2>📊 Resultado:</h2>";
        echo "<p>";
        echo htmlspecialchars($num1) . " $simbolo " . htmlspecialchars($num2) . " = <strong>$resultado</strong>";
        echo "</p>";
        
    } else {
        echo "<p>❌ Dados incompletos. Preencha todos os campos.</p>";
    }
    ?>
</body>
</html>
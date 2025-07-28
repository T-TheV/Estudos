<?php
// filepath: c:\xampp\htdocs\estudos\lista10\exercicio09.php

function dividir($a, $b) {
    if ($b == 0) {
        throw new Exception("Não é possível dividir por zero.");
    }
    return $a / $b;
}

echo "<h2>Testando Divisão com Tratamento de Exceções</h2>";

// TESTE 1: Divisão normal (sem erro)
echo "<h3>Teste 1: Divisão normal</h3>";
try {
    $resultado = dividir(10, 2);
    echo "Sucesso: 10 ÷ 2 = $resultado<br>";
    
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "<br>";
}

// TESTE 2: Divisão por zero (com erro)
echo "<h3>Teste 2: Divisão por zero</h3>";
try {
    $resultado = dividir(10, 0);
    echo "Resultado: $resultado<br>";
    
} catch (Exception $e) {
    echo "Erro capturado: " . $e->getMessage() . "<br>";
}

// TESTE 3: Mais casos
echo "<h3>Teste 3: Múltiplos casos</h3>";
$casos = [
    [20, 4],
    [15, 0], // erro
    [100, 10],
    [7, 0],  // erro
];

foreach ($casos as $index => $caso) {
    [$a, $b] = $caso;
    
    try {
        $resultado = dividir($a, $b);
        echo "Caso " . ($index + 1) . ": $a ÷ $b = $resultado<br>";
        
    } catch (Exception $e) {
        echo "Caso " . ($index + 1) . ": $a ÷ $b → " . $e->getMessage() . "<br>";
    }
}

echo "<br><strong>Programa terminou com sucesso!</strong>";
?>
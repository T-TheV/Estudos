<?php

$numero = 5;
$fat = 1;  // Inicializa com 1 (elemento neutro da multiplicação)

for ($i = 1; $i <= $numero; $i++){
    $fat = $fat * $i;  // Acumula o produto
    
}

echo "O fatorial de $numero é: " . $fat . "\n";
?>
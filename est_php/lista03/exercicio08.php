<?php

$i = 1;
$soma = 0;  // Variável para acumular a soma

while($i <= 100){
    $soma = $soma + $i;  // Adiciona o número atual à soma
    // ou pode usar: $soma += $i;
    $i++;  // Incrementa para o próximo número
}

echo "A soma de todos os números de 1 a 100 é: " . $soma . "\n";
?>
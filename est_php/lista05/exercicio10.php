<?php


function calcularIMC(float $peso, float $altura): float {

    return $peso / ($altura * $altura);
      
}

$imc = calcularIMC(80,1.80);
echo "O IMC é: " . round($imc, 2) . "\n";
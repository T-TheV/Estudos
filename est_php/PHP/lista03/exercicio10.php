<?php

$saldo = 1000;

while($saldo >= 0){
    $compra = rand(50, 150);
    $saldo = $saldo - $compra;
    echo ('O valor da compra foi de: ' . $compra . "O saldo restante é: " . $saldo);
    if($saldo <= 0){
        echo "Saldo acabou";
        break;
    }
}
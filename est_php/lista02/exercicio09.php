<?php

$categoria = "sssss";


switch (true) {
    case $categoria === "eletrônicos":
        $desconto = 0.10; // 10% de desconto
        echo "Desconto de 10% aplicado para eletrônicos.\n";
        break;
    case $categoria === "roupas":
        $desconto = 0.15; // 15% de desconto
        echo "Desconto de 15% aplicado para roupas.\n";
        break;
    case $categoria === "alimentos":
        $desconto = 0.05; // 5% de desconto
        echo "Desconto de 5% aplicado para alimentos.\n";
        break;
    default:
        $desconto = 0; // Sem desconto
        echo "Sem desconto aplicado.\n";
}
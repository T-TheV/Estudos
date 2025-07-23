<?php

$tem_cartao_fidelidade = true;
$fez_compra_grande = true;
$cliente_antigo = false;

switch(true){
    case $tem_cartao_fidelidade && $fez_compra_grande === true || $tem_cartao_fidelidade && $cliente_antigo === true || $cliente_antigo && $fez_compra_grande === true: 
        echo "Frete Grátis";
        break;
    default:
    echo "Frete Normal";
    }
<?php

$numeros = [10, 25, 8, 42, 15, 30];
echo count($numeros) . " números foram informados.\n";

sort($numeros);
echo "Os números foram ordenados com sucesso.<br>";
print_r($numeros);

in_array(42, $numeros) ? 
    print_r("O número 42 foi encontrado na lista.") : 
    print_r("O número 42 não foi encontrado na lista.");
<?php

function calcularMedia($nota1, $nota2) {
    $media = ($nota1 + $nota2) / 2;
    return $media;
}
echo "A média das notas é: " . calcularMedia(8.5, 7.0) . "\n"; // Exemplo de uso da função
?>
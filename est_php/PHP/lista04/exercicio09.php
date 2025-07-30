<?php

$lista_medicamentos = ['Aspirina', 'Dipirona', 'Ibuprofeno'];
$lista_medicamentos[] = 'Paracetamol'; // Adiciona um novo medicamento
//print_r( $lista_medicamentos);

$remove = array_shift($lista_medicamentos); // Remove o primeiro medicamento
print_r($lista_medicamentos);
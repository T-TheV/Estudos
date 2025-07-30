<?php

function ehpar($numero) {
  if ($numero % 2 == 0) {
    return true; // É par
  } else {
    return false; // É ímpar
  } 
}

$numero = 3; // Defina o número que deseja verificar

if (ehpar($numero) == true) {
  echo "O número é par.\n";
} else {
  echo "O número é ímpar.\n";
}
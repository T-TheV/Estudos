<?php

$nota01 = 5.0;
$nota02 = 5.0;

switch (true) {
  case ($nota01 + $nota02) / 2 >= 7:
    echo "Aprovado\n";
    break;
    case ($nota01 + $nota02) / 2 >= 5 && ($nota01 + $nota02) / 2 < 7:
        echo "Recuperação\n";
        break;
    default:
        echo "Reprovado\n";
        break;    
}
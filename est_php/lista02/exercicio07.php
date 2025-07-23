<?php

$idade_pessoa = 30;

if($idade_pessoa >= 0 && $idade_pessoa <= 12) {
    echo "Criança\n";
}
elseif($idade_pessoa >= 13 && $idade_pessoa <= 17) {
    echo "Adolescente\n";   
}
elseif ($idade_pessoa >= 18 && $idade_pessoa <= 59) {
    echo "Adulto\n";
}
elseif ($idade_pessoa >= 60) {
    echo "Idoso\n";
} 
else{
    echo "Idade inválida\n";
}
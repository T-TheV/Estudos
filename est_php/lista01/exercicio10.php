<?php

$temperatura_string = "29.5";

$temperatura_float = (float)$temperatura_string;

echo "A temperatura convertida é: " . $temperatura_float . "°C\n";  // ✅ CORRETO
echo "A temperatura somada a 1.2 é: " . ($temperatura_float + 1.2) . "°C\n";

<?php
// use App\Models\Paciente;
// use App\Utils\Validador;

// Autoload do Composer para carregar as classes automaticamente
require 'vendor/autoload.php';

// ✅ FORMA 1: Usando namespace completo
echo "<h2>Testando com namespace completo:</h2>";
$paciente1 = new App\Models\Paciente("João Silva", 30, "joao@email.com");
$validador1 = new App\Utils\Validador();

// ✅ FORMA 2: Usando use (descomente as linhas)
use App\Models\Paciente;
use App\Utils\Validador;

echo "<h2>Testando com use:</h2>";
$paciente2 = new Paciente("Maria Santos", 25, "maria@email.com");
$validador2 = new Validador();

// ✅ TESTANDO Faker
echo "<h2>Testando Faker:</h2>";
$faker = Faker\Factory::create('pt_BR');

for ($i = 1; $i <= 3; $i++) {
    $nome = $faker->name;
    $idade = $faker->numberBetween(18, 80);
    $email = $faker->email;
    
    echo "<div style='padding: 10px; margin: 5px; background: #f0f0f0; border-radius: 5px;'>";
    echo "<h4>Paciente Faker #{$i}:</h4>";
    
    $pacienteFaker = new Paciente($nome, $idade, $email);
    $pacienteFaker->exibirInfo();
    
    // Validando
    $resultado = $validador2->validarPaciente($nome, $idade, $email);
    if ($resultado === true) {
        echo "Validação: OK<br>";
    } else {
        echo "Erros: " . implode(", ", $resultado) . "<br>";
    }
    echo "</div>";
}

echo "<h2>Testando validações:</h2>";
$testes = [
    ["Nome", 25, "email@teste.com"],
    ["", 25, "email@teste.com"], // Nome inválido
    ["João", -5, "email@teste.com"], // Idade inválida
    ["Maria", 30, "email-inválido"], // Email inválido
];

foreach ($testes as $index => $teste) {
    [$nome, $idade, $email] = $teste;
    echo "<p><strong>Teste " . ($index + 1) . ":</strong> ";
    
    $resultado = $validador2->validarPaciente($nome, $idade, $email);
    if ($resultado === true) {
        echo "Válido";
    } else {
        echo "Erros: " . implode(", ", $resultado);
    }
    echo "</p>";
}
?>

<?php
// filepath: c:\xampp\htdocs\estudos\lista10\exercicio01.php

class Calculadora {
    // Método ESTÁTICO - pertence à classe, não ao objeto
    public static function somar($a, $b) {
        return $a + $b;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Métodos Estáticos - Calculadora</title>
    
</head>
<body>
    <div class="container">
        <h1>Calculadora com Métodos Estáticos</h1>
        
        <h2>Resultados dos cálculos:</h2>
        
        <?php
        // CHAMANDO MÉTODOS ESTÁTICOS - Direto pela classe, sem objeto
        echo '<div class="result">';
        echo '<h3>Soma:</h3>';
        echo '<p><code>Calculadora::somar(10, 25)</code> = <strong>' . Calculadora::somar(10, 25) . '</strong></p>';
        echo '</div>';
        ?>
        
        <div class="example">
            <h3>Como funciona:</h3>
            <p><strong>Método estático:</strong> <code>Calculadora::somar(10, 25)</code></p>
            <p><strong>NÃO precisa:</strong> <code>$calc = new Calculadora(); $calc->somar(10, 25)</code></p>
        </div>
        
        <h2>Comparação: Estático vs Instância</h2>
        
        <div class="comparison">
            <div class="method-type static-method">
                <h4>Método ESTÁTICO</h4>
                <ul>
                    <li>Chama direto pela classe</li>
                    <li>Não precisa criar objeto</li>
                    <li>Usa <code>::</code> (dois pontos)</li>
                    <li>Não acessa <code>$this</code></li>
                    <li>Útil para funções utilitárias</li>
                </ul>
                <p><strong>Exemplo:</strong><br>
                <code>Calculadora::somar(5, 3)</code></p>
            </div>
            
            <div class="method-type instance-method">
                <h4>Método de INSTÂNCIA</h4>
                <ul>
                    <li>Precisa criar objeto primeiro</li>
                    <li>Acessa <code>$this</code></li>
                    <li>Usa <code>-></code> (seta)</li>
                    <li>Pode modificar propriedades</li>
                    <li>Mantém estado do objeto</li>
                </ul>
                <p><strong>Exemplo:</strong><br>
                <code>$calc = new Calculadora();<br>
                $calc->somar(5, 3)</code></p>
            </div>
        </div>
        
        <div class="example">
            <h3>Quando usar métodos estáticos:</h3>
            <ul>
                <li><strong>Calculadoras</strong> - funções matemáticas</li>
                <li><strong>Utilitários</strong> - formatação, validação</li>
                <li><strong>Factory methods</strong> - criar objetos</li>
                <li><strong>Constantes</strong> - valores fixos</li>
                <li><strong>Conversões</strong> - unidades, moedas</li>
            </ul>
        </div>
        
        <div class="example">
            <h3>Exemplos práticos de uso:</h3>
            <pre><code>// Métodos estáticos úteis:
$resultado = Calculadora::somar(10, 25);       // 35
$data = DateHelper::formatarData('2024-01-15'); // 15/01/2024
$valido = Validator::isEmail('test@email.com'); // true
$hash = Security::gerarHash('senha123');       // hash seguro
$moeda = Money::formatarReal(1250.75);         // R$ 1.250,75</code></pre>
        </div>
    </div>
</body>
</html>


<?php
// filepath: c:\xampp\htdocs\estudos\lista10\exercicio02.php

// CLASSE ABSTRATA - não pode ser instanciada
abstract class Funcionario {
    protected $nome; // protected = acessível pelas classes filhas
    
    public function __construct($nome) {
        $this->nome = $nome;
    }
    
    // Método normal (com implementação)
    public function getNome() {
        return $this->nome;
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    // MÉTODO ABSTRATO - OBRIGATÓRIO implementar nas classes filhas
    abstract public function calcularSalario();
    
    // Método normal que pode ser usado por todas as classes filhas
    public function apresentar() {
        return "Olá, eu sou {$this->nome}";
    }
}

// CLASSE FILHA 1: Funcionário CLT
class FuncionarioCLT extends Funcionario {
    private $salarioBase;
    private $horasExtras;
    private $valorHoraExtra;
    
    public function __construct($nome, $salarioBase, $horasExtras = 0, $valorHoraExtra = 15) {
        parent::__construct($nome); // Chama construtor da classe pai
        $this->salarioBase = $salarioBase;
        $this->horasExtras = $horasExtras;
        $this->valorHoraExtra = $valorHoraExtra;
    }
    
    // IMPLEMENTAÇÃO OBRIGATÓRIA do método abstrato
    public function calcularSalario() {
        $salarioTotal = $this->salarioBase + ($this->horasExtras * $this->valorHoraExtra);
        return $salarioTotal;
    }
    
    public function getTipo() {
        return "CLT";
    }
}

// CLASSE FILHA 2: Funcionário PJ (Pessoa Jurídica)
class FuncionarioPJ extends Funcionario {
    private $valorHora;
    private $horasTrabalhadas;
    private $impostos; // percentual de impostos
    
    public function __construct($nome, $valorHora, $horasTrabalhadas, $impostos = 0.15) {
        parent::__construct($nome);
        $this->valorHora = $valorHora;
        $this->horasTrabalhadas = $horasTrabalhadas;
        $this->impostos = $impostos;
    }
    
    // IMPLEMENTAÇÃO OBRIGATÓRIA do método abstrato (lógica diferente)
    public function calcularSalario() {
        $salarioBruto = $this->valorHora * $this->horasTrabalhadas;
        $desconto = $salarioBruto * $this->impostos;
        $salarioLiquido = $salarioBruto - $desconto;
        return $salarioLiquido;
    }
    
    public function getTipo() {
        return "PJ (Pessoa Jurídica)";
    }
    
    public function getSalarioBruto() {
        return $this->valorHora * $this->horasTrabalhadas;
    }
    
    public function getDesconto() {
        return $this->getSalarioBruto() * $this->impostos;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes Abstratas - Sistema de Funcionários</title>
</head>
<body>
    <div class="container">
        <h1>Sistema de Funcionários - Classes Abstratas</h1>
        
        <div class="explanation">
            <h3>Sobre Classes Abstratas:</h3>
            <ul>
                <li><strong>Classe abstrata:</strong> Não pode ser instanciada diretamente</li>
                <li><strong>Método abstrato:</strong> Deve ser implementado pelas classes filhas</li>
                <li><strong>Herança:</strong> Classes filhas herdam propriedades e métodos</li>
                <li><strong>Polimorfismo:</strong> Mesmo método, comportamentos diferentes</li>
            </ul>
        </div>
        
        <h2>Tentando criar instância da classe abstrata:</h2>
        
        <?php
        // TESTE: Tentando instanciar classe abstrata (vai dar erro)
        echo '<div class="error">';
        echo '<h4>Erro esperado:</h4>';
        echo '<p>Tentando executar: <code>new Funcionario("João")</code></p>';
        
        try {
            // $funcionario = new Funcionario("João"); // Descomente para ver o erro
            echo '<p><strong>Resultado:</strong> Se descomentarmos a linha acima, teríamos um erro fatal:</p>';
            echo '<p><em>"Fatal error: Uncaught Error: Cannot instantiate abstract class Funcionario"</em></p>';
        } catch (Error $e) {
            echo '<p><strong>Erro capturado:</strong> ' . $e->getMessage() . '</p>';
        }
        echo '</div>';
        ?>
        
        <h2>Criando instâncias das classes filhas:</h2>
        
        <?php
        // FUNCIONÁRIO CLT
        echo '<div class="success">';
        echo '<h3>Funcionário CLT:</h3>';
        
        $funcionarioCLT = new FuncionarioCLT("Maria Silva", 3000, 10, 20);
        
        echo '<div class="funcionario-card">';
        echo '<h4>Dados do Funcionário:</h4>';
        echo '<p><strong>Nome:</strong> ' . $funcionarioCLT->getNome() . '</p>';
        echo '<p><strong>Tipo:</strong> ' . $funcionarioCLT->getTipo() . '</p>';
        echo '<p><strong>Apresentação:</strong> ' . $funcionarioCLT->apresentar() . '</p>';
        
        echo '<div class="salary-detail">';
        echo '<h5>Cálculo do Salário:</h5>';
        echo '<p>Salário Base: R$ 3.000,00</p>';
        echo '<p>Horas Extras: 10h × R$ 20,00 = R$ 200,00</p>';
        echo '<p><strong>Salário Total: R$ ' . number_format($funcionarioCLT->calcularSalario(), 2, ',', '.') . '</strong></p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        
        // FUNCIONÁRIO PJ
        echo '<div class="success">';
        echo '<h3>Funcionário PJ:</h3>';
        
        $funcionarioPJ = new FuncionarioPJ("Carlos Santos", 50, 160, 0.20);
        
        echo '<div class="funcionario-card">';
        echo '<h4>Dados do Funcionário:</h4>';
        echo '<p><strong>Nome:</strong> ' . $funcionarioPJ->getNome() . '</p>';
        echo '<p><strong>Tipo:</strong> ' . $funcionarioPJ->getTipo() . '</p>';
        echo '<p><strong>Apresentação:</strong> ' . $funcionarioPJ->apresentar() . '</p>';
        
        echo '<div class="salary-detail">';
        echo '<h5>Cálculo do Salário:</h5>';
        echo '<p>Valor por Hora: R$ 50,00</p>';
        echo '<p>Horas Trabalhadas: 160h</p>';
        echo '<p>Salário Bruto: R$ ' . number_format($funcionarioPJ->getSalarioBruto(), 2, ',', '.') . '</p>';
        echo '<p>Desconto (20%): R$ ' . number_format($funcionarioPJ->getDesconto(), 2, ',', '.') . '</p>';
        echo '<p><strong>Salário Líquido: R$ ' . number_format($funcionarioPJ->calcularSalario(), 2, ',', '.') . '</strong></p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        ?>
        
        <h2>🔄 Demonstrando Polimorfismo:</h2>
        
        <?php
        echo '<div class="explanation">';
        echo '<h4>Mesmo método, comportamentos diferentes:</h4>';
        
        // Array com diferentes tipos de funcionários
        $funcionarios = [
            new FuncionarioCLT("Ana Costa", 2500, 5, 25),
            new FuncionarioPJ("Bruno Lima", 75, 120, 0.15),
            new FuncionarioCLT("Diana Rocha", 4000, 0, 0),
            new FuncionarioPJ("Eduardo Ferreira", 60, 140, 0.18)
        ];
        
        echo '<table>';
        echo '<tr">';
        echo '<th>Nome</th><th>Tipo</th><th>Salário</th><th>Método Usado</th>';
        echo '</tr>';
        
        foreach ($funcionarios as $funcionario) {
            echo '<tr>';
            echo '<td>' . $funcionario->getNome() . '</td>';
            echo '<td>' . $funcionario->getTipo() . '</td>';
            echo '<td>R$ ' . number_format($funcionario->calcularSalario(), 2, ',', '.') . '</td>';
            echo '<td><code>calcularSalario()</code></td>';
            echo '</tr>';
        }
        
        echo '</table>';
        echo '<p><em>Observe que todos usam o mesmo método <code>calcularSalario()</code>, mas cada um calcula de forma diferente!</em></p>';
        echo '</div>';
        ?>
        
        <div class="explanation">
            <h3>Resumo dos Conceitos:</h3>
            <ul>
                <li><strong>Classe Abstrata Funcionario:</strong> Não pode ser instanciada</li>
                <li><strong>Método Abstrato calcularSalario():</strong> Deve ser implementado</li>
                <li><strong>FuncionarioCLT:</strong> Calcula salário base + horas extras</li>
                <li><strong>FuncionarioPJ:</strong> Calcula valor/hora × horas - impostos</li>
                <li><strong>Polimorfismo:</strong> Mesmo método, lógicas diferentes</li>
            </ul>
        </div>
    </div>
</body>
</html>
<?php
// filepath: c:\xampp\htdocs\estudos\lista10\exercicio04.php

// ✅ TRAIT - Código reutilizável entre classes
trait Log {
    
    // Método que será compartilhado entre classes
    public function registrarLog($mensagem) {
        $timestamp = date('Y-m-d H:i:s');
        $classe = get_class($this); // Nome da classe que está usando o trait
        echo "[$timestamp] [{$classe}] 📋 LOG: $mensagem<br>";
    }
    
    // Método adicional para logs de erro
    public function registrarErro($erro) {
        $timestamp = date('Y-m-d H:i:s');
        $classe = get_class($this);
        echo "[$timestamp] [{$classe}] ERRO: $erro<br>";
    }
    
    // Método adicional para logs de sucesso
    public function registrarSucesso($sucesso) {
        $timestamp = date('Y-m-d H:i:s');
        $classe = get_class($this);
        echo "[$timestamp] [{$classe}] SUCESSO: $sucesso<br>";
    }
}

// ✅ CLASSE USUARIO - Usa o trait Log
class Usuario {
    // ✅ IMPORTANDO o trait - agora a classe tem os métodos do Log
    use Log;
    
    private $nome;
    private $email;
    
    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
        
        // Usando o método do trait
        $this->registrarLog("Usuário '{$nome}' criado com sucesso");
    }
    
    public function login() {
        $this->registrarSucesso("Usuário '{$this->nome}' fez login");
        return true;
    }
    
    public function logout() {
        $this->registrarLog("Usuário '{$this->nome}' fez logout");
    }
    
    public function alterarEmail($novoEmail) {
        $emailAntigo = $this->email;
        $this->email = $novoEmail;
        $this->registrarLog("Email alterado de '$emailAntigo' para '$novoEmail'");
    }
    
    public function tentarAcaoInvalida() {
        $this->registrarErro("Tentativa de acesso negado para '{$this->nome}'");
    }
    
    // Getters
    public function getNome() {
        return $this->nome;
    }
    
    public function getEmail() {
        return $this->email;
    }
}

// ✅ CLASSE VENDA - Também usa o trait Log (classes não relacionadas!)
class Venda {
    // ✅ IMPORTANDO o mesmo trait - reutilização de código
    use Log;
    
    private $id;
    private $produto;
    private $valor;
    private $cliente;
    
    public function __construct($id, $produto, $valor, $cliente) {
        $this->id = $id;
        $this->produto = $produto;
        $this->valor = $valor;
        $this->cliente = $cliente;
        
        // Usando o método do trait
        $this->registrarLog("Venda #$id criada: $produto para $cliente");
    }
    
    public function confirmarPagamento() {
        $this->registrarSucesso("Pagamento confirmado para venda #{$this->id} - R$ {$this->valor}");
    }
    
    public function cancelarVenda() {
        $this->registrarErro("Venda #{$this->id} foi cancelada");
    }
    
    public function aplicarDesconto($porcentagem) {
        $valorAntigo = $this->valor;
        $desconto = $this->valor * ($porcentagem / 100);
        $this->valor -= $desconto;
        $this->registrarLog("Desconto de {$porcentagem}% aplicado. Valor: R$ {$valorAntigo} → R$ {$this->valor}");
    }
    
    // Getters
    public function getId() {
        return $this->id;
    }
    
    public function getProduto() {
        return $this->produto;
    }
    
    public function getValor() {
        return $this->valor;
    }
}

// ✅ CLASSE ADICIONAL - Produto (demonstra múltiplas classes usando o mesmo trait)
class Produto {
    use Log;
    
    private $nome;
    private $estoque;
    
    public function __construct($nome, $estoque) {
        $this->nome = $nome;
        $this->estoque = $estoque;
        $this->registrarLog("Produto '$nome' cadastrado com estoque de $estoque unidades");
    }
    
    public function adicionarEstoque($quantidade) {
        $this->estoque += $quantidade;
        $this->registrarSucesso("Estoque atualizado: +$quantidade unidades. Total: {$this->estoque}");
    }
    
    public function removerEstoque($quantidade) {
        if ($this->estoque >= $quantidade) {
            $this->estoque -= $quantidade;
            $this->registrarLog("Estoque reduzido: -$quantidade unidades. Restante: {$this->estoque}");
        } else {
            $this->registrarErro("Estoque insuficiente! Tentativa de remover $quantidade, disponível: {$this->estoque}");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traits - Sistema de Log Compartilhado</title>
</head>
<body>
    <div class="container">
        <h1>Sistema de Log com Traits</h1>
        
        <div class="explanation">
            <h3>O que é um TRAIT?</h3>
            <ul>
                <li><strong>Reutilização:</strong> Compartilha código entre classes não relacionadas</li>
                <li><strong>Composição:</strong> Adiciona funcionalidades sem herança</li>
                <li><strong>Flexibilidade:</strong> Uma classe pode usar múltiplos traits</li>
                <li><strong>Não instanciável:</strong> Só existe dentro de classes</li>
                <li><strong>Solução:</strong> Alternativa à herança múltipla</li>
            </ul>
        </div>
        
        <h2>Demonstração com classe Usuario:</h2>
        
        <div class="log-section">
            <?php
            // ✅ TESTANDO CLASSE USUARIO
            echo "<strong>Criando e testando usuário:</strong><br><br>";
            
            $usuario1 = new Usuario("João Silva", "joao@email.com");
            $usuario1->login();
            $usuario1->alterarEmail("joao.silva@empresa.com");
            $usuario1->tentarAcaoInvalida();
            $usuario1->logout();
            
            echo "<br>";
            
            $usuario2 = new Usuario("Maria Santos", "maria@teste.com");
            $usuario2->login();
            $usuario2->registrarLog("Usuário acessou relatório de vendas");
            ?>
        </div>
        
        <h2>Demonstração com classe Venda:</h2>
        
        <div class="log-section">
            <?php
            // ✅ TESTANDO CLASSE VENDA
            echo "<strong>Criando e testando vendas:</strong><br><br>";
            
            $venda1 = new Venda(1001, "Notebook Dell", 2500.00, "João Silva");
            $venda1->aplicarDesconto(10);
            $venda1->confirmarPagamento();
            
            echo "<br>";
            
            $venda2 = new Venda(1002, "Mouse Gamer", 150.00, "Maria Santos");
            $venda2->cancelarVenda();
            
            echo "<br>";
            
            $venda3 = new Venda(1003, "Teclado Mecânico", 300.00, "Carlos Lima");
            $venda3->registrarLog("Cliente solicitou nota fiscal eletrônica");
            $venda3->confirmarPagamento();
            ?>
        </div>
        
        <h2>Demonstração com classe Produto:</h2>
        
        <div class="log-section">
            <?php
            // ✅ TESTANDO CLASSE PRODUTO
            echo "<strong>Criando e testando produtos:</strong><br><br>";
            
            $produto1 = new Produto("Smartphone Samsung", 50);
            $produto1->adicionarEstoque(25);
            $produto1->removerEstoque(10);
            $produto1->removerEstoque(100); // Vai dar erro de estoque insuficiente
            
            echo "<br>";
            
            $produto2 = new Produto("Fone Bluetooth", 30);
            $produto2->registrarLog("Produto em promoção especial");
            ?>
        </div>
        
        <h2>Demonstrando reutilização do trait:</h2>
        
        <div class="trait-demo">
            <h4>Múltiplas classes usando o MESMO código:</h4>
            
            <div class="log-section">
                <?php
                // ✅ DEMONSTRANDO QUE TODAS AS CLASSES USAM O MESMO TRAIT
                echo "<strong>Chamando registrarLog() de diferentes classes:</strong><br><br>";
                
                $objetos = [
                    new Usuario("Admin", "admin@sistema.com"),
                    new Venda(9999, "Teste", 100, "Cliente Teste"),
                    new Produto("Produto Teste", 10)
                ];
                
                foreach ($objetos as $index => $objeto) {
                    $objeto->registrarLog("Mensagem de teste #" . ($index + 1));
                }
                
                echo "<br><strong>💡 Observe que todas as classes têm acesso aos mesmos métodos do trait!</strong><br>";
                ?>
            </div>
        </div>
        
        <h2>📊 Comparação: Trait vs Herança vs Interface</h2>
        
        <div class="comparison">
            <div class="method-type trait-card">
                <h4>🔹 TRAIT</h4>
                <ul style="text-align: left; font-size: 13px;">
                    <li>Reutilização horizontal</li>
                    <li>Múltiplos por classe</li>
                    <li>Tem implementação</li>
                    <li>Não relaciona classes</li>
                    <li>Não instanciável</li>
                </ul>
                <p><strong>Uso:</strong><br>
                <code>use Log;</code></p>
            </div>
            
            <div class="method-type inheritance-card">
                <h4>HERANÇA</h4>
                <ul style="text-align: left; font-size: 13px;">
                    <li>Relacionamento "é um"</li>
                    <li>Só uma classe pai</li>
                    <li>Tem implementação</li>
                    <li>Hierarquia de classes</li>
                    <li>Pode ser instanciável</li>
                </ul>
                <p><strong>Uso:</strong><br>
                <code>extends Classe</code></p>
            </div>
            
            <div class="method-type interface-card">
                <h4>INTERFACE</h4>
                <ul style="text-align: left; font-size: 13px;">
                    <li>Define contratos</li>
                    <li>Múltiplas por classe</li>
                    <li>Sem implementação</li>
                    <li>Padronização</li>
                    <li>Não instanciável</li>
                </ul>
                <p><strong>Uso:</strong><br>
                <code>implements Interface</code></p>
            </div>
        </div>
        
        <div class="explanation">
            <h3>Quando usar Traits:</h3>
            <ul>
                <li><strong>Logging:</strong> Sistema de logs compartilhado</li>
                <li><strong>Autenticação:</strong> Métodos de segurança</li>
                <li><strong>Validação:</strong> Regras de validação comuns</li>
                <li><strong>Utilitários:</strong> Funções auxiliares</li>
                <li><strong>Formatação:</strong> Métodos de apresentação</li>
                <li><strong>Cache:</strong> Funcionalidades de cache</li>
            </ul>
        </div>
        
        <div style="background: #e7f3ff; padding: 20px; border-radius: 8px; margin-top: 30px;">
            <h3>📝 Resumo do exercício:</h3>
            <ol>
                <li><strong>Trait Log:</strong> Define métodos de logging reutilizáveis</li>
                <li><strong>Classes Usuario e Venda:</strong> Não relacionadas, mas ambas usam o trait</li>
                <li><strong>Declaração use Log:</strong> Importa os métodos do trait para as classes</li>
                <li><strong>Reutilização:</strong> Mesmo código funciona em classes diferentes</li>
                <li><strong>Flexibilidade:</strong> Fácil adicionar logging a qualquer classe</li>
            </ol>
        </div>
    </div>
</body>
</html>


<?php
// filepath: c:\xampp\htdocs\estudos\lista10\exercicio03.php

// ✅ INTERFACE - Define um contrato (regras)
interface Notificavel {
    public function enviarNotificacao($mensagem);
}

// ✅ CLASSE EMAIL que IMPLEMENTA a interface
class Email implements Notificavel {
    private $destinatario;
    
    public function __construct($destinatario) {
        $this->destinatario = $destinatario;
    }
    
    // ✅ IMPLEMENTAÇÃO OBRIGATÓRIA do método da interface
    public function enviarNotificacao($mensagem) {
        return "Email enviado para {$this->destinatario}: {$mensagem}";
    }
    
    public function getDestinatario() {
        return $this->destinatario;
    }
}

// ✅ CLASSE SMS que IMPLEMENTA a interface
class SMS implements Notificavel {
    private $numeroTelefone;
    
    public function __construct($numeroTelefone) {
        $this->numeroTelefone = $numeroTelefone;
    }
    
    // ✅ IMPLEMENTAÇÃO OBRIGATÓRIA do método da interface
    public function enviarNotificacao($mensagem) {
        return "SMS enviado para {$this->numeroTelefone}: {$mensagem}";
    }
    
    public function getNumero() {
        return $this->numeroTelefone;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaces - Sistema de Notificações</title>
    
</head>
<body>
    <div class="container">
        <h1>Sistema de Notificações - Interfaces</h1>
        
        <div class="explanation">
            <h3>O que é uma INTERFACE?</h3>
            <ul>
                <li><strong>Contrato:</strong> Define quais métodos uma classe DEVE ter</li>
                <li><strong>Sem implementação:</strong> Só define assinaturas dos métodos</li>
                <li><strong>Implementação obrigatória:</strong> Classes devem implementar TODOS os métodos</li>
                <li><strong>Múltiplas interfaces:</strong> Uma classe pode implementar várias</li>
                <li><strong>Padronização:</strong> Garante que classes tenham os mesmos métodos</li>
            </ul>
        </div>
        
        <h2>Testando notificações individuais:</h2>
        
        <?php
        // ✅ Criando instâncias das classes
        $email = new Email("joao@email.com");
        $sms = new SMS("+55 11 99999-9999");
        
        $mensagem = "Seu pedido foi confirmado!";
        
        echo '<div class="notification-card">';
        echo '<h4>Teste do Email:</h4>';
        echo '<p>' . $email->enviarNotificacao($mensagem) . '</p>';
        echo '</div>';
        
        echo '<div class="notification-card">';
        echo '<h4>📱 Teste do SMS:</h4>';
        echo '<p>' . $sms->enviarNotificacao($mensagem) . '</p>';
        echo '</div>';
        
        ?>
        
        <h2>Demonstrando Polimorfismo com Interface:</h2>
        
        <?php
        echo '<div class="success">';
        echo '<h4>Usando array de objetos que implementam a mesma interface:</h4>';
        
        // Array com diferentes tipos de notificação
        $notificadores = [
            new Email("maria@empresa.com"),
            new SMS("+55 21 88888-8888"),
            new Email("admin@sistema.com")
        ];
        
        $mensagemImportante = "Sistema será atualizado às 02:00h";
        
        echo '<div style="background: #f8f9fa; padding: 15px; border-radius: 5px;">';
        foreach ($notificadores as $index => $notificador) {
            echo '<p><strong>Notificador ' . ($index + 1) . ':</strong> ' . $notificador->enviarNotificacao($mensagemImportante) . '</p>';
        }
        echo '</div>';
        echo '</div>';
        ?>
        
       
        
        <h2>Comparação: Interface vs Classe Abstrata</h2>
        
        <div class="comparison">
            <div class="interface-info">
                <h4>INTERFACE</h4>
                <ul>
                    <li>Define apenas assinaturas</li>
                    <li>Não tem implementação</li>
                    <li>Usa <code>implements</code></li>
                    <li>Pode implementar múltiplas</li>
                    <li>Todos os métodos são públicos</li>
                    <li>Não tem propriedades</li>
                </ul>
                <p><strong>Exemplo:</strong><br>
                <code>class Email implements Notificavel</code></p>
            </div>
            
            <div class="abstract-info">
                <h4>CLASSE ABSTRATA</h4>
                <ul>
                    <li>Pode ter implementação</li>
                    <li>Pode ter métodos abstratos</li>
                    <li>Usa <code>extends</code></li>
                    <li>Só pode herdar uma</li>
                    <li>Métodos podem ser privados</li>
                    <li>Pode ter propriedades</li>
                </ul>
                <p><strong>Exemplo:</strong><br>
                <code>class Email extends Funcionario</code></p>
            </div>
        </div>
        
        <div class="explanation">
            <h3>Quando usar Interface:</h3>
            <ul>
                <li><strong>Contratos:</strong> Garantir que classes tenham métodos específicos</li>
                <li><strong>Polimorfismo:</strong> Tratar objetos diferentes de forma uniforme</li>
                <li><strong>Padrões:</strong> Definir estruturas consistentes</li>
                <li><strong>Modularidade:</strong> Facilitar testes e manutenção</li>
                <li><strong>Design Patterns:</strong> Strategy, Observer, Factory</li>
            </ul>
        </div>
        
        <div style="background: #e7f3ff; padding: 20px; border-radius: 8px; margin-top: 30px;">
            <h3>📝 Resumo do código:</h3>
            <ol>
                <li><strong>Interface Notificavel:</strong> Define contrato com método <code>enviarNotificacao()</code></li>
                <li><strong>Classes Email, SMS, Push:</strong> Implementam a interface cada uma à sua maneira</li>
                <li><strong>Polimorfismo:</strong> Mesma interface, comportamentos diferentes</li>
                <li><strong>Gerenciador:</strong> Trabalha com qualquer classe que implemente a interface</li>
                <li><strong>Flexibilidade:</strong> Fácil adicionar novos tipos de notificação</li>
            </ol>
        </div>
    </div>
</body>
</html>
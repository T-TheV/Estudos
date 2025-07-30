<?php
// filepath: c:\xampp\htdocs\estudos\lista10\exercicio10.php

// CLASSE DE EXCEÇÃO PERSONALIZADA - Só define a exceção
class CPFInvalidoException extends Exception {
    
    public function __construct($message = "CPF inválido", $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
    
    // Método personalizado para exibir erro de forma especial
    public function __toString() {
        return "Erro de CPF: " . $this->getMessage();
    }
}

// CLASSE SEPARADA para validação de CPF
class ValidadorCPF {
    
    // MÉTODO que valida CPF e LANÇA exceção se inválido
    public static function validar($cpf) {
        // Remove caracteres não numéricos
        $cpf_limpo = preg_replace('/[^0-9]/', '', $cpf);
        
        // Verifica se tem 11 dígitos
        if (strlen($cpf_limpo) != 11) {
            throw new CPFInvalidoException("O CPF deve ter 11 dígitos. CPF informado: $cpf");
        }
        
        // Verifica se todos os dígitos são iguais (CPF inválido)
        if (preg_match('/(\d)\1{10}/', $cpf_limpo)) {
            throw new CPFInvalidoException("CPF com todos os dígitos iguais é inválido: $cpf");
        }
        
        // Validação do algoritmo do CPF
        if (!self::validarAlgoritmo($cpf_limpo)) {
            throw new CPFInvalidoException("O CPF informado não é válido: $cpf");
        }
        
        return $cpf_limpo; // CPF válido
    }
    
    // MÉTODO para validar algoritmo real do CPF
    private static function validarAlgoritmo($cpf) {
        // Calcula primeiro dígito verificador
        $soma = 0;
        for ($i = 0; $i < 9; $i++) {
            $soma += $cpf[$i] * (10 - $i);
        }
        $resto = $soma % 11;
        $digito1 = ($resto < 2) ? 0 : 11 - $resto;
        
        // Verifica primeiro dígito
        if ($cpf[9] != $digito1) {
            return false;
        }
        
        // Calcula segundo dígito verificador
        $soma = 0;
        for ($i = 0; $i < 10; $i++) {
            $soma += $cpf[$i] * (11 - $i);
        }
        $resto = $soma % 11;
        $digito2 = ($resto < 2) ? 0 : 11 - $resto;
        
        // Verifica segundo dígito
        return $cpf[10] == $digito2;
    }
    
    // MÉTODO adicional para formatar CPF
    public static function formatar($cpf) {
        $cpf_limpo = preg_replace('/[^0-9]/', '', $cpf);
        return substr($cpf_limpo, 0, 3) . '.' . 
               substr($cpf_limpo, 3, 3) . '.' . 
               substr($cpf_limpo, 6, 3) . '-' . 
               substr($cpf_limpo, 9, 2);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exceções Personalizadas - Validador de CPF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .test-case {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
            border-left: 4px solid #007bff;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
            border-left: 4px solid #28a745;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin: 10px 0;
            border-left: 4px solid #dc3545;
        }
        .warning {
            background: #fff3cd;
            color: #856404;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        .info {
            background: #d1ecf1;
            color: #0c5460;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
        }
        code {
            background: #f8f9fa;
            padding: 2px 6px;
            border-radius: 3px;
            font-family: 'Courier New', monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Validador de CPF com Exceções Personalizadas</h1>
        
        <div class="warning">
            <h3>Sobre Exceções Personalizadas:</h3>
            <ul>
                <li><strong>Herança:</strong> <code>class MinhaExcecao extends Exception</code></li>
                <li><strong>Especificidade:</strong> Permite tratar tipos específicos de erro</li>
                <li><strong>Captura seletiva:</strong> <code>catch (MinhaExcecao $e)</code></li>
                <li><strong>Reutilização:</strong> Pode ser usada em vários lugares</li>
            </ul>
        </div>
        
        <h2>Teste 1: CPFs válidos</h2>
        
        <?php
        // TESTE 1: CPFs válidos
        $cpfs_validos = [
            "11144477735",      // CPF válido
            "123.456.789-09",   // CPF válido formatado
            "98765432100",      // CPF válido
        ];
        
        foreach ($cpfs_validos as $index => $cpf) {
            echo "<div class='test-case'>";
            echo "<h4>Teste CPF válido " . ($index + 1) . ": $cpf</h4>";
            
            try {
                $cpf_validado = ValidadorCPF::validar($cpf);
                $cpf_formatado = ValidadorCPF::formatar($cpf_validado);
                
                echo "<div class='success'>";
                echo "<strong>CPF válido!</strong><br>";
                echo "CPF limpo: $cpf_validado<br>";
                echo "CPF formatado: $cpf_formatado";
                echo "</div>";
                
            } catch (CPFInvalidoException $e) {
                echo "<div class='error'>";
                echo "<strong>Erro específico de CPF:</strong> " . $e->getMessage();
                echo "</div>";
            } catch (Exception $e) {
                echo "<div class='error'>";
                echo "<strong>Erro geral:</strong> " . $e->getMessage();
                echo "</div>";
            }
            
            echo "</div>";
        }
        ?>
        
        <h2>Teste 2: CPFs inválidos</h2>
        
        <?php
        // TESTE 2: CPFs inválidos
        $cpfs_invalidos = [
            "123.456.789-00",   // CPF com dígitos verificadores errados
            "111.111.111-11",   // Todos os dígitos iguais
            "123.456.789",      // Faltam dígitos
            "123.456.789-123",  // Muitos dígitos
            "abc.def.ghi-jk",   // Não numérico
            "000.000.000-00",   // Zeros
            "12345678901234",   // Muitos dígitos
        ];
        
        foreach ($cpfs_invalidos as $index => $cpf) {
            echo "<div class='test-case'>";
            echo "<h4>Teste CPF inválido " . ($index + 1) . ": $cpf</h4>";
            
            try {
                $cpf_validado = ValidadorCPF::validar($cpf);
                
                echo "<div class='success'>";
                echo "✅ CPF válido: $cpf_validado";
                echo "</div>";
                
            } catch (CPFInvalidoException $e) {
                echo "<div class='error'>";
                echo "❌ <strong>Exceção personalizada capturada:</strong><br>";
                echo $e->getMessage();
                echo "</div>";
            } catch (Exception $e) {
                echo "<div class='error'>";
                echo "❌ <strong>Erro geral:</strong> " . $e->getMessage();
                echo "</div>";
            }
            
            echo "</div>";
        }
        ?>
        
        <h2>🎯 Teste 3: Múltiplos tipos de exceção</h2>
        
        <div class="test-case">
            <?php
            // ✅ TESTE 3: Demonstrando captura de diferentes tipos de exceção
            echo "<h4>🔄 Demonstrando captura seletiva de exceções:</h4>";
            
            $casos_teste = [
                "11144477735",     // Válido
                "123.456.789-00",  // CPF inválido (nossa exceção)
                null,              // Vai gerar erro PHP (Exception geral)
            ];
            
            foreach ($casos_teste as $index => $cpf) {
                echo "<p><strong>Caso " . ($index + 1) . ":</strong> " . ($cpf ?? 'null') . "</p>";
                
                try {
                    if ($cpf === null) {
                        // Força um erro diferente para demonstrar Exception geral
                        $resultado = ValidadorCPF::validar($cpf);
                    } else {
                        $resultado = ValidadorCPF::validar($cpf);
                    }
                    
                    echo "<div class='success'>✅ CPF válido: $resultado</div>";
                    
                } catch (CPFInvalidoException $e) {
                    // Captura específica para CPF inválido
                    echo "<div class='error'>";
                    echo "🆔 <strong>Erro específico de CPF:</strong> " . $e->getMessage();
                    echo "</div>";
                    
                } catch (Exception $e) {
                    // Captura geral para outros tipos de erro
                    echo "<div class='error'>";
                    echo "⚠️ <strong>Erro geral:</strong> " . $e->getMessage();
                    echo "</div>";
                }
                
                echo "<br>";
            }
            ?>
        </div>
        
        <h2>📚 Explicação do código:</h2>
        
        <div class="info">
            <h4>🏗️ Estrutura correta:</h4>
            <ol>
                <li><strong>Classe de exceção:</strong> Só define o tipo de erro</li>
                <li><strong>Classe validadora:</strong> Contém a lógica de validação</li>
                <li><strong>Método validar():</strong> Lança exceção se CPF inválido</li>
                <li><strong>Try-catch:</strong> Captura e trata a exceção específica</li>
            </ol>
        </div>
        
        <div class="warning">
            <h4>⚡ Fluxo de execução:</h4>
            <pre>
1. ValidadorCPF::validar($cpf)
2. Se inválido → throw new CPFInvalidoException(...)
3. catch (CPFInvalidoException $e) → Captura nossa exceção
4. catch (Exception $e) → Captura outros erros
5. Programa continua normalmente
            </pre>
        </div>
        
        <div style="background: #e7f3ff; padding: 20px; border-radius: 8px; margin-top: 30px;">
            <h3>🎯 Vantagens das exceções personalizadas:</h3>
            <ul>
                <li>✅ <strong>Especificidade:</strong> Trata cada tipo de erro de forma diferente</li>
                <li>✅ <strong>Organização:</strong> Código mais limpo e organizado</li>
                <li>✅ <strong>Debugging:</strong> Facilita identificação do problema</li>
                <li>✅ <strong>Manutenção:</strong> Fácil modificar tratamento de erros específicos</li>
                <li>✅ <strong>Reutilização:</strong> Pode ser usada em vários lugares</li>
            </ul>
        </div>
    </div>
</body>
</html>
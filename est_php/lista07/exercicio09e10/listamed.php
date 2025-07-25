<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Lista de Medicamentos</h1>
    
    <?php
    // Define o nome do arquivo JSON
    $arquivo = 'medicamento.json';
    
    // Verifica se o arquivo existe
    if (file_exists($arquivo)) {
        
        // Lê o conteúdo do arquivo
        $conteudo = file_get_contents($arquivo);
        
        // Verifica se o arquivo não está vazio
        if (!empty($conteudo)) {
            
            // Converte JSON para array PHP
            $medicamentos = json_decode($conteudo, true);
            
            // Verifica se a conversão foi bem-sucedida
            if ($medicamentos !== null) {
                
                // Exibe cada medicamento
                foreach ($medicamentos as $index => $medicamento) {
                    echo "<h3>Medicamento " . ($index + 1) . "</h3>";
                    echo "<p><strong>Nome:</strong> " . htmlspecialchars($medicamento['nome']) . "</p>";
                    echo "<p><strong>Laboratório:</strong> " . htmlspecialchars($medicamento['laboratorio']) . "</p>";
                    echo "<hr>";
                }
                
            } else {
                echo "<p>Erro: JSON inválido no arquivo.</p>";
            }
            
        } else {
            echo "<p>O arquivo está vazio.</p>";
        }
        
    } else {
        echo "<p>Arquivo medicamento.json não encontrado.</p>";
    }
    ?>

</body>
</html>
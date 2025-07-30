<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Recebe os dados enviados via POST do formulário
    $nome = $_POST['nome'];
    $laboratorio = $_POST['laboratorio'];
    
    // 2. Cria array associativo com os dados do medicamento
    $dados = array(
        'nome' => $nome,
        'laboratorio' => $laboratorio
    );
    
    // 3. Converte array PHP para string JSON (usado apenas para exibição)
    $json_string = json_encode($dados);

    // 4. Define o nome do arquivo onde os dados serão salvos
    $arquivo = 'medicamento.json';

    // Lê registros existentes do arquivo (se existir)
    $registros = []; // Inicializa array vazio
    if (file_exists($arquivo)) { // Verifica se arquivo já existe
        $conteudo = file_get_contents($arquivo); // Lê todo conteúdo do arquivo
        if (!empty($conteudo)) { // Se arquivo não está vazio
            // json_decode: converte JSON para array PHP (true = array associativo)
            // ?: [] = se der erro, usa array vazio como fallback
            $registros = json_decode($conteudo, true) ?: [];
        }
    }

    // Adiciona novo medicamento ao array de registros existentes
    $registros[] = $dados;

    // Salva array completo no arquivo
    // file_put_contents: escreve dados no arquivo (substitui tudo)
    // json_encode: converte array PHP para JSON
    // JSON_PRETTY_PRINT: formata JSON de forma legível
    $salvo = file_put_contents($arquivo, json_encode($registros, JSON_PRETTY_PRINT));
    
    // Verifica se salvamento foi bem-sucedido
    // file_put_contents retorna número de bytes ou false se der erro
    $sucesso = $salvo !== false;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Cadastro</title>
</head>
<body>
    <h1>Resultado do Cadastro</h1>
    
    <?php if ($sucesso): ?>
        <h3>Medicamento cadastrado com sucesso!</h3>
        <h3>Dados cadastrados:</h3>
        <p><strong>Nome:</strong> <?php echo htmlspecialchars($nome); ?></p>
        <p><strong>Laboratório:</strong> <?php echo htmlspecialchars($laboratorio); ?></p>
        <h3>Medicamento salvo no arquivo:</h3>
        <pre><?php echo htmlspecialchars($json_string); ?></pre>
    <?php else: ?>
        <h3>Erro ao salvar o medicamento!</h3>
    <?php endif; ?>
</body>
</html>

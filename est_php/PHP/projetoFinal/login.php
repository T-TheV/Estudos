<?php
// filepath: c:\xampp\htdocs\estudos\projetoFinal\login.php

session_start();

// ✅ INCLUIR APENAS A CONEXÃO (não o verificar_login!)
require_once 'src/Utils/Conexao.php';

// Se já está logado, redireciona
if (isset($_SESSION['usuario'])) {
    header('Location: src/Views/listar_pacientes.php');
    exit;
}

$erro = null;
$sucesso = null;

// Verificar mensagem de logout
if (isset($_GET['msg'])) {
    switch ($_GET['msg']) {
        case 'desconectado':
            $sucesso = "Você foi desconectado com sucesso!";
            break;
        case 'timeout':
            $erro = "Sessão expirou. Faça login novamente.";
            break;
        case 'acesso_negado':
            $erro = "Acesso negado. Faça login para continuar.";
            break;
    }
}

// Processar login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['usuario']) && !empty($_POST['usuario']) && 
        isset($_POST['senha']) && !empty($_POST['senha'])) {
        
        $usuario = trim($_POST['usuario']);
        $senha = trim($_POST['senha']);
        
        try {
            // ✅ BUSCAR USUÁRIO E SENHA HASHEADA
            $stmt = $pdo->prepare("SELECT id, nome, usuario, senha FROM profissionais WHERE usuario = :usuario");
            $stmt->bindValue(':usuario', $usuario, PDO::PARAM_STR);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $profissional = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // ✅ VERIFICAR SENHA COM password_verify()
                if (password_verify($senha, $profissional['senha'])) {
                    // Login bem-sucedido
                    $_SESSION['usuario'] = $profissional['usuario'];
                    $_SESSION['usuario_id'] = $profissional['id'];
                    $_SESSION['usuario_nome'] = $profissional['nome'];
                    $_SESSION['login_time'] = time();
                    
                    header('Location: src/Views/listar_pacientes.php');
                    exit;
                } else {
                    $erro = "Usuário ou senha incorretos!";
                }
            } else {
                $erro = "Usuário ou senha incorretos!";
            }
            
        } catch (PDOException $e) {
            $erro = "Erro no sistema. Tente novamente.";
            // Log do erro real (não mostrar ao usuário)
            error_log("Erro login: " . $e->getMessage());
        }
        
    } else {
        $erro = "Por favor, preencha todos os campos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Pacientes</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .login-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        .login-card h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }
        .form-group input:focus {
            border-color: #667eea;
            outline: none;
        }
        .btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .alert {
            padding: 15px;
            margin: 20px 0;
            border-radius: 8px;
            text-align: center;
        }
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        .back-link a {
            color: #667eea;
            text-decoration: none;
        }
        .demo-credentials {
            background: #e7f3ff;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h1>Login do Sistema</h1>
        
        <?php if ($erro): ?>
            <div class="alert alert-error">
                <?php echo htmlspecialchars($erro); ?>
            </div>
        <?php endif; ?>
        
        <?php if ($sucesso): ?>
            <div class="alert alert-success">
                <?php echo htmlspecialchars($sucesso); ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="usuario">Usuário:</label>
                <input type="text" 
                       id="usuario" 
                       name="usuario" 
                       required
                       autocomplete="username"
                       value="<?php echo isset($_POST['usuario']) ? htmlspecialchars($_POST['usuario']) : ''; ?>"
                       placeholder="Digite seu usuário">
            </div>
            
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" 
                       id="senha" 
                       name="senha" 
                       required
                       autocomplete="current-password"
                       placeholder="Digite sua senha">
            </div>
            
            <button type="submit" class="btn">
                Entrar no Sistema
            </button>
        </form>
        

        
        <div class="back-link">
            <a href="index.php">Voltar ao início</a>
        </div>
    </div>
</body>
</html>

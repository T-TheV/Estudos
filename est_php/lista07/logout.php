<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    // 1. ✅ Destruir a sessão
    session_destroy();
    header('Location: login.php?msg=desconectado');  // ✅ Com mensagem
    exit;
    ?>

</body>
</html>
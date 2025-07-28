<?php
use App\Models\Usuario;
use App\Utils\Validador;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Pacientes e Agendamentos</title>
</head>
<body>
    <form action="Models/usuarios.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Login</button>
    </form>
</body>
</html>
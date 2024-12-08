<?php
session_start();

// Redirigir al dashboard si el usuario ya está autenticado
if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>RL Inventory - Login</title>
</head>
<body>
    <div class="login-container">
        <h1>RL Inventory</h1>
        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <p>
            ¿No tienes cuenta? <a href="registro_usuario.php">Regístrate aquí</a> <br>
            ¿Olvidaste tu contraseña? <a href="recuperar_contraseña.php">Recupérala aquí</a>
        </p>
    </div>
</body>
</html>

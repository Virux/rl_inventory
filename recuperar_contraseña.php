<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>RL Inventory - Recuperar Contraseña</title>
</head>
<body>
    <div class="form-container">
        <h1>Recuperar Contraseña</h1>
        <p>Introduce tu correo electrónico para enviarte un enlace de recuperación.</p>
        <form action="recover-password.php" method="POST">
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <button type="submit">Enviar</button>
        </form>
        <a href="index.php">Volver al inicio de sesión</a>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];

        // Simulación de recuperación de contraseña
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p class='success'>Se ha enviado un enlace de recuperación a: $email</p>";
        } else {
            echo "<p class='error'>Por favor, introduce un correo válido.</p>";
        }
    }
    ?>
</body>
</html>

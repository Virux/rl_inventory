<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="styles.css"> <!-- Ruta del archivo CSS -->
</head>
<body>
    <div class="container">
        <h2>Crear Nuevo Usuario</h2>
        <form action="procesar_usuario.php" method="POST">
            <label for="nombre">Nombre completo:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" required>

            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" placeholder="usuario@correo.com" required>

            <label for="contraseña">Contraseña:</label>
            <input type="password" id="contraseña" name="contraseña" placeholder="Escribe una contraseña" required>

            <label for="rol">Rol de usuario:</label>
            <select id="rol" name="rol" required>
                <option value="admin">Administrador</option>
                <option value="user">Usuario</option>
            </select>

            <div class="buttons">
                <button type="submit" class="btn">Guardar Usuario</button>
                <a href="index.php" class="btn">Regresar</a>
            </div>
        </form>
    </div>
</body>
</html>

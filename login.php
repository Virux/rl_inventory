<?php
require 'vendor/autoload.php'; // Asegúrate de tener PHPSpreadsheet instalado

use PhpOffice\PhpSpreadsheet\IOFactory;

// Verificar si se está enviando el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['Correo'];
    $contraseña = $_POST['Contraseña'];

    $archivo = 'users.xlsx';

    if (file_exists($archivo)) {
        $documento = IOFactory::load($archivo);
        $hoja = $documento->getActiveSheet();

        // Recorrer todas las filas para buscar al usuario
        $encontrado = false;
        $fila = 2; // Comenzamos desde la fila 2 (asumiendo que la primera fila tiene los encabezados)
        
        while ($hoja->getCell('B' . $fila)->getValue() != '') {
            $usuarioCorreo = $hoja->getCell('B' . $fila)->getValue(); // Correo
            $usuarioContraseña = $hoja->getCell('C' . $fila)->getValue(); // Contraseña (encriptada)
            $usuarioNombre = $hoja->getCell('A' . $fila)->getValue(); // Nombre
            $usuarioRol = $hoja->getCell('D' . $fila)->getValue(); // Rol

            // Verificar si el correo coincide
            if ($usuarioCorreo == $correo) {
                // Verificar si la contraseña es correcta
                if (password_verify($contraseña, $usuarioContraseña)) {
                    $encontrado = true;
                    // Redirigir al Dashboard o donde desees
                    header('Location: dashboard.php');
                    exit;
                } else {
                    // Contraseña incorrecta
                    $error = "La contraseña es incorrecta.";
                    break;
                }
            }
            $fila++;
        }

        if (!$encontrado) {
            $error = "Usuario no encontrado.";
        }
    } else {
        $error = "No se pudo encontrar el archivo de usuarios.";
    }
}
?>

<!-- HTML para el formulario de inicio de sesión -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="styles.css"> <!-- Aquí enlazas el CSS -->
</head>
<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <form action="login.php" method="POST">
            <label for="correo">Correo electrónico:</label>
            <input type="email" name="correo" required>
            <br>
            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" required>
            <br>
            <button type="submit">Iniciar sesión</button>
        </form>
        
        <?php
        if (isset($error)) {
            echo "<p class='error'>$error</p>"; // Mostrar el error si hay alguno
        }
        ?>
    </div>
</body>
</html>

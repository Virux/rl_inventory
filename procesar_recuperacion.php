<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Conexión a la base de datos
    $conn = new mysqli('localhost', 'root', '', 'inventario');

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Verificar si el correo existe
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Aquí se enviaría el correo electrónico (simulado)
        echo "Se ha enviado un enlace de recuperación a tu correo electrónico.";
    } else {
        echo "El correo electrónico no está registrado.";
    }

    $stmt->close();
    $conn->close();
}
?>

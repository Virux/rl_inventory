<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>RL Inventory - Dashboard</title>
</head>
<body>
    <div class="dashboard">
        <header>
            <h1>Bienvenido, <?= $_SESSION['user']['name']; ?></h1>
            <a href="logout.php">Cerrar Sesión</a>
        </header>
        <aside>
            <div class="user-info">
                <img src="assets/user-placeholder.png" alt="Foto de usuario" class="profile-pic">
                <h2><?= $_SESSION['user']['name']; ?></h2>
            </div>
            <nav>
                <ul>
                    <li><a href="add-equipment.php">Agregar Equipo</a></li>
                </ul>
            </nav>
        </aside>
        <main>
            <h2>Panel Principal</h2>
            <p>Aquí se pueden gestionar los equipos del inventario.</p>
        </main>
    </div>
</body>
</html>

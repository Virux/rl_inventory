<?php
$host = 'localhost';
$user = 'root';
$password = '123456';
$database = 'inventario';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
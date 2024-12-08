<?php
require 'vendor/autoload.php'; // Asegúrate de tener PHPSpreadsheet instalado

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];

    $archivo = 'users.xlsx';

    if (file_exists($archivo)) {
        $documento = \PhpOffice\PhpSpreadsheet\IOFactory::load($archivo);
        $hoja = $documento->getActiveSheet();
    } else {
        $documento = new Spreadsheet();
        $hoja = $documento->getActiveSheet();
        // Crear encabezados
        $hoja->setCellValue('A1', 'Nombre');
        $hoja->setCellValue('B1', 'Correo');
        $hoja->setCellValue('C1', 'Contraseña');
        $hoja->setCellValue('D1', 'Rol');
    }

    // Agregar datos
    $ultimaFila = $hoja->getHighestRow() + 1;
    $hoja->setCellValue("A{$ultimaFila}", $nombre);
    $hoja->setCellValue("B{$ultimaFila}", $correo);
    $hoja->setCellValue("C{$ultimaFila}", $contraseña);
    $hoja->setCellValue("D{$ultimaFila}", $rol);

    $escritor = new Xlsx($documento);
    $escritor->save($archivo);

    // Mostrar mensaje de éxito y redirigir
    echo "<script>alert('Usuario registrado con éxito');</script>";
    echo "<script>window.location.href='index.php';</script>";
} else {
    echo "Acceso no autorizado.";
}
?>

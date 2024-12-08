<?php
require 'config.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $equipmentName = $_POST['equipment_name'];
    $description = $_POST['description'];
    $date = date('Y-m-d');

    // Cargar el archivo Excel
    $spreadsheet = IOFactory::load(EQUIPOS_FILE);
    $sheet = $spreadsheet->getActiveSheet();

    // Agregar el nuevo equipo
    $highestRow = $sheet->getHighestRow() + 1;
    $sheet->setCellValue('A' . $highestRow, $equipmentName);
    $sheet->setCellValue('B' . $highestRow, $description);
    $sheet->setCellValue('C' . $highestRow, $date);

    // Guardar los cambios
    $writer = new Xlsx($spreadsheet);
    $writer->save(EQUIPOS_FILE);

    echo "Equipo agregado con éxito.";
}
?>

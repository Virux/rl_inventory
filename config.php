<?php
require_once __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Ruta de los archivos Excel
define('USERS_FILE', __DIR__ . '/users.xlsx');
define('EQUIPOS_FILE', __DIR__ . '/equipos.xlsx');
?>

<?php
include 'conexion.php';
include 'funciones.php';

// PARA INSERTRAR DATOS 

$nameDB = 'huerta_db';
$connect = connectDB($nameDB);
if ($connect->connect_error)
    die("Error: " . $connect->connect_error);


$nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS));
$tipo = trim(filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS));
$dias_cosecha = filter_input(INPUT_POST, 'dias', FILTER_VALIDATE_INT);
echo($nombre);
echo('<br>');
echo($tipo);
echo('<br>');

echo($dias_cosecha);

if (!$nombre || !$tipo || !$dias_cosecha) {
    die("Faltan datos en el formulario.");
}

$query = "INSERT INTO cultivos (nombre, tipo, dias_cosecha)
          VALUES ('$nombre', '$tipo', $dias_cosecha)";

$result = $connect->query($query);

if ($result) {
    header("Location: index.php");
    exit;
} else {
    header("Location: error.html");
    exit;
}
?>
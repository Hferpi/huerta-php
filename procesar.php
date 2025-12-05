<?php
include './config/conexion.php';
include './funtions/funciones.php';

// PARA INSERTRAR DATOS 

$nameDB = 'huerta_db';
$connect = connectDB($nameDB);
if ($connect->connect_error)
    die("Error: " . $connect->connect_error);


$nombre = trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS));
$tipo = trim(filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS));
$dias_cosecha = filter_input(INPUT_POST, 'dias', FILTER_VALIDATE_INT);


if (!$nombre || !$tipo || !$dias_cosecha) {
    die("Faltan datos en el formulario.");
}

$query = "INSERT INTO cultivos (nombre, tipo, dias_cosecha)
          VALUES ('$nombre', '$tipo', $dias_cosecha)";

$result = mysqli_prepare($connect, $query);
if ($result) {
    header("Location: index.php");
    exit;
} else {
    header("Location: error.html");
    exit;
}
?>
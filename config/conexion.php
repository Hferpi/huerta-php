<?php

include('config.php');

function connectDB($nameDB){


    global $DB_HOST, $DB_USER, $DB_PASS, $DB_PORT;

    $conexion_bd = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $nameDB, $DB_PORT);

    if (!$conexion_bd) {
        die(" ERROR al conectar con la base de datos '$nameDB': " . mysqli_connect_error());
    }

    return $conexion_bd;
}

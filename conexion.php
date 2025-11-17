<?php 

function connectDB($nameDB){
    $host = '127.0.0.1';
    $user = 'usuarioDB';
    $pass = 'usuarioDB';
    $puerto = 3306;
    $conexion_bd = mysqli_connect($host, $user, $pass, $nameDB, $puerto);

    if (!$conexion_bd) {
        die(" ERROR al conectar con la base de datos '$nameDB': " . mysqli_connect_error());
    }

    return $conexion_bd;

}

?>
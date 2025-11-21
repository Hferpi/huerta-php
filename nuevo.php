

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huerta ecologica</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>🚜 Huerta ecologica 🍅</h1>

        <button class="log-out">LogOut</button>
    </header>

    <section>
        <div class="menu">
            <h4>Menu Principal</h4>
            <hr>
            <div class="routs-menu">

                <a href="index.php"><img src="./source/img/home.svg" alt="home">Home</a>

                <a href="nuevo.php"><img src="./source/img/add.svg" alt="añadir">Añadir</a>


            </div>

        </div>
        <div>
            <div class="encabezado-tabla">
                <h3>Añadir</h3>
            </div>
            <form action="post">
                <div>
                    <span>Nombre:</span>
                    <input type="text" name="nombre" id="nomnbre-furta" placeholder="Nombre fruta">
                </div>
                <div>
                    <span>Tipo de hortaliza / fruta: </span>
                    <select name="tipo" id="tipo-fruta">
                        <option value="hortaliza">Hortaliza</option>
                        <option value="fruta">Fruta</option>
                        <option value="aromatica">Aromatica</option>
                        <option value="legumbre">Legumbre</option>
                        <option value="tuberculo">Tuberculo</option>
                    </select>
                </div>
                <div>
                    <span>Dias para cosecha: </span>
                    <input type="number" name="dias" id="dias-cosecha" placeholder="0" min="1" max="999">
                </div>
                <div>
                    <input type="submit">
                    <input type="reset" value="Limpiar">
                </div>
            </form>
        </div>
    </section>

    <footer>
        <p>© Ejercio practicar PHP, 2CFGM profesora Lorena</p>
    </footer>
</body>

</html>
<?php
include 'conexion.php';
$nameDB = 'huerta_db';
$connect = connectDB($nameDB);
if ($connect->connect_error)
    die("Error: " . $connect->connect_error);
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$dias_cosecha = $_POST['dias'];

$query = "INSERT INTO cultivos (nombre, tipo, dias_cosecha) VALUES ('$nombre', '$tipo', $dias_cosecha)";


$result = $connect->query($query);

?>

<?php
$pass = ('DB_PASS');
echo($pass);
include './config/conexion.php';
include './functions/funciones.php';
$nameDB = 'huerta_db';
$connect = connectDB($nameDB);
if ($connect->connect_error)
    die("Error: " . $connect->connect_error);
$query = "Select id, nombre, tipo, dias_cosecha from cultivos;";


$orderBy = $_GET['order-by'] ?? 'asc';
$queryOrder = 'select * from cultivos order by dias_cosecha ' . $orderBy . ';';

$result = $connect->query($queryOrder);
$totalRows = $result->fetch_row();

?>


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
                <h3>Resultados</h3>
                <form class="ordenar" method="get" action="index.php">
                    <span>Dias de cosecha: </span>
                    <select name="order-by">
                        <option value="asc" <?= ($orderBy === 'asc') ? 'selected' : '' ?>>Asc</option>
                        <option value="desc" <?= ($orderBy === 'desc') ? 'selected' : '' ?>>Desc</option>
                    </select>
                    <button type="submit">Ordenar</button>

                </form>
            </div>
            <?php if ($result && $result->num_rows > 0): ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Dias Cosecha</th>
                        <th>Ciclo Cultivo</th>
                    </tr>
                    <?php while ($r = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?= $r['id'] ?></td>
                            <td><?= $r['nombre'] ?></td>
                            <td><?= $r['tipo'] ?></td>
                            <td><?= $r['dias_cosecha'] ?></td>
                            <td><?= cicloCultivo($r['dias_cosecha']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p>No hay registros.</p>
            <?php endif; ?>
        </div>
    </section>

    <footer>
        <p>© Ejercio practicar PHP, 2CFGM profesora Lorena</p>
    </footer>
</body>

</html>
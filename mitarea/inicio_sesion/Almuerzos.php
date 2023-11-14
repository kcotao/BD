<?php
session_start();
include('conexion.php');
if (!isset($_SESSION['Usuario'])) {
    header("Location: IniciarSesion.php");
    exit();
}
$id = $_SESSION['usuario_id'];
$Usuario= $_SESSION['Usuario'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almuerzos</title>
    <link rel="stylesheet" href="estiloAlmuerzos.css">
</head>
<header>
    <section>
    <h1><?php echo $Usuario ?></h1>
    </section>
    <a href="CerrarSesion.php">Cerrar Sesion</a>
    <a href="Perfil.php">Volver</a>
</header>
<br>
<h1> Aca tienes una lista de todas las recetas disponibles en la USM</h1>
<br>
<body>
    <table>
        <tr>
            <th>Tipo</th>
            <th>Receta</th>
            <th>Tiempo preparacion</th>
            <th>Ver detalle</th>
        </tr>
        <?php

        $Sql = "SELECT tipo, nombre, id_rec, tiempo_prep FROM recetas
        ORDER BY tipo DESC";
        $result = mysqli_query($conexion, $Sql);

        if ($result) {
            // Itera a través de los resultados y muestra los valores
            while ($row = mysqli_fetch_assoc($result)) {
                $nombre_receta = $row['nombre'];
                $tipo = $row['tipo'];
                $tiempo = $row['tiempo_prep'];
                $id_rec = $row['id_rec'];
                ?>
                <tr>
                    <td><?php echo $tipo; ?></td>
                    <td><?php echo $nombre_receta; ?></td>
                    <td><?php echo $tiempo; ?></td>
                    <td>
                        <a href="recetas/<?php echo $nombre_receta?>.php">Ir a pagina</a>    
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "La consulta salió mal";
        }
        ?>
    </table>

    <br>
    <br>
</body>
</html>

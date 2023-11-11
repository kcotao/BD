<?php
session_start();
include('conexion.php');
if (!isset($_SESSION['Usuario'])) {
    header("Location: IniciarSesion.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta name="viewsport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    <title>Almuerzos</title>
</head>
<body>
    <?php

    $Sql = "SELECT nombre_almuerzo, ingredientes FROM almuerzos";
    $result = mysqli_query($conexion, $Sql);
    
    if ($result) {
        // Itera a través de los resultados y muestra los valores
        while ($row = mysqli_fetch_assoc($result)) {
            $nombre_almuerzo = $row['nombre_almuerzo'];
            $ingredientes = $row['ingredientes'];
            
            // Muestra los valores
            echo "Nombre del almuerzo: $nombre_almuerzo<br>";
            echo "Ingredientes: $ingredientes<br><br>";
        }
    } else{
        echo "La consulta salio mal";
    }

    ?>
    <a href="Inicio.php">Volver</a>
</body>
</html>
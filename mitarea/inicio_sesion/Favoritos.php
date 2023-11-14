<?php
session_start();
if (!isset($_SESSION['Usuario'])) {
    header("Location: IniciarSesion.php");
    exit();
}

include("conexion.php");
    $Usuario = $_SESSION['Usuario'];
    $Contraseña = $_SESSION['Contraseña'];
    $Nombre = $_SESSION['Nombre_Completo'];
    $Correo = $_SESSION['Correo'];
    $id = $_SESSION['usuario_id'];
    $Num_almuerzos = $_SESSION['Num_almuerzos'];
    $actual = $_SESSION['ultima_conexion'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta name="viewsport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estiloTabla.css">
    <title>Mi perfil</title>
</head>

<header>
    <section>
    <h1><?php echo $Usuario ?></h1>
    </section>
    <a href="CerrarSesion.php">Cerrar Sesion</a>
    <a href="Perfil.php">Volver</a>
</header>

<body>
<h1>Aca estan tus recetas <span class="star">favoritas</span></h1>
<h2>
    <?php
    $Sql = "SELECT recetas_fav.nombre AS nombre_receta, recetas.*
            FROM recetas
            LEFT JOIN recetas_fav ON recetas.id_rec = recetas_fav.id_rec AND recetas_fav.usuario_id = $id
            WHERE recetas_fav.usuario_id = $id";

    $result = mysqli_query($conexion, $Sql);

    if ($result) {
        // Itera a través de los resultados y muestra los valores
        while ($row = mysqli_fetch_assoc($result)) {
            $nombre_receta = $row['nombre_receta'];
            $tipo = $row['tipo'];
            $tiempo_prep = $row['tiempo_prep'];
            $diabetico = $row['diabetico'];
            $lactosa=$row['int_lactosa'];
            $gluten=$row['gluten_free'];
            $vegano=$row['vegano'];
            $celiacos = $row['celiacos'];
            
            // Agrega más campos según tus necesidades

            ?>
                Tu receta es de tipo <?php echo $tipo; ?>
                : <?php echo $nombre_receta; ?>
                demora <?php echo $tiempo_prep; ?> minutos en preparar
                <br> Pueden comerlo:
                 Diabeticos: <?php echo $diabetico ? 'Sí' : 'No'; ?> /
                 Lactosa free: <?php echo $lactosa ? 'Sí' : 'No'; ?> /
                 Gluten free: <?php echo $gluten ? 'Sí' : 'No'; ?> /
                 Veganos: <?php echo $vegano ? 'Sí' : 'No'; ?> /
                 Celiacos: <?php echo $celiacos ? 'Sí' : 'No'; ?> /
                <!-- Agrega más columnas según tus necesidades -->
                <a href="recetas/<?php echo $nombre_receta ?>.php">Ir a página</a>
                <div class="foto">
                <img src="recetas/imagen/<?php echo $nombre_receta?>.jpg" alt="fotousm">    
                </div>
                <br>
            <?php
        }
    } else {
        echo "La consulta salió mal";
    }
    ?>
</h2>
</body>
</html>
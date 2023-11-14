<?php
session_start();
include('../conexion.php');
$nombre_receta="brownie";
$Usuario=$_SESSION['Usuario'];
if (!isset($_SESSION['Usuario'])) {
    header("Location: IniciarSesion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de receta</title>
    <link rel="stylesheet" href="estilorecetas.css">
    <!-- Puedes incluir aquí tus estilos CSS si es necesario -->
</head>
<header>
    <section>
    <h1><?php echo $Usuario ?></h1>
    </section>
    <a href="CerrarSesion.php">Cerrar Sesion</a>
    <a href="Perfil.php">Volver Perfil</a>
</header>
<body>
<?php

// Consulta para obtener los detalles de la receta
$sql = "SELECT tipo, nombre, tiempo_prep, diabetico, int_lactosa, gluten_free, vegano, celiacos
        FROM recetas
        WHERE nombre = '$nombre_receta'";

$result = mysqli_query($conexion, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $tipo = $row['tipo'];
    $nombre = $row['nombre'];
    $tiempo_prep = $row['tiempo_prep'];
    $diabetico = $row['diabetico'];
    $int_lactosa = $row['int_lactosa'];
    $gluten_free = $row['gluten_free'];
    $vegano = $row['vegano'];
    $celiacos = $row['celiacos'];
    ?>

    <h1><?php echo $nombre; ?></h1>
    <p>Tipo: <?php echo $tipo; ?></p>
    <p>Tiempo de preparación: <?php echo $tiempo_prep; ?> minutos</p>
    <p>Pueden comerlo Diabéticos?: <?php echo $diabetico ? 'Sí' : 'No'; ?></p>
    <p>Pueden comerlo Intolerantes a la lactosa?: <?php echo $int_lactosa ? 'Sí' : 'No'; ?></p>
    <p>Es libre de gluten?: <?php echo $gluten_free ? 'Sí' : 'No'; ?></p>
    <p>Pueden comerlo veganos?: <?php echo $vegano ? 'Sí' : 'No'; ?></p>
    <p>Pueden comerlo celíacos?: <?php echo $celiacos ? 'Sí' : 'No'; ?></p>

    <?php
} else {
    echo "Receta no encontrada.";
}
?>

<h3>Ingredientes:</h3>
<ul>
    <li>1 taza de mantequilla derretida</li>
    <li>2 tazas de azúcar</li>
    <li>1 cucharadita de extracto de vainilla</li>
    <li>4 huevos</li>
    <li>1 taza de harina todo uso</li>
    <li>1/2 taza de cacao en polvo</li>
    <li>1/4 de cucharadita de sal</li>
    <li>1/2 taza de nueces picadas (opcional)</li>
</ul>

<img src="imagen/brownie.jpg"/>

<form method="post" action="agregarFav.php">
    <input type="submit" name="agregar_favoritos" value="Agregar a Favoritos">
</form>
<form method="post" action="eliminarFav.php">
    <input type="submit" name="eliminar_favoritos" value="Eliminar de favoritos">
</form>
<a href="../Almuerzos.php">Volver Almuerzos</a>
</body>
</html>
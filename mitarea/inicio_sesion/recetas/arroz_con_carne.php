<?php
session_start();
include('../conexion.php');
$nombre_receta="arroz_con_carne";
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
    <a href="../Perfil.php">Volver Perfil</a>
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
    <li>1 taza de arroz</li>
    <li>200 g de carne de res (a tu elección)</li>
    <li>1 cebolla picada</li>
    <li>1 lata (400 g) de tomate triturado</li>
    <li>Especias: comino, sal y pimienta al gusto</li>
</ul>
<img src="imagen/arroz_con_carne.jpg"/>

<form method="post" action="agregarFav.php">
    <input type="submit" name="agregar_favoritos" value="Agregar a Favoritos">
</form>
<form method="post" action="eliminarFav.php">
    <input type="submit" name="eliminar_favoritos" value="Eliminar de favoritos">
</form>
<a href="../Almuerzos.php">Volver Almuerzos</a>
</body>
</html>
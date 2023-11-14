<?php
session_start();
include('../conexion.php');
$nombre_receta="completo";
$Usuario=$_SESSION['Usuario'];
if (!isset($_SESSION['Usuario'])) {
    header("Location: IniciarSesion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="estilorecetas.css">
    <title>Detalles de receta</title>
</head>
<header>
    <section>
    <h1><?php echo $Usuario ?></h1>
    </section>
    <a href="CerrarSesion.php">Cerrar Sesion</a>
    <a href="Perfil.php">Volver</a>
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
    <li>1 pan para completo</li>
    <li>1 salchicha</li>
    <li>Tomate picado en cubos o rodajas</li>
    <li>Palta en tiras o puré de palta</li>
    <li>Mayonesa</li>
</ul>

<img src="imagen/completo.jpg"/>

<div class="container">
    <div class="row">

<form action="add_rate.php" method="post">

    <div>
        <h3>Student Rating System</h3>
    </div>

    <div>
        <label>Calificacion</label>
        <span><?php echo $nombre_receta; ?></span>
    </div>
         <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>

    <span class='result'>0</span>
    <input type="hidden" name="rating">

    </div>

<div><input type="submit" name="add"> </div>

</form>
</div>
</div>

<form method="post" action="agregarFav.php">
    <input type="submit" name="agregar_favoritos" value="Agregar a Favoritos">
</form>

<form method="post" action="eliminarFav.php">
    <input type="submit" name="eliminar_favoritos" value="Eliminar de favoritos">
</form>
<a href="../Almuerzos.php">Volver</a>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

</script>

</body>
</html>
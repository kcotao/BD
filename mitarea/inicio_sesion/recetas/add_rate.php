<?php
session_start();
include('../conexion.php');
$Usuario=$_SESSION['Usuario'];
$id = $_SESSION['usuario_id'];
if (!isset($_SESSION['Usuario'])) {
    header("Location: IniciarSesion.php");
    exit();
}

$nombre_archivo_anterior = basename($_SERVER['HTTP_REFERER']);
    
// Extraer el nombre de la receta del nombre del archivo
$nombre_receta = str_replace('.php', '', $nombre_archivo_anterior);

// Extraer la id_rec de tablas
$sql1 = "SELECT id_rec FROM recetas WHERE nombre='$nombre_receta'";
$result = mysqli_query($conexion, $sql1);
$row = mysqli_fetch_assoc($result);
$id_rec = $row['id_rec'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST["rating"];
    echo $rating;

    // Verificar si el usuario ya calificó esta receta
    $verificar_sql = "SELECT * FROM calificaciones WHERE usuario_id = $id AND id_rec = $id_rec";
    $verificar_result = mysqli_query($conexion, $verificar_sql);

    if (mysqli_num_rows($verificar_result) > 0) {
        // Si el usuario ya calificó, podrías optar por actualizar su calificación existente
        $update_sql = "UPDATE calificaciones SET calificacion = '$rating' WHERE usuario_id = $id AND id_rec = $id_rec";
        if (mysqli_query($conexion, $update_sql)) {
            //$sql3="UPDATE recetas
            //SET calificacion = (
            //   SELECT AVG(calificacion)
            //    FROM calificaciones
            //    WHERE calificaciones.id_rec = recetas.id_rec
            //);";
            //mysqli_query($conexion,$sql3);
            echo "hola";
        } else {
            echo "Error al actualizar la calificación: " . mysqli_error($conexion);
        }
    } else {
        // Si el usuario no ha calificado previamente, insertar una nueva calificación
        $insert_sql = "INSERT INTO calificaciones (usuario_id, id_rec, calificacion) VALUES ($id, $id_rec, '$rating')";
        if (mysqli_query($conexion, $insert_sql)) {
            echo "Nueva calificación añadida exitosamente";
        } else {
            echo "Error al insertar nueva calificación: " . mysqli_error($conexion);
        }
    }

    mysqli_close($conexion);
}

header("Location:../almuerzos.php");

?>
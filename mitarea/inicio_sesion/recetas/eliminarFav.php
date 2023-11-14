<?php
session_start();
include('../conexion.php');

if (!isset($_SESSION['Usuario'])) {
    header("Location: IniciarSesion.php");
    exit();
}
$id = $_SESSION['usuario_id'];

// Verificar si se hizo clic en el botón
if (isset($_POST['eliminar_favoritos'])) {
    // Obtener el nombre del archivo anterior
    $nombre_archivo_anterior = basename($_SERVER['HTTP_REFERER']);
    
    // Extraer el nombre de la receta del nombre del archivo
    $nombre_receta = str_replace('.php', '', $nombre_archivo_anterior);
    
    // Extraer la id_rec de tablas
    $sql1 = "SELECT id_rec FROM recetas WHERE nombre='$nombre_receta'";
    $result = mysqli_query($conexion, $sql1);
    $row = mysqli_fetch_assoc($result);
    $id_rec = $row['id_rec'];

    echo $id;
    echo $nombre_receta;
    echo $id_rec;
     //Eliminar la receta de favoritos
    $sql = "DELETE FROM recetas_fav WHERE id_rec = $id_rec AND usuario_id = $id AND nombre = '$nombre_receta'";
    mysqli_query($conexion, $sql);

    echo '<script>alert("Receta eliminada de favoritos");</script>';
    // Redirigir a la página principal o a cualquier otra página
    header("Location: ../Almuerzos.php");
    exit();
}
?>

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
    <a href="Inicio.php">Volver</a>
</header>

<body>
    <h1>
        <?php
        echo "Tu nombre de usuario es: $Usuario <br>";
        echo "Tu contraseña es: $Contraseña <br>";
        echo "Tu nombre completo es: $Nombre <br>";
        echo "Tu correo es: $Correo <br>";
        echo  "Te quedan $Num_almuerzos almuerzos <br>";
        echo "Tu ultima conexion fue: $actual"; 
        ?>
    </h1>
<h2>
<a href="Favoritos.php">Almuerzos Favoritos</a>
<br>
<a href="Actualizar_perfil.php">Actualizar perfil</a>
<br>
<a href="#" onclick="return confirm('¿Estás seguro de que quieres borrar tu cuenta?') ? window.location.href='Eliminar_perfil.php' : null;">Borrar cuenta</a>
<br>
debo hacer que borre los votos y las reseñas de recetas cuando borre una cuenta aun :D
</h2>
</body>
</html>
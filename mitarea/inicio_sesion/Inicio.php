<?php
session_start();
$Usuario = $_SESSION['Usuario'];
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
    <title>Inicio</title>
</head>
<body>
    <h1>
        Pagina principal
    </h1>
    <h2>Bienvenid@ 
    <?php
    echo "$Usuario";
    ?>

    </h2>

    <div class="foto">
        <img src="foto2.png" alt="sakurilla">
    </div>
    
    <a href="Almuerzos.php">Almuerzos</a>
    <a href="Perfil.php">Mi perfil</a>
    <a href="CerrarSesion.php">Cerrar Sesion</a>
</body>
</html>

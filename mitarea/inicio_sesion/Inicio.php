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
        <link rel="stylesheet" href="estiloinicio.css">
    <title>Inicio</title>
</head>
<body>

<header>
    <section>
    <h1>Bienvenid@ <?php echo $Usuario ?></h1>
    </section>
    <a href="CerrarSesion.php">Cerrar Sesion</a>
</header>
    <h1>
        Pagina de Almuerzos de la USM
    </h1>

    <div class="foto">
        <img src="foto2.png" alt="fotousm">
    </div>
    <h2>
    <a href="Almuerzos.php">Almuerzos</a>
    <a href="Perfil.php">Mi perfil</a>
    </h2>
</body>
</html>

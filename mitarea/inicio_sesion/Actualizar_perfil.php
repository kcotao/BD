<?php
session_start();
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
    <title>Actualizar mi perfil</title>
</head>
<body>
    

<form action="actualizar_usuario.php" method="post">  <!-- Actualizar nombre usuario -->
    <h3>
    <label>Actualizar nombre de usuario</label>
    <input type="text" name = "Nuevo_usuario" placeholder = "Ingrese nuevo nombre de usuario">
    <button type="submit">Actualizar Usuario</button>
    </h3>
    </form>

    <form action="actualizar_contraseña.php" method="post">  <!-- Actualizar contraseña -->
    <h3>
    <label>Actualizar contraseña</label>
    <input type="text" name = "Nueva_contraseña" placeholder = "Ingrese nueva contraseña">
    <label for ="">
        <br>
        Repita nueva Contraseña
        </label>
        <input type ="text" placeholder="Repita Contraseña" name="RContraseña">   
        <button type="submit">Actualizar Contraseña</button> 
    </h3>
    </form>
    
    <form action="actualizar_correo.php" method="post">  <!-- Actualizar correo -->
    <h3>
    <label>Actualizar correo</label>
    <input type="text" name = "Nuevo_correo" placeholder = "Ingrese nuevo correo">
    <button type="submit">Actualizar Correo</button>
    </h3>
    </form>

    <a href="Perfil.php">Volver</a>
</body>
</html>
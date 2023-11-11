<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta name="viewsport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    <title>Crear Cuenta</title>
</head>
<body>
    <div class="contenedor">
        <h1><ins>Registrarse</h1></ins>
        <br>
        <form action ="Login/Registrarse.php" method="POST">

        <?php if (isset($_GET['error'])) {  ?>
            <p class="error"><?php echo $_GET['error']?></p>
        <?php } ?>
        <br>
        <?php if (isset($_GET['success'])) {  ?>
            <p class="success"><?php echo $_GET['success']?></p>
        <?php } ?>
        <br>

            <label for ="">
            <i class="fa-solid fa-user"></i>
                Usuario
            </label>
            <input type="text" placeholder="Ingrese Usuario" name="Usuario">

            <label for ="">
            <i class="fa-solid fa-envelope fa-spin fa-spin-reverse"></i>
                Correo
            </label>
            <input type="text" placeholder="Ingrese Correo" name="Correo">

            <label for ="">
            <i class="fa-solid fa-users"></i>
                Nombre Completo
            </label>
            <input type="text" placeholder="Ingrese nombre completo" name="NombreCompleto">
            <label for="">
            <i class="fa-solid fa-key"></i>
                Contraseña
            </label>
            <input type ="password" placeholder="Ingrese Contraseña" name="Contraseña">
            <label for ="">
            <i class="fa-solid fa-key"></i>
                Repita Contraseña
            </label>
            <input type ="password" placeholder="Repita Contraseña" name="RContraseña">

            <input type="submit" class="button" value="Registrarse">

            <a href="Index.php" class= "Boton_Ingresar">
                Ingresar
            </a>
    </div>
</body>
</html>
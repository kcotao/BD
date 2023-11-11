<?php
session_start();
if (!isset($_SESSION['Usuario'])) {
    header("Location: IniciarSesion.php");
    exit();
}
include "conexion.php";

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$Nuevo_correo = validate($_POST['Nuevo_correo']);
$id = $_SESSION['id'];

if (empty($Nuevo_correo)){
    header('Location: Actualizar_perfil.php?error= El nuevo correo es requerido');
    exit();
} else {
    $Sql ="UPDATE usuarios SET Correo = '$Nuevo_correo' Where id ='$id' ";
    $result = mysqli_query($conexion, $Sql);
    header("Location: CerrarSesion.php");
}
?>

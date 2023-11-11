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

$Nuevo_usuario = validate($_POST['Nuevo_usuario']);
$id = $_SESSION['id'];

if (empty($Nuevo_usuario)){
    header('Location: Actualizar_perfil.php?error= El nuevo usuario es requerido');
    exit();
} else {
    $Sql ="UPDATE usuarios SET Usuario = '$Nuevo_usuario' Where id ='$id' ";
    $result = mysqli_query($conexion, $Sql);
    header("Location: CerrarSesion.php");
}
?>

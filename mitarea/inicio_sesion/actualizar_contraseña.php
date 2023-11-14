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

$Nueva_contraseña = validate($_POST['Nueva_contraseña']);
$RContraseña = validate($_POST['RContraseña']);
$id = $_SESSION['usuario_id'];

if (empty($Nueva_contraseña)){
    header("Location: Actualizar_perfil.php?error=La nueva contraseña es requerido");
    exit();
}elseif(empty($RContraseña)){
    header("Location: Actualizar_perfil.php?error=Repetir nueva contraseña es requerido");
    exit();
}elseif($Nueva_contraseña !== $RContraseña){
    header("Location: Actualizar_perfil.php?error=Las contraseñas deben coincidir");
    exit();
} else {
    $Sql ="UPDATE usuarios SET Contraseña = '$Nueva_contraseña' Where usuario_id ='$id' ";
    $result = mysqli_query($conexion, $Sql);
    header("Location: CerrarSesion.php");
}
?>
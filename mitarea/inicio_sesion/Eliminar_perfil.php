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
    
    $id = $_SESSION['usuario_id'];

    $Sql ="DELETE FROM usuarios WHERE usuario_id ='$id' ";
    $result = mysqli_query($conexion, $Sql);
    header("Location: CerrarSesion.php");
    


?>
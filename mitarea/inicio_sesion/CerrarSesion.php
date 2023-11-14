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

    $Sql2 ="UPDATE usuarios SET ultima_conexion = NOW() WHERE usuario_id=" . $_SESSION['usuario_id'];
    mysqli_query($conexion, $Sql2);


    session_unset();
    session_destroy();

    header("Location: Index.php");
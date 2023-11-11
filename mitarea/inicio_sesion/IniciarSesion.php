<?php

    session_start();

    include('conexion.php');

if (isset($_POST['Usuario']) && isset($_POST['Contraseña'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Usuario = validate($_POST['Usuario']);
    $Contraseña = validate($_POST['Contraseña']);

    if (empty($Usuario)){
        header("Location: Index.php?error= El Usuario es requerido");
        exit();
    } elseif (empty($Contraseña)){
        header("Location: Index.php?error= La Contraseña es requerida");
        exit();
    } else {

        $Sql = "SELECT * FROM usuarios WHERE Usuario = '$Usuario' AND Contraseña ='$Contraseña'";
        $result = mysqli_query($conexion, $Sql);


        if (mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);
            if ($row['Usuario']===$Usuario && $row['Contraseña']===$Contraseña){
                $_SESSION['Contraseña'] = $row['Contraseña'];
                $_SESSION['Usuario'] = $row['Usuario'];
                $_SESSION['Correo'] = $row['Correo'];
                $_SESSION['Nombre_Completo'] = $row['Nombre_Completo'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['Num_almuerzos']=$row['Num_almuerzos'];
                $_SESSION['ultima_conexion']=$row['ultima_conexion'];
                header("Location: Inicio.php");
                exit();
            } else {
                header('Location: Index.php?error=El usuario o la contraseña son incorrectas 1');
                exit();
            }
        } else {
            header('Location: Index.php?error=El usuario o la contraseña son incorrectas 2');
            exit();
        }
    }
} else {
    header('Location: Index.php');
    exit();
}
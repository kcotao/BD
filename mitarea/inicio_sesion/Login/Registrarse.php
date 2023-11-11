<?php

    session_start();

    include_once("../Config/conexion.php");
    if(isset($_POST['Usuario']) && isset($_POST['NombreCompleto']) && isset($_POST['Correo']) && isset($_POST['Contraseña']) && isset($_POST['RContraseña'])){
        function validar($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }

        $usuario = validar($_POST['Usuario']);
        $nombrecompleto = validar($_POST['NombreCompleto']);
        $Correo = validar($_POST['Correo']);
        $Contraseña = validar($_POST['Contraseña']);
        $RContraseña = validar($_POST['RContraseña']);

        $datosUsuario= 'Usuario=' . $usuario . '&NombreCompleto=' . $nombrecompleto;

        if (empty($usuario)){
            header("location: ../Registrarse.php?error=El usuario es requerido&$datosUsuario");
            exit();
        } elseif(empty($nombrecompleto)){
            header("location: ../Registrarse.php?error=El nombre completo es requerido&$datosUsuario");
            exit();
        }elseif(empty($Correo)){
            header("location: ../Registrarse.php?error=El correo es requerido&$datosUsuario");
            exit();
        } elseif(empty($Contraseña)){
            header("location: ../Registrarse.php?error=La contraseña es requerido&$datosUsuario");
            exit();
        }elseif(empty($RContraseña)){
            header("location: ../Registrarse.php?error=Repetir la clave es requerido&$datosUsuario");
            exit();
        } elseif($Contraseña !== $RContraseña){
            header("location: ../Registrarse.php?error=La clave no coincide&$datosUsuario");
            exit();
        }else{


            $sql = "SELECT * FROM usuarios WHERE Usuario = '$usuario'";
            $query = $conexion->query($sql);

            if (mysqli_num_rows($query) > 0){
                header("location: ../Registrarse.php?error='El usuario ya existe!'");
                exit();
            } else{
                $sql2= "INSERT INTO usuarios(Nombre_Completo, Usuario, Contraseña, Correo) VALUES ('$nombrecompleto','$usuario','$Contraseña','$Correo')";
                $query2 = $conexion->query($sql2);
                if ($query){
                    header("location: ../Registrarse.php?success='Usuario creado con éxito :D '");
                    exit();
                } else{
                    header("location: ../Registrarse.php?error='Ocurrió un error'");
                }
            }
        }
    } else{
        header('location: ../Registrarse.php');
        exit();
    }
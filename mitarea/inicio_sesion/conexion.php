<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "tarea2";

    $conexion = mysqli_connect($host, $user, $pass, $db);

    if (!$conexion) {
        echo "conexion fallida";
    }
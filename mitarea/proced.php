<?php
$server= "localhost";
$username = "root";
$password = "";
$database = "tarea2";

try{
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('Connection Failed: ' . $e ->getMessage());
}


?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <title>Ejemplo de procedimientos</title>
  </head>
  <body>  

  <h1>Este es el resultado de tu procedimiento!</h1>
<h3>Este es un vinculo a otro archivo .php</h3>
<a href="ejemplo.php">Primer ejemplo</a>
  
  </body>
</html>
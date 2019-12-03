<?php
    $server = "localhost";
    $usuario = "root";
    $contra = "";
    $database = "pappweb";
    try{
        $conexion = new PDO("mysql:host=$server;dbname=$database", $usuario, $contra);
    } catch (PDOExeption $e){
     die('Connection Failed: '. $e->getMessage());
    }

?>

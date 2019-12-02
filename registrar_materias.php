<?php

// php de conexion
include 'conexion.php';

//variables
$nombre = $_POST["nombre"];
$profesor = $_POST["profesor"];
$enlaces = $_POST["enlaces"];
$temas = $_POST["temas"];
$subtemas = $_POST["subtemas"];
$imagen = addslashes(file_get_contents($_FILES["imagen"]['tmp_name']));

//consulta de insercion
$insertar = "INSERT INTO materias(nombre,profesor,enlaces,temas,subtemas,imagen) VALUES ('$id','$password','$nombre','$edad','$semestre','$imagen')";

//verificea el exito del registro
$resultado = mysqli_query($conexion, $insertar);
if(!$resultado){
    echo 'Error en el registro';
}

else{
   echo' <script>
    alert("Registro exitoso");
    window.history.go(-1);
    </script>';
    exit;
}

//termina la conexion
mysqli_close($conexion);
?>

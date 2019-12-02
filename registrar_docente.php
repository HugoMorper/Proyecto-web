<?php

// php de conexion
include 'conexion.php';

//variables
$id = $_POST["id"];
$password = $_POST["password"];
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$grado = $_POST["grado"];
$especialidad = $_POST["especialidad"];
$imagen = addslashes(file_get_contents($_FILES["imagen"]['tmp_name']));

//consulta de insercion
$insertar = "INSERT INTO docentes(id,password,nombre,edad,grado,especialidad,imagen) VALUES ('$id','$password','$nombre','$edad','$grado','$especialidad','$imagen')";

//verifica la existencia de id y nombre en la base de datos
$verifica_nombre = mysqli_query($conexion, "SELECT * FROM alumnos WHERE Nombre = '$nombre'");
if(mysqli_num_rows($verifica_nombre)>0)
{
    echo' <script>
    alert("El usuario ya está registrado");
    window.history.go(-1);
    </script>';
    exit;
}

$verifica_id = mysqli_query($conexion, "SELECT * FROM alumnos WHERE ID = '$id'");
if(mysqli_num_rows($verifica_id)>0)
{
    echo' <script>
    alert("El usuario ya está registrado");
    window.history.go(-1);
    </script>';
    exit;
}

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

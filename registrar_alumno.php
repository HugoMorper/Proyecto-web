<?php

// php de conexion
include 'conexion.php';

//variables
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$semestre = $_POST["semestre"];
$password = $_POST["password"];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

//consulta de insercion
$insertar = "INSERT INTO alumnos(id,nombre,edad,semestre,password,imagen) VALUES ('$id','$nombre','$edad','$semestre','$password','$imagen')";

//verifica la existencia de id y nombre en la base de datos
$verifica_nombre = mysqli_query($conexion, "SELECT * FROM alumnos WHERE nombre = '$nombre'");
if(mysqli_num_rows($verifica_nombre)>0)
{
    echo' <script>
    alert("El usuario ya está registrado");
    window.history.go(-1);
    </script>';
    exit;
}

$verifica_id = mysqli_query($conexion, "SELECT * FROM alumnos WHERE id = '$id'");
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


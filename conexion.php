<?php
$conexion = mysqli_connect("localhost","root","","pappweb");
 if($conexion){
     echo "Conexion exitosa";
 }
else{
    echo " Error en la conexion";
}
?>

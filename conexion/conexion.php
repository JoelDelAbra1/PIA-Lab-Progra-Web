<?php


//Se realiza la conexion a la BD y se guarda en la variable $conexion
$conexion = mysqli_connect("localhost", "root", "e5CHUQFKJJ", "centromedicoweb");


//Si no se conecta correctamente se sale la conexion
if(!$conexion){
    die(mysqli_error($conexion));
}
?>

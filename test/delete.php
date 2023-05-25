<?php

// Se incluye el archivo que contiene la conexion a la DB
include '../conexion/conexion.php';

// Se verefica que se tenga el valor de ID
if(isset($_POST['idSend'])){
    // Se guarda el valor obtenido
    $id_test=$_POST['idSend'];

    // Consulta SQL
    $sql="DELETE FROM test where id_test = $id_test";

    //Se ejecuta la consulta
    $result=mysqli_query($conexion,$sql);
}

?>
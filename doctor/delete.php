<?php

// Se incluye el archivo que contiene la conexion a la DB
include '../conexion/conexion.php';

// Se verefica que se tenga el valor de ID
if(isset($_POST['idSend'])){
    // Se guarda el valor obtenido
    $id_doc=$_POST['idSend'];

    // Consulta SQL
    $sql="DELETE FROM doctor where id_doc = $id_doc";

    //Se ejecuta la consulta
    $result=mysqli_query($conexion,$sql);
}

?>
<?php

// Se incluye la conexion a la DB
include '../conexion/conexion.php';

// Se extren los datos
extract($_POST);

// Se comprueba que si se tengan los datos


    // Se crea la consulta SQL y se guarda
    $sql = "INSERT INTO doctor (id_doc, id_cons, id_esp, traye_doc) 
    VALUES ( '$docSend' ,'$consSend', '$especialidadSend', '$trayectoriaSend')";

    //Se ejecuta la consulta
    $result=mysqli_query($conexion, $sql);


?>
<?php

// Se incluye la conexion a la DB
include '../conexion/conexion.php';

// Se extren los datos
extract($_POST);

// Se comprueba que si se tengan los datos


    // Se crea la consulta SQL y se guarda
    $sql = "INSERT INTO cita(id_doc, id_usr, fecha_cita) 
    VALUES ('$docSend', '$usrSend', '$fechaHoraSend')";

    echo $sql ;
    //Se ejecuta la consulta
    $result=mysqli_query($conexion, $sql);


?>
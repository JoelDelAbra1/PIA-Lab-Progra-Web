<?php

// Se incluye la conexion a la DB
include '../conexion/conexion.php';

// Se extren los datos
extract($_POST);

// Se comprueba que si se tengan los datos
if (
    isset($_POST['nomSend'])
) {

    // Se crea la consulta SQL y se guarda
    $sql = "INSERT INTO test(nom_test) 
    VALUES ('$nomSend')";

    //Se ejecuta la consulta
    $result=mysqli_query($conexion, $sql);
}

?>
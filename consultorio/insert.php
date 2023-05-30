<?php

// Se incluye la conexion a la DB
include '../conexion/conexion.php';

// Se extren los datos
extract($_POST);

// Se comprueba que si se tengan los datos
if (
    isset($_POST['numSend']) && isset($_POST['ubiSend'])
) {

    // Se crea la consulta SQL y se guarda
    $sql = "INSERT INTO consultorio(num_cons, ubi_cons) 
    VALUES ('$numSend', '$ubiSend')";

    //Se ejecuta la consulta
    $result=mysqli_query($conexion, $sql);
    if (!$result) {
        // Si hay un error en la ejecución de la consulta, devuelve una respuesta JSON con el error
        echo json_encode(['error' => true]);
    } else {
        // Si la consulta se ejecuta correctamente, devuelve una respuesta JSON sin errores
        echo json_encode(['error' => false]);
    }
}

?>
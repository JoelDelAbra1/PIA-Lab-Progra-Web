<?php

// Se incluye la conexion a la DB
include '../conexion/conexion.php';

// Se extren los datos
extract($_POST);

// Se comprueba que si se tengan los datos
if (
    isset($_POST['tipoSend']) && isset($_POST['nombreSend'])
    && isset($_POST['apellidoSend']) && isset($_POST['coloniaSend'])
    && isset($_POST['calleSend'])
    && isset($_POST['telefonoSend']) && isset($_POST['nacimientoSend'])
    && isset($_POST['generoSend'])
    && isset($_POST['emailSend']) && isset($_POST['contraSend'])
) {

    // Se crea la consulta SQL y se guarda
    $sql = "INSERT INTO users(id_tipo, nom_usr, ape_usr, colonia_usr, calle_usr, tel_usr, nac_usr, gen_usr, email_usr, pass_usr) 
    VALUES ('$tipoSend', '$nombreSend', '$apellidoSend','$coloniaSend', '$calleSend', '$telefonoSend', '$nacimientoSend', '$generoSend', '$emailSend', '$contraSend')";

    //Se ejecuta la consulta
    $result=mysqli_query($conexion, $sql);
}

?>
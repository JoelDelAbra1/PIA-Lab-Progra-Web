<?php

include '../conexion/conexion.php';

if(isset($_POST['idSend'])){
    $id_usr=$_POST['idSend'];

    $sql="DELETE FROM users where id_usr=$id_usr";
    $result=mysqli_query($conexion,$sql);
}

?>
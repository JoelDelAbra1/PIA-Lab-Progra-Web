<?php

include '../conexion/conexion.php';

if(isset($_POST['updateid'])){
    $id_cita=$_POST['updateid'];

    $sql="SELECT *  FROM v_receta WHERE id_px=$id_cita";
    $result=mysqli_query($conexion,$sql);
    $response= array();
    while ($row = mysqli_fetch_assoc($result)) {
        $response=$row;
    }
    
    echo json_encode($response);
} else{
    $response['status']=200;
    $response['message']="DATOS NO ENCONTRADOS";
}




//update querry

if(isset($_POST['hiddenid'])){

    $id_cita=$_POST['hiddenid'];
    $fecha_cita = $_POST["updateDate"];
    $id_estado = $_POST["updateEstado"];

// acrualiza los valores en la base de datos
$sql = "UPDATE cita set fecha_cita ='$fecha_cita', id_estado = '$id_estado' WHERE id_cita= $id_cita" ;

echo '<script>alert("' . $sql . '");</script>';
                 $result=mysqli_query($conexion, $sql);
}
?>
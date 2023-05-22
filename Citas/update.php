<?php

include '../conexion/conexion.php';

if(isset($_POST['updateid'])){
    $id_cons=$_POST['updateid'];

    $sql="SELECT *  FROM consultorio WHERE id_cons=$id_cons";
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
$id_cons=$_POST['hiddenid'];
$num_cons = $_POST["updatenum"];
$ubi_cons = $_POST["updateubi"];





// acrualiza los valores en la base de datos
$sql = "UPDATE consultorio set num_cons ='$num_cons', ubi_cons='$ubi_cons' WHERE id_cons= $id_cons" ;

                 $result=mysqli_query($conexion, $sql);
}
?>
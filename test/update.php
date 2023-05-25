<?php

include '../conexion/conexion.php';

if(isset($_POST['updateid'])){
    $id_test=$_POST['updateid'];

    $sql="SELECT *  FROM test WHERE id_test=$id_test";
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
$id_test=$_POST['hiddenid'];
$nom_test = $_POST["updatenom"];

// acrualiza los valores en la base de datos
$sql = "UPDATE test set nom_test ='$nom_test' WHERE id_test= $id_test" ;

                 $result=mysqli_query($conexion, $sql);
}
?>
<?php

include '../conexion/conexion.php';

if(isset($_POST['updateid'])){
    $id_doc=$_POST['updateid'];

    $sql="SELECT *  FROM doctor WHERE id_doc=$id_doc";
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
 $id_doc=$_POST['hiddenid'];
$id_cons = $_POST["updatecons"];
$id_esp = $_POST["updateespecialidad"];
    $traye_doc = $_POST["updatetrayectoria"];





// acrualiza los valores en la base de datos
$sql = "UPDATE doctor set id_cons ='$id_cons', id_esp='$id_esp', traye_doc = '$traye_doc' WHERE id_doc= $id_doc" ;

                 $result=mysqli_query($conexion, $sql);
}
?>
<?php

include '../conexion/conexion.php';

if(isset($_POST['updateid'])){
    $id_usr=$_POST['updateid'];

    $sql="SELECT *  FROM users WHERE id_usr=$id_usr";
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
$id_usr=$_POST['hiddenid'];

$tipo_usr = $_POST["updatetipo"];
$nom_usr = $_POST["updatenombre"];
$ape_usr=$_POST["updateapellido"];
$colonia_usr = $_POST["updatecolonia"];
$calle_usr = $_POST["updatecalle"];
$tel_usr = $_POST["updatetelefono"];
$nac_usr = $_POST["updatenacimiento"];
$gen_usr = $_POST["updategenero"];
$email_usr = $_POST["updateemail"];
$pass_usr = $_POST["updatecontra"];




// acrualiza los valores en la base de datos
$sql = "UPDATE users set id_tipo ='$tipo_usr', nom_usr='$nom_usr', ape_usr='$ape_usr', colonia_usr='$colonia_usr',
                 calle_usr='$calle_usr', tel_usr='$tel_usr', nac_usr='$nac_usr', gen_usr='$gen_usr', 
                 email_usr='$email_usr', pass_usr='$pass_usr' WHERE id_usr= $id_usr" ;
                 
                 
                 $result=mysqli_query($conexion, $sql);


}
?>
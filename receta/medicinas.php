<?php
// Realiza tu consulta en la base de datos y obtén los datos necesarios
include "../conexion/conexion.php"; // Reemplaza "conexion.php" con el archivo que contiene la conexión a tu base de datos

$sql = "SELECT * FROM medicamento"; // Reemplaza "columna" y "tabla" con los nombres correctos de tu columna y tabla
$resultado = mysqli_query($conexion, $sql);

// Crea un array para almacenar los datos
$data = array();

// Recorre los resultados de la consulta y agrega los datos al array
while ($row = mysqli_fetch_assoc($resultado)) {
  $data[] = $row['columna']; // Reemplaza "columna" con el nombre correcto de tu columna
}

// Devuelve los datos como respuesta en formato JSON
echo json_encode($data);
?>

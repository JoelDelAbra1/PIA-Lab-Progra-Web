<?php
include '../conexion/conexion.php';
$id_cita = $_POST['id'];
$insertpx ="INSERT INTO receta(id_cita) VALUES ($id_cita)";

$resultado = mysqli_query($conexion,$insertpx);

 // Consulta para obtener el valor de id_px correspondiente a la última id_cita agregada
    $consulta = "SELECT id_px FROM receta WHERE id_cita = $id_cita ORDER BY id_px DESC LIMIT 1";
    $resultado = mysqli_query($conexion,$consulta);

    $fila = mysqli_fetch_assoc($resultado);
    $id_px_ultima_cita = $fila['id_px'];

if (isset($_POST['data'])) {
    $data = $_POST['data'];

    // Procesar y guardar los datos en la base de datos
    foreach ($data as $item) {
        // Verificar si los valores no son nulos antes de guardar
        if (isset($item['frecuencia']) && isset($item['medicamentoDataValue'])) {
            $frecuencia = $item['frecuencia'];
            $medicamentoID = $item['medicamentoDataValue'];

            $sql = "INSERT INTO detallemere (id_med, id_px, frec_med) VALUES ($medicamentoID, $id_px_ultima_cita, '$frecuencia')";
            $resultado = mysqli_query($conexion, $sql);

            echo $sql;
        } elseif (isset($item['testDataValue'])) {
            $id_test = $item['testDataValue'];

            $sql = "INSERT INTO detalletere (id_test, id_px) VALUES ($id_test, $id_px_ultima_cita)";
            $resultado = mysqli_query($conexion, $sql);
            echo $resultado;
        }
    }
}
?>

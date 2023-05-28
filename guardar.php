<?php
include 'conexion/conexion.php';

if (isset($_POST['data'])) {
    $data = $_POST['data'];

    // Procesar y guardar los datos en la base de datos
    foreach ($data as $item) {
        $frecuencia = $item['frecuencia'];
        $medicamentoID = $item['medicamentoDataValue'];
        $id_px = 2;

        // Verificar si los valores no son nulos antes de guardar
        if (isset($frecuencia) && isset($medicamentoID)) {
            $sql = "INSERT INTO detallemere (id_med, id_px, frec_med) VALUES ($medicamentoID, $id_px, '$frecuencia')";
            $resultado = mysqli_query($conexion, $sql);

            echo $sql;
        }
    }
}
?>

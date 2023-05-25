<?php
// Se incluye la conexion a la DB
include("../conexion/conexion.php");

// Se guardan las columnas en un array para ser usadas despues
$columns = ['id_cita','paciente', 'doctor', 'fecha_cita', 'nom_estado'];

// Se guarda el nombre de la tabla
$entidad = "v_cita";

// Se guarda el id
$id = 'id_cita';

//
$search = isset($_POST['searchSend']) ? mysqli_real_escape_string($conexion, $_POST['searchSend']) : null;

// Varaiable que nos ayudara a la busqueda
$where = "";

// Se comprueba si se esta realizando una bisqueda
if ($search != null) {

    //Si es verdad se empieza a crear una consulta con los valores
    $where = "WHERE (";

    // Se cuentan las columas que se tiene
    $cont = count($columns);

    // Ciclo for que ira agregando la consulta para la busqueda
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $search . "%' OR ";
    }

    // Se termina la consulta y se quita el OR
    $where = substr_replace($where, "", -3);
    $where .= ")";
}


//
$limit = isset($_POST['num_regisSend']) ? mysqli_real_escape_string($conexion, $_POST['num_regisSend']) : 1;



$page = isset($_POST['pageSend']) ? mysqli_real_escape_string($conexion, $_POST['pageSend']) : 0;


if (!$page) {
    $inicio = 0;
    $page = 1;
} else {
    $inicio = ($page - 1) * $limit;
}

$sLimit = "LIMIT $inicio,$limit";



//$output = ['paginacion'] = '';


if (isset($_POST['displaySend'])) {
    $tabla = '
    <div class="container">
    <div class="row">
      <div class="col-12">
      <div class="table-responsive">
        <table class="table table-lg text-center justify-content-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Paciente</th>
              <th>Doctor</th>
              <th>Fecha</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>  
    ';


    $sql = "SELECT SQL_CALC_FOUND_ROWS " . implode(", ", $columns) . " FROM $entidad
    $where
    $sLimit";



    $result = mysqli_query($conexion, $sql);

    $num_rows = mysqli_num_rows($result);



    // Total de registros filtrados

    $sqlFiltro = "SELECT FOUND_ROWS()";
    $restultFiltro = mysqli_query($conexion, $sqlFiltro);
    $row_filtro = mysqli_fetch_array($restultFiltro);
    $totalFiltro = $row_filtro[0];


    // Total de registros filtrados

    $sqlTotal = "SELECT count($id) FROM $entidad $where";
    $restultTotal = mysqli_query($conexion, $sqlTotal);
    $row_Total = mysqli_fetch_array($restultTotal);
    $totalRegis = $row_Total[0];

    // mostrar resultados

    if ($num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id_cita= $row['id_cita']; //este ultiomo es el de la DB
            $paciente = $row['paciente'];
            $doctor = $row['doctor'];
            $fecha_cita = $row['fecha_cita'];
            $nom_estado = $row['nom_estado'];


            $tabla .= '
            <tbody>
                <tr>
                    <td class="id_usr">' . $id_cita . '</td>
                    <td>' . $paciente . '</td>
                    <td>' . $doctor . '</td>
                    <td>' . $paciente . '</td>
                    <td>' . $fecha_cita . '</td>
                    <td>';
        
        // Dependiendo del valor de $nom_estado, asigna la clase de la badge correspondiente
        $badge_class = '';
        switch ($nom_estado) {
            case 'Pendiente':
                $badge_class = 'badge badge-success';
                break;
            case 'Confirmada':
                $badge_class = 'badge badge-warning';
                break;
            case 'Cancelada':
                $badge_class = 'badge badge-danger';
                break;
            default:
                $badge_class = 'badge badge-secondary';
                break;
        }
        
        $tabla .= '<span class="' . $badge_class . '">' . $nom_estado . '</span></td>
                    <td>
                        <button class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></button>
                        <button class="btn btn-sm btn-danger"><i class="fas fa-eraser"></i></button>
                    </td>
                </tr>
            </tbody>
        ';
        
    }
}
else {
    $tabla .= '
        <tbody>
            <tr>
                <td colspan="4">No se encontraron resultados</td>
            </tr>
        </tbody>
    ';
}

    $output = [];
    $output['totalRegis'] = $totalRegis;
    $output['totalFiltro'] = $totalFiltro;
    $output['tabla'] = '';
    $output['paginacion'] = '';



    $tabla .= '</table>
    <div class="row">
    <div class="col-6">
        <label id="lbl_total">Mostrando ' . $totalFiltro . ' de ' . $totalRegis . ' registros</label>
    </div>
    

    <div class="col-6">
        
    

    
    
    '; //concaneta

    if ($output['totalRegis'] > 0) {
        $totalPags = ceil($output['totalRegis'] / $limit);
        $tabla .= ' <nav aria-label="Page navigation example"
        <ul class= "pagination"> ';




    }


    $num_inicio = 1;

    if (($page - 4) > 1) {
        $num_inicio = $page - 4;
    }

    $num_fin = $num_inicio + 9;

    $totalPags = ceil($output['totalRegis'] / $limit); //por si no se tienen registros


    if ($num_fin > $totalPags) {
        $num_fin = $totalPags; // Se le asigna el ultimo valor 
    } // no se pase de lasque se muestra




    for ($i = $num_inicio; $i <= $num_fin; $i++) {

        if ($page == $i) {
            $tabla .= '    <li class="page-item"><a class="page-link active" href="#">' . $i . '</a></li>';
        } else {
            $tabla .= '    <li class="page-item"><a class="page-link" href="#" onclick="displayData(' . $i . ')">' . $i . '</a></li>';
        }
    }
    $tabla .= '
        </ul>
        </nav>
        </div>
        </div> ';

    $output['tabla'] = $tabla;


}
echo $output['tabla']; //Se imprime la tabla


?>
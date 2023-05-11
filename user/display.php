<?php

include("../conexion/conexion.php");

$columns = ['id_usr', 'nom_usr', 'email_usr', 'tel_usr'];

$entidad = "users";

$id = 'id_usr';

$search = isset($_POST['searchSend']) ? mysqli_real_escape_string($conexion, $_POST['searchSend']) : null;


$where = "";

if ($search != null) {
    $where = "WHERE (";

    $cont = count($columns);

    for ($i = 0; $i < $cont; $i++) {
        $where .= $columns[$i] . " LIKE '%" . $search . "%' OR ";
    }

    $where = substr_replace($where, "", -3);
    $where .= ")";
}


//Limite 
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
        <table class="table text-center justify-content-center">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Email</th>
              <th>Teléfono</th>
              <th>Acciones</th>
            </tr>
          </thead>    
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


    while ($row = mysqli_fetch_assoc($result)) {
        $id_usr = $row['id_usr']; //este ultiomo es el de la DB
        $nom_usr = $row['nom_usr'];
        $email_usr = $row['email_usr'];
        $tel_usr = $row['tel_usr'];

        $tabla .= '
        <tbody>
                        <tr>
                            <td>' . $id_usr . '</td>
                            <td>' . $nom_usr . '</td>
                            <td>' . $email_usr . '</td>
                            <td>' . $tel_usr . '</td>
                            <td>

<button class="btn btn-sm btn-warning" onclick="getUsr(' . $id_usr . ')"><i class="fas fa-pen"></i></button>
<button class="btn btn-sm btn-danger" onclick="confDeleteUsr(' . $id_usr . ')"><i class="fas fa-eraser"></i></button>

                            </td>
                        </tr>

                       

                    
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




    if ($num_fin > $totalPags) {
        $num_fin = $totalPags; // Se le asigna el ultimo valor 
    } // no se pase de lasque se muestra




    for ($i = $num_inicio; $i < $num_fin; $i++) {

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
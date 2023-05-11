<?php
include("../conexion/conexion.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Simple Sidebar - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../style.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />

    <!-- MDB -->
    <!--<link rel="stylesheet" href="css/mdb.min.css" /> -->


    <!-- Agregar enlaces a los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">



    <!-- Agregar enlaces a los archivos JS de jQuery y Bootstrap -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="d-flex bg-light " id="wrapper">
        <!-- Sidebar-->
        <div class="border-end  text-center" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom azul">Centro Médico JOVA</div>
            <div class="list-group custom-sidebar">

                <?php
                $lol = 2;
                $id = 1;


                if ($id == 1)
                    echo '
    <a class="list-group-item list-group-item-action p-4 fw-bold" href="">Eliminar</a>
    <a id="h" class="list-group-item list-group-item-action p-4 fw-bold" href="#!">Shortcuts</a>
    <a class="list-group-item list-group-item-action p-4 fw-bold" href="#!">Overview</a>
    <a class="list-group-item list-group-item-action p-4 fw-bold" href="#!">Events</a>
    <a class="list-group-item list-group-item-action p-4 fw-bold" href="#!">Profile</a>
    <a class="list-group-item list-group-item-action p-4 fw-bold" href="#!">Status</a> ';
  
                ?>

            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper" class="bg-ligtht ">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg  azul border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-primary" id="sidebarToggle">Menú</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Action</a>
                                    <a class="dropdown-item" href="#!">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>




            <!-- Page content-->
            <div class="container-fluid ">
                <h1 class="mt-4 text-center">Usuarios</h1>

<br>

                <div class="container-sm">
  <div class="row justify-content-between align-items-center">
    <div class="col-4">
      <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#nuevoModal">
        Nuevo
      </button>
    </div>
    <div class="col-4">
      <div class="input-group">
        <label for="search" class="input-group-text">Búsqueda</label>
        <input type="text" id="search" class="form-control" onkeyup="search()">
      </div>
    </div>
    <div class="col-auto">
      <select name="num_regis" id="num_regis" class="form-select" onchange="paginacion()">
        <option value="1">5</option>
        <option value="10">10</option>
        <option value="20">20</option>
      </select>
    </div>
  </div>
</div>

                    <br>

                    <div id="displayDataTable" class="bg-light justify-content-center">

                    </div>

                </div>
            </div>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo usuario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Tipo input -->
                            <div class="form-group mb-4">
                                <label for="tipo">Tipo de usuario</label>
                                <select class="form-select border border-secondary form-control form-outline" id="tipo">
                                    <?php
                                    include("conexion.php");
                                    $sql = "SELECT * FROM tipousr";
                                    $resultado = mysqli_query($conexion, $sql);
                                    while ($row = mysqli_fetch_array($resultado)) {
                                        // $id_empleado=$row['id_empleado'];
                                        $id_tipo = $row['id_tipo'];
                                        $nom_tipo = $row['nom_tipo'];
                                        ?>
                                        <option value="<?php echo $id_tipo; ?>">
                                            <?php echo $nom_tipo; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Nombre input -->
                            <div class="form-outline mb-4">
                                <label for="nombre">Nombre(s)</label>
                                <input type="text" id="nombre" class="form-control border border-secondary" required />

                            </div>

                            <!-- Apellido input -->
                            <div class="form-outline mb-4">
                                <label for="apellido">Apellido(s)</label>
                                <input type="text" id="apellido" class="form-control border border-secondary"
                                    required />
                            </div>

                            <!-- Colonia input -->
                            <div class="form-outline mb-4">
                                <label for="colonia">Colonia</label>
                                <input type="text" id="colonia" class="form-control border border-secondary" required />
                            </div>

                            <!-- Calle input -->
                            <div class="form-outline mb-4">
                                <label for="calle">Calle</label>
                                <input type="text" id="calle" class="form-control border border-secondary" required />
                            </div>

                            <!-- Teléfono input -->
                            <div class="form-outline mb-4">
                                <label for="telefono">Telefono(s)</label>
                                <input type="tel" id="telefono" class="form-control border border-secondary"
                                    pattern="[0-9]{10}" required />

                            </div>

                            <!-- Nacimiento input -->
                            <div class="form-outline mb-4">
                                <label for="nacimiento">Fecha de nacimineto</label>
                                <input type="date" id="nacimiento" class="form-control border border-secondary"
                                    required />
                            </div>

                            <!-- Género input -->
                            <div class="form-outline mb-4">
                                <label for="genero">Género(s)</label>
                                <select id="genero" class="form-select border border-secondary">
                                    <option value="0">Mujer</option>
                                    <option value="1">Hombre</option>
                                </select>

                            </div>

                            <!-- email input -->
                            <div class="form-outline mb-4">
                                <label for="email">Correo electronico(s)</label>
                                <input type="email" id="email" class="form-control border border-secondary" required />

                            </div>

                            <!-- Contraseña input -->
                            <div class="form-outline mb-4">
                                <label for="contra">Contraseña</label>
                                <input id="contra" type="password" class="form-control border border-secondary"
                                    required />
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-dark" onclick="addUser()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- UPDATE Modal -->
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar usuario</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        </div>
                        <div class="modal-body">
                            <!-- Tipo input -->
                            <div  class="form-group mb-4">
                             <form onsubmit="Updatedetails()">
                                   <label for="updatetipo">Tipo de usuario</label>
                                <select class="form-select border border-secondary form-control form-outline"
                                    id="updatetipo">
                                    <?php
                                    include("conexion.php");
                                    $sql = "SELECT * FROM tipousr";
                                    $resultado = mysqli_query($conexion, $sql);
                                    while ($row = mysqli_fetch_array($resultado)) {
                                        // $id_empleado=$row['id_empleado'];
                                        $id_tipo = $row['id_tipo'];
                                        $nom_tipo = $row['nom_tipo'];
                                        ?>
                                        <option value="<?php echo $id_tipo; ?>">
                                            <?php echo $nom_tipo; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Nombre input -->
                            <div class="form-outline mb-4">
                                <label for="updatenombre">Nombre(s)</label>
                                <input type="text" id="updatenombre" class="form-control border border-secondary"
                                    required />

                            </div>

                            <!-- Apellido input -->
                            <div class="form-outline mb-4">
                                <label for="updateapellido">Apellido(s)</label>
                                <input type="text" id="updateapellido" class="form-control border border-secondary"
                                    required />
                            </div>

                            <!-- Colonia input -->
                            <div class="form-outline mb-4">
                                <label for="updatecolonia">Colonia</label>
                                <input type="text" id="updatecolonia" class="form-control border border-secondary"
                                    required />
                            </div>

                            <!-- Calle input -->
                            <div class="form-outline mb-4">
                                <label for="updatecalle">Calle</label>
                                <input type="text" id="updatecalle" class="form-control border border-secondary"
                                    required />
                            </div>

                            <!-- Teléfono input -->
                            <div class="form-outline mb-4">
                                <label for="updatetelefono">Telefono(s)</label>
                                <input type="tel" id="updatetelefono" class="form-control border border-secondary"
                                    pattern="[0-9]{10}" required />

                            </div>

                            <!-- Nacimiento input -->
                            <div class="form-outline mb-4">
                                <label for="updatenacimiento">Fecha de nacimineto</label>
                                <input type="date" id="updatenacimiento" class="form-control border border-secondary"
                                    required />
                            </div>

                            <!-- Género input -->
                            <div class="form-outline mb-4">
                                <label for="updategenero">Género(s)</label>
                                <select id="updategenero" class="form-select border border-secondary">
                                    <option value="0">Mujer</option>
                                    <option value="1">Hombre</option>
                                </select>

                            </div>

                            <!-- email input -->
                            <div class="form-outline mb-4">
                                <label for="updateemail">Correo electronico(s)</label>
                                <input type="email" id="updateemail" class="form-control border border-secondary"
                                    required />

                            </div>

                            <!-- Contraseña input -->
                            <div class="form-outline mb-4">
                                <label for="updatecontra" updatecontra>Contraseña</label>
                                <input id="updatecontra" updatecontra type="password"
                                    class="form-control border border-secondary" required />
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-dark" >Actualizar</button>
                            <input type="hidden" id="hiddenid">
                        </div>
                             </form>
                    </div>
                </div>
            </div>

            <!-- Modal Aviso ELiminar -->
            <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="confDel" class="btn btn-primary"  >Save changes</button>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Importamos JQuery -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="../js/scripts.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


            <script>
                //Muestra la data




                var actualPag = 1;

                displayData(actualPag)

                $(document).ready(function () {
                    displayData();
                    $('#search').val("");
                });

                function search() {
                    displayData(1);
                }

                function paginacion() {
                    displayData(1);
                }

                function displayData(page) {

                    if (page != null) {
                        actualPag = page
                    }

                    var displayData = "true";
                    var searchAdd = $('#search').val();
                    var num_regisAdd = $('#num_regis').val();

                    $.ajax({
                        url: "display.php",
                        type: 'POST',
                        data: {
                            displaySend: displayData,
                            searchSend: searchAdd,
                            num_regisSend: num_regisAdd,
                            pageSend: actualPag
                        },
                        success: function (data, status) {
                            $('#displayDataTable').html(data);
                        }
                    });
                }

                function addUser() {
                    var tipoAdd = $('#tipo').val();
                    var nombreAdd = $('#nombre').val();
                    var apellidoAdd = $('#apellido').val();
                    var coloniaAdd = $('#colonia').val();
                    var calleAdd = $('#calle').val();
                    var telefonoAdd = $('#telefono').val();
                    var nacimientoAdd = $('#nacimiento').val();
                    var generoAdd = $('#genero').val();
                    var emailAdd = $('#email').val();
                    var contraAdd = $('#contra').val();




                    $.ajax({
                        url: "insert.php",
                        type: 'POST',
                        data: {
                            tipoSend: tipoAdd,
                            nombreSend: nombreAdd,
                            apellidoSend: apellidoAdd,
                            coloniaSend: coloniaAdd,
                            calleSend: calleAdd,
                            telefonoSend: telefonoAdd,
                            nacimientoSend: nacimientoAdd,
                            generoSend: generoAdd,
                            emailSend: emailAdd,
                            contraSend: contraAdd

                        },

                        success: function (data, status) {
                            //Display data
                            console.log(status);
                            $('#nuevoModal').modal('hide');
                            displayData();
                        }

                    })
                }

                //Eliminar un registro


               


                function confDeleteUsr(id) {
                    $('#eliminarModal').modal('show');
                    $('#confDel').attr('onclick','deleteUsr('+ id +')');
                    
                }


                function deleteUsr(id) {


                    $('#eliminarModal').modal('hide');

                    $.ajax({
                        url: "delete.php",
                        type: "POST",
                        data: {
                            idSend: id
                        },
                        success: function (data, status) {
                            displayData();
                        }
                    });
                }

                //Update

                function getUsr(id) {


                    $('#hiddenid').val(id)

                    $.post("update.php", { updateid: id }, function (data, status) {
                        var userid = JSON.parse(data); //obtiene el valor
                        $('#updatetipo').val(userid.id_tipo);
                        $('#updatenombre').val(userid.nom_usr);
                        $('#updateapellido').val(userid.ape_usr);
                        $('#updatecolonia').val(userid.colonia_usr);
                        $('#updatecalle').val(userid.calle_usr);
                        $('#updatetelefono').val(userid.tel_usr);
                        $('#updatenacimiento').val(userid.nac_usr);
                        $('#updategenero').val(userid.gen_usr);
                        $('#updateemail').val(userid.email_usr);
                        $('#updatecontra').val(userid.pass_usr);


                    }); //obtener data

                    $('#updateModal').modal('show');
                }


                //cuando se le click a update
                function Updatedetails() {
                    var updatetipo = $('#updatetipo').val();
                    var updatenombre = $('#updatenombre').val();
                    var updateapellido = $('#updateapellido').val();
                    var updatecolonia = $('#updatecolonia').val();
                    var updatecalle = $('#updatecalle').val();
                    var updatetelefono = $('#updatetelefono').val();
                    var updatenacimiento = $('#updatenacimiento').val();
                    var updategenero = $('#updategenero').val();
                    var updateemail = $('#updateemail').val();
                    var updatecontra = $('#updatecontra').val();
                    var hiddenid = $('#hiddenid').val();

                    $.post("update.php", {
                        hiddenid: hiddenid, ///No jalaba
                        updatetipo: updatetipo,
                        updatenombre: updatenombre,
                        updateapellido: updateapellido,
                        updatecolonia: updatecolonia,
                        updatecalle: updatecalle,
                        updatetelefono: updatetelefono,
                        updatenacimiento: updatenacimiento,
                        updategenero: updategenero,
                        updateemail: updateemail,
                        updatecontra: updatecontra
                    }, function (data, status) {
                        $('#updateModal').modal('hide');
                        displayData();
                    });
                }

            </script>

</body>

</html>
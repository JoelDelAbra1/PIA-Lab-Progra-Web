<?php
include("../conexion/conexion.php");
require_once("ti.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>
    <?php startblock('title') ?>
                            <?php endblock() ?>
  </title>
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
<div class="d-flex bg-light" id="wrapper">
    <!-- Sidebar -->
    <div class="border-end text-center" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom azul">Centro Médico JOVA</div>
        <div class="list-group custom-sidebar d-flex flex-column">
            <?php
                session_start();
                $tipo = $_SESSION["tipo"];

                if ($tipo == 1) {
                    echo '
                        <a class="list-group-item list-group-item-action p-4 fw-bold" href="../consultorio/consultorio.php">Consultorios</a>
                        <a class="list-group-item list-group-item-action p-4 fw-bold flex-grow-1" href="#!">Status</a>';
                } else if($tipo == 2) {
                    echo '
                        <a class="list-group-item list-group-item-action p-4 fw-bold" href="../consultorio/consultorio.php">Consultorios</a>
                        <a class="list-group-item list-group-item-action p-4 fw-bold flex-grow-1" href="#!">Status</a>';
                }
                
                echo '
                <a id="h" class="list-group-item list-group-item-action p-4 fw-bold" href="../user/prub.php">Usuarios</a>
                        <a class="list-group-item list-group-item-action p-4 fw-bold" href="../doctor/doctor.php">Doctores</a>
                        <a class="list-group-item list-group-item-action p-4 fw-bold" href="../test/test.php">Pruebas</a>
                        <a class="list-group-item list-group-item-action p-4 fw-bold" href="../Citas/citas.php">Citas</a>
                <a class="list-group-item list-group-item-action p-4 fw-bold" href="../cerrarSesion.php" >Cerar Sesion</a>';
            ?>
        </div>
    </div>




        <!-- Page content wrapper-->
        <div id="page-content-wrapper" class="bg-ligtht ">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg  azul border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-info" id="sidebarToggle">Menú</button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
                            <li class="nav-item dropdown">

                            <?php

$nombre = $_SESSION["nombre"];

                            echo '<a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'. $nombre .'</a>';
                            ?>
                                
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#!">Mis datos</a>
                                    <a class="dropdown-item" href="../cerrarSesion.php">Cerrar Sesion</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#!">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <?php startblock('contet') ?>
                            <?php endblock() ?>

          

            <!-- Importamos JQuery -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="../js/scripts.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


            <?php startblock('js') ?>
                            <?php endblock() ?>

</body>

</html>
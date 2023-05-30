<!-- Se incluye la plantilla base -->
<?php include('../templates/prub.php');?>

<!-- Se le da el valor al bloque de titulo -->
<?php startblock('title') ?>
Bienvenido
<?php endblock() ?>
<!-- Fin del bloque titulo -->

<!-- Se inicia el bloque del contenido -->
<?php startblock('contet') ?>

<!-- Contenido de la pagina -->
<div class="container-fluid ">

    <br>
    <div class="container-sm">
        <div class="row justify-content-between align-items-center">


            <div class="container">
                <div class="row">
                    <div class="col d-flex align-items-center justify-content-center">
                        <h1 class="text-center vertical-center">Texto centrado</h1>
                    </div>
                </div>
            </div>

            <style>
                .vertical-center {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
            </style>


            <!-- Fin del bloque contenido-->
<?php endblock() ?>


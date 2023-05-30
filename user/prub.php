<!-- Se incluye la plantilla base -->
<?php include('../templates/prub.php');
$tipo = $_SESSION["tipo"];?>

<!-- Se le da el valor al bloque de titulo -->
<?php startblock('title') ?>
Usuarios
<?php endblock() ?>
<!-- Fin del bloque titulo -->

<!-- Se inicia el bloque del contenido -->
<?php startblock('contet') ?>
                            
<!-- Contenido de la pagina -->
<div class="container-fluid ">
  <h1 id="tituloprueb" class="mt-4 text-center">Usuarios</h1>
  <br>
  <div class="container-sm">
    <div class="row justify-content-between align-items-center">
      <?php
      $div ="";
      if ($tipo == 3){
        $div = '<!-- Boton de nuevo registro-->
      <div class="col-4">
        <button type="button" id="nuevo" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#nuevoModal" >
          Nuevo
        </button>
      </div>';

      }
      echo $div;
      ?>


      <!-- Campo de busqueda -->
      <div class="col-4">
        <div class="input-group">
          <label for="search" class="input-group-text">Búsqueda</label>
          <input type="text" id="search" class="form-control">
        </div>
      </div>

      <!-- Campo para selecionar cuantos reistros ver-->
      <div class="col-auto">
        <select name="num_regis" id="num_regis" class="form-select" >
          <option value="5">5</option>
          <option value="10">10</option>
          <option value="20">20</option>
        </select>
      </div>
    </div>
  </div>

  <br>

  <!-- Div en donde estara la tabla -->
  <div id="displayDataTable" class="bg-light justify-content-center">
  </div>
</div>
</div>

<?php include('citaModal.php'); ?>
<!-- Modal Nuevo-->
<?php include('nuevoModal.php'); ?>

<!-- UPDATE Modal -->
<?php include('updateModal.php'); ?>

<!-- Modal Aviso ELiminar -->
<?php include('confDel.php'); ?>



<!-- Fin del bloque contenido-->
<?php endblock() ?>


<!-- Inicia el bloque js-->
<?php startblock('js') ?>

<script src="usr.js"></script>

<!-- Fin del bloue js-->
<?php endblock() ?>

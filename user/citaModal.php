<!-- Modal  de una nueva cita-->

<div>
    <div class="modal fade" id="citaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="titleCita">Nuevo
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <form id="addCita">

                        <input type="hidden" id="hiddenidCita">

                            <h3 class="text-center">Datos del paciente</h3>
                            <!-- Nombre input -->
                            <div class="form-outline mb-4">
                                <label for="nombreCita">Nombre(s)</label>
                                <input type="text" id="nombreCita" class="form-control border border-secondary" readonly />
                            </div>

                            <!-- Apellido input -->
                            <div class="form-outline mb-4">
                                <label for="apellidoCita">Apellido(s)</label>
                                <input type="text" id="apellidoCita" class="form-control border border-secondary"
                                    readonly />
                            </div>

                            <!-- email input -->
                            <div class="form-outline mb-4">
                                <label for="emailCita">Correo electronico(s)</label>
                                <input type="email" id="emailCita" class="form-control border border-secondary" readonly />
                            </div>

                            <div class="form-outline mb-4">
                                <label for="fecha">Fecha:</label>
                                <input type="date" id="fecha" class="form-control border border-secondary"min="<?php echo date('Y-m-d'); ?>">
                            </div>

                            <div class="form-outline mb-4">
                                <label for="hora">Hora:</label>
                                <select id="hora"  class="form-control border border-secondary"></select>
                            </div>


                             <!-- Selecionar usuario-->
                             <label for="doc">Usuario</label>
                            <select class="form-select border border-secondary form-control form-outline" id="doc">
                                <!-- Se consiguen los usurarios que existen-->
                                <?php
                                include("../conexion/conexion.php");
                                $sql = "SELECT d.id_doc, CONCAT(u.nom_usr, ' ', u.ape_usr) AS nombre_doc FROM doctor d INNER JOIN users u on d.id_doc = u.id_usr";
                                $resultado = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_array($resultado)) {
                                    // $id_empleado=$row['id_empleado'];
                                    $id_doc = $row['id_doc'];
                                    $nombre_doc = $row['nombre_doc'];
                                    ?>
                                    <option value="<?php echo $id_doc; ?>">
                                        <?php echo $nombre_doc; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-dark">Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
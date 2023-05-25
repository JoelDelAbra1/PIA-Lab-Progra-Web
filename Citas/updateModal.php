
<div>
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="titleUpdt">Editar cita </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        </div>
                        <div class="modal-body">
                            <!-- Tipo input -->
                            <div  class="form-group mb-4">
                             <form id="update">

                                     
                        <h3 class="text-center">Datos del paciente</h3>
                            <!-- Nombre input -->
                            <div class="form-outline mb-4">
                                <label for="updateNombreCita">Nombre(s)</label>
                                <input type="text" id="updateNombreCita" class="form-control border border-secondary"  readonly/>
                            </div>

                            <!-- tel input -->
                            <div class="form-outline mb-4">
                                <label for="updateTelCita">Teléfono</label>
                                <input type="tel" id="updateTelCita" class="form-control border border-secondary" readonly />
                            </div>

                            <h3 class="text-center">Datos del doctor</h3>
                            <!-- Nombre input -->
                            <div class="form-outline mb-4">
                                <label for="nombreDocCita">Nombre(s)</label>
                                <input type="text" id="nombreDocCita" class="form-control border border-secondary" readonly />
                            </div>

                            <!-- Apellido input -->
                            <div class="form-outline mb-4">
                                <label for="telDocCita">Apellido(s)</label>
                                <input type="text" id="telDocCita" class="form-control border border-secondary"
                                    readonly />
                            </div>

                              <!-- especialidad input -->
                              <div class="form-outline mb-4">
                                <label for="especialidadCita">Apellido(s)</label>
                                <input type="text" id="especialidadCita" class="form-control border border-secondary"
                                    readonly />
                            </div>

                            <!-- Consultorio input -->
                            <div class="form-outline mb-4">
                                <label for="consCita">Apellido(s)</label>
                                <input type="text" id="consCita" class="form-control border border-secondary"
                                    readonly />
                            </div>

                            <!-- Ubi Consultorio input -->
                            <div class="form-outline mb-4">
                                <label for="ubiCita">Apellido(s)</label>
                                <input type="text" id="ubiCita" class="form-control border border-secondary"
                                    readonly />
                            </div>
                            


                            <h3 class="text-center">Datos de la cita</h3>

                            <div class="form-outline mb-4">
                                <label for="fechaCita">Fecha:</label>
                                <input type="date" id="fechaCita" class="form-control border border-secondary" min="<?php echo date('Y-m-d'); ?>" required>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="horaCita">Hora:</label>
                                <select id="horaCita"  class="form-control border border-secondary"></select>
                            </div>

                            
<!-- Selecionar usuario-->
<label for="estado">Estado</label>
                            <select class="form-select border border-secondary form-control form-outline" id="estado">
                                <!-- Se consiguen los usurarios que existen-->
                                <?php
                                include("../conexion/conexion.php");
                                $sql = "SELECT * from estadocita";
                                $resultado = mysqli_query($conexion, $sql);
                                while ($row = mysqli_fetch_array($resultado)) {
                                    // $id_empleado=$row['id_empleado'];
                                    $id_estado = $row['id_estado'];
                                    $nom_estado = $row['nom_estado'];
                                    ?>
                                    <option value="<?php echo $id_estado; ?>">
                                        <?php echo $nom_estado; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit"  id="actualizar" class="btn btn-dark" >Actualizar</button>
                            <input type="hidden" id="hiddenid">
                        </div>
                             </form>
                    </div>
                </div>
            </div>
</div>
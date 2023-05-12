<div>
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="titleUpdt">Editar usuario </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        </div>
                        <div class="modal-body">
                            <!-- Tipo input -->
                            <div  class="form-group mb-4">
                             <form id="update">
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
                                <input type="text" id="updatenombre" class="form-control border border-secondary " pattern="[A-Za-z\s]+"
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
</div>
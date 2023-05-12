<!-- Modal -->

<div>
    <div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo 
                        </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Tipo input -->
                    <div class="form-group mb-4">
                        <form id="add">
                                <label for="tipo">Tipo de usuario ReneGuk</label>
                                <select class="form-select border border-secondary form-control form-outline" id="tipo">
                                    <!-- Se consiguen los tipos de usurarios que existen-->
                                    <?php
                                    include("../conexion/conexion.php");
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
                                <button type="button" id="closeNew" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-dark">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
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

                                 <!-- Selecionar usuario-->
                                 <label for="updatedoc">Usuario</label>
                                 <select class="form-select border border-secondary form-control form-outline" id="updatedoc">
                                     <!-- Se consiguen los usurarios que existen-->
                                     <?php
                                     include("../conexion/conexion.php");
                                     $sql = "SELECT id_usr, CONCAT(nom_usr, ' ', ape_usr) AS nom_usr FROM users where id_tipo = 2";
                                     $resultado = mysqli_query($conexion, $sql);
                                     while ($row = mysqli_fetch_array($resultado)) {
                                         // $id_empleado=$row['id_empleado'];
                                         $id_usr = $row['id_usr'];
                                         $nom_usr = $row['nom_usr'];
                                         ?>
                                         <option value="<?php echo $id_usr; ?>">
                                             <?php echo $nom_usr; ?>
                                         </option>
                                         <?php
                                     }
                                     ?>
                                 </select>

                                 <!-- Selecionar consultorio-->
                                 <label for="updatecons">Consultorio</label>
                                 <select class="form-select border border-secondary form-control form-outline" id="updatecons" required>
                                     <!-- Se consiguen los consultorio que existen-->
                                     <?php
                                     include("../conexion/conexion.php");
                                     $sql = "SELECT id_cons, num_cons FROM consultorio";
                                     $resultado = mysqli_query($conexion, $sql);
                                     while ($row = mysqli_fetch_array($resultado)) {
                                         // $id_empleado=$row['id_empleado'];
                                         $id_cons = $row['id_cons'];
                                         $num_cons = $row['num_cons'];
                                         ?>
                                         <option value="<?php echo $id_cons; ?>">
                                             <?php echo $num_cons; ?>
                                         </option>
                                         <?php
                                     }
                                     ?>
                                 </select>

                                 <!-- Selecionar especialidad-->
                                 <label for="updateespecialidad">Consultorio</label>
                                 <select class="form-select border border-secondary form-control form-outline" id="updateespecialidad">
                                     <!-- Se consiguen los consultorio que existen-->
                                     <?php
                                     include("../conexion/conexion.php");
                                     $sql = "SELECT * FROM especialidad 
                                        ORDER BY nom_esp";
                                     $resultado = mysqli_query($conexion, $sql);
                                     while ($row = mysqli_fetch_array($resultado)) {
                                         // $id_empleado=$row['id_empleado'];
                                         $id_esp = $row['id_esp'];
                                         $nom_esp = $row['nom_esp'];
                                         ?>
                                         <option value="<?php echo $id_esp; ?>">
                                             <?php echo $nom_esp; ?>
                                         </option>
                                         <?php
                                     }
                                     ?>
                                 </select>

                                 <!-- TexTarea para trayectoria-->
                                 <label for="updatetrayectoria" class="form-label">Trayectoria</label>
                                 <textarea class="form-control border border-secondary " id="updatetrayectoria" rows="3"></textarea>


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
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

                                 <!-- numero de consultorio input -->
                                 <div class="form-outline mb-4">
                                     <label for="updatenum">Correo electronico(s)</label>
                                     <input type="number" id="updatenum" class="form-control border border-secondary" required />
                                 </div>

                                 <!-- Ubucacion Cons input -->
                                 <div class="form-outline mb-4">
                                     <label for="updateubi">Contraseña</label>
                                     <input id="updateubi" type="text" class="form-control border border-secondary"
                                            required />
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
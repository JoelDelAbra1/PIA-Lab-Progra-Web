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

                            <!-- numero de consultorio input -->
                            <div class="form-outline mb-4">
                                <label for="num">Numero de consultorio</label>
                                <input type="number" id="num" class="form-control border border-secondary" required />
                            </div>

                            <!-- Ubucacion Cons input -->
                            <div class="form-outline mb-4">
                                <label for="ubi">Ubicacion</label>
                                <input id="ubi" type="text" class="form-control border border-secondary"
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
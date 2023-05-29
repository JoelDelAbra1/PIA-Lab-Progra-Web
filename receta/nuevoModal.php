<!-- Modal -->

<div tabindex="0">
    <div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!-- Formulario -->
                    <div class="form-group mb-4">
                        <form id="add">

                            <!-- Doctor input -->
                            <div class="form-outline mb-4">
                                <label for="exampleDataList" class="form-label">Datalist example</label>
                                <input class="form-control" list="datalistOptions" id="exampleDataList"
                                    placeholder="Type to search...">
                                <datalist id="datalistOptions">
                                    <option value="San Francisco" data-value="5"></option>
                                    <option value="Seattle" data-value="6"></option>
                                    <option value="Los Angeles" data-value="5"></option>
                                </datalist>
                            </div>

                            <!-- Ubucacion Cons input -->
                            <div class="form-outline mb-4">
                                <label for="ubi">Ubicacion</label>
                                <input id="ubi" type="text" class="form-control border border-secondary" required />
                            </div>

                            <div class="form-outline mb-4">
                                <label for="ubi2">Ubicacion</label>
                                <input id="ubi2" type="text" class="form-control border border-secondary" required />
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closeNew" class="btn btn-danger"
                            data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-dark">Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal de las cias-->

<div tabindex="0">
    <div class="modal fade" id="recetaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="receta">
                    <!-- Formulario -->
                    <div class="form-group mb-4">
                        

                            <h3 class="text-center">Datos del paciente</h3>
                            <!-- Nombre input -->
                            <div class="form-outline mb-4">
                                <label for="updateNombreCita">Nombre(s)</label>
                                <input type="text" id="nombreReceta" class="form-control border border-secondary"
                                    readonly />
                            </div>

                            <!-- tel input -->
                            <div class="form-outline mb-4">
                                <label for="updateTelCita">Teléfono</label>
                                <input type="tel" id="telReceta" class="form-control border border-secondary"
                                    readonly />
                            </div>

                            <h3 class="text-center">Datos del doctor</h3>
                            <!-- Nombre input -->
                            <div class="form-outline mb-4">
                                <label for="nombreDocCita">Nombre(s)</label>
                                <input type="text" id="nombreDocReceta" class="form-control border border-secondary"
                                    readonly />
                            </div>

                            <!-- Apellido input -->
                            <div class="form-outline mb-4">
                                <label for="telDocCita">Apellido(s)</label>
                                <input type="text" id="telDocReceta" class="form-control border border-secondary"
                                    readonly />
                            </div>

                            <!-- especialidad input -->
                            <div class="form-outline mb-4">
                                <label for="especialidadCita">Apellido(s)</label>
                                <input type="text" id="especialidadReceta" class="form-control border border-secondary"
                                    readonly />
                            </div>


                            <h3 class="text-center">Datos de la cita</h3>

                            <div class="form-outline mb-4">
                                <label for="fechaCita">Fecha:</label>
                                <input type="date" id="fechaReceta" class="form-control border border-secondary"
                                    min="<?php echo date('Y-m-d'); ?>" readonly>
                            </div>

                            <!-- Ubi Consultorio input -->
                            <div class="form-outline mb-4">
                                <label for="horaCita">Hora</label>
                                <input type="text" id="horaReceta" class="form-control border border-secondary"
                                    readonly />
                            </div>

                            <h3 class="text-center">Cuerpo de la receta:</h3>

                            <label for="med" class="form-label">Medicamentos:</label>
                            <textarea class="form-control border border-secondary " id="med" rows="5" readonly></textarea>

                            <label for="test" class="form-label">Pruebas:</label>
                            <textarea class="form-control border border-secondary " id="test" rows="5" readonly></textarea>
                            

                            <input type="hidden" id="hiddenidtest">

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Eliminar elemento
            $(document).on('click', '.delete-btn', function() {
                $(this).closest('div').remove(); // Eliminar el elemento del DOM
            });

            // Duplicar elemento
            $('.duplicate-btn').click(function() {
                var originalElement = $(this).closest('.modal-body').find('#divOriginal');
                var clonedElement = originalElement.clone().removeAttr('hidden'); // Clonar el elemento

                // Limpiar los valores de los campos de entrada
                clonedElement.find('input').val(''). attr('required', 'required');
             


                // Insertar el elemento clonado después del elemento original
                originalElement.after(clonedElement);

                // Agregar botón de eliminar al elemento clonado
                var deleteButton = $('<button class="btn btn-danger btn-sm delete-btn">Eliminar</button>');
                clonedElement.find('.form-outline').append(deleteButton);
              //  return false;
            });

            $('#receta').submit(function() {
                var data = []; // Array para almacenar los datos

                // Recorrer los elementos clonados para obtener los valores adicionales
                $('.modal-body #divOriginal').nextAll('[id^="divOriginal"]').each(function() {
                    var frecuencia = $(this).find('.frecuencia').val();
                    var medicamentoInput = $(this).find('.exampleDataList');
                    var medicamentoValue = medicamentoInput.val(); // Obtener el valor seleccionado del datalist
                    var medicamentoDataValue = $(this).find('option[value="' + medicamentoValue + '"]').attr('data-medicamentodatavalue');

                    data.push({
                        frecuencia: frecuencia,
                        medicamentoDataValue: medicamentoDataValue
                    });
                    $(this).remove();
                });

                // Recorrer los elementos clonados para obtener los valores adicionales
                $('.modal-body #divOriginalTest').nextAll('[id^="divOriginalTest"]').each(function() {
                    var testInput = $(this).find('.dataListTest');
                    var testValue = testInput.val(); // Obtener el valor seleccionado del datalist
                    var testDataValue = $(this).find('option[value="' + testValue + '"]').attr('data-testdatavalue');
                    data.push({
                        testDataValue: testDataValue
                    });
                    $(this).remove();
                });

                var id = $("#hiddenidtest").val();
              

                // Enviar los datos a un archivo PHP utilizando AJAX
                $.ajax({
                    url: 'guardar.php', // Ruta al archivo PHP donde se procesarán los datos
                    type: 'POST',
                    data: { data: data,
                    id:  id
                },
                    success: function(response) {
                        // Manejar la respuesta del servidor
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Manejar errores
                        console.error(error);
                    }
                });


                $("#myModal").modal("hide");
               
                return false;
            });

            // Duplicar elemento
            $('.duplicateTest-btn').click(function() {
                var originalElement = $(this).closest('.modal-body').find('#divOriginalTest');
                var clonedElement = originalElement.clone().removeAttr('hidden'); // Clonar el elemento

                // Limpiar los valores de los campos de entrada
                clonedElement.find('input').val('');
                clonedElement.find('input').attr('required', 'required');

                // Insertar el elemento clonado después del elemento original
                originalElement.after(clonedElement);

                // Agregar botón de eliminar al elemento clonado
                var deleteButton = $('<button class="btn btn-danger btn-sm delete-btn">Eliminar</button>');
                clonedElement.find('.form-outline').append(deleteButton);
                return false;
            });


            
        });
    </script>

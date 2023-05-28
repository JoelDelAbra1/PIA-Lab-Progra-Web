<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Botón para abrir el modal -->
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Abrir modal</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="divOriginal" hidden>
                        <div class="form-outline mb-4">
                        <!-- Consulta a la base de datos para obtener los medicamentos -->
                        <?php
                        include('conexion/conexion.php'); // Archivo de conexión a la base de datos

                        $sql = "SELECT * FROM medicamento";
                        $resultado = mysqli_query($conexion, $sql);
                        ?>

                        <!-- Creación del datalist -->
                        <input class="form-control exampleDataList" list="medicamentos" placeholder="Type to search...">
                        <datalist id="medicamentos">
                            <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                                <option value="<?php echo $row['nom_med']; ?>" data-medicamentodatavalue="<?php echo $row['id_med']; ?>"></option>
                            <?php endwhile; ?>
                        </datalist>

                        <!-- Ubi Consultorio input -->
                            <label for="frecuencia">Hora</label>
                            <input type="text" class="form-control border border-secondary frecuencia" required/>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm duplicate-btn">Duplicar</button> <!-- Botón de duplicar -->

                    <div id="divOriginalTest" hidden>
                        <div class="form-outline mb-4">
                        <!-- Consulta a la base de datos para obtener los medicamentos -->
                        <?php
                        include('conexion/conexion.php'); // Archivo de conexión a la base de datos

                        $sql = "SELECT * FROM test";
                        $resultado = mysqli_query($conexion, $sql);
                        ?>

                        <!-- Creación del datalist -->
                        <input class="form-control dataListTest" list="test" placeholder="MEd...">
                        <datalist id="test">
                            <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                                <option value="<?php echo $row['nom_test']; ?>" data-testdatavalue="<?php echo $row['id_test']; ?>"></option>
                            <?php endwhile; ?>
                        </datalist>
                        </div>
                    </div>


                    <button class="btn btn-primary btn-sm duplicateTest-btn">Duplicar test</button> <!-- Botón de duplicar -->


                    <button class="btn btn-success btn-sm save-btn">Guardar</button> <!-- Botón de guardar -->


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
                clonedElement.find('input').val('');

                // Insertar el elemento clonado después del elemento original
                originalElement.after(clonedElement);

                // Agregar botón de eliminar al elemento clonado
                var deleteButton = $('<button class="btn btn-danger btn-sm delete-btn">Eliminar</button>');
                clonedElement.find('.form-outline').append(deleteButton);
            });

            $('.save-btn').click(function() {
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
                });

                // Recorrer los elementos clonados para obtener los valores adicionales
                $('.modal-body #divOriginalTest').nextAll('[id^="divOriginalTest"]').each(function() {
                    var testInput = $(this).find('.dataListTest');
                    var testValue = testInput.val(); // Obtener el valor seleccionado del datalist
                    var testDataValue = $(this).find('option[value="' + testValue + '"]').attr('data-testdatavalue');
                    data.push({
                        testDataValue: testDataValue
                    });
                });

                // Enviar los datos a un archivo PHP utilizando AJAX
                $.ajax({
                    url: 'guardar.php', // Ruta al archivo PHP donde se procesarán los datos
                    type: 'POST',
                    data: { data: data },
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
                eliminarDivsDuplicados();
            });

            // Duplicar elemento
            $('.duplicateTest-btn').click(function() {
                var originalElement = $(this).closest('.modal-body').find('#divOriginalTest');
                var clonedElement = originalElement.clone().removeAttr('hidden'); // Clonar el elemento

                // Limpiar los valores de los campos de entrada
                clonedElement.find('input').val('');

                // Insertar el elemento clonado después del elemento original
                originalElement.after(clonedElement);

                // Agregar botón de eliminar al elemento clonado
                var deleteButton = $('<button class="btn btn-danger btn-sm delete-btn">Eliminar</button>');
                clonedElement.find('.form-outline').append(deleteButton);
            });


            function eliminarDivsDuplicados() {
    var divIds = {}; // Objeto para almacenar los IDs de los divs clonados

    // Recorrer los elementos clonados y guardar sus IDs en el objeto
    $('[id^="divOriginal"]').each(function() {
        var divId = $(this).attr('id');
        if (divIds.hasOwnProperty(divId)) {
            $(this).remove(); // Eliminar el div duplicado
        } else {
            divIds[divId] = true;
        }
    });

    $('[id^="divOriginalTest"]').each(function() {
        var divId = $(this).attr('id');
        if (divIds.hasOwnProperty(divId)) {
            $(this).remove(); // Eliminar el div duplicado
        } else {
            divIds[divId] = true;
        }
    });
}
        });
    </script>
</body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>

<body>

    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
        Abrir Modal
    </button>

    <!-- Modal -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-outline mb-4">
                        <label for="exampleDataList" class="form-label">Datalist example</label>
                        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                        <datalist id="datalistOptions">
                            <option value="Option 1"></option>
                            <option value="Option 2"></option>
                            <option value="Option 3"></option>
                        </datalist>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="newDataList" class="form-label">New Datalist</label>
                        <input class="form-control" list="newDatalistOptions" id="newDataList" placeholder="Type to search...">
                        <datalist id="newDatalistOptions">
                            <option value="New Option 1"></option>
                            <option value="New Option 2"></option>
                            <option value="New Option 3"></option>
                        </datalist>
                    </div>
                    <button id="addNewFields" class="btn btn-primary">Agregar Nuevo</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Enlace a la librería de jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Enlace a los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#addNewFields').click(function() {
                var newDatalist = $('<div class="form-outline mb-4"><label class="form-label">New Datalist</label><input class="form-control" list="newDatalistOptions" placeholder="Type to search..."><datalist id="newDatalistOptions"><option value="New Option 1"></option><option value="New Option 2"></option><option value="New Option 3"></option></datalist></div>');
                var newInput = $('<div class="form-outline mb-4"><label class="form-label">New Input</label><input class="form-control" placeholder="New Input"></div>');
                
                $('#myModal .modal-body').append(newDatalist);
                $('#myModal .modal-body').append(newInput);
            });
        });
    </script>
</body>
</html>



<html>
<head>
  <meta charset="UTF-8">
  <title>Intervalo de tiempo</title>
</head>
<body>
  <form>
    <label for="hora">Hora:</label>
    <select id="hora" name="hora"></select>
    <br>
    <input type="submit" value="Enviar">
  </form>

  <script>
   
  </script>
</body>
</html>
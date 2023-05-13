<!-- Incluir los archivos CSS y JS necesarios -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.jquery.min.js"></script>

<!-- HTML del select con búsqueda -->
<select id="mySelect" class="chosen-select" data-placeholder="Selecciona una especialidad">
    <option value=""></option>
    <option value="1">Especialidad 1</option>
    <option value="2">Especialidad 2</option>
    <option value="3">Especialidad 3</option>
    <!-- Agrega más opciones de especialidades aquí -->
</select>

<!-- Script para inicializar el select con búsqueda -->
<script>
    $(document).ready(function() {
        $('#mySelect').chosen({
            width: '100%',
            no_results_text: 'No se encontraron resultados para:'
        });
    });
</script>


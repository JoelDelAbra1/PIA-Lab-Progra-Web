<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notiflix Example</title>

    <!-- Agrega los enlaces a los archivos CSS de Notiflix -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notiflix@2.7.0/dist/notiflix-aio-2.7.0.min.css">
</head>

<body>
<button id="showNotification">Mostrar Notificación</button>

<!-- Agrega el enlace al archivo JavaScript de Notiflix -->
<script src="https://cdn.jsdelivr.net/npm/notiflix@2.7.0/dist/notiflix-aio-2.7.0.min.js"></script>

<!-- Agrega tu código JavaScript personalizado -->
<script>
    document.getElementById('showNotification').addEventListener('click', function() {

        Notiflix.Notify.Success('¡Notificación exitosa!');
    });
</script>
</body>

</html>

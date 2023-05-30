


var actualPag = 1;
displayData(actualPag)

$(document).ready(function () {
    displayData();
    $('#search').val("");  //Se limpia el campo de busqueda
});

// Se agrega un listener con Jquerry al campo de busuqeda, que cuando se precione un tecla se llama a la funcion searh
$("#search").on("keyup", function () {
    search();
});

// Se agrega un listener con Jquerry a la lista de registros a ver, que cuando cambie llama a la funcion paginacion
$("#num_regis").on("change", function () {
    paginacion();
});

// Se agrega un listener con Jquerry al form para crear registros, que cuando se envie se llama a la funcion addUsr
$("#add").on("submit", function (event) {
    event.preventDefault();
    addUser();

    
});$("#addCita").on("submit", function (event) {
    event.preventDefault();
    addCita();
});




// Se agrega un listener con Jquerry al form para actualizar registros, que cuando se envie se llame a la funcion Updatedetails
$("#update").on("submit", function (event) {
    event.preventDefault();
    Updatedetails();
});

// Funcion que mostrara la primera pagina cunado se realize una busqueda
function search() {
    displayData(1);
}

function paginacion() {
    displayData(1);
}

function displayData(page) {

    if (page != null) {
        actualPag = page
    }

    var displayData = "true";
    var searchAdd = $('#search').val();
    var num_regisAdd = $('#num_regis').val();

    $.ajax({
        url: "display.php",
        type: 'POST',
        data: {
            displaySend: displayData,
            searchSend: searchAdd,
            num_regisSend: num_regisAdd,
            pageSend: actualPag
        },
        success: function (data, status) {
            $('#displayDataTable').html(data);
        }
    });
}

$("#displayDataTable").on("click", ".btn-primary", function () {
    getCita($(this).closest("tr").find(".id_usr").text());
    $("#titleCita").text("Agregar Cita Usuario #" + $(this).closest("tr").find(".id_usr").text())
    $("#citaModal").modal("show");
});


$("#displayDataTable").on("click", ".btn-danger", function () {
    confDeleteUsr($(this).closest("tr").find(".id_usr").text());
    $("#cuerpo").text( "Eliminaras al usuario " + $(this).closest("tr").find(".id_usr").text());
});

$("#displayDataTable").on("click", ".btn-warning", function () {
    getUsr($(this).closest("tr").find(".id_usr").text());
    $("#titleUpdt").text("Editar usuario " + $(this).closest("tr").find(".id_usr").text())

    $("#actualizar").show();

    $("#updategenero").prop("disabled", false)
    $("#updatetipo").prop("disabled", false);

    // Campos de entrada a los que se les aplicará el modo de solo lectura
    var campos = [
        "#updatenombre",
        "#updateapellido",
        "#updatecolonia",
        "#updatecalle",
        "#updatetelefono",
        "#updatenacimiento",
        "#updateemail",
        "#updatecontra"
    ];

    // Agregar el atributo "readonly" a los campos de entrada
    campos.forEach(function(campo) {
        $(campo).removeAttr("readonly");

    });
});

$("#displayDataTable").on("click", ".btn-success", function () {
    getUsr($(this).closest("tr").find(".id_usr").text());
    $("#titleUpdt").text("Ver usuario " + $(this).closest("tr").find(".id_usr").text());

    $("#actualizar").hide();

    $("#updategenero").prop("disabled", true)
    $("#updatetipo").prop("disabled", true);

    // Campos de entrada a los que se les aplicará el modo de solo lectura
    var campos = [
        "#updatenombre",
        "#updateapellido",
        "#updatecolonia",
        "#updatecalle",
        "#updatetelefono",
        "#updatenacimiento",
        "#updateemail",
        "#updatecontra"
    ];


    // Agregar el atributo "readonly" a los campos de entrada
    campos.forEach(function(campo) {
        $(campo).attr("readonly", "readonly");

});
});



$("#nuevo").on("click",function () {
    $("#tipo").val($("#tipo option:first").val());
    $("#genero").val($("#genero option:first").val());

    $('#nombre').val('');
    $('#apellido').val('');
    $('#colonia').val('');
    $('#calle').val('');
    $('#telefono').val('');
    $('#nacimiento').val('');
    $('#email').val('');
    $('#contra').val('');
});



function addUser() {
    var tipoAdd = $('#tipo').val();
    var nombreAdd = $('#nombre').val();
    var apellidoAdd = $('#apellido').val();
    var coloniaAdd = $('#colonia').val();
    var calleAdd = $('#calle').val();
    var telefonoAdd = $('#telefono').val();
    var nacimientoAdd = $('#nacimiento').val();
    var generoAdd = $('#genero').val();
    var emailAdd = $('#email').val();
    var contraAdd = $('#contra').val();




    $.ajax({
        url: "insert.php",
        type: 'POST',
        data: {
            tipoSend: tipoAdd,
            nombreSend: nombreAdd,
            apellidoSend: apellidoAdd,
            coloniaSend: coloniaAdd,
            calleSend: calleAdd,
            telefonoSend: telefonoAdd,
            nacimientoSend: nacimientoAdd,
            generoSend: generoAdd,
            emailSend: emailAdd,
            contraSend: contraAdd

        },

        success: function (data, status) {
            //Display data
            console.log(status);
            $('#nuevoModal').modal('hide');
            $('#eliminarModal').modal('show');
            $('#cuerpo').text(status);
            $('#confDel').remove();
            displayData();
        },
        error: function (data, status){

        }

    })
}

//Eliminar un registro



function confDeleteUsr(id) {
    $('#eliminarModal').modal('show');
    $('#confDel').attr('onclick','deleteUsr('+ id +')');
    
}




function deleteUsr(id) {
    $('#eliminarModal').modal('hide');

    $.post("delete.php",{
            idSend: id
        },
         function (data, status) {
            displayData();

    });
}

function getCita(id) {

    // Se le asigna el valor de id pra
    $('#hiddenidCita').val(id)

    // jQuery para realizar una solicitud AJAX al archivo "update.php", con metodo POST
    $.post("update.php", {
        updateid: id
    },
        //función de devolución de llamada que se ejecutará cuando la solicitud AJAX se complete
        function (data, status) {
        var userid = JSON.parse(data); // Se convierte a JSON los datos obtenidos
        $('#nombreCita').val(userid.nom_usr);
        $('#apellidoCita').val(userid.ape_usr);
        $('#emailCita').val(userid.email_usr);


    }); //obtener data
}

function addCita() {
    var usrAdd = $('#hiddenidCita').val();
   var fecha = $('#fecha').val();
   var hora = $('#hora').val();

   var fechaHoraAdd = fecha + ' ' + hora;
    var docAdd = $('#doc').val();
   



    $.ajax({
        url: "insertCita.php",
        type: 'POST',
        data: {
            usrSend: usrAdd,
            fechaHoraSend: fechaHoraAdd,
            docSend: docAdd

        },

        success: function (data, status) {
            //Display data
            console.log(status);
            $('#nuevoModal').modal('hide');
            $('#eliminarModal').modal('show');
            $('#cuerpo').text(status);
            $('#confDel').remove();
            displayData();
        },
        error: function (data, status){

        }

    })
}


// Funcion para obtener los datos de un usuario en espesifico para despues modificar
function getUsr(id) {

    // Se le asigna el valor de id pra
    $('#hiddenid').val(id)

    // jQuery para realizar una solicitud AJAX al archivo "update.php", con metodo POST
    $.post("update.php", {
        updateid: id
    },
        //función de devolución de llamada que se ejecutará cuando la solicitud AJAX se complete
        function (data, status) {
        var userid = JSON.parse(data); // Se convierte a JSON los datos obtenidos
        $('#updatetipo').val(userid.id_tipo);
        $('#updatenombre').val(userid.nom_usr);
        $('#updateapellido').val(userid.ape_usr);
        $('#updatecolonia').val(userid.colonia_usr);
        $('#updatecalle').val(userid.calle_usr);
        $('#updatetelefono').val(userid.tel_usr);
        $('#updatenacimiento').val(userid.nac_usr);
        $('#updategenero').val(userid.gen_usr);
        $('#updateemail').val(userid.email_usr);
        $('#updatecontra').val(userid.pass_usr);


    }); //obtener data
    $('#updateModal').modal('show');
}

// Funcion para actualizar
function Updatedetails() {

    // Se recuperan los valores y se asignan a variables de js

    var updatetipo = $('#updatetipo').val();
    var updatenombre = $('#updatenombre').val();
    var updateapellido = $('#updateapellido').val();
    var updatecolonia = $('#updatecolonia').val();
    var updatecalle = $('#updatecalle').val();
    var updatetelefono = $('#updatetelefono').val();
    var updatenacimiento = $('#updatenacimiento').val();
    var updategenero = $('#updategenero').val();
    var updateemail = $('#updateemail').val();
    var updatecontra = $('#updatecontra').val();
    var hiddenid = $('#hiddenid').val();


    // jQuery para realizar una solicitud AJAX al archivo "update.php", con metodo POST

    $.post("update.php", {
        hiddenid: hiddenid,
        updatetipo: updatetipo,
        updatenombre: updatenombre,
        updateapellido: updateapellido,
        updatecolonia: updatecolonia,
        updatecalle: updatecalle,
        updatetelefono: updatetelefono,
        updatenacimiento: updatenacimiento,
        updategenero: updategenero,
        updateemail: updateemail,
        updatecontra: updatecontra
    },
        //función de devolución de llamada que se ejecutará cuando la solicitud AJAX se complete
        function (data, status) {
        $('#updateModal').modal('hide'); // Se cierra el modal
        displayData(); // Se vuelve a mostrar los datos ya actualizados
    });
}

 // Obtener el elemento select
 var selectHora = document.getElementById("hora");

 // Definir el horario laboral
 var horaInicio = 9; // Hora de inicio (formato de 24 horas)
 var horaFin = 17; // Hora de fin (formato de 24 horas)
 var intervalo = 45; // Intervalo de tiempo (en minutos)

 // Convertir las horas a minutos
 var inicioEnMinutos = horaInicio * 60;
 var finEnMinutos = horaFin * 60;

 for (var i = inicioEnMinutos; i < finEnMinutos; i += intervalo) {
   var horas = Math.floor(i / 60); // Obtener las horas
   var minutos = i % 60; // Obtener los minutos

   // Formatear las horas y minutos
   var horaFormateada = ("0" + horas).slice(-2); // Añadir un cero inicial si es necesario
   var minutosFormateados = ("0" + minutos).slice(-2); // Añadir un cero inicial si es necesario

   // Crear la opción y agregarla al select
   var opcion = document.createElement("option");
   opcion.value = horaFormateada + ":" + minutosFormateados;
   opcion.textContent = horaFormateada + ":" + minutosFormateados;
   selectHora.appendChild(opcion);
 }

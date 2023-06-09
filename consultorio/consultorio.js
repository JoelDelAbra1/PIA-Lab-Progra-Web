


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

$("#displayDataTable").on("click", ".btn-danger", function () {
    confDeleteUsr($(this).closest("tr").find(".id_usr").text());
    $("#cuerpo").text( "Eliminaras el consultorio #" + $(this).closest("tr").find(".id_usr").text());
});

$("#displayDataTable").on("click", ".btn-warning", function () {
    getUsr($(this).closest("tr").find(".id_usr").text());
    $("#titleUpdt").text("Editar consultorio #" + $(this).closest("tr").find(".id_usr").text())

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
    var numAdd = $('#num').val();
    var ubiAdd = $('#ubi').val();


    $.ajax({
        url: "insert.php",
        type: 'POST',
        data: {
            numSend: numAdd,
            ubiSend: ubiAdd,
        },

        success: function (data, status) {


            Notiflix.Notify.Success('Se agrego correctamente');
            $('#nuevoModal').modal('hide');
            displayData();
        },
        error: function (data, status){
            Notiflix.Notify.failure('No se agrego correctamente');
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
         function (response) {
             if (response.error) {
                 // Si hay un error en la ejecución de la consulta, muestra una notificación de error
                 Notiflix.Notify.Failure('Error en la consulta SQL.');
             } else {
                 // Si la consulta se ejecuta correctamente, muestra una notificación de éxito
                 Notiflix.Notify.Success('Consulta SQL ejecutada correctamente.');
                 displayData()
             }
         }, 'json')
        .fail(function() {
            // Si hay un error en la petición POST, muestra una notificación de error
            Notiflix.Notify.Failure('Error en la petición POST.');
        });
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
        $('#updatenum').val(userid.num_cons);
        $('#updateubi').val(userid.ubi_cons);
    }); //obtener data
    $('#updateModal').modal('show');
}

// Funcion para actualizar
function Updatedetails() {

    // Se recuperan los valores y se asignan a variables de js

    var updatenum = $('#updatenum').val();
    var updateubi = $('#updateubi').val();

    var hiddenid = $('#hiddenid').val();


    // jQuery para realizar una solicitud AJAX al archivo "update.php", con metodo POST

    $.ajax({
                url: "update.php",
            type: 'POST',
            data:  {
        hiddenid: hiddenid,
        updatenum: updatenum,
        updateubi: updateubi,
    },
        success: function (data, status) {
            Notiflix.Notify.Success('Se actualizo correctamente');
        $('#updateModal').modal('hide'); // Se cierra el modal
        displayData(); // Se vuelve a mostrar los datos ya actualizados
    },
    error: function (data, status){
        Notiflix.Notify.failure('Qui timide rogat docet negare');
    }

    });
}

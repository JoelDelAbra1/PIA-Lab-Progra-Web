


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
$("#add").on("submit", function () {
    addUser();
});

// Se agrega un listener con Jquerry al form para actualizar registros, que cuando se envie se llame a la funcion Updatedetails
$("#update").on("submit", function () {
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
    $("#cuerpo").text( "Eliminaras al usuario " + $(this).closest("tr").find(".id_usr").text());
});

$("#displayDataTable").on("click", ".btn-warning", function () {
    getUsr($(this).closest("tr").find(".id_usr").text());
    $("#titleUpdt").text("Editar usuario " + $(this).closest("tr").find(".id_usr").text())

    $("#actualizar").show();

  // Campos de entrada a los que se les aplicará el modo de solo lectura
  $("#updatedoc").prop("disabled", false);
  $("#updatecons").prop("disabled", false);
  $("#updateespecialidad").prop("disabled", false);
  $("#updatetrayectoria").removeAttr("readonly");

  
    
});

//Mostrar los campos para ver

$("#displayDataTable").on("click", ".btn-success", function () {
    getUsr($(this).closest("tr").find(".id_usr").text());
    $("#titleUpdt").text("Ver doctor " + $(this).closest("tr").find(".id_usr").text());

    $("#actualizar").hide();
 // Campos de entrada a los que se les aplicará el modo de solo lectura
    $("#updatedoc").prop("disabled", true);
    $("#updatecons").prop("disabled", true);
    $("#updateespecialidad").prop("disabled", true);
    $("#updatetrayectoria").attr("readonly", "readonly");
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
    var docAdd = $('#doc').val();
    var consAdd = $('#cons').val();
    var especialidadAdd = $('#especialidad').val();
    var trayectoriaAdd = $('#trayectoria').val();



    $.ajax({
        url: "insert.php",
        type: 'POST',
        data: {
            docSend: docAdd,
            consSend: consAdd,
            especialidadSend: especialidadAdd,
            trayectoriaSend: trayectoriaAdd,
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

            $('#updatedoc').val(userid.id_doc);
            $('#updatecons').val(userid.id_cons);
            $('#updateespecialidad').val(userid.id_esp);
            $('#updatetrayectoria').val(userid.traye_doc);
    }); //obtener data
    $('#updateModal').modal('show');
}

// Funcion para actualizar
function Updatedetails() {

    // Se recuperan los valores y se asignan a variables de js

    var updatecons = $('#updatecons').val();
    var updateespecialidad = $('#updateespecialidad').val();
    var updatetrayectoria = $('#updatetrayectoria').val();
    var hiddenid = $('#hiddenid').val();


    // jQuery para realizar una solicitud AJAX al archivo "update.php", con metodo POST

    $.post("update.php", {
        hiddenid: hiddenid,
            updatecons: updatecons,
            updateespecialidad: updateespecialidad,
            updatetrayectoria: updatetrayectoria,

    },
        //función de devolución de llamada que se ejecutará cuando la solicitud AJAX se complete
        function (data, status) {
        $('#updateModal').modal('hide'); // Se cierra el modal
        displayData(); // Se vuelve a mostrar los datos ya actualizados
    });
}

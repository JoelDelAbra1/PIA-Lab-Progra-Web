


var actualPag = 1;

displayData(actualPag)

$(document).ready(function () {
    displayData();
    $('#search').val("");
});

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
            displayData();
        }

    })
}

//Eliminar un registro





function confDeleteUsr(id) {
    $('#eliminarModal').modal('show');
    $('#confDel').attr('onclick','deleteUsr('+ id +')');
    
}


function deleteUsr(id) {


    

    $.ajax({
        url: "delete.php",
        type: "POST",
        data: {
            idSend: id
        },
        success: function (data, status) {
            displayData();
        }
    });
}

//Update

function getUsr(id) {


    $('#hiddenid').val(id)

    $.post("update.php", { updateid: id }, function (data, status) {
        var userid = JSON.parse(data); //obtiene el valor
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


//cuando se le click a update
function Updatedetails() {
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

    $.post("update.php", {
        hiddenid: hiddenid, ///No jalaba
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
    }, function (data, status) {
        $('#updateModal').modal('hide');
        displayData();
    });
}

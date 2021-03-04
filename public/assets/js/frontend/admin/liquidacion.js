function eliminar(id) {

    swal({
        title: "Eliminar?",
        text: "esta Seguro de eliminar!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55  ",
        confirmButtonText: "Si, eliminalo!",
        closeOnConfirm: false
    }, function () {
        eliminarAsociado(id);
        swal("Eliminado!", "eliminacion correcta.", "success");
    });
}

function eliminarAsociado(id) {

    $.ajax({
        type: 'post',
        url: urleliminarasociado,
        dataType: "json",
        data: {idcompania: id, '_token': token},
        beforeSend: function (xhr) {
            //alert(id);
        }
    }).done(function (dataRpta) {
        //alert(JSON.stringify(dataRpta));

        listarPago();

        //alert(dataRpta.message);
    }).fail(function (jqXHR, textStatus) {
        alert("jqXHR: " + jqXHR + " - " + "Request failed: " + textStatus);
    }).always(function () {
    });
}
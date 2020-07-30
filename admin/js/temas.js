function agregarTemas() {
    var temas     = $('#temas').val();
    var descripcion = $('#descripcion').val();

    if (temas == "" || descripcion == ""){
        swal("Debes llenar todos los datos...:(");
        return false;
    }else{
        var formData = new FormData(document.getElementById('frmTemas'));
        $.ajax({
            type:"POST",
            datatype:"html",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            url:"../procesos/temas/agregarTemas.php",
            success:function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1){
                    $('#tablaTemas').load("temas/tablaTemas.php");
                    $('#temas').val("");
                    $('#descripcion').val("");
                    swal(":)","Agregado con exito !","success");
                }else{
                    swal(":(","Fallo al agregar !","error");
                }
            }
        });

    }
}

function eliminarTemas(idTemas) {
    idTemas = parseInt(idTemas);
    if (idTemas < 1){
        swal("No tienes id de categoria !");
        return false;
    }else{
        //*****************************************
        swal({
            title: "Estas seguro de eliminar a este Tema?",
            text: "Una vez eliminada, no podra recuperarse!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        data: "idTemas=" + idTemas,
                        url: "../procesos/temas/eliminarTemas.php",
                        success: function (respuesta) {
                            respuesta = respuesta.trim();
                            if (respuesta == 1){
                                $('#tablaTemas').load("temas/tablaTemas.php");
                                swal("Eliminado con exito!", {
                                    icon: "success",
                                });
                            }else {
                                swal(":(","Fallo al eliminar!","error")
                            }
                        }
                    });

                }
            });
        //*****************************************
    }
}

function obtenerDatosTemas(idTemas) {
    $.ajax({
        type:"POST",
        data:"idTemas="+idTemas,
        url:"../procesos/Temas/obtenerTemas.php",
        success:function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#idTemas').val(respuesta['idTemas']);
            $('#temasU').val(respuesta['temas']);
            $('#descripcionU').val(respuesta['descripcion']);
        }
    })
}

function actualizaTemas() {
    if ($('#temasU').val() == "" || $('#descripcionU').val() == ""){
        swal("Los campos tienen que estar llenados!! :(");
        return false;
    }else{
        $.ajax({
            type:"POST",
            data:$('#frmActualizaTemas').serialize(),
            url:"../procesos/temas/actualizaTemas.php",
            success:function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1){
                    $('#tablaTemas').load("temas/tablaTemas.php");

                    swal(":)","Actualizado con exito!","success");
                }else{
                    swal(":(","Fallo al actualizar!","error");
                }
            }
        });
    }
}
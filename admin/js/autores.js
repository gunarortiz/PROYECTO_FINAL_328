function agregarAutores() {
    var autor     = $('#autor').val();
    var localidad = $('#localidad').val();
    var telefono  = $('#telefono').val();
    var profecion = $('#profecion').val();
    if (autor == "" || localidad == ""|| telefono ==""||profecion==""){
        swal("Debes llenar todos los datos");
        return false;
    }else{
        var formData = new FormData(document.getElementById('frmAutor'));
        $.ajax({
            type:"POST",
            datatype:"html",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            url:"../procesos/autor/agregarAutor.php",
            success:function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1){
                    $('#tablaAutores').load("autores/tablaAutores.php");
                    $('#autor').val("");
                    $('#localidad').val("");
                    $('#telefono').val("");
                    $('#profecion').val("");
                    swal(":)","Agregado con exito !","success");
                }else{
                    swal(":(","Fallo al agregar !","error");
                }
            }
        });

    }
}

function eliminarAutor(idAutor) {
    idAutor = parseInt(idAutor);
    if (idAutor < 1){
        swal("No tienes id de categoria !");
        return false;
    }else{
        //*****************************************
        swal({
            title: "Estas seguro de eliminar a este Autor?",
            text: "Una vez eliminada, no podra recuperarse!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        data: "idAutor=" + idAutor,
                        url: "../procesos/autor/eliminarAutor.php",
                        success: function (respuesta) {
                            respuesta = respuesta.trim();
                            if (respuesta == 1){
                                $('#tablaAutores').load("autores/tablaAutores.php");
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

function obtenerDatosAutores(idAutor) {
    $.ajax({
        type:"POST",
        data:"idAutor="+idAutor,
        url:"../procesos/autor/obtenerAutor.php",
        success:function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#idAutor').val(respuesta['idAutor']);
            $('#autorU').val(respuesta['autor']);
            $('#localidadU').val(respuesta['localidad']);
            $('#telefonoU').val(respuesta['telefono']);
            $('#profecionU').val(respuesta['profecion']);

        }
    })
}

function actualizaAutor() {
    if ($('#autorU').val() == "" || $('#localidadU').val() == ""||$('#telefonoU').val() == ""||$('#profecionU').val() == ""){
        swal("Los campos tienen que estar llenados!! :(");
        return false;
    }else{
        $.ajax({
            type:"POST",
            data:$('#frmActualizaAutor').serialize(),
            url:"../procesos/autor/actualizaAutor.php",
            success:function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1){
                    $('#tablaAutores').load("autores/tablaAutores.php");

                    swal(":)","Actualizado con exito!","success");
                }else{
                    swal(":(","Fallo al actualizar!","error");
                }
            }
        });
    }
}
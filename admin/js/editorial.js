function agregarEditorial() {
    var editorial = $('#editorial').val();
    var localidad = $('#localidad').val();
    var telefono = $('#telefono').val();
    var descripcion = $('#descripcion').val();
    if (editorial == ""||localidad == ""||telefono == ""||descripcion == ""){
        swal("Debes agregar todos los campos");
        return false;
    }else{
        var formData = new FormData(document.getElementById('frmEditorial'));
        $.ajax({
            type:"POST",
            datatype:"html",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            url:"../procesos/editorial/agregarEditorial.php",
            success:function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1){
                    $('#tablaEditorial').load("editorial/tablaEditorial.php");
                    $('#editorial').val("");
                    $('#localidad').val("");
                    $('#telefono').val("");
                    $('#descripcion').val("");
                    swal(":)","Agregado con exito !","success");
                }else{
                    swal(":(","Fallo al agregar !","error");
                }
            }
        });

    }
}

function eliminarEditorial(idEditorial) {
    idEditorial = parseInt(idEditorial);
    if (idEditorial < 1){
        swal("No tienes id de la Editorial.. !");
        return false;
    }else{
        //*****************************************
        swal({
            title: "Estas seguro de eliminar esta Editorial?",
            text: "Una vez eliminada, no podra recuperarse!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        data: "idEditorial=" + idEditorial,
                        url: "../procesos/editorial/eliminarEditorial.php",
                        success: function (respuesta) {
                            respuesta = respuesta.trim();
                            if (respuesta == 1){
                                $('#tablaEditorial').load("editorial/tablaEditorial.php");
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

function obtenerDatosEditorial(idEditorial) {
    $.ajax({
        type:"POST",
        data:"idEditorial="+idEditorial,
        url:"../procesos/editorial/obtenerEditorial.php",
        success:function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#idEditorial').val(respuesta['idEditorial']);
            $('#editorialU').val(respuesta['editorial']);
            $('#localidadU').val(respuesta['localidad']);
            $('#telefonoU').val(respuesta['telefono']);
            $('#descripcionU').val(respuesta['descripcion']);
        }
    })
}

function actualizaEditorial() {
    if ($('#editorialU').val() == ""||$('#localidadU').val() == ""||$('#telefonoU').val() == ""||$('#descripcionU').val() == ""){
        swal("Los campos tienen que estar llenados !!  :(");
        return false;
    }else{
        $.ajax({
            type:"POST",
            data:$('#frmActualizaEditorial').serialize(),
            url:"../procesos/editorial/actualizaEditorial.php",
            success:function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1){
                    $('#tablaEditorial').load("editorial/tablaEditorial.php");

                    swal(":)","Actualizado con exito!","success");
                }else{
                    swal(":(","Fallo al actualizar!","error");
                }
            }
        });
    }
}
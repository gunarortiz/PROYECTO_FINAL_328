function agregarUsuarios() {
    var nombre          = $('#nombreUsuario').val();
    var fechaNacimiento = $('#fechaNacimientoUsuario').val();
    var correo           = $('#correoUsuario').val();
    var usuario         = $('#usuarioUsuario').val();
    var password        = $('#contraseñaUsuario').val();
    var rol             = $('#rolUsuario').val();

    if (nombre == "" || fechaNacimiento == "" ||correo==""|| email == "" || usuario == "" || password =="" || rol ==""){
        swal(":(","Debes agregar Todos los campos","error");
        return false;
    }else{
        $.ajax({
            type:"POST",
            data:$('#frmUsuarios').serialize(),
            url:"../procesos/usuario/registro/agregarUsuario.php",
            success:function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1){
                    $('#tablaUsuarios').load("usuarios/tablaUsuarios.php");
                    $('#frmUsuarios').val("");
                    swal(":)","Agregado con exito Usuario!","success");
                }else{
                    swal(":(","Fallo al agregar Usuario!","error");
                }
            }
        });

    }
}

function eliminarUsuario(idUsuario) {
    idUsuario = parseInt(idUsuario);
    if (idUsuario < 1){
        swal("No tienes id de Usuario !");
        return false;
    }else{
        //*****************************************
        swal({
            title: "Estas seguro de eliminar este Usuario?",
            text: "Una vez eliminada, no podra recuperarse!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        data: "idUsuario=" + idUsuario,
                        url: "../procesos/usuario/eliminarUsuario.php",
                        success: function (respuesta) {
                            respuesta = respuesta.trim();
                            if (respuesta == 1){
                                $('#tablaUsuarios').load("usuarios/tablaUsuarios.php");
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

function obtenerDatosUsuario(idUsuario) {
    $.ajax({
        type:"POST",
        data:"idUsuario="+idUsuario,
        url:"../procesos/usuario/obtenerUsuario.php",
        success:function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#idUsuario').val(respuesta['idUsuario']);
            $('#nombreU').val(respuesta['nombreUsuario']);
            $('#fechaNacimientoU').val(respuesta['fechaNacimientoUsuario']);
            $('#correoU').val(respuesta['correoUsuario']);
            $('#usuarioU').val(respuesta['usuarioUsuario']);
            $('#contraseñaU').val(respuesta['contraseñaUsuario']);
        }
    })
}

function actualizaUsuario() {
    if ($('#categoriaU').val() == ""){
        swal("No hay categoria!!");
        return false;
    }else{
        $.ajax({
            type:"POST",
            data:$('#frmActualizaCategoria').serialize(),
            url:"../procesos/categorias/actualizaCategoria.php",
            success:function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1){
                    $('#tablaCategorias').load("categorias/tablaCategoria.php");

                    swal(":)","Actualizado con exito!","success");
                }else{
                    swal(":(","Fallo al actualizar!","error");
                }
            }
        });
    }
}
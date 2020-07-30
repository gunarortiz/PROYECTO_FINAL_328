<?php
require_once "clases/Conexion.php";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
    <link rel="stylesheet" href="librerias/jquery-ui-1.12.1/jquery-ui.css">
    <script></script>
    <style>

        body {
            margin: 0;
            padding: 0;
            background-image: url("img/body.png");
            width: 100%;
            background-position: center;
        }

    </style>
</head>
<body>
<div class="container" style="box-shadow: 15px 15px 80px #b2bec3; border:1px solid">
    <h2 style="text-align: center;color: #000000" class="titulo">Registro de usuario</h2>
    <hr>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-12">
            <form action="" id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off" >
                <div class="row">
                    <div class="col-md-4" style="color: #000000; text-align: left">
                        <label class="lastname" for="">Nombre Personal</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="nombre" id="nombre" class="form-control form-control-sm"
                               placeholder="Nombre" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" style="color: #000000; text-align: left">
                        <label class="lastname" for="">Numero de C.I</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="carnet" id="carnet" class="form-control form-control-sm"
                               placeholder="Carnet" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" style="color: #000000; text-align: left">
                        <label class="lastname" for="">Fecha Nacimiento</label>
                    </div>

                    <div class="col-md-8">
                        <input type="text" name="fechaNacimiento" id="fechaNacimiento"
                               class="form-control form-control-sm" required="" placeholder="Fecha Nacimiento"
                               readonly="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" style="color: #000000; text-align: left">
                        <label class="lastname" for="">Ocupacion</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="trabajo" id="trabajo" class="form-control form-control-sm"
                               placeholder="Ocupacion" required="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" style="color: #000000; text-align: left">
                        <label class="lastname" for="">Email o Correo</label>
                    </div>
                    <div class="col-md-8">
                        <input type="email" name="correo" id="correo" class="form-control form-control-sm" required=""
                               placeholder="Correo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" style="color: #000000; text-align: left">
                        <label class="lastname" for="">Nombre de Usuario</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="usuario" id="usuario" class="form-control form-control-sm" required=""
                               placeholder="Usuario">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4" style="color:#000000; text-align: left">
                        <label class="lastname" for="">Password o Contraseña</label>
                    </div>
                    <div class="col-md-8">
                        <input type="password" name="password" id="password" class="form-control form-control-sm"
                               required="" placeholder="Contraseña">
                    </div>
                </div>
                <?php
                $conexion = Conectar::conexion();
                $query_rol = mysqli_query($conexion, "SELECT * FROM rol");
                mysqli_close($conexion);
                $result_rol = mysqli_num_rows($query_rol);
                ?>
                <div class="row">
                    <div class="col-md-4" style="color: white; text-align: left">
                        <label class="lastname" for="">Nivel de Acceso</label>
                    </div>
                    <div class="col-md-8">
                        <select  name="rol" id="rol" class="form-control form-control-sm"
                                required="" placeholder="Contraseña">
                            <option value="" style="background-color: white"> --- Elija una Opcion ---</option>
                            <?php
                            if ($result_rol > 0) {
                                while ($rol = mysqli_fetch_array($query_rol)) {
                                    ?>
                                    <option value="<?php echo $rol["idrol"]?>" style="background-color: white"><?php echo $rol["rol"]?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <br>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-primary">Resitrar</button>
                        <a href="vistas/usuarios.php" class="btn btn-success">Volver</a>
                    </div>
                </div>
                <br>
            </form>
        </div>
        <div class="col-sm-1"></div>
    </div>

</div>
<script src="librerias/jquery-3.4.1.min.js"></script>
<script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="librerias/sweetalert.min.js"></script>
<script type="text/javascript">
    $(function () {
        var fechaA = new Date();
        var yyyy = fechaA.getFullYear();
        $("#fechaNacimiento").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '1900:' + yyyy,
            dateFormat: "dd-mm-yy"
        });
    });

    function agregarUsuarioNuevo() {

        $.ajax({
            method: "POST",
            data: $('#frmRegistro').serialize(),
            url: "procesos/usuario/registro/agregarUsuario.php",
            success: function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    $("#frmRegistro")[0].reset(); //con esto reseteamos el formulario
                    swal(":)", "Agregado con exito!", "success");
                } else {
                    swal(":(", "Fallo al agregar !", "error");
                }
                if (respuesta == 2) {
                    swal("Arvertencia", "Este Usuario ya existe, por favor escribe otro !!!", "warning");
                } else {
                    $("#frmRegistro")[0].reset(); //con esto reseteamos el formulario
                    swal(":)", "Agregado con exito!", "success");
                }


            }
        });
        return false;
    }
</script>

</body>
</html>


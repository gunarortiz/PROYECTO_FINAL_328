<?php
session_start();
require_once "../clases/Conexion.php";

if (isset($_SESSION['usuario'])) {
    include "heder.php";
    ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-user-plus"></i> USUARIOS</h1>
            <p>Podra registrar a los usuarios que podran ingresar a este sistema  :) </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="inicio.php">INICIO</a></li>
        </ul>
    </div>


        <div class="container">
            <h2 class="display-4">Lista de Usuarios</h2>

            <div class="row">
                <div class="col-sm-4">
                    <a href="../registro.php" class="btn btn-primary btn-sm">
                        <span class="fas fa-folder-plus"></span>  Agregar Nuevo Usuario
                    </a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaUsuarios"></div>
                </div>
            </div>
        </div>




    <!-- Modal -->
    <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #273c75; color: white">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmUsuarios" >
                        <label for="">Nombre Personal :</label>
                        <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control form-control-sm">
                        <label for="">Fecha Nacimiento :</label>
                        <input type="text" name="fechaNacimientoUsuario" id="fechaNacimientoUsuario" class="form-control form-control-sm">
                        <label for="">Email o Correo :</label>
                        <input type="text" name="correoUsuario" id="correoUsuario" class="form-control form-control-sm">
                        <label for="">Nombre de Usuario :</label>
                        <input type="text" name="usuarioUsuario" id="usuarioUsuario" class="form-control form-control-sm">
                        <label for="">Password o Contraseña :</label>
                        <input type="password" name="contraseñaUsuario" id="contraseñaUsuario" class="form-control form-control-sm">
                        <?php
                        $conexion = Conectar::conexion();
                        $query_rol = mysqli_query($conexion, "SELECT * FROM rol");
                        mysqli_close($conexion);
                        $result_rol = mysqli_num_rows($query_rol);
                        ?>
                        <label for="">Nivel de Acceso :</label>
                        <select  name="rolUsuario" id="rolUsuario" class="form-control form-control-sm"
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarUsuarios">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalActualizarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #f39c12; color: white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmActualizaUsuario" method="post">
                        <input type="text" name="idUsuario" id="idUsuario" hidden="" class="form-control form-control-sm">
                        <label for="">Nombre Personal :</label>
                        <input type="text" name="nombreU" id="nombreU" class="form-control form-control-sm">
                        <label for="">Fecha Nacimiento :</label>
                        <input type="text" name="fechaNacimientoU" id="fechaNacimientoU" class="form-control form-control-sm">
                        <label for="">Email o Correo :</label>
                        <input type="text" name="correoU" id="correoU" class="form-control form-control-sm">
                        <label for="">Nombre de Usuario :</label>
                        <input type="text" name="usuarioU" id="usuarioU" class="form-control form-control-sm">
                        <label for="">Nivel de Acceso :</label>
                        <?php
                        $conexion = Conectar::conexion();
                        $query_rol = mysqli_query($conexion, "SELECT * FROM rol");
                        mysqli_close($conexion);
                        $result_rol = mysqli_num_rows($query_rol);


                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <select  name="rol" id="rol" class="form-control form-control-sm" required="">
                                    <option value=""> --- Elija una Opcion ---</option>
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
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" id="btnCarrarUpdateCategoria">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btnActualizaUsuario">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "footer.php";
    ?>
    <!--Dependencia de categorias, todas las funciones js de categorias-->
    <script src="../js/usuario.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#tablaUsuarios').load("usuarios/tablaUsuarios.php");
            $('#btnGuardarUsuarios').click(function () {
                agregarUsuarios();
            });

            $('#btnActualizaUsuario').click(function () {
                actualizaUsuario();
            })
        });


    </script>

    <?php
}else{
    header("location:../index.php");
}
?>


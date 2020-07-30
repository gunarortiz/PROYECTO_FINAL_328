<?php
session_start();

if (isset($_SESSION['usuario'])) {
    include "heder.php";
    ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>Gestor de Archivos para que puedas guardar tus libros en PDF </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="inicio.php">INICIO</a></li>
        </ul>
    </div>


        <div class="container">
            <h1 class="display-4">Temas</h1>

            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregaTemas">
                        <span class="fas fa-folder-plus"></span>  Agregar Nuevo Tema
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaTemas"></div>
                </div>
            </div>
        </div>




    <!-- Modal -->
    <div class="modal fade" id="modalAgregaTemas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #273c75; color: white">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Tema</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmTemas" method="post">
                        <label for="">Nombre del Tema :</label>
                        <input type="text" name="temas" id="temas" class="form-control form-control-sm">
                        <label for="">Descripcion :</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control form-control-sm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarTemas">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalActualizarTemas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #f39c12; color: white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Temas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmActualizaTemas">
                        <input type="text" name="idTemas" id="idTemas" hidden="" class="form-control form-control-sm">
                        <label for="">Nombre del Tema :</label>
                        <input type="text" name="temasU" id="temasU" class="form-control form-control-sm">
                        <label for="">Descripcion :</label>
                        <input type="text" name="descripcionU" id="descripcionU" class="form-control form-control-sm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" id="btnCarrarUpdateTemas">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btnActualizaTemas">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
    <!--Dependencia de categorias, todas las funciones js de Autores-->
    <script src="../js/temas.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#tablaTemas').load("temas/tablaTemas.php");
            $('#btnGuardarTemas').click(function () {
                agregarTemas();
            });
            
            $('#btnActualizaTemas').click(function () {
                actualizaTemas();
            })
        });
    </script>
<?php
}else{
    header("location:../index.php");
}
?>

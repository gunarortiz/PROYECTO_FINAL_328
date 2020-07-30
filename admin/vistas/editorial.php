<?php
session_start();

if (isset($_SESSION['usuario'])) {
    include "heder.php";
    ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-university"></i>  EDITORIAL</h1>
            <p>Registre la editorial que corresponda el Libro sin estos datos no podra registrar sus Libros  :) </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="inicio.php">INICIO</a></li>
        </ul>
    </div>


        <div class="container">
            <h1 class="display-4">Editorial</h1>

            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregaEditorial">
                        <span class="fas fa-folder-plus"></span>  Agregar Nueva Editorial
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaEditorial"></div>
                </div>
            </div>
        </div>




    <!-- Modal -->
    <div class="modal fade" id="modalAgregaEditorial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #273c75; color: white">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Editorial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmEditorial" method="post">
                        <label for="">Nombre de la Editorial :</label>
                        <input type="text" name="editorial" id="editorial" class="form-control form-control-sm">
                        <label for="">Localidad :</label>
                        <input type="text" name="localidad" id="localidad" class="form-control form-control-sm">
                        <label for="">Telefono:</label>
                        <input type="number" name="telefono" id="telefono" class="form-control form-control-sm">
                        <label for="">Descripcion :</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control form-control-sm">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarEditorial">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalActualizarEditorial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #f39c12; color: white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Editorial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmActualizaEditorial">
                        <input type="text" name="idEditorial" id="idEditorial" hidden="" class="form-control form-control-sm">
                        <label for="">Nombre de la Editorial :</label>
                        <input type="text" name="editorialU" id="editorialU" class="form-control form-control-sm">
                        <label for="">Localidad :</label>
                        <input type="text" name="localidadU" id="localidadU" class="form-control form-control-sm">
                        <label for="">Telefono:</label>
                        <input type="number" name="telefonoU" id="telefonoU" class="form-control form-control-sm">
                        <label for="">Descripcion :</label>
                        <input type="text" name="descripcionU" id="descripcionU" class="form-control form-control-sm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" id="btnCarrarUpdateCategoria">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btnActualizaEditorial">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
    <!--Dependencia de categorias, todas las funciones js de categorias-->
    <script src="../js/editorial.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#tablaEditorial').load("editorial/tablaEditorial.php");
            $('#btnGuardarEditorial').click(function () {
                agregarEditorial();
            });
            
            $('#btnActualizaEditorial').click(function () {
                actualizaEditorial();
            })
        });
    </script>
<?php
}else{
    header("location:../index.php");
}
?>

<?php
session_start();

if (isset($_SESSION['usuario'])) {
    include "heder.php";
    ?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-user"></i>  Autores</h1>
            <p>Registe a los Autores para poder usarlos en el registro de sus Libros  :) </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="inicio.php">INICIO</a></li>
        </ul>
    </div>


        <div class="container">
            <h1 class="display-4">Autores</h1>

            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregaautor">
                        <span class="fas fa-folder-plus"></span>  Agregar Nueva Autor
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaAutores"></div>
                </div>
            </div>
        </div>




    <!-- Modal -->
    <div class="modal fade" id="modalAgregaautor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #273c75; color: white">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmAutor" method="post">
                        <label for="">Nombre del Autor :</label>
                        <input type="text" name="autor" id="autor" class="form-control form-control-sm">
                        <label for="">Localidad :</label>
                        <input type="text" name="localidad" id="localidad" class="form-control form-control-sm">
                        <label for="">Telefono :</label>
                        <input type="number" name="telefono" id="telefono" class="form-control form-control-sm">
                        <label for="">Profecion :</label>
                        <input type="text" name="profecion" id="profecion" class="form-control form-control-sm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarAutor">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalActualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #f39c12; color: white">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmActualizaAutor">
                        <input type="text" name="idAutor" id="idAutor" hidden="" class="form-control form-control-sm">
                        <label for="">Nombre del Autor :</label>
                        <input type="text" name="autorU" id="autorU" class="form-control form-control-sm">
                        <label for="">Localidad :</label>
                        <input type="text" name="localidadU" id="localidadU" class="form-control form-control-sm">
                        <label for="">Telefono :</label>
                        <input type="number" name="telefonoU" id="telefonoU" class="form-control form-control-sm">
                        <label for="">Profecion :</label>
                        <input type="text" name="profecionU" id="profecionU" class="form-control form-control-sm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" id="btnCarrarUpdateAutor">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btnActualizaAutor">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
    <!--Dependencia de categorias, todas las funciones js de Autores-->
    <script src="../js/autores.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#tablaAutores').load("autores/tablaAutores.php");
            $('#btnGuardarAutor').click(function () {
                agregarAutores();
            });
            
            $('#btnActualizaAutor').click(function () {
                actualizaAutor();
            })
        });
    </script>
<?php
}else{
    header("location:../index.php");
}
?>

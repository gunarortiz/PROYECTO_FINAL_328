<?php
session_start();

if (isset($_SESSION['usuario'])) {
    include "heder.php";
    ?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-address-book"></i> CATEGORIAS</h1>
            <p>Registre sus Categorias para luego poder usarlas en el registro de sus Libros :) </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="inicio.php">INICIO</a></li>
        </ul>
    </div>


        <div class="container">
            <h1 class="display-4">Categorias</h1>

            <div class="row">
                <div class="col-sm-4">
                    <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregacategoria">
                        <span class="fas fa-folder-plus"></span>  Agregar Nueva categoria
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaCategorias"></div>
                </div>
            </div>
        </div>




    <!-- Modal -->
    <div class="modal fade" id="modalAgregacategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: #273c75; color: white">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmCategorias" method="post">
                        <label for="">Nombre de la Categoria :</label>
                        <input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control form-control-sm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
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
                    <form id="frmActualizaCategoria">
                        <input type="text" name="idCategoria" id="idCategoria" hidden="" class="form-control form-control-sm">
                        <label for="">Nombre de la Categoria :</label>
                        <input type="text" name="categoriaU" id="categoriaU" class="form-control form-control-sm">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" id="btnCarrarUpdateCategoria">Cerrar</button>
                    <button type="button" class="btn btn-warning" id="btnActualizaCategoria">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
    <!--Dependencia de categorias, todas las funciones js de categorias-->
    <script src="../js/categorias.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#tablaCategorias').load("categorias/tablaCategoria.php");
            $('#btnGuardarCategoria').click(function () {
                agregarCategoria();
            });
            
            $('#btnActualizaCategoria').click(function () {
                actualizaCategoria();
            })
        });
    </script>
<?php
}else{
    header("location:../index.php");
}
?>

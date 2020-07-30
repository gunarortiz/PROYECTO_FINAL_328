<?php
include_once "../clases/Conexion.php";
    session_start();
    if (isset($_SESSION['usuario'])){

        include "heder.php";

    ?>
        <style>
            .forma{
                border:none;
                color:white;

            }
        </style>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-book"></i> LIBROS</h1>
            <p>Registre sus libros en linea recuerde que tenia que llenar los datos anterios para que su libro se guarde adecuadamente </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="inicio.php">INICIO</a></li>
        </ul>
    </div>


    <div class="container">
        <h1 class="display-4">Pedro Poveda</h1>
        <?php if($_SESSION['rol']==1){?>
            <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAgregarAcrivos">
                <span class="fas fa-plus-circle"> Agregar archivo</span>
            </span>
        <?php }?>
        <hr>
        <div id="tablaGestorArchivos"></div>
    </div>


        <!--modal par agregar archivos-->

        <!-- Modal -->
        <div class="modal fade" id="modalAgregarAcrivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background: #273c75; color: white">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="frmArchivos" enctype="multipart/form-data" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for=""><b>Categorias :</b> </label>
                                    <div id="categoriasLoad"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for=""><b>Autores :</b> </label>
                                    <div id="autoresLoad"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for=""><b>Editoriales :</b> </label>
                                    <div id="editorialesLoad"></div>
                                </div>
                                <div class="col-md-6">
                                    <label for=""><b>Tema de la Categoria :</b> </label>
                                    <div id="temasLoad"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Titulo del Libro :</label>
                                    <input type="text" name="titulo" id="titulo" class="form-control form-control-sm" placeholder="Titulo del Libro">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Edicion del Libro :</label>
                                    <input type="text" name="edicion" id="edicion" class="form-control form-control-sm" placeholder="Edicion del libro">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Cantidad de Paginas :</label>
                                    <input type="number" name="paginas" id="paginas" class="form-control form-control-sm" placeholder="Cantidad de Paginas">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Brebe descripcion del Libro :</label>
                                    <input type="text" name="descripcion" id="descripcion" class="form-control form-control-sm" placeholder="Brebe descripcion del Libro">
                                </div>
                            </div>


                            <label for=""><b>Selecciona archivos :</b></label>
                            <input type="file" name="archivos[]" id="archivos[]" class="form-control form-control-sm" multiple="">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerar</button>
                        <button type="button" class="btn btn-primary" id="btnguardarArchivos">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background: #27ae60; color: white">
                        <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="archivoObtenido"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal mostrar datos libros -->
        <div class="modal fade" id="modalMostrarDatosLibro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header" style="background: #27ae60; color: white">
                        <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-sm table-dark">
                            <input type="text" name="idArchivo" id="idArchivo" hidden="" class="form-control form-control-sm">

                            <tr>
                                <td><label for=""><b>Editorial  : </b></label></td>
                                <td colspan="3"><input type="text" name="editorialU" id="editorialU" class="forma form-control form-control-sm"  disabled style="background: #212529;" type="text"></td>
                            </tr>
                            <tr>
                                <td><label for=""><b>Nombre del Tema  :</b></label></td>
                                <td ><input type="text" name="temasU" id="temasU" class="forma form-control form-control-sm"  disabled style="background: #212529;" type="text"></td>
                            </tr>
                            <tr>
                                <td><label for=""><b>Edicion del Libro  :</b></label></td>
                                <td ><input type="text" name="edicionU" id="edicionU" class="forma form-control form-control-sm"  disabled style="background: #212529;" type="text"></td>
                            </tr>
                            <tr>
                                <td><label for=""><b>Numero de Paginas del Libro  :</b></label></td>
                                <td colspan="3"><input type="text" name="paginasU" id="paginasU" class="forma form-control form-control-sm"  disabled style="background: #212529;" type="text"></td>
                            </tr>
                            <tr>
                                <td><label for=""><b>Brebe Resumen del Libro</b></label></td>
                                <td ><input type="text" name="descripcionU" id="descripcionU" class="forma form-control form-control-sm"  disabled style="background: #212529;" type="text"></td>
                            </tr>
                            <tr>
                                <td><label for=""><b>Nombre del documento  :</b></label></td>
                                <td ><input type="text" name="nombreU" id="nombreU" class="forma form-control form-control-sm"  disabled style="background: #212529;" type="text"></td>
                            </tr>
                            <tr>
                                <td><label for=""><b>Tipo de Extencion del Libro  :</b></label></td>
                                <td ><input type="text" name="tipoU" id="tipoU" class="forma form-control form-control-sm"  disabled style="background: #212529;" type="text"></td>
                            </tr>

                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>


<?php include "footer.php"; ?>
        <script src="../js/gestor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
        $('#categoriasLoad').load("categorias/selectCategorias.php");
        $('#autoresLoad').load("autores/selectAutores.php");
        $('#editorialesLoad').load("editorial/selectEditorial.php");
        $('#temasLoad').load("temas/selectTemas.php");

        $('#btnguardarArchivos').click(function () {
            agregararchivosGestor();
        });
    });
</script>
<?php
    }else{
        header("location:../index.php");
    }
?>

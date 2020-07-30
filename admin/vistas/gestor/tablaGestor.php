<?php
    session_start();
    include_once "../../clases/Conexion.php";
    $c = new Conectar();
    $conexion = $c->conexion();
$idusuario = $_SESSION['idUsuario'];

    $sql = "SELECT 
                archivos.id_archivos as idArchivo,
                usuario.nombre as nombreUsuario,
                categorias.nombre as categoria,
                autor.autor as nom_autor,
                editorial.editorial as nom_editorial,
                temas.temas as nom_temas,
                archivos.titulo as titulo,
                archivos.edicion as edicion,
                archivos.paginas as paginas,
                archivos.descripcion as descripcion,
                archivos.nombre as nombreArchivo,
                archivos.tipo as tipoArchivo,
                archivos.ruta as rutaArchivo,
                archivos.fecha as fechaArchivo
                FROM
                    t_archivos AS archivos
                        INNER JOIN
                    t_usuarios AS usuario ON archivos.id_usuario = usuario.id_usuario
                        INNER JOIN
                    t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria
                        INNER JOIN
                    autor AS autor ON archivos.id_autor = autor.id_autor
                        INNER JOIN
                    editorial AS editorial ON archivos.id_editorial = editorial.id_editorial
                        INNER JOIN
                    temas AS temas ON archivos.id_temas = temas.id_temas
                     and usuario.rol = 1";

    $result = mysqli_query($conexion,$sql);
?>
<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover table-dark" id="tablagestorDataTable">
                <thead>
                    <tr>

                        <th>Usuario</th>
                        <th>Categoria</th>
                        <th>Autor</th>
                        <th>Titulo</th>
                        <th>Descarga</th>
                        <th>Visualizar</th>
                        <th>Informacion</th>
                        <?php if ($_SESSION['rol'] == 1) { ?>
                        <th>Eliminar</th>
                            <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                <?php

                /* Arrego de extensiones validas*/
                $extensionesValidas = array('png','jpg','pdf','mp3','mp4');

                    $x = 6;
                    while ($mostrar = mysqli_fetch_array($result)){


                        $rutaDescarga= "../archivos/".$x."/".$mostrar['nombreArchivo'];
                        $nombreArchivo = $mostrar['nombreArchivo'];
                        $idArchivo = $mostrar['idArchivo'];
                ?>
                    <tr>

                        <td><?php echo $mostrar['nombreUsuario'];?></td>
                        <td><?php echo $mostrar['categoria'];?></td>
                        <td><?php echo $mostrar['nom_autor'];?></td>
                        <td><?php echo $mostrar['titulo'];?></td>
                        <td>
                            <a href="<?php echo $rutaDescarga;?>" download="<?php echo $nombreArchivo;?>"
                               class="btn btn-success btn-sm">
                                <span><i class="fas fa-download"></i></span>

                            </a>
                        </td>
                        <td>
                            <?php
                                for ($i=0;$i<count($extensionesValidas); $i++){
                                    if ($extensionesValidas[$i] == $mostrar['tipoArchivo']){
                            ?>
                                        <span class="btn btn-primary btn-sm"
                                              data-toggle="modal" data-target="#visualizarArchivo"
                                              onclick="obtenerArchivoPorId(<?php echo $idArchivo;?>)">
                                              <span><i class="far fa-eye"></i></span>
                                        </span>
                                        <?php
                                    }
                                }
                            ?>
                        </td>
                        <td >
                            <span class="btn btn-warning btn-sm"onclick="obtenerDatos(<?php echo $idArchivo;?>)"
                                  data-toggle="modal" data-target="#modalMostrarDatosLibro">
                                <span class="fas fa-paste"></span>
                            </span>
                        </td>
                        <?php if ($_SESSION['rol'] == 1) { ?>
                            <td>
                            <span class="btn btn-danger btn-sm" onclick="eliminarArchivo('<?php echo $idArchivo; ?>')">
                                <span class="fas fa-trash-alt"></span>
                            </span>
                            </td>
                            <?php
                        }
                        ?>

                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>

    </div>
</div>




<script type="text/javascript">
    $(document).ready(function () {
        $('#tablagestorDataTable').dataTable();
    });
</script>

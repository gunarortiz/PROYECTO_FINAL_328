<?php
    session_start();
    require_once "../../clases/Conexion.php";
    $idUsuario = $_SESSION['idUsuario'];
    $conexion = new Conectar();
    $conexion = $conexion->conexion();
?>

<div class="table-responsive">
    <table class="table table-hover table-dark" id="tablaCategoriaDatatable">
        <thead style="text-align: center">
            <th>#</th>
            <th>Nombre</th>
            <th>Localidad</th>
            <th>telefono</th>
            <th>profecion</th>
            <th>Fecha</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT id_autor,
                           autor,
                           localidad,
                           telefono,
                           profecion, 
                           fecha_ini 
                           FROM autor 
                           WHERE id_usuario = '$idUsuario'";
            $result = mysqli_query($conexion,$sql);
            $i=0;
            while ($mostrar = mysqli_fetch_array($result)){
                $i++;
                $idAutor = $mostrar['id_autor']

        ?>
            <tr style="text-align: center">
                <td> <?php echo $i;?></td>
                <td> <?php echo $mostrar['autor'];?></td>
                <td> <?php echo $mostrar['localidad'];?></td>
                <td> <?php echo $mostrar['telefono'];?></td>
                <td> <?php echo $mostrar['profecion'];?></td>
                <td><?php echo $mostrar['fecha_ini'];?></td>
                <td >
                    <span class="btn btn-warning btn-sm" onclick="obtenerDatosAutores('<?php echo $idAutor?>')"
                          data-toggle="modal" data-target="#modalActualizarCategoria">
                        <span class="fas fa-edit"></span>
                    </span>
                </td>
                <td>
                    <span class="btn btn-danger btn-sm" onclick="eliminarAutor('<?php echo $idAutor?>')">
                        <span class="fas fa-trash-alt"></span>
                    </span>
                </td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tablaCategoriaDatatable').DataTable();
    });
</script>

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
        <th>Telefono</th>
        <th>Descripcion</th>
        <th>Fecha</th>
        <th>Editar</th>
        <th>Eliminar</th>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT id_editorial,
                           editorial,
                           localidad,
                           telefono,
                           descripcion, 
                           fecha_ini 
                           FROM editorial 
                           WHERE id_usuario = '$idUsuario'";
            $result = mysqli_query($conexion,$sql);
            $i=0;
            while ($mostrar = mysqli_fetch_array($result)){
                $i++;
                $idEditorial = $mostrar['id_editorial']

        ?>
            <tr style="text-align: center">
                <td> <?php echo $i;?></td>
                <td> <?php echo $mostrar['editorial'];?></td>
                <td> <?php echo $mostrar['localidad'];?></td>
                <td> <?php echo $mostrar['telefono'];?></td>
                <td> <?php echo $mostrar['descripcion'];?></td>
                <td><?php echo $mostrar['fecha_ini'];?></td>
                <td >
                    <span class="btn btn-warning btn-sm" onclick="obtenerDatosEditorial('<?php echo $idEditorial?>')"
                          data-toggle="modal" data-target="#modalActualizarEditorial">
                        <span class="fas fa-edit"></span>
                    </span>
                </td>
                <td>
                    <span class="btn btn-danger btn-sm" onclick="eliminarEditorial('<?php echo $idEditorial?>')">
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

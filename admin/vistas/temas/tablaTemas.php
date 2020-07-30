<?php
    session_start();
    require_once "../../clases/Conexion.php";
    $idUsuario = $_SESSION['idUsuario'];
    $conexion = new Conectar();
    $conexion = $conexion->conexion();
?>

<div class="table-responsive">
    <table class="table table-hover table-dark" id="tablaTemasDatatable">
        <thead style="text-align: center">
            <th>#</th>
            <th>Nombre Tema</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT id_temas,
                           temas,
                           descripcion, 
                           fecha_ini 
                           FROM temas 
                           WHERE id_usuario = '$idUsuario'";
            $result = mysqli_query($conexion,$sql);
            $i=0;
            while ($mostrar = mysqli_fetch_array($result)){
                $i++;
                $idTemas = $mostrar['id_temas']

        ?>
            <tr style="text-align: center">
                <td> <?php echo $i;?></td>
                <td> <?php echo $mostrar['temas'];?></td>
                <td> <?php echo $mostrar['descripcion'];?></td>
                <td><?php echo $mostrar['fecha_ini'];?></td>
                <td >
                    <span class="btn btn-warning btn-sm" onclick="obtenerDatosTemas('<?php echo $idTemas?>')"
                          data-toggle="modal" data-target="#modalActualizarTemas">
                        <span class="fas fa-edit"></span>
                    </span>
                </td>
                <td>
                    <span class="btn btn-danger btn-sm" onclick="eliminarTemas('<?php echo $idTemas?>')">
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
        $('#tablaTemasDatatable').DataTable();
    });
</script>

<?php
session_start();
require_once "../../clases/Conexion.php";
$idUsuario = $_SESSION['idUsuario'];
$conexion = new Conectar();
$conexion = $conexion->conexion();
?>

<div class="table-responsive">
    <table class="table table-hover table-dark" id="tablaUsuarioDatatable">
        <thead style="text-align: center">
        <th>N°</th>
        <th>Nombre</th>
        <th>Carnet</th>
        <th>Fech_Nac</th>
        <th>Ocupacion</th>
        <th>Email</th>
        <th>Usuario</th>
        <th>Rol</th>
        <th>Fech_Ins</th>
        <th>Eliminar</th>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT u.id_usuario,
                       u.nombre,
                       u.carnet,
                       u.fechaNacimiento,
                       u.trabajo,
                       u.email,
                       u.usuario,
                       u.insert,
                       r.rol
                 FROM t_usuarios u 
                 INNER JOIN rol r ON u.rol = r.idrol
                           ";
        $result = mysqli_query($conexion,$sql);
        $i = 0;
        while ($mostrar = mysqli_fetch_array($result)){
            $idUsuario = $mostrar['id_usuario'];
            $i= $i+1;
            ?>
            <tr style="text-align: center">
                <td> <?php echo $i;?></td>
                <td> <?php echo $mostrar['nombre'];?></td>
                <td> <?php echo $mostrar['carnet'];?></td>
                <td> <?php echo $mostrar['fechaNacimiento'];?></td>
                <td> <?php echo $mostrar['trabajo'];?></td>
                <td> <?php echo $mostrar['email'];?></td>
                <td> <?php echo $mostrar['usuario'];?></td>
                <td> <?php echo $mostrar['rol'];?></td>
                <td><?php echo $mostrar['insert'];?></td>
                <td >
                   <!-- <span class="btn btn-warning btn-sm" onclick="obtenerDatosUsuario('<?php /*echo $idUsuario*/?>')"
                          data-toggle="modal" data-target="#modalActualizarUsuario">
                        <span class="fas fa-edit"></span>
                    </span>-->
                    <span class="btn btn-danger btn-sm" onclick="eliminarUsuario('<?php echo $idUsuario?>')">
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
        $('#tablaUsuarioDatatable').DataTable();
    });
</script>


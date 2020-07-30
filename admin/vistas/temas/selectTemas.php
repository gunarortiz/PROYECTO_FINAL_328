<?php
session_start();
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();

$idUsuario = $_SESSION['idUsuario'];
$sql = "SELECT id_temas,
                temas 
                FROM temas 
                WHERE id_usuario = '$idUsuario' ";
$result = mysqli_query($conexion,$sql);
?>

<select name="temasArchivos" id="temasArchivos" class="form-control">
    <option value="">------ Seleccionar -------</option>
    <?php
        while ($mostrar = mysqli_fetch_array($result)){
           $idTemas = $mostrar['id_temas'];
    ?>
            <option value="<?php echo $idTemas;?>"><?php echo $mostrar['temas'] ?></option>
    <?php
        }
    ?>
</select>


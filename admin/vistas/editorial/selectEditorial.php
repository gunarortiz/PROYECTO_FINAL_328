<?php
session_start();
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();

$idUsuario = $_SESSION['idUsuario'];
$sql = "SELECT id_editorial,
                editorial 
                FROM editorial 
                WHERE id_usuario = '$idUsuario' ";
$result = mysqli_query($conexion,$sql);
?>

<select name="editorialArchivos" id="editorialArchivos" class="form-control">
    <option value="">------ Seleccionar -------</option>
    <?php
        while ($mostrar = mysqli_fetch_array($result)){
           $idEditorial = $mostrar['id_editorial'];
    ?>
            <option value="<?php echo $idEditorial;?>"><?php echo $mostrar['editorial'] ?></option>
    <?php
        }
    ?>
</select>


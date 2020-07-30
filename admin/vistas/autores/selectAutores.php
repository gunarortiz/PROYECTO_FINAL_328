<?php
session_start();
require_once "../../clases/Conexion.php";
$c = new Conectar();
$conexion = $c->conexion();

$idUsuario = $_SESSION['idUsuario'];
$sql = "SELECT id_autor,
                autor 
                FROM autor 
                WHERE id_usuario = '$idUsuario' ";
$result = mysqli_query($conexion,$sql);
?>

<select name="autoresArchivos" id="autoresArchivos" class="form-control">
    <option value="">------ Seleccionar -------</option>
    <?php
        while ($mostrar = mysqli_fetch_array($result)){
           $idAutor = $mostrar['id_autor'];
    ?>
            <option value="<?php echo $idAutor;?>"><?php echo $mostrar['autor'] ?></option>
    <?php
        }
    ?>
</select>


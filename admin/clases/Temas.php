<?php
require_once "Conexion.php";
class Temas extends Conectar{
    public function agregarTemas($datos){
        $conexion = Conectar::conexion();

        $sql = "INSERT INTO temas (id_usuario,temas,descripcion) 
                VALUES (?, ?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param("iss",$datos['idUsuario'],
                                           $datos['temas'],
                                           $datos['descripcion']
                                             );
        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }

    public function eliminarTemas($idTemas){
        $conexion = Conectar::conexion();
        $sql = "DELETE FROM temas
                       WHERE id_temas = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i',$idTemas);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function obtnerTemas($idTemas){
        $conexion = Conectar::conexion();

        $sql = "SELECT id_temas, 
                       temas,
                       descripcion
                       FROM temas
                       WHERE id_temas = '$idTemas'";
        $result = mysqli_query($conexion,$sql);

        $temas = mysqli_fetch_array($result);

        $datos = array(
            "idTemas" => $temas['id_temas'],
            "temas" => $temas['temas'],
            "descripcion" => $temas['descripcion']
        );
        return$datos;
    }

    public function actualizarTemas($datos){
        $conexion = Conectar::conexion();

        $sql = "UPDATE temas 
                        SET temas = ?,
                            descripcion = ?
                        WHERE id_temas = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("ssi",$datos['temas'],
                                        $datos['descripcion'],
                                       $datos['idTemas']);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;

    }
}
?>
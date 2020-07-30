<?php
require_once "Conexion.php";
class Editorial extends Conectar{
    public function agregarEditorial($datos){
        $conexion = Conectar::conexion();

        $sql = "INSERT INTO editorial (id_usuario,editorial,localidad,telefono,descripcion) 
                VALUES (?,?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param("issis",$datos['idUsuario'],
                                          $datos['editorial'],
                                               $datos['localidad'],
                                                $datos['telefono'],
                                             $datos['descripcion']);
        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }

    public function eliminarEditorial($idEditorial){
        $conexion = Conectar::conexion();
        $sql = "DELETE FROM editorial
                       WHERE id_editorial = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i',$idEditorial);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function obtnerEditorial($idEditorial){
        $conexion = Conectar::conexion();

        $sql = "SELECT id_editorial, 
                       editorial,
                       localidad,
                       telefono,
                       descripcion
                       FROM editorial
                       WHERE id_editorial = '$idEditorial'";
        $result = mysqli_query($conexion,$sql);

        $editorial = mysqli_fetch_array($result);

        $datos = array(
            "idEditorial" => $editorial['id_editorial'],
            "editorial" => $editorial['editorial'],
            "localidad" => $editorial['localidad'],
            "telefono" => $editorial['telefono'],
            "descripcion" => $editorial['descripcion']
        );
        return$datos;
    }

    public function actualizarEditorial($datos){
        $conexion = Conectar::conexion();

        $sql = "UPDATE editorial 
                        SET editorial = ?,
                            localidad = ?,
                            telefono  = ?,
                            descripcion =?
                        WHERE id_editorial = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("ssisi",$datos['editorial'],
                                        $datos['localidad'],
                                            $datos['telefono'],
                                             $datos['descripcion'],
                                            $datos['idEditorial']);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;

    }
}
?>
<?php
require_once "Conexion.php";
class Autor extends Conectar{
    public function agregarAutor($datos){
        $conexion = Conectar::conexion();

        $sql = "INSERT INTO autor (id_usuario,autor,localidad,telefono,profecion) 
                VALUES (?, ?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param("issis",$datos['idUsuario'],
                                            $datos['autor'],
                                             $datos['localidad'],
                                             $datos['telefono'],
                                            $datos['profecion']);
        $respuesta = $query->execute();
        $query->close();

        return $respuesta;
    }

    public function eliminarAutores($idAutor){
        $conexion = Conectar::conexion();
        $sql = "DELETE FROM autor
                       WHERE id_autor = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i',$idAutor);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function obtnerAutor($idAutor){
        $conexion = Conectar::conexion();

        $sql = "SELECT id_autor, 
                       autor,
                       localidad,
                       telefono,
                       profecion 
                       FROM autor
                       WHERE id_autor = '$idAutor'";
        $result = mysqli_query($conexion,$sql);

        $autor = mysqli_fetch_array($result);

        $datos = array(
            "idAutor" => $autor['id_autor'],
            "autor" => $autor['autor'],
            "localidad" => $autor['localidad'],
            "telefono" => $autor['telefono'],
            "profecion" => $autor['profecion']
        );
        return$datos;
    }

    public function actualizarAutor($datos){
        $conexion = Conectar::conexion();

        $sql = "UPDATE autor 
                        SET autor = ?,
                            localidad = ?,
                            telefono =?,
                            profecion =?
                        WHERE id_autor = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("ssisi",$datos['autor'],
                                        $datos['localidad'],
                                            $datos['telefono'],
                                            $datos['profecion'],
                                       $datos['idAutor']);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;

    }
}
?>
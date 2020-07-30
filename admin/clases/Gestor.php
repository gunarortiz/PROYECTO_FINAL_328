<?php
require_once "Conexion.php";
class Gestor extends Conectar {
    public function agregaRegistroArchivo($datos){
        $conexion = Conectar::conexion();
        $sql = "INSERT INTO t_archivos (id_usuario,
                                        id_categoria,
                                        id_autor,
                                        id_editorial,
                                        id_temas,
                                        titulo,
                                        edicion,
                                        paginas,
                                        descripcion,
                                        nombre,
                                        tipo,
                                        ruta)
                                 VALUES(?, ?, ?, ?,?,?, ?, ?, ?,?,?,?)";
        $query = $conexion->prepare($sql);
        $query->bind_param("iiiiississss",$datos['idUsuario'],
                                               $datos['idCategoria'],
                                               $datos['idAutor'],
                                               $datos['idEditorial'],
                                               $datos['idTemas'],
                                               $datos['titulo'],
                                               $datos['edicion'],
                                               $datos['paginas'],
                                               $datos['descripcion'],
                                               $datos['nombreArchivo'],
                                               $datos['tipo'],
                                               $datos['ruta']);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function obtenNombreArchivo($idArchivo){
        $conexion = Conectar::conexion();
        $sql = "SELECT nombre 
                        FROM t_archivos 
                        WHERE id_archivos = '$idArchivo'";
        $result = mysqli_query($conexion,$sql);
        return  mysqli_fetch_array($result)['nombre'];
    }

    public function eliminarRegistroArchivo($idArchivo){
        $conexion = Conectar::conexion();
        $sql = "DELETE FROM t_archivos WHERE id_archivos = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i',$idArchivo);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function obtenerRutaArchivo($idArchivo){
        $conexion = Conectar::conexion();

        $sql = "SELECT nombre,tipo 
                FROM t_archivos 
                WHERE id_archivos = '$idArchivo'";
        $result = mysqli_query($conexion,$sql);
        $datos = mysqli_fetch_array($result);
        $nombreArchivo = $datos['nombre'];
        $extension = $datos['tipo'];
        return self::tipoArchivo($nombreArchivo, $extension);
    }
    public function obtnerDatosArchivos($idArchivo){
        $conexion = Conectar::conexion();

        $sql = "SELECT 
                archivos.id_archivos as idArchivo,
                usuario.nombre as nombreUsuario,
                categorias.nombre as categoria,
                autor.autor as nom_autor,
                editorial.editorial as nom_editorial,
                temas.temas as nom_temas,
                archivos.titulo as titulo,
                archivos.edicion as edicion,
                archivos.paginas as paginas,
                archivos.descripcion as descripcion,
                archivos.nombre as nombreArchivo,
                archivos.tipo as tipoArchivo,
                archivos.ruta as rutaArchivo,
                archivos.fecha as fechaArchivo
                FROM
                    t_archivos AS archivos
                        INNER JOIN
                    t_usuarios AS usuario ON archivos.id_usuario = usuario.id_usuario
                        INNER JOIN
                    t_categorias AS categorias ON archivos.id_categoria = categorias.id_categoria
                        INNER JOIN
                    autor AS autor ON archivos.id_autor = autor.id_autor
                        INNER JOIN
                    editorial AS editorial ON archivos.id_editorial = editorial.id_editorial
                        INNER JOIN
                    temas AS temas ON archivos.id_temas = temas.id_temas
                       WHERE archivos.id_archivos = '$idArchivo'";
        $result = mysqli_query($conexion,$sql);

        $archivo = mysqli_fetch_array($result);

        $datos = array(
            "idArchivo" => $archivo['idArchivo'],
            "editorial" => $archivo['nom_editorial'],
            "temas" => $archivo['nom_temas'],
            "edicion" => $archivo['edicion'],
            "paginas" => $archivo['paginas'],
            "descripcion" => $archivo['descripcion'],
            "nombre" => $archivo['nombreArchivo'],
            "tipo" => $archivo['tipoArchivo']
        );
        return$datos;
    }

    public function tipoArchivo($nombre,$extension){
        $idusuario = 6;

        $ruta = "../archivos/".$idusuario."/".$nombre;
        switch ($extension){
            case 'png':
                return '<img src="'.$ruta.'" width="100%">';
                break;
            case 'jpg':
                return '<img src="'.$ruta.'" width="100%">';
                break;
            case 'pdf':
                return '<embed src="'.$ruta.'#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />';
                break;
            case 'mp3':
                return '<audio controls src="'.$ruta.'"></audio>';
                break;
            case 'mp4':
                return '<video src="'.$ruta.'" controls width="100%"></video>';
                break;
            default:
                break;
        }
    }
}
<?php
require_once "Conexion.php";
class Usuario extends Conectar {
    public function agregarUsuario($datos){
        $conexion = Conectar::conexion();

        if (self::buscarUsuarioRepetido($datos['usuario'])){
            return 2;
        }else{
            $sql = "INSERT INTO t_usuarios (nombre,
                                        carnet,
                                        fechaNacimiento,
                                        trabajo,
                                        email,
                                        usuario,
                                        password,
                                        rol) 
                                VALUES (?, ?, ?, ?, ?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssssssi', $datos['nombre'],
                $datos['carnet'],
                $datos['fechaNacimiento'],
                $datos['trabajo'],
                $datos['correo'],
                $datos['usuario'],
                $datos['password'],
                $datos['rol']);
            $exito = $query->execute();
            $query->close();
            return $exito;
        }

    }
    public function buscarUsuarioRepetido($usuario){
        $conexion = Conectar::conexion();

        $sql = "SELECT usuario
                FROM t_usuarios 
                WHERE usuario = '$usuario'";
        $result = mysqli_query($conexion,$sql);
        $datos = mysqli_fetch_array($result);
        if($datos['usuario'] != "" || $datos['usuario'] == $usuario){
            return 1;
        }else{
            return 0;
        }
    }

    public function login($usuario, $password){
        $conexion = Conectar::conexion();

        $sql = "SELECT count(*) as existeUsuario 
                FROM t_usuarios 
                WHERE usuario = '$usuario' 
                AND password = '$password'";
        $result = mysqli_query($conexion, $sql);

        $respuesta = mysqli_fetch_array($result)['existeUsuario'];

        if($respuesta > 0){
            $_SESSION['usuario']= $usuario;

            $sql = "SELECT id_usuario,nombre,rol 
                    FROM t_usuarios 
                    WHERE usuario = '$usuario' 
                    AND password = '$password'";

            $result = mysqli_query($conexion, $sql);
            /*$idUsuario = mysqli_fetch_row($result)[0];*/
            while($idUsuario = mysqli_fetch_array($result)){
                $_SESSION['idUsuario'] = $idUsuario['id_usuario'];
                $_SESSION['nombre'] = $idUsuario['nombre'];
                $_SESSION['rol'] = $idUsuario['rol'];

            }

            return 1;
        }else{
            return 0;
        }
    }

    public function eliminarUsuario($idUsuario){
        $conexion = Conectar::conexion();
        $sql = "DELETE FROM t_usuarios
                       WHERE id_usuario = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i',$idUsuario);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function obtnerUsuario($idUsuario){
        $conexion = Conectar::conexion();

        $sql = "SELECT id_usuario,nombre,fechaNacimiento,email,usuario,password,rol
                       FROM t_usuarios
                       WHERE id_usuario = '$idUsuario'";
        $result = mysqli_query($conexion,$sql);

        $usuario = mysqli_fetch_array($result);

        $datos = array(
            "idUsuario" => $usuario['id_usuario'],
            "nombreUsuario" => $usuario['nombre'],
            "fechaNacimientoUsuario" => $usuario['fechaNacimiento'],
            "correoUsuario" => $usuario['email'],
            "usuarioUsuario" => $usuario['usuario'],
            "contraseñaUsuario" => $usuario['password']


        );
        return$datos;
    }

    public function actualizarCategoria($datos){
        $conexion = Conectar::conexion();

        $sql = "UPDATE t_categorias 
                        SET nombre = ?
                        WHERE id_categoria = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param("si",$datos['categoria'],
            $datos['idCategoria']);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;

    }
}
?>
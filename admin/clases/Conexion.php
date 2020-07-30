<?php

//class Conectar{
//    public function conexion(){
//        $servidor="loclahost";
//        $usuario="root";
//        $password="";
//        $base="gestor";
//
//        $conexion = mysqli_connect($servidor,
//                                   $usuario,
//                                   $password,
//                                   $base);
//        return $conexion;
//    }
//}
class Conectar{
    public function Conexion(){
        $Conexion= new mysqli("localhost","root","","gestor_3");
        if($Conexion->connect_error){
            echo "Falló al conectar :". $Conexion->connect_error;
        }

        $Conexion->set_charset("utf8");
        return $Conexion;
    }
}

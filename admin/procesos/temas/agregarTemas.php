<?php
session_start();
require_once "../../clases/Temas.php";
$Temas = new Temas();
$datos = array(
    "idUsuario" => $_SESSION['idUsuario'],
    "temas" => $_POST['temas'],
    "descripcion" => $_POST['descripcion']
);
echo $Temas->agregarTemas($datos);
?>
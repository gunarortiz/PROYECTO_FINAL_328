<?php
session_start();
require_once "../../clases/Editorial.php";
$Editorial = new Editorial();
$datos = array(
    "idUsuario" => $_SESSION['idUsuario'],
    "editorial" => $_POST['editorial'],
    "localidad" => $_POST['localidad'],
    "telefono" => $_POST['telefono'],
    "descripcion" => $_POST['descripcion']
);
echo $Editorial->agregarEditorial($datos);
?>